<?php

namespace Mrlinnth\Simplefeedback\Http\Controllers;

use GrahamCampbell\GitHub\Facades\GitHub;
use Mrlinnth\Simplefeedback\Enums\FeedbackType;
use Mrlinnth\Simplefeedback\Models\Feedback;

class SimplefeedbackController
{
    public function __invoke()
    {
        if (config('simplefeedback.database')) {
            $this->createFeedback(
                request()->title,
                request()->body,
                request()->data
            );
        }

        if (config('simplefeedback.github.enable')) {
            $this->createIssue(
                request()->title,
                request()->body,
                request()->data
            );
        }

        return redirect()->back();
    }

    protected function createFeedback(string $title, string $body, string $data): void
    {
        Feedback::create([
            'title' => $title,
            'body' => $body,
            'data' => json_decode($data),
        ]);
    }

    protected function createIssue(string $title, string $body, string $data): void
    {
        $data = "```json\n{$data}\n```";

        $issueData = [
            'title' => $title,
            'body' => $body . "\n" . $data
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
            FeedbackType::bug->value,
        );
    }
}
