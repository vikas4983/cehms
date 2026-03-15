<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AssignPermissionComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $groupedPermissions;
    public $roles;
    public $student;
    public function __construct($groupedPermissions, $student, $roles)
    {
        $this->groupedPermissions = $groupedPermissions;
        $this->student = $student;
        $this->roles = $roles;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.assign-permission-component');
    }
}
