<?php

namespace Database\Seeders;

use App\Enums\Feature;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'admin'                      => 'empty',
            'account holder'             => [
                'create' => Feature::cases(),
                'update' => Feature::cases(),
                'delete' => Feature::cases(),
             ], #all
            'product manager' => [
                'create' => Feature::cases(),
                'update' => Feature::cases(),
                'delete' => Feature::cases(),
             ],
            'assistant product manager'  => [
                'create' => Feature::cases(),
                'update' => Feature::cases(),
                'delete' => Feature::cases(),
             ],
            'project manager'            => [
                'create' => Feature::cases(),
                'update' => Feature::cases(),
                'delete' => Feature::cases(),
             ],
            'programmer'                 => [
                'create' => Feature::cases(),
             ],
            'analyst'                    => [
                'create' => Feature::cases(),
             ],
            'designer'                   => [
                'create' => Feature::cases(),
             ],
            'business owner'             => [
                'create' => Feature::cases(),
             ],
            'technical support employee' => [
                'create' => Feature::cases(),
             ],
            'advisor'                    => [
                'create' => Feature::cases(),
             ],
            'test engineer'              => [
                'create' => Feature::cases(),
             ],
            'marketing officer'          => [
                'create' => Feature::cases(),
             ],
            'digital security engineer'  => [
                'create' => Feature::cases(),
             ],
            'guest', #only create comment
         ];
        foreach ($roles as $role => $permissions) {
            $newRole                 = Role::firstOrCreate([ 'name' => $role ], [ 'name' => $role ]);
            $createCommentPermission = Permission::firstOrCreate(
                [
                    'name' => 'create comment',
                 ],
                [
                    'name' => 'create comment',
                 ]
            );
            $newRole->givePermissionTo($createCommentPermission);
            if ($permissions && is_array($permissions)) {
                foreach ($permissions as $verb => $features) {
                    foreach ($features as $feature) {
                        $permission = Permission::firstOrCreate(
                            [
                                'name' => "$verb $feature->value",
                             ],
                            [
                                'name' => "$verb $feature->value",
                             ]
                        );
                        $newRole->givePermissionTo($permission);
                    }
                }
            }
        }

        $rolesForOtherPermission = [
            'account holder'            => [ 'delete comment', 'add member', 'delete member', 'send invitation' ],
            'product manager'           => [ 'delete comment', 'add member', 'delete member', 'send invitation' ],
            'assistant product manager' => [ 'delete comment', 'add member', 'delete member', 'send invitation' ],
         ];
        foreach ($rolesForOtherPermission as $role => $permissions) {

            $newRole = Role::firstOrCreate([ 'name' => $role ], [ 'name' => $role ]);
            foreach ($permissions as $permission) {
                $permission = Permission::firstOrCreate(['name' => $permission],['name' => $permission]);
                $newRole->givePermissionTo($permission);
            }
        }

    }
}
