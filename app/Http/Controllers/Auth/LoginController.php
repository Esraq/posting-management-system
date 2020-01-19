<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function redirectTo(){
        
        // User role
        //$role = Auth::user()->role->name; 
        $user=auth()->user();
        $role=$user->type;
        // Check user role
        switch ($role) {
            
            case 'user':
                    return 'home';
                break;
             case 'uddokta':
                return 'uddokta-dashboard';
            break;
            case 'super-admin':
                return 'super-admin';
            break;      

            default:
                    return '/login'; 
                break;
        }
    }
}
