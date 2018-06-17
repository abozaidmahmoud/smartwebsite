@extends('admin.layouts.app')
@section('head_part')
<link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
@endsection

@section('content')
@include('admin/layouts/message')
<div class="row">
	<form class="tag_form" method="post" action="{{route('permission.update',$permission->id)}}">
		{{csrf_field()}}
		{{method_field('put')}}
		<div class="form-group ">
			<label for="title">Permission Name</label>
			<input type="text" name="name" placeholder="Permission Name" class="form-control" value="{{$permission->name}}">
		</div>	
		
		<div class="form-group">
			<button type="submit"  class="btn btn-success add_tag">
				<i class="fa fa-plus">Update</i>
			</button>
			<a href="{{route('permission.index')}}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Back</a>
		</div>	
	</form>
</div>   



@endsection

@section('footer_part')


@endsection