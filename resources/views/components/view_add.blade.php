@extends('layouts.app')

@section('content')
<main class="page lanidng-page">
       
<section class="portfolio-block block-intro">
            <div class="container">
             <div class="">
                 <div class="row">
                 @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
                    <p id="top" class="col-6"><strong>{{$add->title}}</strong></p>
                    @if(auth::user()->id != $add->user_id)
                    <a  class="col-6 h5"> <span id="fav" data-id="{{$add->id}}" 
                    @if(is_null($check)!=1)    
                    style="color:red;"
                    @else
                    style="color:#888;"
                    @endif
                        
                        class='ion-android-favorite'></span></a>

                      @else
                      <div class="col-3">
                      <a  style="text-decoration: none;"href="{{route('edit_add',['id'=>$add->id])}}"class=" h5 mr-2" width="20px">   <span class="ion-edit"> </span> </a>
                      <a style="text-decoration: none;" href="{{route('del_add',['id'=>$add->id])}}"class=" ml-2 h5" width="20px">   <span style="color:red"class="ion-android-delete"> </span> </a>
</div>
                        @endif
</div>

                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
  @php
  $images_fav=json_decode($add->photos);
 
  $f=0;
  @endphp
  @foreach($images_fav as $im)
    <div class="carousel-item @if($f==0)active @endif ">
    <img src="{{ asset('assets/img/adds') }}/{{$im}}" class="img-thumbnail" alt="...">
    </div>
    {{$f++}}
    @endforeach
   
  </div>
  @if (count($images_fav)>1)
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
  @endif
</div>


<div class="row">
<div class="col-12 mt-3 mb-3">
<h5>Description </h5>
<p>{{$add->description}} </p>
</div>
<div class="col-12 mb-3">
<h5>Price </h5>
<p>{{$add->price}} </p>
</div>
<div class="col-12 mb-3">
<h5>Location </h5>
<p>{{$add->location}} </p>
</div>
<div class="col-12 mb-3">
<h5>Caategory </h5>
<p>{{$add->cat_name}} </p>
</div>


</div>


                   




                    
                </div>
            </div>
      
    


</section>

</main>
@endsection

