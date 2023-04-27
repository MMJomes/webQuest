<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use App\Repositories\Interf\TagRepository;


class TagController extends Controller
{
    private TagRepository $repository;
    public function __construct(TagRepository $repository){
        $this->repository = $repository;
    }
    public function index()
    {
        $tags = $this->repository->getall();
        return view('tag.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tag.create');
    }

    public function store(TagRequest $request)
    {
        $this->repository->store($request);
        return redirect()->route('tag.index');
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
        $tag_updated = Tag::find($id);
        $tags = $this->repository->getall();
        return view('tag.edit',compact('tag_updated','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, $id)
    {
        $this->repository->update($request,$id);
        return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::find($id)->delete();
        return redirect()->back();
    }
}
