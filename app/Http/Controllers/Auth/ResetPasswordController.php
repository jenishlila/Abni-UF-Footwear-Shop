<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function  reset(Request $request)
    {
        // return ($request->password);
    //   $request->validate($this->rules(), $this->validationErrorMessages());
        $user=User::where('token',$request->token)->first();
        // dd($user->token);
           
        if(isset($user->token) )
            {
            //    dd ($request->password);
                // return 'true';
                User::where('email',$user->email)->update(['password'=>Hash::make($request->password)]);
                    return view('layout/front/auth/login');                                
            }
        
        // return view('layout/front/auth/reset',['token'=>$request->token]);
        return 'false';

    }
 
    public function showResetForm(Request $request, $token = null)
    {
        
        return view('layout/mail')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
