<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\Config as FacadesConfig;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function index()
    {
        return view('front.auth.login');
    }

    public function login(Request $request)
    {
        $checkUser = User::where('username', $request->username)->where('activated', 0)->get();
        $user = User::where('username', $request->username)->first();
        if ($checkUser->count() > 0) {
            $activateCode = ActivateCode();
         
            $updated = $user->update(['activateCode' => $activateCode]);
            if ($updated) {
                $url = FacadesConfig::get('app.url');

                $subject = 'Register';
                $link = $url . "/mainActivation?email=" . $user->email . "&activation_code=" . $activateCode;
                Mail::send(
                    'front.activation',
                    [
                        'text' => $link,

                    ],
                    function ($message) use ($subject, $user) {
                        $message->to($user->email)->subject($subject);
                    }
                );
                return redirect()->route('front.auth.login')->with('error', 'hesabınız hələ təstiqlənməyib. Təstiqlənmə linki yenidən elektron poçtunuza göndərildi');
            }
        } else {
            $credentials = $request->only('username', 'password');

            $remember = $request->has('remember');

            if (Auth::attempt($credentials, $remember)) {
                dd('success');
            } else {
                return back()->with('error', __('istifadəçi adı və ya şifrə yanlışdır'));
            }
        }
    }
}
