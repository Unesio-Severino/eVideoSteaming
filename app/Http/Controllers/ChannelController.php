<?php

namespace App\Http\Controllers;


use App\Models\Channel;
use App\Traits\UploadFiles;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class ChannelController extends Controller
{
    use UploadFiles;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $channels = Channel::all();
        return view('home.channels.index', compact('channels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.channels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'name' => 'required|min:2|max:50',
            'description' => 'nullable|min:5',
        ]);

        $channel = new Channel();

        $channel = $this->handleImageUpload($request, $channel);

        $channel->name = $request->name;
        $channel->description = $request->description;
        $channel->user_id = auth()->id();

        $channel->save();

        // dd($request->all(), $user);

        return redirect()->to('/channels')->with(['message' => 'Canal adicionado com sucesso']);

    }

    private function handleImageUpload(Request $request, Channel $channel){

        // Check if a profile image has been uploaded
        if ($request->has('logo')) {
            // Get image file
            $image = $request->file('logo');
            // Make a image name based on user name and current timestamp
            $name = Str::slug($request->input('name')).'_'.time();
            // Define folder path
            $folder = '/uploads/channels/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadImage($image, $folder, 'public', $name);


            // // Apagar a imagem que estava associada ao usuario anteriormente
            if($channel->logo && $channel->logo !== 'assets/img/s4.png') {
                $this->deleteImage($folder, 'public', explode('/', $channel->logo)[3]);
            }

            // Set user profile image path in database to filePath
            $channel->logo = $filePath;
        }

        return $channel;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('home.channels.show', ['channel' => Channel::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function edit(Channel $channel)
    {
        // dd($channel->description);
        return view('home.channels.edit', ['channel' => $channel ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Channel $channel)
    {
        // dd($channel, $request->all());
        $validatedData = $request->validate([
            'name' => 'required|min:2|max:50',
            'description' => 'nullable|min:5',
        ]);

        $channel = $this->handleImageUpload($request, $channel);

        $channel->name = $request->name;
        $channel->description = $request->description;
        // $channel->user_id = auth()->id();

        $channel->save();

        // dd($request->all(), $user);

        return redirect()->back()->with(['message' => 'Canal Atualizado com sucesso']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Channel $channel)
    {
        $message = 'Canal deletado com sucesso';


        $channel->delete();

        return redirect()->to('/channels')->with(['message' => $message]);
    }
}
