<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\MailNotify;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Termwind\Components\Dd;

class AdminController extends Controller
{
    public function users(){
        $data['users'] =  User::get();
        return view('admin.users', $data);
    }
    public function all(){
        return view('add');
    }
    public function store(Request $request)
    {
       $user = new User();
       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = Hash::make($request->password);
       $user->save();
       $user_login = Auth::user();
       $message = '
           You Successfully added in list. Please Set the Password.
       ';
       $subject = "Order Placed";
       Mail::to('asadshahid245@gmail.com')->send(new MailNotify($user_login , $subject , $message));
        $msg =session()->flash('status', 'User added but set password through email.');

        return redirect('/home')->with($msg);
    }

     public function password(User $user){
         $data['user'] = $user;
         return view('password', $data);
     }
    public function set_password(Request $request , User $user){
      $user->password = $request->password;
      $user->update();
      dd('set password successfully.');
    }
}
