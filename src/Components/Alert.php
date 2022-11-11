<?php

namespace Mrlinnth\Simplefeedback\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function render()
    {
        return view('mrlinnth::components.alert');
    }
}
