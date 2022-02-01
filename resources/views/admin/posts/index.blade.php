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
				@foreach ($post as $posti)
				<tr>
					<th>{{$posti['id']}}</th>
					<th>{{$posti['title']}}</th>
					<th>
						<button class=" btn btn-success">Edit</button>

						<a href="{{route('admin.posts.show', $posti->slug )}}" class="btn btn-primary mx-2">Show</a>

						<form class="d-inline" action="{{route('admin.posts.destroy', $posti)}}" method="POST"> @csrf @method('DELETE')
							<button  class="btn btn-danger">Remove</button>
						</form>
					</th>
				</tr>
				@endforeach
			</tbody>
	</table>
</div>
@endsection
