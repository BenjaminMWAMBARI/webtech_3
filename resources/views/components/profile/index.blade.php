@extends('layouts.app')

@section('content')
<main class="page lanidng-page">
        <section class="portfolio-block block-intro">
            <div class="container">
             <div class="about-me">
                    <p>Profile at <strong>Sale Extra</strong></p>
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="POST" enctype="multipart/form-data" action="{{route('updateprofile')}}">
                        @csrf
                        <div class=" img-c mb-3">
    <!-- <br> -->

    <img class=" im profile_avatars"src="{{ asset('assets/img/avatars/') }}/{{auth::user()->avatar}}">
    <div class="middle">
    <label for="profile_photo" class="im-text form-label">Change Profile</label>
  </div>
            <input  type="file" 
       name="profile_photo" hidden placeholder="Photo" id="profile_photo" >

       
  </div>

                       
                    <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" name="name" value="{{auth::user()->name}}"id="name">
  </div>
  
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" disabled class="form-control" id="exampleInputEmail1" value="{{auth::user()->email}}"aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="pass" class="form-label">Password</label>
    <input type="password" class="form-control" name="pass" id="pass">
  </div>
  <div class="mb-3">
    <label for="loc" class="form-label">Location</label>
    <input type="text" class="form-control" name="location" value="{{auth::user()->location}}"id="loc">
  </div>
  
  <button type="submit" class="btn btn-primary">Update</button>
</form>
                </div>
            </div>
        </section>
    <section>
    


    </section
    </main>
    @include("components.home_port")

  
@endsection
@section("script")

<script>

$(document).ready(function() {
            // $("form").click(function(event) {

            //     event.preventDefault();

            //     // alert("The required page will not be open");
            // });
        });

</script>

  @endsection