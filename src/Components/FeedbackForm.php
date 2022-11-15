<?php

namespace Mrlinnth\Simplefeedback\Components;

use Illuminate\View\Component;

class FeedbackForm extends Component
{
    public function render()
    {
        return view('mrlinnth::components.feedback-form');
    }
}
