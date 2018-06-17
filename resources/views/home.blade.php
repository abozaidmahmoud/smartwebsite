
@extends('user/app')
@section('img_head',asset('user/img/contact-bg.jpg'))
@section('title','welcome user')

@section('content')

<article>
        <div class="container">
            welcome {{auth()->user()->name}} in profile 
            
         </div>
    </article>

  
@endsection

