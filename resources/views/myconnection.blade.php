@extends('layouts.sidebar')
@section('content')
<style>
body,html{
			height: 100%;
			margin: 0;
			background: #7F7FD5;
	       background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
	        background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
		}

		.chat{
			margin-top: auto;
			margin-bottom: auto;
			
		}
		.card{
			height: 500px;
			border-radius: 15px !important;
			background-color: rgba(0,0,0,0.4) !important;
		}
		.contacts_body{
			padding:  0.75rem 0 !important;
			overflow-y: auto;
			white-space: nowrap;
		}
		.msg_card_body{
			overflow-y: auto;
		}
		.card-header{
			border-radius: 15px 15px 0 0 !important;
			border-bottom: 0 !important;
		}
	 .card-footer{
		border-radius: 0 0 15px 15px !important;
			border-top: 0 !important;
	}
		.container{
			align-content: center;
		}
		.search{
			border-radius: 15px 0 0 15px !important;
			background-color: rgba(0,0,0,0.3) !important;
			border:0 !important;
			color:white !important;
		}
		.search:focus{
		     box-shadow:none !important;
           outline:0px !important;
		}
		.type_msg{
			background-color: rgba(0,0,0,0.3) !important;
			border:0 !important;
			color:white !important;
			height: 60px !important;
			overflow-y: auto;
		}
			.type_msg:focus{
		     box-shadow:none !important;
           outline:0px !important;
		}
		.attach_btn{
	border-radius: 15px 0 0 15px !important;
	background-color: rgba(0,0,0,0.3) !important;
			border:0 !important;
			color: white !important;
			cursor: pointer;
		}
		.send_btn{
	border-radius: 0 15px 15px 0 !important;
	background-color: rgba(0,0,0,0.3) !important;
			border:0 !important;
			color: white !important;
			cursor: pointer;
		}
		.search_btn{
			border-radius: 0 15px 15px 0 !important;
			background-color: rgba(0,0,0,0.3) !important;
			border:0 !important;
			color: white !important;
			cursor: pointer;
		}
		.contacts{
			list-style: none;
			padding: 0;
		}
		.contacts li{
			width: 100% !important;
			padding: 5px 10px;
			margin-bottom: 15px !important;
		}
	.active{
			background-color: rgba(0,0,0,0.3);
	}
		.user_img{
			height: 70px;
			width: 70px;
			border:1.5px solid #f5f6fa;
		
		}
		.user_img_msg{
			height: 40px;
			width: 40px;
			border:1.5px solid #f5f6fa;
		
		}
	.img_cont{
			position: relative;
			height: 70px;
			width: 70px;
	}
	.img_cont_msg{
			height: 40px;
			width: 40px;
	}
	
	.user_info{
		margin-top: auto;
		margin-bottom: auto;
		margin-left: 15px;
	}
	.user_info span{
		font-size: 20px;
		color: white;
	}
	.user_info p{
	font-size: 10px;
	color: rgba(255,255,255,0.6);
	}
	.video_cam{
		margin-left: 50px;
		margin-top: 5px;
	}
	.video_cam span{
		color: white;
		font-size: 20px;
		cursor: pointer;
		margin-right: 20px;
	}
	.msg_cotainer{
		margin-top: auto;
		margin-bottom: auto;
		margin-left: 10px;
		border-radius: 25px;
		background-color: #82ccdd;
		padding: 10px;
		position: relative;
	}
	.msg_cotainer_send{
		margin-top: auto;
		margin-bottom: auto;
		margin-right: 10px;
		border-radius: 25px;
		background-color: #78e08f;
		padding: 10px;
		position: relative;
	}
	.msg_time{
		position: absolute;
		left: 0;
		bottom: -15px;
		color: rgba(255,255,255,0.5);
		font-size: 10px;
	}
	.msg_time_send{
		position: absolute;
		right:0;
		bottom: -15px;
		color: rgba(255,255,255,0.5);
		font-size: 10px;
	}
	.msg_head{
		position: relative;
	}
	#action_menu_btn{
		position: absolute;
		right: 10px;
		top: 10px;
		color: white;
		cursor: pointer;
		font-size: 20px;
	}
	.action_menu{
		z-index: 1;
		position: absolute;
		padding: 15px 0;
		background-color: rgba(0,0,0,0.5);
		color: white;
		border-radius: 15px;
		top: 30px;
		right: 15px;
		display: none;
	}
	.action_menu ul{
		list-style: none;
		padding: 0;
	margin: 0;
	}
	.action_menu ul li{
		width: 100%;
		padding: 10px 15px;
		margin-bottom: 5px;
	}
	.action_menu ul li i{
		padding-right: 10px;
	
	}
	.action_menu ul li:hover{
		cursor: pointer;
		background-color: rgba(0,0,0,0.2);
	}
	@media(max-width: 576px){
	.contacts_card{
		margin-bottom: 15px !important;
	}
	}
