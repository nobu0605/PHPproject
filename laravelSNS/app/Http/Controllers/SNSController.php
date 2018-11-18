<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Response;
use App\Content;

class SNSController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        View::share('user', $user);

        $contents = 
            Content::leftjoin('users','contents.user_id','=','users.id')
            ->select('users.*',
                'contents.id',
                'contents.user_id',
                'contents.content',
                'like_count'           
            )
            ->orderBy('contents.id', 'desc')
            ->paginate(5);

        $contents_simple = 
            Content::leftjoin('users','contents.user_id','=','users.id')
            ->orderBy('contents.id', 'desc')
            ->simplePaginate(5);

        $param = [
            'contents' => $contents,
            'user' => $user,
        ];

        View::share('layouts.layouts', ['param' => $param]);
        return view('/index',
            [
                'param' => $param ,
                'contents' => $contents,
                'contents_simple' => $contents_simple
            ]);
    }

   public function create(Request $request)
    {
        $request->validate([
            'content' => 'required|max:255',
        ]);
        $param = [
            'user_id' => $request->user_id,            
            'content' => $request->content,
        ];
        Content::insert([$param]);
        return redirect('/tweet');
    }

    public function edit(Request $request)
    {
        $user = Auth::user();
        View::share('user', $user);
        $content =Content::where('id', $request->id)->first();
        return view('edit',['content' => $content]);
    }

    public function update(Request $request)
    {
        $param = [
            'id' => $request->id,
            'content' => $request->content,
        ];
        Content::where('id', $request->id)->update($param);
        return redirect('/tweet');
    }

    public function remove(Request $request)
    {
        Content::where('id', $request->id)->delete();
        return redirect('/tweet');
    }

    public function user_logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function like()
    {
        return view('/like');
    }
}
