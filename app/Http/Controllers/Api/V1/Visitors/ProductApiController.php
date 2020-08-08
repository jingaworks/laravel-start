<?php

namespace App\Http\Controllers\Api\V1\Visitors;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Resources\Visitors\ProductResource;
use App\Models\Product;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        return ProductResource::collection(Product::withFilters()->orderBy('price_starts')->with(['profile', 'category', 'subcategory', 'region', 'place', 'created_by'])->paginate(10));
    }

    public function show($product)
    {
        return new ProductResource(Product::with(['profile', 'category', 'subcategory', 'region', 'place', 'created_by'])->find($product));
    }
}