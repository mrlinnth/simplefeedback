<?php

namespace Mrlinnth\Simplefeedback\Http\Controllers;

use GrahamCampbell\GitHub\Facades\GitHub;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Mrlinnth\Simplefeedback\Models\Feedback;

class SimplefeedbackController
{
    public function __invoke()
    {
        request()->validate([
            'title' => 'required',
        ]);

        $screenshotPath = null;

        if (request()->hasFile('screenshot')) {
            $screenshotPath = $this->UploadFile(request()->file('screenshot'));
        }

        if (config('simplefeedback.database')) {
            $this->createFeedback(
                request()->type,
                request()->title,
                request()->body,
                request()->data,
                $screenshotPath
            );
        }

        if (config('simplefeedback.github.enable')) {
            $this->createIssue(
                request()->type,
                request()->title,
                request()->body,
                request()->data,
                $screenshotPath
            );
        }

        return redirect()->back();
    }

    protected function createFeedback(string $type, string $title, ?string $body, string $data, string $screenshotPath): void
    {
        Feedback::create([
            'title' => $title,
            'body' => $body,
            'type' => $type,
            'data' => json_decode($data),
            'screenshot' => $screenshotPath
        ]);
    }

    protected function createIssue(string $type, string $title, ?string $body, string $data, string $screenshotPath): void
    {
        $body = "{$body}\n";
        $body .= "### Meta Data\n";
        $body .= "```json\n{$data}\n```";

        if ($screenshotPath !== null) {
            $screenshotUrl = Storage::url($screenshotPath);
            if (config('filesystems.default') === 'local') {
                $screenshotUrl = asset($screenshotUrl);
            }
            $body .= "\n";
            $body .= "### Screenshot\n";
            $body .= "![{$title}]({$screenshotUrl})";
            $body .= "\n";
        }

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

    protected function UploadFile(UploadedFile $file): string
    {
        $filename = Str::random(6);
        return $file->storeAs(
            'screenshots',
            $filename . "." . $file->getClientOriginalExtension(),
            config('filesystems.default', 'public')
        );
    }

    protected function deleteFile($path): void
    {
        Storage::disk(config('filesystems.default', 'public'))->delete($path);
    }
}
