<?php

namespace Mrlinnth\Simplefeedback\Http\Controllers;

use Mrlinnth\Simplefeedback\Models\Feedback;

class SimplefeedbackController
{
    public function __invoke()
    {
        Feedback::create([
            'title' => request()->title,
            'body' => request()->body,
            'data' => json_decode(request()->data),
        ]);

        return redirect()->back();
    }
}
