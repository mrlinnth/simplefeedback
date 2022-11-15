<?php

namespace Mrlinnth\Simplefeedback\Models;

use FeedbackType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'simple_feedbacks';

    protected $guarded = [];

    protected $casts = [
        'type' => FeedbackType::class,
        'data' => 'array',
    ];
}
