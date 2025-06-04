<?php

namespace App\Services\AdminsDataTable;

use App\Models\Admin;
use Illuminate\Support\Facades\View;

class AdminDataActions
{
    public function transform(Admin $admin, string $locale): array
    {
        $editUrl = url("/$locale/" . trans('routes.admin.admins.edit', [], $locale));
        $editUrl = str_replace('{admin}', $admin->id, $editUrl);

        $deleteUrl = url("/$locale/" . trans('routes.admin.admins.confirm_delete', [], $locale));
        $deleteUrl = str_replace('{admin}', $admin->id, $deleteUrl);

        return [
            'name' => $admin->name,
            'email' => $admin->email,
            'actions' => View::make('components.actions.admin-actions', [
                'editUrl' => $editUrl,
                'deleteUrl' => $deleteUrl,
            ])->render(),
        ];
    }
}
