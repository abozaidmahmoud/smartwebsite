@extends('user/app')

@section('img_head',Storage::disk('local')->url($post->image))
@section('title',$post->title)
@section('description',$post->subtitle)
@section('content')

<article>
        <div class="container">
            <div class="row">
               <h1 class="post_title">{{$post->title}}</h1>
                  <h6 class="posted_by">Published {{$post->created_at->diffForhumans()}} By Abozaid
                  <span>In Cateogery 
                      @foreach($post->cateogeries as $post_cateogery)
                           <a href="{{url('posts/cateogery/'.$post_cateogery->slug)}}"><span class="list_cateogery">{{$post_cateogery->name}}</span></a>
                      @endforeach
                   </span>
                  </h6>
                  <div class="row post_content ">
                      <div class="col-md-1 ">
                          <img src="{{asset('admin/dist/img/avatar2.png')}}" class="post_img">
                      </div>
                      <div class="col-md-9 col-md-offset-2 post_body">
                          {{$post->body}}
                      </div>
                  </div>
                  <div class="tags">
                          <span>Tags</span>
                          @foreach($post->tags as $tag)
                            <a href="{{url('posts/tag/'.$tag->slug)}}">
                              <span class="list_tag">{{$tag->name}}</span>
                            </a>
                          @endforeach
                  </div>    
            </div>
            @if(auth()->check())
            <!-- comment form -->
            <form class="form_comment" method="post" action="{{route('comment.store')}}">
                {{csrf_field()}}
                <input type="hidden" class="post_id" name="post_id" value="{{$post->id}}">
                <div class="form-group">
                  <input class="form-control" type="hidden" name="user_id"  value="{{auth()->user()->id}}" >
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="comment_body"></textarea>
                </div>
                <button type="submit" name="add_comment">Add</button>
            </form>
            <!-- comment form -->
            @else <a href="">You must login</a>
            @endif

            <!-- comment display -->
              <div class="comment_display">
                <p class="comment_username"></p>
                <p class="comment_content"></p>
              </div>

            <!-- comment display -->
    </article>

    <hr>
@endsection

@section('footer_part')
<script>
  $('.form_comment').on('submit',function(event){
 
        event.preventDefault();
        var form_data=$(this).serialize();
        var url=$(this).attr('action');
  
       $.ajax({
         data:form_data,
         method:'post',
         url:url,
         dataType:'Json',
         success:function(comment){ 
          alert(comment.user_id);
             $('.form_comment')[0].reset();
              $('.comment_display').append(
              '<p class="".comment_title>' + comment.find(9).user.name +'</p>'+
              '<p class="comment_text">' + comment.comment +'</p>'
            );
             
            }

      });
});
</script>

<script>
  var id=$('.post_id').val();
  $.get({
    url:'http://127.0.0.1:8000/user/comment/'+id,
    method:'get',
    dataType:'Json',
    success:function(data){
      var data =data;
      alert(data[0].name);
       data.forEach(function(data){
          $('.comment_display').append(
              '<p class="".comment_title>' + data.user +'</p>'+
              '<p class="comment_text">' + data.comment +'</p>'
            );
      });

      }
  });



</script>

@endsection