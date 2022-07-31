<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Validator;
use Exception;


class SocialController extends Controller
{
  public function Redirect($provider){

    return  Socialite::driver($provider)->redirect();

  }

  public function loginWithProvider($provider)
  {

    try {

      $user = Socialite::driver($provider)->user();
      $isUser = User::where('fb_id', $user->id)->first();

      if($isUser){
        Auth::login($isUser);
        return redirect('/home');
      }else{
        $createUser = User::create([
          'name' => $user->name,
          'email' => $user->email,
          'fb_id' => $user->id,
          'password' => rand(1000,1000000000)
        ]);

        Auth::login($createUser);
        return redirect('/home');
      }

    } catch (Exception $exception) {
      dd($exception->getMessage());
    }
  }

  public function handleGoogleCallback($provider)
  {
    try {

      $user = Socialite::driver($provider)->user();
      $finduser = User::where('google_id', $user->id)->first();
      if($finduser){
        Auth::login($finduser);
        return redirect('/home');
      }else{
        $newUser = User::create([
          'name' => $user->name,
          'email' => $user->email,
          'google_id'=> $user->id,
          'password' => rand(1000,1000000000)
        ]);

        Auth::login($newUser);

        return redirect('/home');
      }

    } catch (Exception $e) {
      dd($e->getMessage());
    }
  }
}
