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
    @if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
	
	<form action="/tweet" method="post">
		{{ csrf_field() }}
		@if (Auth::check())
			<input type="hidden" name="user_id" value="{{$param['user']->id}}">
			<input style="border:1px #a9a9a9 solid;" type="text" name="content" >
			<input type="submit" value="ツイート">
		@else		
	  @endif
	  
	</form>
		@foreach ($contents as $content)
		<div class="table_body col-md-6 col-xs-12"> 
			<h4>{{$content['name']}}</h4>
			<div class="content_body">
				<img src="img/{{$content['image']}}" alt=""> 
				<h2>{{$content['content']}}</h2>
			</div>
			@if (Auth::check() AND $param['user']->id == $content['user_id'])
				<a href="/edit?id={{$content['id']}}"><button>編集</button></a>
				<a href="/delete?id={{$content['id']}}">
					<button onclick="return confirm('本当に削除しますか？');">
						削除
					</button>
				</a>
			@endif
		    <div style="display:inline-block;" data-postid="{{ $content['id'] }}">
		      <div class="class{{ $content['id'] }}" data-like="{{ $content['like_count'] }}">
		        <div>
					@if(Auth::check() AND Auth::user()->likes()->where('post_id', $content['id'])->first() != null )
					<a href="#" id="{{ $content['id'] }}" class="like up">
					  <i class="fas fa-thumbs-up"></i>
					  @if ($content['like_count'] == NULL OR $content['like_count'] == 0)
					  	
					  @else
					  	<p class="like_count show" style="display:inline-block;">
					  		&nbsp;&nbsp;&nbsp;({{ $content['like_count'] }})
					  	</p>
					  @endif
					</a>
					@else
					<a href="#" id="{{ $content['id'] }}" class="like">
					  <i class="far fa-thumbs-up"></i>
					  @if ($content['like_count'] == NULL OR $content['like_count'] == 0)
					  	
					  @else
					  	<p class="like_count show" style="display:inline-block;">
					  		&nbsp;&nbsp;&nbsp;({{ $content['like_count'] }})
					  	</p>
					  @endif
					</a>
					@endif
				</div>
			  </div>
			</div>
		</div>
		@endforeach	
		{{$contents->links()}}
		{{$contents_simple->links()}}
@endsection

@section('footer')
@endsection
