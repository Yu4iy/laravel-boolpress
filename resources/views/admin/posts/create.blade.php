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
	<form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
		@csrf
		
		<div class="mb-3">
			<label class="form-label" for="title">Title</label>
			<input class="form-control" name="title" id="title" type="text" value="{{old('title')}}">
		</div>

		<div class="mb-3">
			<label class="form-label" for="img">image</label>
			<input class="form-control" name="img" id="img" type="text" value="{{old('img')}}">
		</div>

		<div class="mb-3">
			<label class="form-label" for="content">Content</label>
			<textarea name="content" id="content" class="form-control" rows="6">{{old('content')}}</textarea>
		</div>

		<div class="mb-3">
			<label class="form-label" for="categorie_id">Categorie</label>
			<select class="form-control" name="categorie_id" id="categorie_id">

				<option value="">No Categorie</option>

				@foreach ($categories as $categorie)

					<option value="{{$categorie->id}}" @if ($categorie->id == old('categorie_id')) selected @endif >
						{{$categorie->name}}
					</option>

				@endforeach
			</select>
		</div>
		

		<div class="mb-3">
			<h4>Tags</h4>
			
			@foreach ($tags as $tag)
				<span class="d-inline-block mr-3">
					<label for="tag{{ $loop->iteration }}">{{ $tag->name }}</label>
					<input type="checkbox" name="tags[]" id="tag{{ $loop->iteration }}" value="{{ $tag->id }}"
					@if ( in_array($tag->id, old('tags', []))) checked @endif >
				</span>
			@endforeach
		</div>

		<div class="mb-3">
			<label class="form-label" for="cover">Image</label>
			<input class="file" type="file" id="cover" name="cover">
		</div>

		<button type="submit" class="btn btn-success">Create Post</button>

		
	</form>
</div>
@endsection
