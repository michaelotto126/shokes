<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Shokes</title>

	<!--Css-->

	<link href="{{ asset('css/bootstrap-flatly.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/welcome1.css') }}" rel="stylesheet">
	<link href = "{{asset('css/chart/chart.css')}}" rel="stylesheet">


	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lato:400,100,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:200,300' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>

	<script type="text/javascript" src="{{asset('js/jquery-2.1.3.min.js') }}"></script>
	<script type="text/javascript" src="{{asset('js/chart/ReactBarChart.js') }}"></script>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>



	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

	<div class = "page">

		<div class = "cover">

			<canvas id="myCanvas" width = "1200px" height="700px"></canvas>

			<script type = "text/javascript">
				$(document).ready(function(){

					var canvas, ctx, w, h;

					var h = window.innerHeight;
					var w = window.innerWidth;

					var canvas = document.getElementById('myCanvas');

					ctx = canvas.getContext('2d');

					function paintCanvas(){
						ctx.fillStyle = "rgba(0,0,0,1)";
						ctx.fillRect(0,0,w,h);
					}


					function particle(r,off,c){
						this.x = Math.random()*w;
						this.y = Math.random()*h;
						this.r = r;
						this.offset = Math.random()*50+off;
						this.color = "rgba(255,255,255,"+c+")"
						this.draw = function(){
							ctx.fillStyle = this.color;
							ctx.beginPath();
							ctx.arc(this.x,this.y,this.r,Math.PI*2,false);
							ctx.fill();
						}

					}

					var layer_1 = [],
							layer_2 = [],
							layer_3 = [];

					var layer_1_num = 40;
					var layer_2_num = 40;
					var layer_3_num = 100;


					for(i=0;i<layer_1_num;i++){
						layer_1.push(new particle(4,20,0));

					}
					for(i=0;i<layer_2_num;i++){
						layer_2.push(new particle(2.5,40,0));
					}
					for(i=0;i<layer_3_num;i++){
						layer_3.push(new particle(1,60,0));
					}

					function draw(){
						for(i=0;i<layer_1.length;i++){
							var p = layer_1[i];
							p.draw();
							update(p);
							checkBounds(p);
							for(var j=i+1;j<layer_3.length;j++){
								p2 = layer_3[j];
								distance(p,p2,w*1.5);
							}

						}
						for(i=0;i<layer_2.length;i++){
							var p = layer_2[i];
							p.draw();
							update(p);
							checkBounds(p);
							for(var j=i+1;j<layer_3.length;j++){
								p2 = layer_3[j];
								distance(p,p2);
							}
						}
						for(i=0;i<layer_3.length;i++){
							var p = layer_3[i];
							p.draw();
							update(p);
							checkBounds(p);
							for(var j=i+1;j<layer_3.length;j++){
								p2 = layer_3[j];
								distance(p,p2);
							}
						}
					}
					function update(p){
						p.x = p.x - mouse.x/p.offset;
						p.y = p.y - mouse.y/p.offset;
					}
					function checkBounds(p){
						if(p.x > w  ){
							p.x =0;
						}
						else if(p.x < 0){
							p.x =w;
						}
						if(p.y > h){
							p.y =0;
						}
						else if(p.y < 0){
							p.y = h;
						}
					}

					var minDist = w*0.7;

					function distance(p1,p2){
						var dist;
						var dx = p1.x - p2.x;
						var dy = p1.y - p2.y;
						dist = Math.sqrt(dx*dx + dy*dy);

						if (dist <= minDist){
							ctx.beginPath();
							ctx.strokeStyle = "rgba(255,255,255,"+ (0.2-dist/minDist) +")";
							ctx.moveTo(p1.x, p1.y);
							ctx.lineTo(p2.x, p2.y);
							ctx.stroke();
							ctx.closePath();
						}
					}

					var mouse ={
						x:0,
						y:0
					}

					document.addEventListener('mousemove', function(e){
						mouse.x = e.clientX  -w/2|| e.pageX -w/2;
						mouse.y = e.clientY -h/2|| e.pageY -h/2;
					}, false);

					function animate(){
						paintCanvas();
						draw();
						requestAnimationFrame(animate);
					}
					// setInterval(function(){
					// 	paintCanvas();
					// 	draw();
					// },30);
					animate();
				});

			</script>

			<div class = "container intro">


					<div class = "navbar_container">


						<nav class="navbar  space">
							<div class="container-fluid">

								<div class="navbar-header">
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
										<a class="navbar-brand logo" href="#" style = "height:40px"></a> Menu
									</button>
									<a class="navbar-brand" href="#"> </a>
								</div>


								<div class="collapse navbar-collapse" id="myNavbar">
									<a class="navbar-brand logo" href="#" style = "height:40px"></a>
									<ul class="nav navbar-nav">
										<li role="presentation" class="active center" style = "margin-left:20px"><a href="#">HOW WE WORK</a></li>
										{{--<li role="presentation" class="center"><a href="#">HIRE</a></li>--}}
										{{--<li role="presentation" class="center"><a href="#"></a></li>--}}
										<li role="presentation" class="center"><a href="#">TALENT DEVELOPMENT</a></li>


										<li role="presentation" class= "companyLogin"><a href={{url('/lazy')}} class = "box">POST PROJECT</a></li>
										<li class = "sep">
										<li role="presentation" class = "studentLogin"><a href={{url('/login')}} class = "box">BECOME TOP TALENT</a></li>

									</ul>
								</div>
					</div>
					</nav>
				</div>
				<div class = "row">
					<div class = "col-xs-12 text"style = "margin-top:10%">
						<h1 class ="h1-black">
							Explore your passion by working on it
						</h1>
						<h3 class = "h3-black" style = "margin-bottom:4%">
							Develop your potential by your passion and our techology
						</h3>
					</div>
				</div>
				<div class="row center col-lg-8 col-lg-offset-4 text-center">

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}" id="loginform">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class = "col-xs-8 col-xs-offset-2 col-md-8 col-md-offset-2 col-lg-4 col-lg-offset-0  " style=" ">
							<input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email"
								   autofocus=""
								   style="height:50px; background-color: transparent;">
						</div>


						<div class="col-xs-8 col-xs-offset-2 col-md-8 col-md-offset-2 col-lg-1 col-lg-offset-0" style="text-align: center; ">
							<a href={{url('auth/register/student')}} class="btn btt btn-primary btn-block" style="min-height: 50px;min-width:100px; background-color: transparent;float:left; font-family:'Roboto'">Sign Up</></a>
						</div>

					</form>

					<div class="clear"></div>
				</div>
				<div class="clear"></div>




			</div>

			<section class = "center content" style = "border-bottom:solid 1px #eee">
				<h1 class ="h1-black-solid">Stop finding Job, Let Job find You!</h1>
				<p class = "subtitle">
					Polish your skill by working on real project, and be ready career path
					for you <a>Learn More About This</a>
				</p>
				<div class="container">
					<div class = "row"  >
						<!-- arrow -->
					</div>
					<div class="row">
						<div class = "col-lg-12" style = "margin-top:5%;/*height:800px*/;">

							<div class = "col-lg-3   col-xs-12 hiden" style = "  ">
								<img src = "img/Target.png">
								<h3>Job Fitting</h3>
								<p>
									Your will be assign the project based on your current level. With done of any project your performance will be directly calculated and send to related position.
								</p>
							</div>

							<div class = "col-lg-4 col-lg-offset-1 col-xs-12 hiden" style = " ">
								<img src = "img/resumes.png">
								<h3>Resume Building</h3>
								<p>
									The project you worked will aquatically assembling a data-driven resume in both electric and print version.
								</p>
							</div>

							<div class = "col-lg-3 col-lg-offset-1 col-xs-12 hiden" style = " ">
								<img src = "img/Mentorship.png">
								<h3>Mentorship</h3>
								<p>
									Experienced project manager will response to track the project process and assent you on your study! Reference letter available for your great work!
								</p>
							</div>


						</div>
					</div>
					<div class="row" style = "margin-top:5%">
						<div class = "col-lg-12" >

							<div class="col-xs-8 col-lg-8 frame">
								<div class = "col-xs-10 col-xs-offset-1 col-lg-10 ">
									<div id="drawcanvas" class="screen">&nbsp;</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</section>



			<section class = "content">

				<div>

					<div style = "min-height:300px;padding-top:3%">


						<div class = "col-xs-12 col-lg-12">
							<h1 class = "bigfont">
								JOIN US NOW
							</h1>

							<p style = "color:grey;text-align:center">
								Our First project will lunched on Dec 13. Become our early member and start the journal with
								us.
							</p>

							<a class = "start"><h3>Click Start</h3></a>

						</div>
					</div>
				</div>


			</section>
			<footer>
				<small style = "font-size: 15px;">©2015 by Shokse</small>
				<img src = "img/wheelbarrow.png" style = "height: 40px;margin-left: 30%;">
				<small style = "font-size: 15px;margin-left:1%">The Website is on construction</small>
			</footer>
		</div>
		<div class = "  center"  >
			<div class="arrow-down"  ></div>
		</div>
	</div>
	<script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
</body>
</html>