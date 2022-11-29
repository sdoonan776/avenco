<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

class CategoryController extends Controller
{

    function public __construct()
    {

    }

    /**
     * @return View 
     */
    public function index(): View
    {
        return view('admin.categories.index', [
            'categories' => $this->categories->paginate(4)
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.categories.create');
    }

    
    /**
     * @param Category $category
     * @return View
     */
    public function show(Category $category): View
    {
        return view('admin.categories.show', compact('category'));
    }

    /**
     * @param Category $category
     * @return View
     */
    public function edit(Category $category): View
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * @param CategoryRequest $request 
     * @return RedirectResponse 
     * @throws BindingResolutionException 
     * @throws RouteNotFoundException 
     */
    public function store(CategoryRequest $request): RedirectResponse
    {
        $this->category->create($request->only([
            'name'
        ]));

        return redirect()->route('admin.categories.index')->withSuccess('Cateory successfully created');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        $category->update($request->all());
        return back()->withSuccess('Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $category = Category::findOrFail($id);
        $category->delete();

        back()->withSuccess('Category successfully created');
    }
}