</style>
<div class="container-fluid h-100">
    <div class="row justify-content-center h-100">
        <div class="col-md-4 col-xl-3 chat"><div class="card mb-sm-3 mb-md-0 contacts_card">
            <div class="card-header">
                <div class="input-group">
                    <input type="text" placeholder="Search..." name="" class="form-control search">
                    <div class="input-group-prepend">
                        <span class="input-group-text search_btn"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
            <div class="card-body contacts_body">
                <ul class="contacts">
               
                    

                            @foreach ($data as $row)
                            @if ($row->uid != Auth::user()->id)
                            <li class="active onshow"  id="" data-id="{{ $row->uid }}" data-name="{{ $row->name }}" data-image="{{ asset('profile/'. $row->photo ) }}">
                            <div class="d-flex bd-highlight"> 
                                    <div class="img_cont">
                                            <img src="{{ asset('profile/'. $row->photo ) }}" onerror="this.src='{{ asset('images/avatar.png') }}'" class="rounded-circle user_img">
                                            <span class="online_icon"></span>
                                        </div>
                                        <div class="user_info">
                                            <span> {{ $row->name }} </span>
                                        </div>
                                    </div>
								</li>
			
                            @endif
                         @endforeach
                </ul>
            </div>
            <div class="card-footer"></div>
        </div></div>
        <div class="col-md-8 col-xl-6 chat">
            <div id="" class="card showcard" style="display: none;">
                <div class="card-header msg_head">
						<p id="userID" style="display: none;">fd</p>
                    <div class="d-flex bd-highlight">
                        <div class="img_cont">
                            <img  src="" class="rounded-circle user_img userimage" onerror="this.src='{{ asset('images/error.png') }}'">
                            <span class="online_icon"></span>
                        </div>
                        <div class="user_info">
                            <span id="username">Not Yet</span>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body msg_card_body">
                    <div class="d-flex justify-content-start mb-4">
							
                        <div class="img_cont_msg">
                            <img src="" class="rounded-circle user_img_msg userimage" onerror="this.src='{{ asset('images/error.png') }}'">
                        </div>
                        <div class="msg_cotainer" id="show">
                            Hi, how are you samim?
                            <span class="msg_time">8:40 AM, Today</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
						<form action="{{url('/sendmessage/')}}" method="POST" id="msgform">
                    <div class="input-group">
						
					
							@csrf
                        <div class="input-group-append">
                            <span class="input-group-text attach_btn"><i class="fa fa-paperclip"></i></span>
                        </div>
                        <textarea name="msg" class="form-control type_msg" placeholder="Type your message..."></textarea>
                        <div class="input-group-append">
                            <button type="submit" style="background:#00cc66; border: none; border-top-right-radius: 15px; border-bottom-right-radius: 15px;"><span class="input-group-text send_btn"><i class="fa fa-location-arrow"></i></span></button>
						</div>
					
					</div>
				</form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
	$(document).ready(function(){
$('#action_menu_btn').click(function(){
	$('.action_menu').toggle();
});
	});
</script>
<script>
	
				
	
	$(document).ready(function(){
	  $(".onshow").click(function(){
		$(".showcard").show();
		let a = $(this).attr("data-name");
		 id = $(this).attr("data-id");
	
		let image = $(this).attr("data-image");
		$("#username").html(a);
		$("#userID").html(id);
		$(".userimage").attr('src', image);
		

																		// //var val = $("#userID").text();
																		// var url = "{{url('/msg/')}}";
																		// var data = url+'/'+id;
																		
																		
																	
																		// var response = '';
																		// $.ajax({
																		// 	type: "GET",
																		// 	url: data,
																		// 	//dataType: 'json',
																		// 	async: false,
																		// 	success: function(text) {
																		// 		response = text;
																		// 		$("#show").html(response);
																				
																		// 	}
																		// });
																					
																			
        //alert(response);
	  });
	  
	  
	 
		

	  $("#msgform").submit(function(event){
        event.preventDefault();
		var val = $("#userID").text();
	
        var formData = new FormData(this);
		var url = $(this).attr('action')+'/'+val;
          $.ajax({
             url: url,
             type: 'POST',
             data: formData,
             async: false,
             success: function(data) {
				$(".type_msg").val('');
				
            },
            cache: false,
            contentType: false,
            processData: false
        });
		// //var val = $("#userID").text();
		// var url = "{{url('/msg/')}}";
		// var data = url+'/'+val;
		
		
	
        // var response = '';
        // $.ajax({
        //     type: "GET",
        //     url: data,
		// 	//dataType: 'json',
        //     async: false,
        //     success: function(text) {
        //         response = text;
		// 		$("#show").html(response);
				
        //     }
        // });
     });
	});
	</script>



@endsection