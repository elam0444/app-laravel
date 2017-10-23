<?php

namespace App\Models;

use Cartalyst\Sentinel\Roles\EloquentRole;

/**
 * Class Role
 * @property int id
 * @property string slug
 * @package App\Models
 */
class Role extends EloquentRole
{
    /**
     * @var string
     */
    const SUPER_ADMIN = 'sa';

    /**
     * @var string
     */
    const BASIC = 'basic';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = "roles";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * The attributes excluded from the model's JSON form and mass assignment.
     *
     * @var array
     */
    protected $guarded = ['id'];
}
