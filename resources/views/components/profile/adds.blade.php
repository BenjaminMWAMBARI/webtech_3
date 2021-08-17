@extends('layouts.app')

@section('content')
<main class="page lanidng-page">
       
<section class="portfolio-block block-intro">
            <div class="container">
             <div class="">
                    <p id="top"><strong>ADDS</strong></p>
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif


                   

<div class="tab row">
  <button class="tablinks active col-4" onclick="openadd(event, 'my_adds')">My Adds</button>
 
  <button class="tablinks col-4" onclick="openadd(event, 'fav_adds')">Favourite Adds <span style="color:red"class='ion-android-favorite'></span></button>
  <button class="tablinks col-4" onclick="openadd(event, 'up_add')">Upload Add </button>
  
</div>
<div class="row">
<div id="my_adds" class="tabcontent myadds col-12">
@if(count($myadds)>0)
@for($i=0;$i<count($myadds);$i++)
<div class="card" >
    <!-- images -->
<div id="carouselExampleControls{{$i}}" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
  @php
  $images=json_decode($myadds[$i]->photos);
  $c=0;
  @endphp
  @foreach($images as $img)

    <div class="carousel-item @if($c==0)active @endif ">
    <img src="{{ asset('assets/img/adds') }}/{{$img}}" class="img-thumbnail" alt="...">
    <!-- card-img-top d-block w-100 -->
    </div>
    {{$c++}}
    @endforeach
    
   
  </div>
  <!-- back -->
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls{{$i}}" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <!-- next -->
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls{{$i}}" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
 
  <div class="card-body">
    <h5 class="card-title">{{$myadds[$i]->title}}</h5>
    <p class="card-text">{{$myadds[$i]->description}}</p>
    <p class="card-text"><strong>{{$myadds[$i]->cat_name}} </strong></p>
    <p class="card-text"><strong>{{$myadds[$i]->price}} </strong></p>
    <a href="{{route('view_add', ['id' => $myadds[$i]->id])}}" class="btn btn-primary">View</a>
  </div>
</div> 

@endfor



@endif
<p>You Haven't Uploaded Any Add Yet</p>
{{ $myadds->links() }}


</div>

<div id="fav_adds" class="tabcontent col-12">
@if(count($favourite)>0)
@for($i=0;$i<count($favourite);$i++)
<div class="card" >
    <!-- images -->
<div id="carouselExampleControlsfav{{$i}}" class="carousel slide" data-bs-ride="carousel">

  <div class="carousel-inner">
  @php
  $images_fav=json_decode($favourite[$i]->photos);
  $f=0;
  @endphp
  @foreach($images_fav as $im)
    <div class="carousel-item @if($f==0)active @endif ">
    <img src="{{ asset('assets/img/adds') }}/{{$im}}" class="img-thumbnail" alt="...">
    </div>
    {{$f++}}
    @endforeach
    
  </div>
  <!-- back -->
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsfav{{$i}}" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <!-- next -->
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsfav{{$i}}" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
 
  <div class="card-body">
    <h5 class="card-title">{{$favourite[$i]->title}}</h5>
    <p class="card-text">{{$favourite[$i]->description}}</p>
    <p class="card-text"><strong>{{$favourite[$i]->cat_name}} </strong></p>
    <p class="card-text"><strong>{{$favourite[$i]->price}} </strong></p>
    <a href="{{route('view_add', ['id' => $favourite[$i]->id])}}" class="btn btn-primary">View</a>
  </div>
</div> 

@endfor

@endif
<p>No Favourite Adds.</p>
{{ $favourite->links() }}
</div>
<div id="up_add" class="tabcontent col-12 ">
<!-- upload -->

<form class="row" id="drop" method="POST" action="{{route('save_add')}}" enctype="multipart/form-data" >
@csrf
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title"  placeholder="Title" name="title" aria-describedby="emailHelp">
   
  </div>
  <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="text" class="form-control" id="price"  placeholder="Price" name="price" aria-describedby="emailHelp"> 
  </div>
  <div class="mb-3">
    <label for="desc" class="form-label">Description</label>
  
    <textarea name="desc"   class="form-control"  cols="10"  id="desc" rows="3">Description</textarea>
  </div>
  <div class="col-6">
    <label for="desc" class="form-label">Location</label>
    <input type="text" class="form-control"  id="location" name="locationn">
  </div>

  <div class="col-6 mb-3">
    <label for="cat" class="form-label">Category</label>
    <select class="form-select"  name="cat" id="cat" aria-label="Default select example">
  
  @foreach ($categories as $cat )
  
  <option value="{{$cat->id}}">{{$cat->name}} </option>
    
  @endforeach
</select>
  
  </div>

  
    <input hidden  name="file" type="file" multiple />
  
    <div class="mb-3 dropzone dropzone-file-area" id="fileUpload">
        <div class="dz-default dz-message">
            <p>Click or Drop Pictures here to upload</p>
            
        </div>
    </div>
  
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<!-- end upload -->
</div>

</div>

                    
                </div>
            </div>
   
    


</section>


    </main>
    

  
@endsection
@section("script")

<script>
function openadd(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}




Dropzone.options.fileUpload = {
  url: "{{route('save_add')}}",
    autoProcessQueue: false,
    uploadMultiple: true,
    parallelUploads: 5,
    maxFiles: 5,
    maxFilesize: 1,
    acceptedFiles: 'image/*',
    addRemoveLinks: true,
    init: function() {
        dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

        // for Dropzone to process the queue (instead of default form behavior):
        document.getElementById("drop").addEventListener("click", function(e) {
            // Make sure that the form isn't actually being sent.
            e.preventDefault();
            e.stopPropagation();
            dzClosure.processQueue();
        });
        var selectedCat=1;
        $("select#cat").change(function(){
         selectedCat = $(this).children("option:selected").val();
        
    });
        //send all the form data along with the files:
        this.on("sendingmultiple", function(data, xhr, formData) {
            formData.append("title", jQuery("#title").val());
            formData.append("location", jQuery("#location").val());
            formData.append("price", jQuery("#price").val());
            formData.append("desc", $("#desc").text());
            formData.append("cat", selectedCat);
            formData.append("_token",  $('meta[name="csrf-token"]').attr('content'));
        });

        dzClosure.on('successmultiple', function(files, response) {

          swal("congrats!", "Your Add has been posted!", "success").then(function() {
            location.reload();
});
          
    });
    dzClosure.on('errormultiple', function(files, response) {
      swal("Opps!", "Something went wrong!", "error").then(function() {
            location.reload();
});
       
    });
    }
}
</script>

  @endsection