<?php

namespace App\Traits;

use Illuminate\Foundation\Auth;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

trait AuthTrait
{
    use AuthenticatesAndRegistersUsers;

    public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $confirmation_code = str_random(30);

        User::create([
                         'name' => Input::get('name'),
                         'email' => Input::get('email'),
                         'password' => bcrypt(Input::get('password')),
                         'confirmation_code' => $confirmation_code,
                         'confirmation_sent' => Carbon::now()
                     ]);

        Mail::send('email.verify', ['confirmation_code' => $confirmation_code], function ($message) {
            $message->to(Input::get('email'), Input::get('name'))
                    ->subject('Verify your email address');
        });

        return Redirect::to($this->redirectPath())->with('message', 'Thanks for signing up! Please check your email.');
    }

    public function confirm($confirmation_code)
    {
        if(!$confirmation_code){
            return Redirect::to($this->redirectPath(), 400)->withErrors('No confirmation code provided');
        }

        $user = User::where('confirmation_code', $confirmation_code)->first();


        if ( ! $user){
            return Redirect::to($this->redirectPath(), 400)->withErrors('Confirmation code invalid');
        }
        else if (Carbon::now()->diffInHours($user->confirmation_sent) > 12){
            return Redirect::to($this->redirectPath(), 400)->withErrors('Confirmation code has expired!');
        }

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();


        return Redirect::to('login')->with('message', 'You have successfully verified your account. <br> Please now login');
    }
}