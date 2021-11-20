<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits;\UploadFiles;

class ProfileController extends Controller
{
    use UploadFiles;

    public function updateProfile(Request $request)
    {
        //Metodos para validar campos
        $validated = $request->validate([
            'name'       => 'required|min:2|max:255',
            'telefone'   => 'nullable|min:9',
            'gender'     => 'nullable|min:1|max:1',
            'address'    => 'nullable|min:1|max:150',
        ]);

        //Metodos para atualizar o user
        $user = User::find (auth()->id());

        $user = this->handleAvatarUpload($request, $user)

        $user->name       = $request->name;
        $user->telefone   = $request->telefone;
        $user->gender     = $request->gender;
        $user->address    = $request->address;

        $user->save();

        return redirect()->back()->with(['message' => 'Perfil Atualizado com sucesso.']);
    }

    private function handleAvatarUpload (Request $request, User $user)
    {
        $avatarInputName = 'avatar'
        // Check if a profile image has been uploaded
        if ($request->has(' avatar')) {
            // Get image file
            $image = $request->file(' avatar');
            // Make a image name based on user name and current timestamp
            $name = Str::slug($request->input('name')).'_'.time();
            // Define folder path
            $folder = '/uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadImage($image, $folder, 'public', $name);

            //verifica se existe ficheiros de fotos relacionadas se nao ele apaga tudo desnecessário e apaga image.
                if ($user->avatar) {
                    $this->deleteImage($folder, 'public', explode('/', $user->avatar) [3]);
                }

            // Set user profile image path in database to filePath
            $user->avatar = $filePath;
        }

        return $user;

    }

}
