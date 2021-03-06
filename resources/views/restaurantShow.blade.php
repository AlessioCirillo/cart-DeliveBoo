<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    
</head>
<body>
      <header>
      <nav class="navbar navbar-expand-md">
    <div class="container">
        <a class="navbar-brand" href="{{ route('homepage') }}">
            DeliveBoo
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
           {{-- <a href="{{ route('cart.index') }}">
                <i class="fas fa-cart-arrow-down"></i>
            </a> --}}

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li>
                 
                </li>  
            </ul>
        </div>
    </div>
</nav>
</header>
<div class="container">

    <div class="row">
        <div class="col-sm-2">
            
            @if(session('cart'))
                <a href="{{ route('cart.index') }}" class="btn btn-primary  mt-3 mb-3 btn-block">

                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                     Cart
                    <!-- this code count product of choose tha user choose -->

                    <span class="badge badge-pill badge-danger">{{ count(session('cart')) }}</span>
                </a>
        </div>
                      
      
        {{-- <div class="col-sm-4 text-center">
     
                @if(session('success'))
                    <p class="btn-success  mt-3 mb-3 btn-block session" style='padding: .375rem .75rem;'>
                      {{ session('success') }}
                    </p>
        </div> --}}

                {{-- @endif --}}
       <!-- if user dont choose any product -->
                @else
                      
                    <a href="" class="btn text-light bg-warning mt-3 mb-3" role="button">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    Cart Empty
                    </a> 

                @endif
                    

                    
                </div>
            </div>
        </div>
    </div>
</div>



</body>
</html>
<h1> Restaurant Name {{$user->name}}</h1>
<h2>lalakj</h2>
<div class="container">
        <ul>
        @foreach($user->dishes as $dish)
           <li>
               <a href="{{ route('cart.add', $dish->id) }}">
                   {{$dish->name}}
               </a>
           </li>
        </ul>
        @endforeach
</div>

