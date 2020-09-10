<?php

namespace App\Http\Controllers\A1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin;
use App\Http\Requests\StoreLoginPost;
class LoginController extends Controller
{
   public function login(){
   	return view('A1.login.login');
   }


   public function index(){
   		$admin_name=request()->admin_name;
         $pwd=request()->pwd;
         $user=Admin::where('admin_name',$admin_name)->first();
   		//dd($red);
         if (!$admin_name) {
            return redirect('login')->with('msg',"用户名或密码错误");die;
         }
         if ($pwd!=$user['pwd']) {
             return redirect('login')->with('msg',"用户名或密码错误");die;
         }
   		session(['red'=>$user]);
   		return redirect("news");
   }
   public function test(){
      
   }
}
