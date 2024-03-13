<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_Description extends Model
{
    use HasFactory;

    protected $fillable = [
        'priority',
        'periods',
        'ability_level',
        'risks',
        'effect_of_hazards',
        'skill_level',
        'level_type',
        'ability_level_rate',
        'time_in_minutes', // زمان به دقیقه
        'time_in_hourse', // زمان به دقیقه
        'time', // زمان به دقیقه
    ];

    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'job__descriptions', 'id', 'job_id');
    }




    protected $casts = [
        'priority' => 'integer',
        'periods' => 'integer',
        'ability_level' => 'integer',
        'risks' => 'integer',
        'effect_of_hazards' => 'integer',
        'skill_level' => 'integer',
        'skill_level_title' => 'string',
        'ability_level_rate' => 'integer',
        'time_in_minutes' => 'integer', // زمان به دقیقه
        'time_in_hourse' => 'integer', // زمان به دقیقه
        'rate' => 'integer',
        'time_in_minutes_remainder' => 'integer',
        'group' => 'integer'
    ];


    public function getPriorityAttribute($value)
    {
        switch ($value) {
            case 1:
                return 'اول';
                break;
            case 2:
                return 'دوم';
                break;
            case 3:
                return 'سوم';
                break;
            case 4:
                return 'چهارم';
                break;
            case 5:
                return 'پنجم';
                break;
            default:
                return 'Unknown';
        }
    }

    public function getPeriodsAttribute($value)
    {
        // Define how you want to represent priority as string
        // For example, let's say 1 represents 'Low', 2 represents 'Medium', and 3 represents 'High'
        switch ($value) {
            case 1:
                return 'روزانه';
                break;
            case 2:
                return 'هفتگی';
                break;
            case 3:
                return 'سالانه';
                break;
            case 4:
                return 'موردی';
                break;
            case 5:
                return 'ماهانه';
                break;
            default:
                return 'Unknown';
        }
    }



    public function getAbilityLevelAttribute($value)
    {
        // Define how you want to represent priority as string
        // For example, let's say 1 represents 'Low', 2 represents 'Medium', and 3 represents 'High'
        switch ($value) {
            case 1:
                return 'کم';
                break;
            case 2:
                return 'متوسط';
                break;
            case 3:
                return 'زیاد';
                break;
            default:
                return 'Unknown';
        }
    }



    public function geteffectofhazardsAttribute($value)
    {
        switch ($value) {
            case 1:
                return 'فردی';
                break;
            case 2:
                return 'گروه کاری';
                break;
            case 3:
                return 'سازمان';
                break;
            case 4:
                return 'مشتری';
                break;
            default:
                return 'Unknown';
        }
    }



    public function getRisksAttribute($value)
    {
        // Define how you want to represent priority as string
        // For example, let's say 1 represents 'Low', 2 represents 'Medium', and 3 represents 'High'
        switch ($value) {
            case 1:
                return 'کم';
                break;
            case 2:
                return 'متوسط';
                break;
            case 3:
                return 'زیاد';
                break;
            default:
                return 'Unknown';
        }
    }



    public function getSkillLevelAttribute($value)
    {
        // Define how you want to represent priority as string
        // For example, let's say 1 represents 'Low', 2 represents 'Medium', and 3 represents 'High'
        switch ($value) {
            case 1:
                return 'آشنایی';
                break;
            case 2:
                return 'تسلط نسبی';
                break;
            case 3:
                return 'تسلط کامل';
                break;
            default:
                return 'Unknown';
        }
    }
}
