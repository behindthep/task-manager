<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Label;
use Illuminate\Support\Facades\Auth;

class LabelPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(User $user, Label $label): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return Auth::check();
    }

    public function update(User $user, Label $label): bool
    {
        return $label->createdBy->is($user);
    }

    public function delete(User $user, Label $label): bool
    {
        return $label->createdBy->is($user);
    }
}
