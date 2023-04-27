<?php

namespace App\Repositories\Impls;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use App\Repositories\Interf\TagRepository;

class TagRepositoryImpl implements TagRepository
{
    public function getall()
    {
        return Tag::all();
    }
    public function store(TagRequest $request)
    {
        return Tag::create($request->all());
    }

    public function update(TagRequest $request, $id){
        $tag_updated = Tag::find($id);
        $tag_updated->update($request->all());
        return $tag_updated;
    }
    public function destroy($id){
        $tag_deleted = Tag::find($id);
        $tag_deleted->delete();
        return $tag_deleted;
    }
}
