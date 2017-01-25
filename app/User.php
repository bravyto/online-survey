<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use DB;
use Hash;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
                                        
    public static function createUsers ($username, $password, $role) {
        $hashedPassword = Hash::make($password);
        
        $users = new User;
        
        $users->username = $username;
        $users->password = $hashedPassword;
        $users->role = $role;
        
        $users->save();
        
        return $users->id;
    }                                    
                                        
    public static function getUsername ($id) {
        return DB::table('users')->where('id', $id)->pluck('username');;
    }
    
    public static function getPassword ($id) {
        return DB::table('users')->where('id', $id)->pluck('password');;
    }  
    
    public static function getRole ($id) {
        return DB::table('users')->where('id', $id)->pluck('role');;
    }  
                                        
    public static function updateUsername ($id, $username) {
        DB::table('users')->where('id', $id)->update(['username' => $username]);
    }  
                                        
    public static function updatePassword ($id, $password) {
        $hashedPassword = Hash::make($password);
        DB::table('users')->where('id', $id)->update(['password' => $hashedPassword]);
    }  
                                        
    public static function updateRole ($id, $role) {
        DB::table('users')->where('id', $id)->update(['role' => $role]);
    }  
                                        
    public static function deleteUsers ($id) {
        DB::table('users')->where('id', $id)->delete();
    } 
}
