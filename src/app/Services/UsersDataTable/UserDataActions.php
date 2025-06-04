<?php

namespace App\Services\UsersDataTable;

use App\Models\User;
use Illuminate\Support\Facades\View;

class UserDataActions
{
    public function transform(User $user, string $locale): array
    {
        $editUrl = url("/$locale/" . trans('routes.admin.users.edit', [], $locale));
        $editUrl = str_replace('{user}', $user->id, $editUrl);

        $deleteUrl = url("/$locale/" . trans('routes.admin.users.confirm_delete', [], $locale));
        $deleteUrl = str_replace('{user}', $user->id, $deleteUrl);

        return [
            'name' => $user->name,
            'email' => $user->email,
            'actions' => View::make('components.actions.user-actions', [
                'editUrl' => $editUrl,
                'deleteUrl' => $deleteUrl,
            ])->render(),
        ];
    }
}
