<?php

namespace App\Http\Controllers\Admin;

use App\Events\ArticleShow;
use App\Jobs\EchoHello;
use App\Model\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $res = EchoHello::dispatch(Article::find(1));

        // 事件

        event(new ArticleShow(Article::find(1)));

        // 延迟一分钟执行
        EchoHello::dispatch(Article::find(1))->delay(Carbon::now()->addMinute(1));

        $uid = \Auth::user()->id;
        var_dump($uid);
        return response()->json(Article::paginate());
       /* $article->title = 'xxxxx';
        $article->author_id = 1;
        $article->author = 'xxxx';
        $article->content = 'xxxx';
        $article->summary = 'xxxx';
        $article->tags = 'xxxx';
        $article->type = 1;
        $article->status = 1;
        $article->save();*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
