<?php

namespace App\Repositories\Impls;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Repositories\Interf\CategoryRepository;

class CategoryRepositoryImpl implements CategoryRepository
{
    public function getall()
    {
        return Category::all();
    }
    public function store(CategoryRequest $request)
    {
        return Category::create($request->all());
    }

    public function update(CategoryRequest $request, $id){
        $tag_updated = Category::find($id);
        $tag_updated->update($request->all());
        return $tag_updated;
    }
    public function destroy($id){
        $tag_deleted = Category::find($id);
        $tag_deleted->delete();
        return $tag_deleted;
    }
}
