<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'user_name',
        'reviewable_id',
        'reviewable_type',
        'rating',
        'comment',
        'is_published',
    ];

    public function reviewable()
    {
        return $this->morphTo();
    }
}
