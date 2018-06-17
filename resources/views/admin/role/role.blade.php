@extends('admin.layouts.app')
@section('head_part')
<link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
@endsection

@section('content')
@include('admin/layouts/message')
<h1>add new Tag</h1>
<div class="row">
	<form class="tag_form" method="post" action="{{route('role.store')}}">
		{{csrf_field()}}
		<div class="form-group ">
			<label for="title">Role Name</label>
			<input type="text" name="name" placeholder="Role Name" class="form-control">
		</div>	

		<div class="row">
			<div class="col-md-4">
				<label for="permission">Post Permissions</label>
				@foreach($permissions as $permission)
					@if($permission->for=='post')
						<div class="checkbox">
							<label> <input type="checkbox" name="permission[]" value="{{$permission->id}}" >{{$permission->name}}</label>
						</div>
					@endif
				@endforeach
				
			</div>

			<div class="col-md-4">
				<label for="permission">User Permissions</label>
				@foreach($permissions as $permission)
					@if($permission->for=='user')
						<div class="checkbox">
							<label> <input type="checkbox" name="permission[]" value="{{$permission->id}}" >{{$permission->name}}</label>
						</div>
					@endif
				@endforeach
			</div>

			<div class="col-md-4">
				<label for="permission">Other Permissions</label>
				@foreach($permissions as $permission)
					@if($permission->for=='other')
						<div class="checkbox">
							<label> <input type="checkbox" name="permission[]" value="{{$permission->id}}" >{{$permission->name}}</label>
						</div>
					@endif
				@endforeach
				
			</div>
			
		</div>
		
		<div class="form-group">
			<button type="submit"  class="btn btn-success add_tag">
				<i class="fa fa-plus">Add Role</i>
			</button>
			<a href="{{route('role.index')}}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Back</a>
		</div>	
	</form>
</div>   



@endsection

@section('footer_part')


@endsection