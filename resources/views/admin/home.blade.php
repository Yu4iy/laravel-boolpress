@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
							<h2>Welcome to dasboard {{Auth::user()->name}}</h2>
                </div>
            </div>
				<div class="card-body">
					<h4>what next?</h4>
					<ul>
						<li><a href="">lorem Ipsum</a></li>
						<li><a href="">lorem Ipsum</a></li>
						<li><a href="">lorem Ipsum</a></li>
						<li><a href="">lorem Ipsum</a></li>
						<li><a href="">lorem Ipsum</a></li>
					</ul>
				</div>
        </div>
    </div>
</div>
@endsection
