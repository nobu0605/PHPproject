@php
	function like_check($content_id){
		if (Auth::check() AND  Auth::user()->likes()->where('post_id', $content_id)->first() != null){
			return true;
		}
		return false;
	}
@endphp

@php
	function like_count_check($like_count){
		if ($like_count == NULL || $like_count == 0){
			return 'none;';
		}
		return 'inline-block;';
	}
@endphp

@extends('layouts.layouts')
@section('title', 'Laravel')
@section('menubar')
@parent
@endsection

@section('content')
	@if (Auth::check())
		<p>Hello！{{$param['user']->name . ' さん'}}</p>
		<img style="height:13vw;width: 13vw;" src="img/{{$param['user']->image}}" alt="">
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
		
	@if (Auth::check())	
		<form action="/tweet" enctype="multipart/form-data" method="post">
			{{ csrf_field() }}
				<input type="hidden" name="user_id" value="{{$param['user']->id}}">
				<div>
					<input style="height: 30px;border:1px #a9a9a9 solid;" type="text" name="content" >
					<input class="input_file" accept="image/*" id="imgFile" type="file" name="image">
					<br/><br/>
			    <div style="height: 200px;" class="preview"></div>
				</div>
				<br/>
				<input type="submit" value="ツイート">
		</form>		
	@endif

	<div class="contents_wrapper">
		@foreach ($contents as $content)
		<div class="table_body col-md-4 col-xs-12"> 
			<h4>{{$content['name']}}</h4>
			<div class="content_body">
				<a href="/mypage?id={{$content['user_id']}}">
					<img class="profile_img" src="img/{{$content['image']}}" alt="">
				</a>
				<img class="post_image" src="img/{{$content['post_image']}}" alt="">  
				<span class="content_post">{{$content['content']}}</span>
			</div>
			@if (Auth::check() AND $param['user']->id == $content['user_id'])
				<a href="/edit?id={{$content['id']}}"><button>編集</button></a>
				<a href="/delete?id={{$content['id']}}">
					<button onclick="return confirm('本当に削除しますか？');">削除</button>
				</a>
			@endif
			<div style="display:inline-block;" data-postid="{{ $content['id'] }}">
				<div class="class{{ $content['id'] }}" data-like="{{ $content['like_count'] }}">
					<div>
							<a 
								id="{{ $content['id'] }}" 
								class="like {{like_check($content['id']) ? 'up' : ''}}"
							>
								<i style="color:#ff69b4;" class="{{like_check($content['id']) ? 'fas' : 'far'}} fa-heart"></i>
								<p 
									class="like_count show" 
									style="display:{{ like_count_check($content['like_count']) }} color:#ff69b4;"
								>
									&nbsp;({{ $content['like_count'] }})
								</p>
							</a>
						<span style="margin-left: 5px;"><i class="far fa-comment"></i></span>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>	
	{{$contents->links()}}
	{{$contents_simple->links()}}
@endsection
@section('footer')
@endsection