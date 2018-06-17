@extends('admin.layouts.app')
@section('head_part')
 <link rel="stylesheet" href="{{asset('admin/plugins/select2/select2.min.css')}}">
@endsection

@section('content')
@include('admin/layouts/message')
<div class="row">
	<form class="tag_form" method="post" action="{{route('post.update',$post->id)}}" enctype="multipart/form-data">
		{{csrf_field()}}
		{{method_field('patch')}}
		<div class="form-group ">
			<label for="title">Title</label>
			<input type="text" name="title" placeholder="Post Title" class="form-control" value="{{$post->title}}" {{old('title')}}>
		</div>	
		<div class="form-group ">
			<label>SubTitle</label>
			<input type="text" name="subtitle" placeholder="Post SubTitle" class="form-control" value="{{$post->subtitle}}"  {{old('subtitle')}}>
		</div>	
		<div class="form-group">
			<label>Slug</label>
			<input type="text" name="slug" placeholder="Post Slug" class="form-control" value="{{$post->slug}}"  {{old('slug')}}>
		</div>	
		<div class="form-group col-md-6">
			<label>Publish</label>
			<input type="checkbox" name="status" value=1  @if($post->status==1) checked @endif >
		</div>	
		<div class="form-group col-md-6">
			<label>Image</label>
			<input type="file" name="image">
		</div>

		<div class="form-group">
		    <label>Select Tags</label>
		    <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="tags[]">
		       @foreach($tags as $tag)
		          <option value="{{$tag->id}}"
		          		@foreach($post->tags as $post_tag)
		          			@if($post_tag->id== $tag->id)
		          				selected
		          			@endif
		          		@endforeach
		          	>
		          		{{$tag->name}}
		          </option>   
		       @endforeach
		    </select>
	    </div>
	    <div class="form-group">
	    	<label>Select Cateogeries</label>
	        <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="cateogeries[]">
	    	  @foreach($cateogeries as $cateogery)
	    	      <option value="{{$cateogery->id}}"
	    	      		@foreach($post->cateogeries as $post_cateogery)
	    	      			@if($cateogery->id == $post_cateogery->id)
	    	      				selected
	    	      			@endif
	    	      		@endforeach

	    	      	>{{$cateogery->name}}</option>
	    	  @endforeach
	    	</select>
	    </div>


		<div class="form-group">
			<label>Body</label>
			<textarea id="editor1" name="body"  {{old('title')}}>{{$post->body}}</textarea>
		</div>	
		</div>
		<div class="form-group post_but text-center">
			<button type="submit"  class="btn btn-success add_tag">
				<i class="fa fa-plus"> Update</i>
			</button>
			<a href="{{route('post.index')}}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Back</a>
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