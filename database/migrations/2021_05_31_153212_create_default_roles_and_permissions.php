<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateDefaultRolesAndPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'default_user']);

        $createPostPermission = Permission::create(['name' => 'create posts']);
        $viewPostDetailsPermission = Permission::create(['name' => 'view post details']);
        $deletePostPermission = Permission::create(['name' => 'delete posts']);

        $adminRole->givePermissionTo($createPostPermission);
        $adminRole->givePermissionTo($viewPostDetailsPermission);
        $adminRole->givePermissionTo($deletePostPermission);

        $userRole->givePermissionTo($viewPostDetailsPermission);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
