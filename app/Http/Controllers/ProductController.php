<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Repositories\Interf\CategoryRepository;
use App\Repositories\Interf\ProductRepository;
use App\Repositories\Interf\TagRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private ProductRepository $repository;
    private CategoryRepository $categoryRepository;
    private TagRepository $tagRepository;
    public function __construct(ProductRepository $repository, CategoryRepository $categoryRepository, TagRepository $tagRepository)
    {
        $this->repository = $repository;
        $this->categoryRepository = $categoryRepository;
        $this->tagRepository = $tagRepository;
    }
    public function index()
    {
        $products = Product::with('category')->get();
        $categories = $this->categoryRepository->getall();
        $tags = $this->tagRepository->getall();
        return view('product.index', compact('tags', 'categories', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    public function store(ProductRequest $request)
    {

        $this->repository->store($request);
        return redirect()->route('product.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_updated = Product::find($id);
        $categories = $this->categoryRepository->getall();
        $tags = $this->tagRepository->getall();
        $products = $this->repository->getall();
        return view('product.edit', compact('tags', 'categories', 'products', 'product_updated'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $this->repository->update($request, $id);
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->back();
    }
}
