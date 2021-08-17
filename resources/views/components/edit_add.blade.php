@extends('layouts.app')

@section('content')
<main class="page lanidng-page">
       
<section class="portfolio-block block-intro">
<p id="top"><strong>Edit Add</strong></p>


<form class="row" id="drop" method="POST" action="{{route('edit_s_add',['id'=>$myadd->id])}}" enctype="multipart/form-data" >
@csrf
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title"  value="{{$myadd->title}}"placeholder="Title" name="title" aria-describedby="emailHelp">
   
  </div>
  <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="text" class="form-control" id="price"  value="{{$myadd->price}}" placeholder="Price" name="price" aria-describedby="emailHelp"> 
  </div>
  <div class="mb-3">
    <label for="desc" class="form-label">Description</label>
  
    <textarea name="desc"   class="form-control"  cols="10"  id="desc" rows="3">{{$myadd->description}}</textarea>
  </div>


  
    
  
  
  <button type="submit" class="btn btn-primary">update</button>
</form>

</section>


</main>


@endsection

