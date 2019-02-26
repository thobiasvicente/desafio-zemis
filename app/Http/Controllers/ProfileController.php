<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(User $user)
    {   
        $user = Auth::user();
        return view('users.edit', compact('user'));
    }

    public function update(Request $request)
    { 
        $user = Auth::user();
        $user->name = request('name');
        $user->email = request('email');
        if($request->has('password')){
            $user->password = bcrypt(request('password'));
        }
        if($request->has('imagem')){
        $path = $request-> file('imagem')-> store('public/profile-pictures');
        $user->profile_picture = str_replace('public', 'storage', $path);
        
        }
        $user->save();

        return redirect()->back();
        
    }

    public function destroy($id)
{
        $image_path = "/public/profile-pictures";  // Value is not URL but directory file path
        if(File::exists($image_path)) {
        File::delete($image_path);
    }
 }

    public function deleteAvatar(){
        $user = Auth::user();
        $user ->profile_picture = '';
        $user ->save();

        return redirect()->back();
    }


}
