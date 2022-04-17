<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Penduduk;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
            'nik' => ['required', 'string', 'unique:penduduk'],
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'jenis_kelamin' => ['required', 'string'],
            'tempat_lahir' => ['required', 'string'],
            'tanggal_lahir' => ['required', 'string'],
            'status_perkawinan' => ['required', 'string'],
            'pendidikan' => ['required', 'string'],
            'alamat' => ['required', 'string'],
            'agama' => ['required', 'string'],
            'pekerjaan' => ['required', 'string'],
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
        $user = DB::transaction(function () use ($data) {
            $penduduk = Penduduk::create([
                'nik' => $data['nik'],
                'nama' => Str::title($data['nama']),
                'jenis_kelamin' => $data['jenis_kelamin'],
                'tempat_lahir' => Str::title($data['tempat_lahir']),
                'tanggal_lahir' => $data['tanggal_lahir'],
                'status_perkawinan' => $data['status_perkawinan'],
                'pendidikan' => $data['pendidikan'],
                'alamat' => $data['alamat'],
                'pekerjaan' => Str::title($data['pekerjaan'])
            ]);
    
            $user = $penduduk->user()->create([
                'nik' => $data['nik'],
                'email' => $data['email'],
                'password' => Hash::make('password'),
                'role' => 'masyarakat'
            ]);
            
            return $user;
        });
        return $user;
    }

    public function showRegistrationForm()
    {
        $title = 'Daftar';
        return view('auth.register', compact('title'));
    }
}
