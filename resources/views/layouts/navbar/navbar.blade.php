<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient">
        <div class="container"><a class="navbar-brand logo" href="{{route('name')}}">{{ config('app.name', 'Laravel') }}</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navbarNav"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        
       
        @if(auth::check())
        <nav class="navbar navbar-light ">
        <?php
$cat = \App\Models\category::all();
$loc = \App\Models\adds::all();
?>

  <form class="form-inline" method="POST" action="{{route('search_query')}}">
      @csrf
    <input class="form-control mr-sm-2" type="search" placeholder="Search" name="term" aria-label="Search">
    <select class="form-control" id="cat" name="cat">
      <option selected disabled> Select Category</option>
      @foreach($cat as $ca)
      <option value="{{$ca->id}}">{{$ca->name}}</option>
      @endforeach
    </select>
    <select class="form-control" id="loc" name="loc">
      <option selected disabled> Select Location</option>
      @foreach($loc as $lo)
      <option value="{{$lo->id}}">{{$lo->location}}</option>
      @endforeach
    </select>

    <button class="btn btn-outline-success my-2 my-sm-0" style="color:white" type="submit">Search</button>
  </form>
</nav>    

@endif
        <div class="collapse navbar-collapse" id="navbarNav">
                
          
              
                <ul class="navbar-nav ms-auto">
                @if(auth::check())
                
                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('myadds') }}">{{ __('My Adds') }}</a>
                                </li>
                                @endif
                               <!-- Authentication Links -->
                               @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <div class="dropdown">
  <button class="btn  dropdown-toggle"  style="color:white"type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
  
                                    {{ Auth::user()->name }}
        
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
  <li ><a class="dropdown-item" href="{{route('profile')}}">Profile</a></li>
  <li class="">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
  </ul>
</div>
                           
                        @endguest
                      
                  
                </ul>
            </div>
        </div>
    </nav>