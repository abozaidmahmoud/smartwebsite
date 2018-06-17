@extends('admin.layouts.app')
@section('head_part')
 <link rel="stylesheet" href="{{asset('admin/plugins/select2/select2.min.css')}}">
@endsection

@section('content')
<h1>add new user</h1>
@include('admin/layouts/message')
<div class="row">

	<form class="post_form" method="post" action="{{route('user.update',$user->id)}}" enctype="multipart/form-data">
		{{csrf_field()}}{{csrf_field()}}
		{{method_field('patch')}}

		<div class="form-group ">
			<label for="username">Username</label>
			<input type="text" name="name" placeholder="Username" class="form-control" value="{{$user->name}}">
		</div>	
		<div class="form-group ">
			<label>Email</label>
			<input type="email" name="email" placeholder="Email" class="form-control" value="{{$user->email}}">
		</div>
		<div class="form-group ">
			<label>Phone</label>
			<input type="text" name="phone" placeholder="Phone" class="form-control" value="{{$user->phone}}">
		</div>	
		
		<div class="form-group ">
			<div><label>Status </label></div>
			<input type="checkbox" name="status" value="1" @if($user->status==1) checked @endif  >
		</div>	
		<div class="form-group">
			<div class="checkbox">
				@foreach($roles as $role)
					<label class="user_role"><input type="checkbox" name="role[]" value="{{$role->id}}">{{$role->name}}</label>
				@endforeach
			
			</div>
		</div>	
	
		<div class="form-group post_but ">
			<button type="submit"  class="btn btn-success add_tag">
				<i class="fa fa-plus">Add User</i>
			</button>
			<a href="{{route('user.index')}}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Back</a>
		</div>	
	</form>
</div>   



@endsection

@section('footer_part')

<!-- start ckeditor  -->
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
	CKEDITOR.replace('editor1');
</script>
<!-- end ckeditor  -->

<!-- start select   -->
<script src="{{asset('admin/plugins/select2/select2.full.min.js')}}"></script>
 <script >
 	$(".select2").select2();
 </script>
 <!-- end select   -->
@endsection