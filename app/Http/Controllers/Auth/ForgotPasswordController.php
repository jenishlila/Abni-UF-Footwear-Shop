<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function sendResetLinkEmail(Request $request)
    {
        // return $request;
         $user=User::where('email',$request->email)->first();
        // return $user;
                
            if(isset($user->email))
                {
                    $token = md5($user->email);
                        user::where('email',$user->email)->update(['token'=>$token]);

                    $data=[
                            
                            'title'=>'Reset Password Form',
                            'content'=>$token,
                         ];
                    
                    Mail::send('layout/sendmail', $data, function($message)use($request)
                    {
                        $message->to($request->email)->subject('Forgot Password Link');
                    });
                    return back()->with('success', 'Password reset link send to User...!');

                }
            else 
            {
                // return "false";
                return back()->with('status', 'Your account is not found...!');
            }
    }

    public function showLinkRequestForm()
    {
        return view('layout/admin/auth/reset');
    }


}
