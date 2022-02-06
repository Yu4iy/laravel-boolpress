@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Posts</h1>
	<table class="table">
		@if (session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
		@endif
			<thead>
					<tr>
						<th>ID</th>
						<th>Title</th>
						<th>Actions</th>
					</tr>
			</thead>
			<tbody>
				@foreach ($posts as $post)
				<tr>
					<th>{{$post['id']}}</th>
					<th>{{$post['title']}}</th>
					<th>
						<a class=" btn btn-success mx-2" href="{{route('admin.posts.edit', $post->id)}}">Edit</a>
						<a class=" btn btn-primary mx-2" href="{{route('admin.posts.show', $post->slug )}}" >Show</a>

						<form class="d-inline" action="{{route('admin.posts.destroy', $post)}}" method="POST"> @csrf @method('DELETE')
							<button  class="btn btn-danger">Remove</button>
						</form>
					</th>
				</tr>
				@endforeach
			</tbody>
	</table>
</div>
@endsection
