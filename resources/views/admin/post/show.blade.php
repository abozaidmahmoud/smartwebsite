@extends('admin/layouts/app')

@section('content')
	<h1 class="text-center alert alert-info"><i class="fa fa-diamond fa-lg"></i> Start Manage Posts </h1><br>
	<center><a href="{{route('post.create')}}" class="btn btn-success"><i class="fa fa-plus fa-lg"></i> Add Post</a></center>
	<form method="post" action="{{url('post/index')}}">
		{{csrf_field()}}
		<div class="pull-right search">
			<i class="fa fa-search"></i>
			<input type="search" name="search" id="post_search" value="{{request('search')}}"  placeholder="search by name">
		</div>
	</form>
	<table class="table table-bordered  table-striped table-hover ">
		<thead>
			<tr>
				<td>ID</td>
				<td>Title</td>
				<td>SubTitle</td>
				<td>Slug</td>
				<td>Created At</td>
				<td>Edit</td>
				<td>Delete</td>
			</tr>
		</thead>	
		<tbody>
			@foreach($posts as $post)
			  <tr>
				<td>{{$post->id}}</td>
				<td>{{$post->title}}</td>
				<td>{{$post->subtitle}}</td>
				<td>{{$post->slug}}</td>
				<td>{{$post->created_at}}</td>
				<!-- edit tag -->
				<td>
					<a href="{{route('post.edit',$post->id)}}" class="btn btn-info"><i class="fa fa-edit"></i>Edit</a>
				</td>
				<!-- delete tag -->
				<td>
					<form action="{{route('post.destroy',$post->id)}}" method="post">
						{{csrf_field()}}
						{{method_field('delete')}}
						<button type="submit"  class="btn btn-danger del_but"><i class="fa fa-close"></i>Delete</button>
					</form>
				</td>
			  </tr>
			@endforeach		
		</tbody>
	</table>
	{{$posts->render()}}

@endsection

@section('footer_part')

<script>
$( function() {

  $( "#post_search" ).autocomplete({
    source:'http://127.0.0.1:8000/post/search' 
  });
} );
</script>


@endsection