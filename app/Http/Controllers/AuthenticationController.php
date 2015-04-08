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
use Illuminate\Support\Facades\View;

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
        $card_id = $card->id;
        $user = Auth::User();
        return view('authentication.register', compact('user'), compact('card_id'));
    }

    public function login()
    {
        return view('authentication.login');
    }

    /**
     * @param CreateUser $request
     * @return \Illuminate\Http\RedirectResponse
     * Creates all different types of users.
     */

    public function store(CreateUser $request)
    {
        $type = $request->type;
        $card = Card::first();
        $card_id = $card->id;
        $user = Auth::user();

        switch($type)
        {
            case '1':   User::create($request->all());

                return redirect('admin/welcome')->with([
                'flash_message' => 'Administrator created successfully',
                'flash_message_important' => true,
            ], compact($user));
            break;

            case '2':   User::create($request->all());

                return redirect('hotelreceptionist/welcome')->with([
                    'flash_message' => 'Hotel Receptionist created successfully',
                    'flash_message_important' => true,
                ], compact($user));
                break;

            case '0':  User::create($request->all());
                       DB::table('users')
                            ->where('email', $request->email)
                            ->update(['card_id' => $card_id]);
                        //dd($request->card_id);
                        $card->delete();


                return redirect('Customer/welcome')->with([
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
            default : return view('Customer.welcome'); break;
        }


    }

    public function Deauthenticate()
    {
        Auth::logout();
        return redirect('welcome');
    }
}
