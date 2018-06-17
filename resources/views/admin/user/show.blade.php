@extends('admin/layouts/app')

@section('content')
	<h1 class="text-center alert alert-info "><i class="fa fa-diamond fa-lg"></i> Start Manage Tags</h1><br>
	<center><a href="{{route('user.create')}}" class="btn btn-success"><i class="fa fa-plus fa-lg"></i> Add User</a></center>
	
	@include('admin/layouts/message')
	<form method="post" action="{{url('tag/index')}}">
		{{csrf_field()}}
		<div class="pull-right search">
			<i class="fa fa-search"></i>
			<input type="search" name="search" id="user_search" value="{{request('search')}}"  placeholder="search by username">
		</div>
	</form>


	<table class="table table-bordered  table-striped table-hover ">
		<thead>
			<tr>
				<td>ID</td>
				<td>Name</td>
				<td>Email</td>
				<td>Edit</td>
				<td>Delete</td>
			</tr>
		</thead>	
		<tbody>
			@foreach($users as $user)
			  <tr>
				<td>{{$user->id}}</td>
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
				<!-- edit user -->
				<td>
					<a href="{{route('user.edit',$user->id)}}" class="btn btn-info"><i class="fa fa-edit"></i>Edit</a>
				</td>
				<!-- delete user -->
				<td>
					<form action="{{route('user.destroy',$user->id)}}" method="post">
						{{csrf_field()}}
						{{method_field('delete')}}
						<button type="submit"  class="btn btn-danger del_but"><i class="fa fa-close"></i>Delete</button>
					</form>
				</td>
			  </tr>
			@endforeach		
		</tbody>
	</table>
	

@endsection

@section('footer_part')

<script>
$( function() {

  $( "#user_search" ).autocomplete({
    source:'http://127.0.0.1:8000/user/search' 
  });
} );
</script>


@endsection