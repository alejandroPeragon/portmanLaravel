<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return BlogResource::collection(Blog::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Blog = json_decode($request->getContent(), true);
        $Blog = Blog::create($Blog);
        return new BlogResource($Blog);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $Blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $Blog)
    {
        return new BlogResource($Blog);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $Blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $Blog)
    {
        $BlogData = json_decode($request->getContent(), true);
        $Blog->update($BlogData);

        return new BlogResource($Blog);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $Blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $Blog)
    {
        $Blog->delete();
    }

}
