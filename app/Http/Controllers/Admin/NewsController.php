<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('updated_at', 'desc')->get();
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        // image upload code
        if ($request->hasFile('thumbnail')) {
            $fileExtension = $request->file('thumbnail')->getClientOriginalExtension();

            $thumbnailPath = $request->file('thumbnail')->storeAs('images/news', uniqid() . "." . $fileExtension, 'public');

            $data['thumbnail'] = $thumbnailPath;
        }
        $news = News::create($data);

        return redirect()->route('admin.news.index')->with('success', 'News created.');
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
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $news = News::findOrFail($id);

        // update image if changed
        if ($request->hasFile('thumbnail')) {
            if ($news->thumbnail != 'images/news/default.png') {
                $fileExtension = $request->file('thumbnail')->getClientOriginalExtension();

                $thumbnailPath = $request->file('thumbnail')->storeAs('images/news', uniqid() . "." . $fileExtension, 'public');

                $data['thumbnail'] = $thumbnailPath;
            }
        }


        $news->update($data);
        return redirect()->route('admin.news.index')->with('success', 'News updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'News removed.');
    }
}
