@extends('layouts.layouts')

@section('title', 'Laravel')

@section('menubar')
    @parent
   
@endsection

@section('content')
	@if (Auth::check())
    	<p>Hello！{{$param['user']->name . ' さん'}}</p><img style="height:13vw;width: 13vw;" src="img/{{$param['user']->image}}" alt="">
    	<p>Do you wanna tweet?</p>
    @else
    	<p>※ログインしていません。（<a href="/login">ログイン</a>｜
        <a href="/register">登録</a>）</p>
    @endif

@endsection

@section('footer')
@endsection