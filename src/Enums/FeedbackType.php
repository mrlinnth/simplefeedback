<?php

namespace Mrlinnth\Simplefeedback\Enums;

enum FeedbackType: string
{
    case bug = 'bug';
    case enhancement = 'enhancement';
    case question = 'question';
}
