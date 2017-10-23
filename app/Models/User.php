<?php

namespace App\Models;

use App\Traits\HashableModel;
use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 * @property string first_name
 * @property string last_name
 * @property string email
 * @property string password
 *
 * @package App\Models
 */
class User extends EloquentUser implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, SoftDeletes, HashableModel;

    /**
     * Returns Super Admin user id
     *
     * @var int
     */
    const SUPER_ADMIN_ID = 4;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = "users";

    /**
     * This table doesn't have timestamps
     *
     * @var array
     */
    //public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'deleted'
    ];

    /**
     * The attributes excluded from the model's JSON form and mass assignment.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that are dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Set password with bcrypt security before saving on database
     *
     * @param string $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
