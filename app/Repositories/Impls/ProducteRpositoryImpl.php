<?php

namespace App\Repositories\Impls;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Repositories\Interf\ProductRepository;

class ProducteRpositoryImpl implements ProductRepository
{
    public function getall()
    {
        return Product::all();
    }
    public function store(ProductRequest $request)
    {
        $request->merge([
            'tags_id' => implode(',', (array) $request->get('tags_id'))
        ]);
        return Product::create($request->all());
    }

    public function update(ProductRequest $request, $id)
    {
        $tag_updated = Product::find($id);
        $request->merge([
            'tags_id' => implode(',', (array) $request->get('tags_id'))
        ]);
        $tag_updated->update($request->all());
        return $tag_updated;
    }
    public function destroy($id)
    {
        $tag_deleted = Product::find($id);
        $tag_deleted->delete();
        return $tag_deleted;
    }
}
