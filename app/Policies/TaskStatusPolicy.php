<?php

namespace App\Policies;

use App\Models\User;
use App\Models\TaskStatus;
use Illuminate\Support\Facades\Auth;

class TaskStatusPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(User $user, TaskStatus $taskStatus): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return Auth::check();
    }

    public function update(User $user, TaskStatus $taskStatus): bool
    {
        return $taskStatus->createdBy->is($user);
    }

    public function delete(User $user, TaskStatus $taskStatus): bool
    {
        return $taskStatus->createdBy->is($user);
    }
}
