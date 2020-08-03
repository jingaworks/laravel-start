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
        return new ProductResource(Product::with(['atestat', 'category', 'subcategory', 'region', 'place', 'created_by'])->get());
    }

    public function show($product)
    {
        return new ProductResource(Product::with(['atestat', 'category', 'subcategory', 'region', 'place', 'created_by'])->find($product));
    }
}