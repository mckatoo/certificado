<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'tipo' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'tipoUser_id' => $data['tipo'],
            'password' => bcrypt($data['password']),
        ]);
    }


    public function showRegistrationForm()
    {
        $usuarios = \App\User::get();
        $tipo = \App\tipoUser::orderBy('tipo','desc')->get();
        return view('auth.register', compact('tipo','usuarios'));
    }


    public function apagar(Request $request)
    {
        if (\App\User::find($request->id)) {
            $u = \App\User::find($request->id);
            $u->delete();
            return back()->with('success', 'Usuário '.$u->nome.' deletado com sucesso!');
        } else {
            return back()->withErrors('Usuário não encontrado!');
        }
    }


    public function update()
    {
        return view('auth.registerUpdate');
    }


    public function postUpdate(Request $request)
    {
        $usuario = \App\User::find($request->id);
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->save();

        return back()->with('success', 'Usuário '.$request->name.' atualizado com sucesso.');
    }
}
