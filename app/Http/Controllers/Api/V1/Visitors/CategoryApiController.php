<?php

namespace App\Http\Controllers\Api\V1\Visitors;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\Visitors\CategoryResource;
use App\Models\Category;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryApiController extends Controller
{
    public function index()
    {
        return new CategoryResource(Category::with(['subcategories'])->get());
    }

    public function show(Category $category)
    {
        return new CategoryResource($category->load(['added_by', 'approved_by']));
    }
}