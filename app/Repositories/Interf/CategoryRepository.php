<?php
namespace App\Repositories\Interf;

use App\Http\Requests\CategoryRequest;

interface  CategoryRepository
{
    public function getall();
    public function store(CategoryRequest $request);
    public function update(CategoryRequest $request, $id);
    public function destroy($id);
}