@extends('admin.layouts.app')
@section('head_part')
<link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
@endsection

@section('content')
@include('admin/layouts/message')
<h1>add new Permission</h1>
<div class="row">
	<form class="tag_form" method="post" action="{{route('permission.store')}}">
		{{csrf_field()}}
		<div class="form-group ">
			<label for="name">Permission Name</label>
			<input type="text" name="name" placeholder="Permission Name" class="form-control">
		</div>	

		<div class="form-group ">
			<label for="for">Permission For</label>
			<select name="for" class="form-control">
				<option selected disabled>Select Permission For</option>
				<option value="user">User</option>
				<option value="post">Post</option>
				<option value="other">Other</option>
			</select>
			
		</div>	
		
		<div class="form-group">
			<button type="submit"  class="btn btn-success add_tag">
				<i class="fa fa-plus">Add Permission</i>
			</button>
			<a href="{{route('permission.index')}}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Back</a>
		</div>	
	</form>
</div>   



@endsection

@section('footer_part')


@endsection