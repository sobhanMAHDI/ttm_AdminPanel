<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Validation\Rule;

class Checkskill_levelTitle implements Rule
{
    public function passes($attribute, $value)
    {
        $exists = DB::table('job_descriptions')->exists();
        return ($exists && !$value) || (!$exists && $value);
    }

    public function message()
    {
        return 'The skill_level title is required if job descriptions exist, and it should be nullable otherwise.';
    }
}
