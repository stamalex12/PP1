<?php
namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;
    use EntrustUserTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    protected $fillable = [
        'name', 'username', 'email', 'password'
    ];

    public function saveRoles($roles)
    {
        if(!empty($roles))
        {
            $this->roles()->sync($roles);
        } else {
            $this->roles()->detach();
        }
    }

    public function roombooking(){
        return $this->hasMany('RoomBooking');
    }
}