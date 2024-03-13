<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'organization_unit',
        'sub_organization',
        'date_fixed',
        'direct_manager',
        'description',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }


    public function task_descriptions()
    {
        return $this->belongsToMany(Job_Description::class, 'job__descriptions', 'job_id', 'id');
    }

    public function job_descriptions()
    {
        return $this->belongsToMany(Job_Description::class, 'job__descriptions', 'job_id', 'id');
    }
}
