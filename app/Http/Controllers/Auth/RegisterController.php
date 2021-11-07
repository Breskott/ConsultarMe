<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use LaravelLegends\PtBrValidator\Rules\FormatoCpf;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'cpf' => ['required', 'string', 'cpf', 'min:11', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string', 'celular_com_ddd', 'min:12'],
            'address' => ['required', 'string', 'max:255'],
            'zip_code' => ['required', 'string', 'min:8', 'max:11'],
            'number' => ['required', 'string', 'max:10'],
            'distric' => ['required', 'string', 'max:255'],
            'birth_date' => ['required', 'string', 'date'],
            'complement' => ['string', 'max:150'],
            'city_id' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'cpf' => $data['cpf'],
            'password' => Hash::make($data['password']),
            'is_permission' => 0,
            'phone' => $data['phone'],
            'address' => $data['address'],
            'zip_code' => $data['zip_code'],
            'number' => $data['number'],
            'distric' => $data['distric'],
            'birth_date' => $data['birth_date'],
            'complement' => $data['complement'],
            'city_id' => $data['city_id'],
        ]);
    }
}
