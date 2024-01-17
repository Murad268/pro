<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\RegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config as FacadesConfig;
class RegisterController extends Controller
{
    public function index()
    {
        return view('front.auth.register');
    }


    public function register(RegisterRequest $request) {
        $activateCode = ActivateCode();
        $url = FacadesConfig::get('app.url');
   
        $subject = 'Register';
   
  
        $link = $url . "/mainActivation?email=" . $request->email . "&activation_code=" . $activateCode;


        Mail::send(
            'front.activation',
            [
                'text' => $link,
            
            ],
            function ($message) use ($subject, $request) {
                $message->to($request->email)->subject($subject);
            }
        );

        $registered = User::create([
            'email' => $request->email,
            'username' => $request->username,
            'password' => PasswordHash($request->password),
            'activateCode' => $activateCode
        ]);
        if($registered) {
            return redirect()->route('front.auth.login')->with('success', __('site.activate_send'));
        }
    }

    public function activate(Request $request) {
        $user = User::where('email', '=', $request->email)->where('activateCode', $request->activation_code)->first();
      
        try {
            $updated = $user->update(['activated' => 1]);
            if ($updated) {
                return redirect()->route('front.auth.login')->with('success', __('site.activated'));
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
