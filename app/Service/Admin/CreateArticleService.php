<?php

namespace App\Service\Admin;

use App\Binkap\Constant;
use App\Http\Requests\Admin\CreateArticleRequest;
use Illuminate\Support\Str;

class CreateArticleService
{
    private CreateArticleRequest $request;

    private string $id;

    public function handle(CreateArticleRequest $request)
    {
        $this->request = $request;
        if ($this->publish()) {
            $this->publishArticle();
        }
        if ($this->draft()) {
            $this->draftArticle();
        }
    }

    private function draft(): bool
    {
        return isset($this->request->draft)
            && \is_null($this->request->draft);
    }

    private function publish(): bool
    {
        return \is_null($this->request->publish);
    }

    private function hasImage(): bool
    {
        return !\is_null($this->request->file('image'));
    }

    private function publishArticle()
    {
        $reselt =  $this->request->user()->articles()->create([
            'id' => $this->id = Str::random(Constant::ARTICLE_ID_LENGTH),
            'topic' => $this->request->topic,
            'body' => $this->request->body,
            'category' => $this->request->category,
            'image' => $this->getImage(),
            'tags' => $this->request->tags,
            'type' => $this->request->type,
            'status' => $this->getStatus()
        ]);
        \dd($reselt);
    }

    private function draftArticle()
    {
        \dd($this->request);
    }

    private function getImage(): string|null
    {
        if ($this->hasImage()) {
            return $this->request->file('image')
                ->store(Constant::ARTICLE_IMAGE_STORAGE_PATH . \DIRECTORY_SEPARATOR . $this->id);
        }
        return null;
    }

    public function getStatus()
    {
        return $this->request->user()->isAdmin()
            ? Constant::ARTICLE_STATUS_APPROVED
            : Constant::ARTICLE_STATUS_PENDING;
    }
}
