<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUser;
use App\User;
use App\Card;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class AuthenticationController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Authentication Controller
    |--------------------------------------------------------------------------
    |
    |
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'authentication/login']);
    }
    */
    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function register()
    {
        $card = Card::first();
        $user = Auth::User();
        return view('authentication.register', compact('user'), compact('card'));
    }

    public function login()
    {
        return view('authentication.login');
    }

    public function store(CreateUser $request)
    {
        $type = $request->type;
        $card = Card::first();
        $user = Auth::user();

        switch($type)
        {
            case '1':   $request->card_id = null;
                        User::create($request->all());

                return redirect('hotelreceptionist/welcome')->with([
                'flash_message' => 'Administrator created successfully',
                'flash_message_important' => true,
            ], compact($user));
            break;

            case '2':   $request->card_id = null;
                        User::create($request->all());

                return redirect('hotelreceptionist/welcome')->with([
                    'flash_message' => 'Hotel Receptionist created successfully',
                    'flash_message_important' => true,
                ], compact($user));
                break;

            default:    $request->card_id = $card;
                        $card->delete();
//                        dd($request->card_id);
                        User::create($request->all());

                return redirect('hotelreceptionist/welcome')->with([
                    'flash_message' => 'User created with Card ID:' .$card->id,
                    'flash_message_important' => true,
                ], compact($user));
                break;
        }

    }

    public function authenticate(Requests\LoginUser $request)
    {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        $user = User::where('email', $email)->where('password', $password)->first();

        if(is_null($user))
        {
            return redirect('authentication/login')->with([
                'flash_message' => 'Wrong email or password!',
                'flash_message_important' => true,
            ]);
        }

        Auth::login($user);;

        switch($user->type)
        {
            case '1': return view('admin.welcome', compact('user')); break;
            case '2': return view('hotelreceptionist.welcome', compact('user')); break;
            default : return view('welcome'); break;
        }


    }

    public function Deauthenticate()
    {
        Auth::logout();
        return redirect('welcome');
    }
}
