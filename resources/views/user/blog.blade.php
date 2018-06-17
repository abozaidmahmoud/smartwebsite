@extends('user/app')


@section('img_head',asset('user/img/home-bg.jpg'))
@section('title','Blog System')
@section('description','Powerful blog system')

@section('content')

 <div class="container">

    @foreach($posts as $post)
      <a href="{{url('post/'.$post->slug)}}"><h1 class="post_title">{{$post->title}}</h1></a>
        <h6 class="posted_by">Published {{$post->created_at->diffForhumans()}} By Abozaid

           
        </h6>

        <div class="row ">
            <div class="col-md-1 ">
                <img src="{{asset('admin/dist/img/avatar2.png')}}" class="post_img">
            </div>
            <div class="col-md-9 col-md-offset-2 post_body">
                {{$post->body}}
            </div>
        </div>
       
        <br>
               
    @endforeach        
    <center>{{$posts->render()}}</center>
@endsection