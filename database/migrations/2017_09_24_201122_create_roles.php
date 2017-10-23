<?php

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $roleSA = Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'User - Super Admin',
            'slug' => 'sa'
        ]);
        $roleSA->save();

        $roleBasic = Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'User - Basic',
            'slug' => 'basic'
        ]);
        $roleBasic->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $roleSA = Sentinel::findRoleBySlug('sa');
        $roleSA->delete();

        $roleBasic = Sentinel::findRoleBySlug('basic');
        $roleBasic->delete();
    }
}
