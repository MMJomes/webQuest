<?php
namespace App\Repositories\Interf;

use App\Http\Requests\TagRequest;

interface  TagRepository
{
    public function getall();
    public function store(TagRequest $request);
    public function update(TagRequest $request, $id);
    public function destroy($id);
}