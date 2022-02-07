@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<h2>
			Categorie: {{$post->categorie->name}}
		</h2>
	</div>

	<div class="row">
		<div class="col-6">
			<img class="img-fluid" src="{{$post['img']}}" alt=""> 
		</div>
		<div class="col-6">
			<h1>{{$post['title']}}</h1>
			<p>{{$post['content']}}</p>
		</div>
	</div>

	<div class="my-3">
		@if ( ! $post->tags->isEmpty())
			<h4>Tags</h4>
			@foreach ($post->tags as $tag)
				<span class="badge badge-primary">{{$tag->name}}</span>
			@endforeach
		@else
		<p>No Tags</p>
		@endif
	</div>
</div>
@endsection
