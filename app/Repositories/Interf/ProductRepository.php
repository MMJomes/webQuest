<?php
namespace App\Repositories\Interf;
use App\Http\Requests\ProductRequest;
interface  ProductRepository
{
    public function getall();
    public function store(ProductRequest $request);
    public function update(ProductRequest $request, $id);
    public function destroy($id);
}