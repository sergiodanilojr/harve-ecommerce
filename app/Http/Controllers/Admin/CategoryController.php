<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\QueryBuilder\QueryBuilder;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = QueryBuilder::for(Category::class)
            ->with('products')
            ->paginate(
                perPage: request()->get('per_page', 15),
                page: request()->get('page', 1)
            );

        return $categories;
    }

    public function store(CategoryRequest $request)
    {
        $name = $request->validated('name');

        $category = Category::create([
            'name'=> $name,
            'slug'=>Str::slug($name)
        ]);

        return $category;
    }
}
