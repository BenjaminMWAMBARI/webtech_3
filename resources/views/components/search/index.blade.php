@extends('layouts.app')

@section('content')

<!-- <section class=" row"> -->
    <div class="container">
  <div class=" row page" style="padding-top:10rem">
  <!-- s -->
 
  @foreach($adds as $add)
    <div class="col-lg-4 col-12 col-md-6 ">
   
@php
$img=json_decode($add->photos);
@endphp
                <div class="card " style="width:25rem">
  <img src="{{asset('assets/img/adds')}}/{{$img[0]}}"  height="300"class="item zoom-on-hover card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{$add->title}}</h5>
    <p class="card-text">{{$add->description}}</p>
    @guest
    <a href="{{route('login')}}" class="btn btn-primary">Login to View</a>
    @else
    <a href="{{route('view_add',['id'=>$add->id])}}" class="btn btn-primary">View</a>
    @endguest
  </div>
</div>

    </div>

    @endforeach
    {{$adds->links()}}

   <!-- e -->

  
<!-- </section> -->
</div>
</div>


@endsection