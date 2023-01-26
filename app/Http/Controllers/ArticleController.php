<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Article::all();
        return view('article.index', compact('data')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=> 'required|max:255',
            'body'=> 'required',
            'image'=>'image|file|max:1024'
        ]);

        if($request->file('image')){
            $data['image'] = $request->file('image')->store('article-images');
        }

        Article::create($data);
        return redirect('/dashboard/article')->with('success', 'Artikel Berhasil Di Tambahkan');
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
        $data = Article::findOrFail($id);
        return view('article.edit', compact('data'));
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
        $data = $request->validate([
            'title'=> 'required|max:255',
            'body'=> 'required',
            'image'=>'image|file|max:1024'
        ]);

        $item = Article::findOrFail($id);

        if($request->file('image')){
            if($request->oldImage){
                    Storage::delete($request->oldImage);
                }
            $data['image'] = $request->file('image')->store('article-images');
        }

        $item->update($data);
        return redirect('/dashboard/article')->with('info', 'Data Berhasil Di Update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if($article->image){
            Storage::delete($article->image);
        }

        Article::destroy($article->id);

        return redirect('/dashboard/article')->with('dahnger', 'Article Berhasil Di Hapus');

    }
}
