@extends('admin.layouts.app')
@section('head_part')
<link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
@endsection

@section('content')
@include('admin/layouts/message')
<div class="row">
	<form class="tag_form" method="post" action="{{route('role.update',$role->id)}}">
		{{csrf_field()}}
		{{method_field('put')}}
		<div class="form-group ">
			<label for="title">Role Name</label>
			<input type="text" name="name" placeholder="Role Name" class="form-control" value="{{$role->name}}">
		</div>	

		<div class="row">
			<div class="col-md-4">
				<label for="permission">Post Permissions</label>
				@foreach($permissions as $permission)
					@if($permission->for=='post')
						<div class="checkbox">
							<label> <input type="checkbox" name="permission[]" value="{{$permission->id}}"
							@foreach($role->permissions as $role_per)
								@if($role_per->id ==$permission->id)
									checked
								@endif
							@endforeach

							 >{{$permission->name}}</label>
						</div>
					@endif
				@endforeach
				
			</div>

			<div class="col-md-4">
				<label for="permission">User Permissions</label>
				@foreach($permissions as $permission)
					@if($permission->for=='user')
						<div class="checkbox">
							<label> <input type="checkbox" name="permission[]" value="{{$permission->id}}" 
							@foreach($role->permissions as $role_per)
								@if($role_per->id ==$permission->id)
									checked
								@endif
							@endforeach

								>{{$permission->name}}</label>
						</div>
					@endif
				@endforeach
			</div>

			<div class="col-md-4">
				<label for="permission">Other Permissions</label>
				@foreach($permissions as $permission)
					@if($permission->for=='other')
						<div class="checkbox">
							<label> <input type="checkbox" name="permission[]" value="{{$permission->id}}" 
							@foreach($role->permissions as $role_per)
								@if($role_per->id ==$permission->id)
									checked
								@endif
							@endforeach

								>{{$permission->name}}</label>
						</div>
					@endif
				@endforeach
				
			</div>
			
		</div>
		
		<div class="form-group">
			<button type="submit"  class="btn btn-success add_tag">
				<i class="fa fa-plus">Update</i>
			</button>
			<a href="{{route('role.index')}}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Back</a>
		</div>	
	</form>
</div>   



@endsection

@section('footer_part')


@endsection