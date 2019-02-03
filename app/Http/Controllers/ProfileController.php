<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class ProfileController extends Controller
{
    //
    public function index(){
        $user= User::find(Auth::user()->id);
        return view('profile.index', compact('user'));
    }
    public function update(request $request, $id){
        $user = User::find($id);
        
        if($file = $request->file('img')){
            $img = time() . $file->getClientOriginalName();
            $path = public_path().'\images\users\\'.$id;
            if(is_file($path.'\\'.$user->img)){
                unlink($path.'\\'.$user->img);
            }
            $file->move($path,$img);
            $user->img = $img;
            $user->update($request->all());
            return redirect('admin');
        }else{
            $user->update($request->all());
            return redirect('admin');
        }
    }
}
