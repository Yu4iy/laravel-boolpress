@extends('layouts.app')

@section('content')
<div class="container">
		@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
			</ul>
		</div>
	@endif
	<form action="{{route('admin.posts.update', $post->id)}}" method="POST">
		
		@csrf
		@method('PATCH')

		<div class="mb-3">
			<label class="form-label" for="title">Title</label>
			<input class="form-control" name="title" id="title" type="text" value="{{old('title', $post->title)}}">
		</div>

		<div class="mb-3">
			<label class="form-label" for="img">image</label>
			<input class="form-control" name="img" id="img" type="text" value="{{old('img', $post->img)}}">
		</div>

		<div class="mb-3">
			<label class="form-label" for="content">Content</label>
			<textarea name="content" id="content" class="form-control" rows="6">{{old('content', $post->content)}}</textarea>
		</div>
		
		<div class="mb-3">
			<label class="form-label" for="categorie_id">Categorie</label>
			<select class="form-control" name="categorie_id" id="categorie_id">

				<option value="">No Categorie</option>

				@foreach ($categories as $categorie)

					<option value="{{$categorie->id}}" @if ($categorie->id == old('categorie_id', $post->categorie_id)) selected @endif >
						{{$categorie->name}}
					</option>

				@endforeach
			</select>
		</div>

		<button type="submit" class="btn btn-success">Update Post</button>
		
	</form>
</div>
@endsection
