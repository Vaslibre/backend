<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Spatie\Permission\Traits\HasRoles;
use App\Notifications\RecoverPassword;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'nickname',
        'bio'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
    * Send the password reset notification.
    *
    * @param  string  $token
    * @return void
    */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new RecoverPassword($token));
    }

    public function notas()
    {
        return $this->hasMany(Notas::class)->orderBy('id','desc');
    }  

    public function publish(Notas $notas)
    {
        $this->notas()->save($notas);
    }


// auth()->user()->publish(
//     new Notas(request(['']));
// );


}
