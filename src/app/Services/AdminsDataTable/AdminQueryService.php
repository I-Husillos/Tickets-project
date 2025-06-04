<?php

namespace App\Services\AdminsDataTable;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class AdminQueryService
{
    public function getFilteredAdmins(Request $request): Builder
    {
        $query = Admin::query();

        if ($search = $request->input('search.value')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%");
            });
        }

        return $query;
    }
}