<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class AssignDefaultRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $users = User::all();
        foreach ($users as $user) {
            $user->assignRole('default_user');
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $users = User::all();
        foreach ($users as $user) {
            $user->removeRole('default_user');
        }
    }
}
