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
            'super admin'                => 'empty',
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
            $newRole = Role::firstOrCreate([ 'name' => $role ],[ 'name' => $role ]);
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
    }
}
