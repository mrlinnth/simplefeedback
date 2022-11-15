<?php

namespace Mrlinnth\Simplefeedback\Http\Controllers;

use GrahamCampbell\GitHub\Facades\GitHub;
use Mrlinnth\Simplefeedback\Enums\FeedbackType;
use Mrlinnth\Simplefeedback\Models\Feedback;

class SimplefeedbackController
{
    public function __invoke()
    {
        request()->validate([
            'title' => 'required',
        ]);

        if (config('simplefeedback.database')) {
            $this->createFeedback(
                request()->type,
                request()->title,
                request()->body,
                request()->data
            );
        }

        if (config('simplefeedback.github.enable')) {
            $this->createIssue(
                request()->type,
                request()->title,
                request()->body,
                request()->data
            );
        }

        return redirect()->back();
    }

    protected function createFeedback(string $type, string $title, ?string $body, string $data): void
    {
        Feedback::create([
            'title' => $title,
            'body' => $body,
            'type' => $type,
            'data' => json_decode($data),
        ]);
    }

    protected function createIssue(string $type, string $title, ?string $body, string $data): void
    {
        $body = "{$body}\n";
        $body .= "```json\n{$data}\n```";

        $issueData = [
            'title' => $title,
            'body' => $body
        ];

        $issue = GitHub::issues()->create(
            config('simplefeedback.github.owner'),
            config('simplefeedback.github.repo'),
            $issueData
        );
        // $issueUrl = $issue['html_url'];

        GitHub::issues()->labels()->add(
            config('simplefeedback.github.owner'),
            config('simplefeedback.github.repo'),
            $issue['number'],
            $type,
        );
    }
}
