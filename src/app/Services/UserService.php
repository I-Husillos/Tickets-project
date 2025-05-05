<?php
namespace App\Services;

use App\Models\User;

class UserService
{
    public function update(int $userid, array $data)
    {
        $user = User::findOrFail($userid);
        $user->update($data);
    }
}