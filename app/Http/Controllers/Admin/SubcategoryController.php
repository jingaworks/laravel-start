<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySubcategoryRequest;
use App\Http\Requests\StoreSubcategoryRequest;
use App\Http\Requests\UpdateSubcategoryRequest;
use App\Models\Category;
use App\Models\Subcategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubcategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('subcategory_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subcategories = Subcategory::all();

        return view('admin.subcategories.index', compact('subcategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('subcategory_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.subcategories.create', compact('categories'));
    }

    public function store(StoreSubcategoryRequest $request)
    {
        $subcategory = Subcategory::create($request->all());

        return redirect()->route('admin.subcategories.index');
    }

    public function edit(Subcategory $subcategory)
    {
        abort_if(Gate::denies('subcategory_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subcategory->load('category', 'added_by', 'approved_by');

        return view('admin.subcategories.edit', compact('categories', 'subcategory'));
    }

    public function update(UpdateSubcategoryRequest $request, Subcategory $subcategory)
    {
        $subcategory->update($request->all());

        return redirect()->route('admin.subcategories.index');
    }

    public function show(Subcategory $subcategory)
    {
        abort_if(Gate::denies('subcategory_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subcategory->load('category', 'added_by', 'approved_by', 'products');

        return view('admin.subcategories.show', compact('subcategory'));
    }

    public function destroy(Subcategory $subcategory)
    {
        abort_if(Gate::denies('subcategory_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subcategory->delete();

        return back();
    }

    public function massDestroy(MassDestroySubcategoryRequest $request)
    {
        Subcategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}