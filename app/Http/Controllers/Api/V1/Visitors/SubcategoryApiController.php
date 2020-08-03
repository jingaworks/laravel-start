<?php

namespace App\Http\Controllers\Api\V1\Visitors;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubcategoryRequest;
use App\Http\Requests\UpdateSubcategoryRequest;
use App\Http\Resources\Visitors\SubcategoryResource;
use App\Models\Subcategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubcategoryApiController extends Controller
{
    public function index()
    {
        return new SubcategoryResource(Subcategory::with(['category', 'products'])->withCount(['products'])->get());
    }

    public function show($subcategory)
    {
        return new SubcategoryResource(Subcategory::with(['category', 'products'])->withCount(['products'])->findOrfail($subcategory));
    }
}