<?php

namespace App\Services\UsersDataTable;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class UserQueryService
{
    public function getFilteredUsers(Request $request): Builder
    {
        $query = User::query();

        if ($search = $request->input('search.value')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%");
            });
        }

        return $query;
    }
}
