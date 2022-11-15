<?php

namespace Mrlinnth\Simplefeedback\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mrlinnth\Simplefeedback\Enums\FeedbackType;

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
