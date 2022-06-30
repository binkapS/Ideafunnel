<?php

namespace App\Service\Admin;

use App\Binkap\Constant;
use App\Binkap\Image;
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
            return $this->publishArticle();
        }
        if ($this->draft()) {
            return $this->draftArticle();
        }
    }

    private function draft(): bool
    {
        return isset($this->request->draft)
            && \is_string($this->request->draft);
    }

    private function publish(): bool
    {
        return isset($this->request->publish)
            && \is_string($this->request->publish);
    }

    private function hasImage(): bool
    {
        return !\is_null($this->request->file('image'));
    }

    private function publishArticle()
    {
        return $this->request
            ->user()
            ->articles()
            ->create([
                'id' => $this->generateId(),
                'topic' => $this->request->topic,
                'body' => \body($this->request->body, \false),
                'category' => $this->request->category,
                'image' => $this->getImage(),
                'tags' => $this->request->tags,
                'type' => $this->request->type,
                'status' => $this->getStatus()
            ]);
    }

    private function draftArticle()
    {
        return $this->request
            ->user()
            ->drafts()
            ->create([
                'id' => $this->generateId(),
                'topic' => $this->request->topic,
                'image' => $this->getImage(),
                'tags' => $this->request->tags,
                'body' => \body($this->request->body, \false),
                'category' => $this->request->category,
                'type' => $this->request->type
            ]);
    }

    private function getImage(): string|null
    {
        if ($this->hasImage()) {
            return (new Image)
                ->save($this->request->file('image'), Constant::ARTICLE_IMAGE_STORAGE_PATH . \DIRECTORY_SEPARATOR . $this->id);
        }
        return null;
    }

    private function getStatus()
    {
        return $this->request->user()->isAdmin()
            ? Constant::ARTICLE_STATUS_APPROVED
            : Constant::ARTICLE_STATUS_PENDING;
    }

    private function generateId()
    {
        return $this->id = Str::random(Constant::ARTICLE_ID_LENGTH);
    }
}
