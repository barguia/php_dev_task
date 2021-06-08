<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = "users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function createNewUser(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'role_id' => $data['role_id'],
            'password' => Hash::make($data['password']),
        ]);
    }


    /**
     * Find the user instance for the given username.
     *
     * @param  string  $username
     * @return \App\Models\User
     */
    public function findForPassport($username)
    {
        return $this->where('username', $username)->first();
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function form()
    {
        $roles = Role::all();
        return view('auth.register', compact('roles'));
    }
}
