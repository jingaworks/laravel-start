<?php

namespace App\Http\Controllers\Api\V1\Visitors;

use App\Http\Controllers\Controller;
use App\Http\Resources\Visitors\ProductResource;
use App\Http\Resources\Visitors\CategoryResource;
use App\Models\Category;
use App\Models\Product;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryApiController extends Controller
{
    public function index()
    {
        $categories = Category::withFilters()->get();
        return CategoryResource::collection($categories->load(['subcategories']));
    }

    public function show($category)
    {
        $categories = Category::withFilters()->findOrFail($category);
        return new CategoryResource($categories);
    }
}