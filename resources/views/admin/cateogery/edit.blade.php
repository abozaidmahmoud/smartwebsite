@extends('admin.layouts.app')
@section('head_part')
@endsection

@section('content')
@include('admin/layouts/message')
<div class="row">
	<form class="tag_form" method="post" action="{{route('cateogery.update',$cateogery->id)}}">
		{{csrf_field()}}
		{{method_field('patch')}}
		<div class="form-group ">
			<label for="title">Title</label>
			<input type="text" name="name" placeholder="Cateogery Title" class="form-control" value="{{$cateogery->name}}" >
		</div>	
		<div class="form-group ">
			<label>Slug</label>
			<input type="text" name="slug"  placeholder="Cateogery Slug" class="form-control" value="{{$cateogery->slug}}">
		</div>	
		<div class="form-group">
			<button type="submit"  class="btn btn-success add_tag">
				<i class="fa fa-plus"> Update</i>
			</button>
			<a href="{{route('cateogery.index')}}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Back</a>
		</div>	
	</form>
</div>   



@endsection

@section('footer_part')


@endsection