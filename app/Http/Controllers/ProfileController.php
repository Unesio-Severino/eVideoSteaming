<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Str;
use App\Traits\UploadFiles;
use Storage;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    use UploadFiles;

    public function updateProfile(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:2|max:255',
            'telefone' => 'nullable|min:9',
            'gender' => 'nullable|min:1|max:10',
            'address' => 'nullable|min:1|max:150',
        ]);

        $user = User::find(auth()->id());

        $user = $this->handleAvatarUpload($request, $user);

        $user->name = $request->name;
        $user->telefone = $request->telefone;
        $user->gender = $request->gender;
        $user->address = $request->address;



        $user->save();

        // dd($request->all(), $user);

        return redirect()->back()->with(['message' => 'Perfil atualizado com sucesso']);

    }

    private function handleAvatarUpload(Request $request, User $user){

        // Check if a profile image has been uploaded
        if ($request->has('avatar')) {
            // Get image file
            $image = $request->file('avatar');
            // Make a image name based on user name and current timestamp
            $name = Str::slug($request->input('name')).'_'.time();
            // Define folder path
            $folder = '/uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadImage($image, $folder, 'public', $name);


            // // Apagar a imagem que estava associada ao usuario anteriormente
            if($user->avatar){
                $this->deleteImage($folder, 'public', explode('/', $user->avatar)[3]);
            }

            // Set user profile image path in database to filePath
            $user->avatar = $filePath;
        }

        return $user;
    }



}
