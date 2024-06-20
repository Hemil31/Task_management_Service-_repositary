<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class UserTaskList extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $table = 'user_task_lists';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'task_name',
        'description',
        'due_date',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'due_date' => 'date',
    ];

    /**
     * Get the user that owns the task list.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getDueDateAttribute($value)
    {
        $date = new DateTime($value);
        return $date->format('Y-m-d');
    }


}
