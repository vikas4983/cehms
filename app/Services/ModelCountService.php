<?php

namespace App\Services;

use App\Models\Banner;
use App\Models\Book;
use App\Models\Medicine;
use App\Models\Menu;
use App\Models\News;
use App\Models\Permission;
use App\Models\Role;
use App\Models\SiteSetting;
use App\Models\User;

class ModelCountService
{
    public function modelCount()
    {
        return [
            'roles' => Role::allRoles()->count(),
            'permissions' => Permission::allPermissions()->count(),
            'banners' => Banner::allBanners()->count(),
            'menus' => Menu::all()->count(),
            'students' => User::activeStudents()->count(),
            'activeStudents' => User::activeStudents()->count(),
            'suspendedStudents' => User::inactive()->count(),
            'trashedStudents' => User::trashedStudents()->count(),
            'books' => Book::allBook()->count(),
            'news' => News::allNews()->count(),
            'medicines' => Medicine::allMedicine()->count(),
            'siteSettings' => SiteSetting::all()->count(),
            
        ];
    }
}
