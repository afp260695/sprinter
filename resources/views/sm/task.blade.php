<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
     <link rel="shortcut icon" href="{{ asset('assets/ico/labtekindie.png')}}">

    <title>Sprinter - Sprint</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/style2.css')}}" rel="stylesheet">
	<link href="{{ asset('assets/css/style3.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/font-awesome.min.css')}}" rel="stylesheet">


    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script src="{{ asset('assets/js/modernizr.js')}}"></script>
  </head>

  <body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/sm">SPRINTER | </a> 
		  <!-- read from database link project -->
		  <a class="navbar-brand" href="sprint.html">Sprint Name </a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
          	<ul class="nav navbar-nav">
            <li><a href=# data-toggle="modal" data-target="#modalAddTask">ADD TASK</a></li>
            <li><a href="/logout" >LOGOUT</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
	 
	 
	<!-- *****************************************************************************************************************
	 MIDDLE CONTENT
	 ***************************************************************************************************************** -->

	 <div class="container mtb">
	 	<div class="row">
	 		
	 			<h4>Tasks | <a href="burndownchart.html">Burndown Chart</a></h4>
	 			<div class="hline"></div>
				<!-- read from database semua task -->
				<br>
	 			<div style="overflow-x:auto;">
	 				@if(count($all_user_stories)>0)
	 				@foreach($all_user_stories as $user_stories)
	 					<b>{{$user_stories->deskripsi}}</b>
					  	<table style="margin-top: 10px; margin-bottom: 30px;">
							<tr>
						  		<th>Nama Task</th>
						  		<th>Estimate Time</th>
						  		<th>Status</th>
							</tr>
							@if(count($user_stories->tasks)>0)
							@foreach($user_stories->tasks as $task)
							<tr>
								<th>{{$task->deskripsi}}</th>
								<th>Estimate Time {{$task->lama_pengerjaan}} hours</th>
								@if($task->status)
									<th style="color: green;">Sudah Selesai</th>
								@else
									<th style="color: red;">Belum Selesai</th>
								@endif
							</tr>
							@endforeach
							@endif
					  	</table>
						<br>
					@endforeach
					@endif

				  	
				</div>
	 		</div>
	 	</div>
	 </div>
	 
	<!-- *****************************************************************************************************************
	 FOOTER
	 ***************************************************************************************************************** -->
	<div id="footerwrap">
	 	<div class="container">
		 	<div class="row">
		 		<div class="col-lg-4">
		 			<h4>About</h4>
		 			<div class="hline-w"></div>
		 			<p>Sprinter is a software for SCRUM documentation. <br>It makes documentation become easier than before.</p>
		 		</div>
		 		<div class="col-lg-4">
		 			<h4>Made By</h4>
		 			<div class="hline-w"></div>
		 			<p>
		 				<p>Joshua Salimin
						<br>Ahmad Fajar
						<br>Miftahul Mahfuzh</p>
		 			</p>
		 		</div>
		 		<div class="col-lg-4">
		 			<h4>Labtek Indie</h4>
		 			<div class="hline-w"></div>
		 			<p>
		 				Jl. Titiran No.7<br/>
		 				Sadang Serang, Coblong, Kota Bandung	<br/>
		 				Jawa Barat 40133, Indonesia<br/>
		 			</p>
		 		</div>
		 	
		 	</div>
	 	</div>
	 </div>
	 
      <!--modal add user story-->
      <div class="modal fade" id="modalAddTask" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="standard-title">Add Task</h3>
            </div>
            <div class="modal-body">
            	<form role="form" action="/sm/task" method="post">
					  <div class="form-group">
					  	<label for="message1">User Story</label>
					  	<!-- from database -->
						  <select name="id_user_stories" class="form-control" id="exampleInputEmail1">
						  	@if(count($all_user_stories)>0)
	 						@foreach($all_user_stories as $user_stories)
								<option value="{{$user_stories->id}}">{{$user_stories->deskripsi}}</option>
							@endforeach
							@endif
						  </select>
						  <br>
						  <div class="form-group">
					  	<label for="message1">Task Description</label>
					  	<textarea class="form-control" id="message1" rows="3" name="deskripsi"></textarea>
					  </div>
					  <label for="message1">Estimate Time</label>
					  <input type="number" name="lama_pengerjaan" min="1" max="100" class="form-control" id="exampleInputEmail1">
					  </div>
					  <button type="submit" class="btn btn-theme">Submit</button>
					  {{ csrf_field() }}
					  <input type="hidden" name="id_sprint" value="{{$id_sprint}}">
				</form>
            </div>
          </div>
        </div>
      </div>
      <!--modal add user story end-->

     <!--modal add developer-->
      <div class="modal fade" id="modalAddDeveloper" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="standard-title">Add Developer</h3>
            </div>
            <div class="modal-body">
            	<form role="form">
					  <div class="form-group">
					    <label for="InputName">Name</label>
					    <!--<input type="text" class="form-control" id="InputName">-->
						  <!-- from database -->
						  <select name="developer" class="form-control" id="exampleInputEmail1">
							<option value="Fajar">Fajar</option>
							<option value="Joshua">Joshua</option>
							<option value="Miftah">Miftah</option>
						  </select>
						  <br>
						<label for="InputName">Keahlian</label>
					    <!--<input type="text" class="form-control" id="InputName">-->
						  <!-- from database -->
						  <select name="keahlian" class="form-control" id="exampleInputEmail1">
							<option value="BackEnd">BackEnd</option>
							<option value="FrontEnd">FrontEnd</option>
							<option value="FullStack">FullStack</option>
						  </select>
					  </div>
					  <button type="submit" class="btn btn-theme">Submit</button>
				</form>
            </div>
          </div>
        </div>
      </div>
      <!--modal add developer end-->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('assets/js/jquery-1.11.0.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('assets/js/retina-1.1.0.js')}}"></script>
	<script src="{{ asset('assets/js/jquery.hoverdir.js')}}"></script>
	<script src="{{ asset('assets/js/jquery.hoverex.min.js')}}"></script>
	<script src="{{ asset('assets/js/jquery.prettyPhoto.js')}}"></script>
  	<script src="{{ asset('assets/js/jquery.isotope.min.js')}}"></script>
  	<script src="{{ asset('assets/js/custom.js')}}"></script>


    <script>
// Portfolio
(function($) {
	"use strict";
	var $container = $('.portfolio'),
		$items = $container.find('.portfolio-item'),
		portfolioLayout = 'fitRows';
		
		if( $container.hasClass('portfolio-centered') ) {
			portfolioLayout = 'masonry';
		}
				
		$container.isotope({
			filter: '*',
			animationEngine: 'best-available',
			layoutMode: portfolioLayout,
			animationOptions: {
			duration: 750,
			easing: 'linear',
			queue: false
		},
		masonry: {
		}
		}, refreshWaypoints());
		
		function refreshWaypoints() {
			setTimeout(function() {
			}, 1000);   
		}
				
		$('nav.portfolio-filter ul a').on('click', function() {
				var selector = $(this).attr('data-filter');
				$container.isotope({ filter: selector }, refreshWaypoints());
				$('nav.portfolio-filter ul a').removeClass('active');
				$(this).addClass('active');
				return false;
		});
		
		function getColumnNumber() { 
			var winWidth = $(window).width(), 
			columnNumber = 1;
		
			if (winWidth > 1200) {
				columnNumber = 5;
			} else if (winWidth > 950) {
				columnNumber = 4;
			} else if (winWidth > 600) {
				columnNumber = 3;
			} else if (winWidth > 400) {
				columnNumber = 2;
			} else if (winWidth > 250) {
				columnNumber = 1;
			}
				return columnNumber;
			}       
			
			function setColumns() {
				var winWidth = $(window).width(), 
				columnNumber = getColumnNumber(), 
				itemWidth = Math.floor(winWidth / columnNumber);
				
				$container.find('.portfolio-item').each(function() { 
					$(this).css( { 
					width : itemWidth + 'px' 
				});
			});
		}
		
		function setPortfolio() { 
			setColumns();
			$container.isotope('reLayout');
		}
			
		$container.imagesLoaded(function () { 
			setPortfolio();
		});
		
		$(window).on('resize', function () { 
		setPortfolio();          
	});
})(jQuery);
</script>
  </body>
</html>
