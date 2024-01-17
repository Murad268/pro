<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\ResetPasswodRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config as FacadesConfig;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;

class ResetPasswordController extends Controller
{
    public function reset_pass_email()
    {
        return view('front.auth.reset_pass');
    }

    public function reset_pass_open_reset(Request $request)
    {

        $checkEmail = User::where('email', $request->email)->get();

        if ($checkEmail->count() < 1) {
            return redirect()->back()->with('error', 'bu elektron poçt ilə hesab mövcud deyil');
        } else {
            $user = User::where('email', $request->email)->first();
            $url = FacadesConfig::get('app.url');

            $subject = 'Reset Password';
            $link = $url . "/new-password?email=" . $user->email . "&activation_code=" . $user->activateCode;
            Mail::send(
                'front.resetPass',
                [
                    'text' => $link,

                ],
                function ($message) use ($subject, $user) {
                    $message->to($user->email)->subject($subject);
                }
            );
            return redirect()->route('front.auth.login')->with('success', 'şifrə bərpası üçün link elektron poçtunuza göndərildi');
        }
    }

    public function new_password(Request $request)
    {
        $checkEmail = User::where('email', $request->email)->where('activateCode', $request->activation_code)->first();
        if($checkEmail) {
           return view('front.auth.new-password',['email' => $checkEmail->email, "code" => $checkEmail->activateCode]);
        } else {
            dd(1);
        }
    }

    public function add_new_password(ResetPasswodRequest $request) {
        $user = User::where('email', $request->email)->where('activateCode', $request->code)->first();
        $updated = $user->update([
            'password' => PasswordHash($request->password)
        ]);
        if($updated) {
            return redirect()->route('front.auth.login')->with('success', 'şifrəniz yeniləndi');
        } else {
            return redirect()->route('front.auth.login')->with('error', 'şifrə yenilənməsi zamanı xəta');
        }

    }
}

