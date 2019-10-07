@extends('layouts.sidebar')
@section('content')
<style>
    .middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}
.card:hover .image {
  opacity: 0.3;
}

.card:hover .middle {
  opacity: 1;
}


.fa-heart{

    color: #cc0066;
    font-size: 90px; 
}
    @media only screen and (max-width: 767px) {
        body{
            background: linear-gradient(to top left, #99ccff 0%, #ff3399 100%);
        }
       .row{
            display: table;
            margin: 0 auto 0 auto !important;
       } 
       .card-img-top{

           height: 10rem !important;
       }
       .card{
           width: 14rem !important
       }
    }
</style>
<div class="container-fluid">
    @if (count($users) > 0)
     <div class="row" style="margin-left:3%;">     
            <div class="card-deck">
              
                  
              
    @foreach ($users as $user)
    
    <div class="card" style="width: 18rem;">
            <img src="{{ asset('profile/'. $user->photo ) }}" class="card-img-top" alt="profile image" height="300" onerror="this.src='{{ asset('images/avatar.png') }}'">
            <div class="middle">
                <a class="btnAdd" href="{{url('/addconnection/'. $user->id)}}"><i class="fa fa-heart" aria-hidden="true"></i></a>
              </div>
            <div class="card-body">
              <a href="{{url('/userprofile/'. $user->id)}}"><h5 class="card-title">{{$user->name}}</h5></a>
         
            </div>
          </div>
    
    @endforeach
  
  
</div>
</div>  
@else
<h1 style="text-align:center;">No Data Found</h1>
@endif
</div>

@endsection
