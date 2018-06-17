@extends('admin/layouts/app')

@section('content')
	<h1 class="text-center alert alert-info "><i class="fa fa-diamond fa-lg"></i> Start Manage Roles</h1><br>
	<center><a href="{{route('role.create')}}" class="btn btn-success"><i class="fa fa-plus fa-lg"></i> Add Role</a></center>
	<form method="post" action="{{url('tag/index')}}">
		{{csrf_field()}}
		<div class="pull-right search">
			<i class="fa fa-search"></i>
			<input type="search" name="search" id="tag_search" value="{{request('search')}}"  placeholder="search by tag name">
		</div>
	</form>


	<table class="table table-bordered  table-striped table-hover ">
		<thead>
			<tr>
				<td>ID</td>
				<td>Role Name</td>
				<td>Edit</td>
				<td>Delete</td>
			</tr>
		</thead>	
		<tbody>
			@foreach($roles as $role)
			  <tr>
				<td>{{$role->id}}</td>
				<td>{{$role->name}}</td>
				<!-- edit role -->
				<td>
					<a href="{{route('role.edit',$role->id)}}" class="btn btn-info"><i class="fa fa-edit"></i>Edit</a>
				</td>
				<!-- delete role -->
				<td>
					<form action="{{route('role.destroy',$role->id)}}" method="post">
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

  $( "#tag_search" ).autocomplete({
    source:'http://127.0.0.1:8000/tag/search' 
  });
} );
</script>


@endsection