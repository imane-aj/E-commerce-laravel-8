<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ActivateYourAccount;


class ActivationController extends Controller
{
    //send email d activation
    public function activateUserAccount($code) {
        $user = User::whereCode($code)->first();
        $user->code = null;
        $user->update(['active'=> 1]);
        Auth::login($user);
        return redirect("/")->withSuccess('connected');
    } 

    //resend mail to activate account
    public function resendCode($email) {
        $user = User::whereEmail($email)->first();
        if($user->active) {
            return redirect("/");
        }
        Mail::to($user)->send(new ActivateYourAccount($user->code));
        return redirect('/login')
        ->withSuccess("the activated link has been sended");
    }
}
