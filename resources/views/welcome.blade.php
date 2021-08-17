@extends('layouts.app')

@section('content')
<main class="page lanidng-page">
        <section class="portfolio-block block-intro">
            <div class="container">
             <div class="about-me">
                    <p>Hello!. Welcome to my site <strong>Webtech adv</strong></p>
                    <!-- <a class="btn btn-outline-primary" role="button" href="#">Hire me</a> -->
                </div>
            </div>
        </section>
        <section class="portfolio-block photography">
            <div class="container">
                <div class="row g-0">
@for($i=0;$i<count($adds);$i++)
@php
$img=json_decode($adds[$i]->photos);
@endphp
                <div class="card col-md-6 col-lg-4 ">
  <img src="{{asset('assets/img/adds')}}/{{$img[0]}}"  height="300"class="item zoom-on-hover card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{$adds[$i]->title}}</h5>
    <p class="card-text">{{$adds[$i]->description}}</p>
    @guest
    <a href="{{route('login')}}" class="btn btn-primary">Login to View</a>
    @else
    <a href="{{route('view_add',['id'=>$adds[$i]->id])}}" class="btn btn-primary">View</a>
    @endguest
  </div>
</div>
@endfor

</div>
                   
                </div>
            </div>
        </section>
        <section class="portfolio-block call-to-action border-bottom">
            <div class="container">
                <div class="d-flex justify-content-center align-items-center content">
                    <h3>Like what you see?</h3><a href="{{route('adds')}}"class="btn btn-outline-primary btn-lg" type="button"> View More</a>
                </div>
            </div>
        </section>
        <section class="portfolio-block skills">
            <div class="container">
                <div class="heading">
                    <h2>Trust!!</h2>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card special-skill-item border-0">
                            <div class="card-header bg-transparent border-0"><i class="icon ion-ios-star-outline"></i></div>
                            <div class="card-body">
                                <h3 class="card-title">Best Products</h3>
                                <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card special-skill-item border-0">
                            <div class="card-header bg-transparent border-0"><i class="icon ion-ios-lightbulb-outline"></i></div>
                            <div class="card-body">
                                <h3 class="card-title">Best Rate</h3>
                                <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card special-skill-item border-0">
                            <div class="card-header bg-transparent border-0"><i class="icon ion-ios-gear-outline"></i></div>
                            <div class="card-body">
                                <h3 class="card-title">Best Quality</h3>
                                <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include("components.home_port")


@endsection