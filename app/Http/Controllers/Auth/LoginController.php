<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\cart;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }
    public function FunctionName(Request $req)
    {
        return "erer";
    }
    public function login(Request $request)
    {
        // return $request;/
        $users=User::where('email',$request->email)->where('status','!=','Y')->get();
        // return $users;
        if($users->isEmpty())
        {
        
        $pro_id = [];
        $pro_qty = [];

            if (Auth::attempt(['email' => $request->email, 'password' =>$request->password,'role'=>'1']))
            {
            
                return redirect('admin/dashboard');   
                // return Hash::make('12345678');
            }
        
            elseif (Auth::attempt(['email' => $request->email, 'password' =>$request->password,'role'=>'0']))
            {

                $cartData = Session::has('cart') ? Session::get('cart') : null;
                // dd($cartData);
                if(isset($cartData))
                {
                    foreach ($cartData as $key => $cartdata) 
                    {
                        // if($key)
                        // {
                            $pro_id = $cartdata['id'];
                            $pro_qty = $cartdata['qty'];
                        // }
                        // dd($pro_qty);
                        $data=Cart::where('user_id',Auth::user()->id)->where('product_id',$pro_id)->first();
                        if(isset($data))
                        {
                            // dd($pro_qty);
                            $data->update(['qty'=>$pro_qty]);
                            // return $data;
                        }
                        else
                        {
                            $data=Cart::Create(['product_id'=>$cartdata['id'],'qty'=>$cartdata['qty'],'user_id'=>Auth::user()->id]);
                            
                        }
                        // return $data;
                    }
                }
                Session::forget('cart');
                // dd(Auth::user()->name);
                return redirect('/home');   
                // return Hash::make('12345678');
            }
            else
            {
                //  return Hash::make('sanju123')
                return $this->sendFailedLoginResponse($request);
            }
            }
        else
        {
            // return "yehhhhh";
            return back()->with('danger', 'Your Account Is Temporary Blocked By Adminstrator...!');
        }
        

        // return ($request);
     }
    public function logout()
    {
    //     auth()->logout();
    //    return redirect('admin/logout');
        if(Auth::user()->role=='1')
        {
            Auth::logout();
            // return redirect('admin/logout');
            return view('layout/admin/auth/logout');
        }
    //    auth()->logout();
    //    return redirect('admin/logout');
        elseif(Auth::user()->role=='0')
        {
            Auth::logout(); 
        // auth()->logout();
        return redirect('login');
        // return 'user';
         }

    }
    public function showLoginForm()
    {
        return view('layout/admin/auth/login');
    }

}
