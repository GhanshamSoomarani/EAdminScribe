<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $all_permissions = Permission::all();
        $admin_permissions = $all_permissions->filter(function ($permission) {
            return $permission->title != 'remuneration_form_create';
        });
        Role::findOrFail(1)->permissions()->sync($admin_permissions);
        $user_permissions = $all_permissions->filter(function ($permission) {
            return in_array($permission->title, [
                'profile_password_edit',
                'remuneration_form_access',
                'remuneration_form_create',
                'remuneration_form_show',
            ]);
        });
        Role::findOrFail(2)->permissions()->sync($user_permissions);
        $dean_cotroller_finance_chairman_permissions = $user_permissions->filter(function ($permission) {
            return $permission->title != 'remuneration_form_create';
        });
        Role::findOrFail(3)->permissions()->sync($dean_cotroller_finance_chairman_permissions);
        Role::findOrFail(4)->permissions()->sync($dean_cotroller_finance_chairman_permissions);
        Role::findOrFail(5)->permissions()->sync($dean_cotroller_finance_chairman_permissions);
        Role::findOrFail(6)->permissions()->sync($dean_cotroller_finance_chairman_permissions);
    }
}
