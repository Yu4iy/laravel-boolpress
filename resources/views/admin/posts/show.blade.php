@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-6">
			<img class="img-fluid" src="{{$post['img']}}" alt="">
		</div>
		<div class="col-6">
			<h1>{{$post['title']}}</h1>
			<p>{{$post['content']}}</p>
		</div>
	</div> 
</div>
@endsection
