<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Task $task): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return Auth::check();
    }

    public function update(User $user, Task $task): bool
    {
        return $task->createdBy->is($user);
    }

    public function delete(User $user, Task $task): bool
    {
        return $task->createdBy->is($user);
    }
}
