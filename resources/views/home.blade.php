@extends('layouts.sidebar')
@section('content')
<style>
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
     <div class="row" style="margin-left:3%;">     
            <div class="card-deck">
    @foreach ($users as $user)
    
    <div class="card" style="width: 18rem;">
            <img src="{{ asset('profile/'. $user->photo ) }}" class="card-img-top" alt="profile image" height="300" onerror="this.src='{{ asset('images/avatar.png') }}'">
            <div class="card-body">
              <h5 class="card-title">{{$user->name}}</h5>
         
            </div>
          </div>
    
    @endforeach
</div>
</div>  
</div>


@endsection
