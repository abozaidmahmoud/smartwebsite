@extends('admin.layouts.app')
@section('head_part')
<link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
@endsection

@section('content')
@include('admin/layouts/message')
<h1>Add New Cateogery</h1>
<div class="row">
	<form class="cateogery_form" method="post" action="{{route('cateogery.store')}}">
		{{csrf_field()}}
		<div class="form-group ">
			<label for="title">Title</label>
			<input type="text" name="name" placeholder="Cateogery Title" class="form-control">
		</div>	
		<div class="form-group ">
			<label>Slug</label>
			<input type="text" name="slug" placeholder="Cateogery Slug" class="form-control">
		</div>	
		<div class="form-group">
			<button type="submit"  class="btn btn-success add_tag">
				<i class="fa fa-plus">Add Cateogery</i>
			</button>
			<a href="{{route('cateogery.index')}}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Back</a>
		</div>	
	</form>
</div>   



@endsection

@section('footer_part')


@endsection