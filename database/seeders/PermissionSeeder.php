<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'create-student',
            'edit-student',
            'delete-student',
            'view-student',
            'change-student-status',
            'view-student-document',
            'create-book',
            'edit-book',
            'view-book',
            'delete-book',
            'download-book',
            'export-student',
            'permission-assign',
            'view-student-old',
            'edit-student-old',
            'delete-student-old',
            'create-student-old',
            'change-book-status',
            'change-book-image',
            'upload-book',
            'create-news',
            'view-news',
            'change-news-status',
            'edit-news',
            'delete-news',
            'create-medicine',
            'edit-medicine',
            'delete-medicine',
            'change-medicine-status',
            'view-medicine',
            'create-testimonial',
            'edit-testimonial',
            'view-testimonial',
            'delete-testimonial',
            'change-testimonial-status',
            'create-enquiry',
            'view-enquiry',
            'edit-enquiry',
            'delete-enquiry',
            'create-role',
            'edit-role',
            'delete-role',
            'change-role-status',
            'view-role',
            'view-role-permission',
            'create-permission',
            'view-permission',
            'edit-permission',
            'delete-permission',
            'change-permission-status',
            'create-menu',
            'edit-menu',
            'view-menu',
            'delete-menu',
            'change-menu-status',
            'create-sitesetting',
            'create-banner',
            'edit-banner',
            'view-banner',
            'delete-banner',
            'change-banner-status',
            'view-cms',
            'create-cms',
            'edit-cms',
            'delete-cms',
            'change-cms-status',
            'user-dashboard',
            'admin-dashboard',
            'view-admin',
        ];
        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }
    }
}
