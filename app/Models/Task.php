<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status_id',
        'created_by_id',
        'assigned_to_id',
    ];

    public function status(): BelongsTo
    {
        return $this->belongsTo(TaskStatus::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * $task1 = Task::find(1);
     * $labels1 = $task1->labels()->get();
     */
    public function labels(): BelongsToMany
    {
        return $this->belongsToMany(Label::class);
    }

    public function scopeInWork(Builder $query): Builder
    {
        return $query->whereHas('status', function ($query) {
            $query->where('name', 'в работе');
        });
    }

    /**
     * $currentFeatures = Task::currentFeatures()->get();
     */
    public function scopeCurrentFeatures(Builder $query): Builder
    {
        return $query->inWork()->whereHas('labels', function ($query) {
            $query->where('name', 'доработка');
        });
    }

    /**
     * $tasksOfType = Task::ofTextInDescription('text')->get();
     */
    public function scopeOfTextInDescription(Builder $query, string $type): Builder
    {
        return $query->whereLike('description', "%$type%");
    }
}
