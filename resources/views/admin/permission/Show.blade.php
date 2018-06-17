@extends('admin/layouts/app')

@section('content')
	<h1 class="text-center alert alert-info "><i class="fa fa-diamond fa-lg"></i> Start Manage Permissions</h1><br>
	
	@include('admin/layouts/message')
	<center><a href="{{route('permission.create')}}" class="btn btn-success"><i class="fa fa-plus fa-lg"></i> Add Permission</a></center>
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
				<td>Permission Name</td>
				<td>Permission For</td>
				<td>Edit</td>
				<td>Delete</td>
			</tr>
		</thead>	
		<tbody>
			@foreach($permissions as $permission)
			  <tr>
				<td>{{$permission->id}}</td>
				<td>{{$permission->name}}</td>
				<td>{{$permission->for}}</td>
				<!-- edit permission -->
				<td>
					<a href="{{route('permission.edit',$permission->id)}}" class="btn btn-info"><i class="fa fa-edit"></i>Edit</a>
				</td>
				<!-- delete permission -->
				<td>
					<form action="{{route('permission.destroy',$permission->id)}}" method="post">
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