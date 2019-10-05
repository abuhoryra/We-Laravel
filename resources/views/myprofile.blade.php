<style>
    body{
        background: linear-gradient(to top left, #99ccff 0%, #ff3399 100%);
    }
    @media only screen and (max-width: 767px) {
    .profileImage{
        margin-top: 5% !important;
        float: left !important;
    }
    .fileinput{

        margin-left: 1% !important;
        
    }
    .btnImage{
        text-align: left !important;
        margin-left: 1% !important;
    }
}
</style>
@extends('layouts.sidebar')
@section('content')
<div class="container">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
         Warning<br><br>
         <ul>
          @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
          @endforeach
         </ul>
        </div>
       @endif
       @if ($message = Session::get('success'))
       <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
               <strong>{{ $message }}</strong>
       </div>
       @endif
    <div class="row" style="margin-top: 3%;">
        <div class="col-md-4" style="background: linear-gradient(to top, #ffffff 0%, #66ccff 100%); border-radius: 5%;">
            <div style="text-align: center;">
                <img src="{{ asset('images/love.png') }}" alt="love" height="120">
            </div>
            <form action="{{url('/updateprofile')}}" style="margin-top:5%;" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $profile->name}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="text" class="form-control" name="email" value="{{ $profile->email}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Phone Number</label>
                    <input type="text" class="form-control" name="phone" value="{{ $profile->phone}}">
                </div>
                <div style="text-align:center;">
                    <button type="submit" class="btn btn-md btn-outline-success">Update</button>
                </div>
            </form>
        </div>
        <div class="c2 col-md-4">
            <div class="profileImage" style="float: right;">
                <img src="{{ asset('profile/'. $profile->photo ) }}" alt="" id="image" height="150" onerror="this.src='{{ asset('images/error.png') }}'" style="border-radius: 100%;">
            </div>
            <form action="{{url('/profileimage')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                <input class="fileinput" name="image" type="file" style="margin-left:42%; margin-top: 5%;" onchange="showImage.call(this)">
                <div class="btnImage" style="text-align:center; margin-top: 5%;">
                    <button type="submit" class="btn btn-sm btn-success">Update</button>
                </div>
            </form>
        </div>
        
    </div>

</div>
<script type="text/javascript">
    
    function showImage(){
        if(this.files && this.files[0]){
            var obj = new FileReader();
            obj.onload = function(data){
                var image = document.getElementById("image");
                image.src = data.target.result;
                image.style.display = "block";
            }
            
            obj.readAsDataURL(this.files[0]);
        }
    }
    
    </script>
@endsection
