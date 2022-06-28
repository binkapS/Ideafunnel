<?php

namespace App\Service\Admin;

use App\Binkap\Constant;
use App\Http\Requests\Admin\CreateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryService
{
    public function fetch(Request $request): array
    {
        if ($request->user()->isAdmin()) {
            return ['categories' => Category::with(['creator', 'articles'])->paginate(6)];
        }
        return ['categories' => $request->user()->categories()->paginate(6)];
    }

    public function create(CreateCategoryRequest $request)
    {
        return $request->user()->categories()->create([
            'id' => $this->getId(),
            'name' => \ucfirst($request->category)
        ]);
    }

    public function getId()
    {
        return Str::random(Constant::CATEGORY_ID_LENGTH);
    }

    public function delete(Category $category)
    {
        if ($category->id == Constant::CATEGORY_UNCATEGORISED) {
            return $category->name . " cannot be moved to trash";
        }
        if ($category->articles->count() > 0) {
            foreach ($category->articles as $article) {
                $article->update([
                    'category' => Constant::CATEGORY_UNCATEGORISED
                ]);
            }
        }
        return $category->delete() ? $category->name . " moved to trash" : "Something went wrong";
    }
}
