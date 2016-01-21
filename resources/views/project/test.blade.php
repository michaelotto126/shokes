<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
    <head>
    
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Shokes-Project</title>
		<link href="{{ asset('css/project.css') }}" rel="stylesheet">
        <link href="http://getbootstrap.com/dist/css/bootstrap.css" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc2/css/bootstrap-glyphicons.css" rel="stylesheet">


        <!-- Fonts -->
        <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

        <script src="{{ asset('js/project.js') }}"></script>


        @yield('addheader')



        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
    </head>

    	<body>
        @include('project.sidebar')

    		<div class = "container">
    			<div class = "row">

					<div class = "sidebar">
						<img src="{{asset('img/helloworld.png')}}" class = "side-img">
					</div>

					<div class = "col-md-offset-3 col-md-7">
                        <div style = "margin-top:2%;height: 200px;"">

                            <ul class="nav nav-tabs">
                                <li role="presentation" class="active"><a href="#">Home</a></li>
                                <li role="presentation"><a href="#">Profile</a></li>
                                <li role="presentation"><a href="#">Messages</a></li>

                            </ul>


                            <form class="navbar-form navbar-right" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                                <button type="submit" class="btn btn-default">Submit</button>
                            </form>

                        </div>

                        <div class ="article-list">
                            <ul class ="thumbnails">


                                <article class="featured">
                                    <a href="#">
                                        <time>March 22, 2015</time>
                                        <span class="comments-indicator" title="8 comments">8 <span class="visuallyhidden">Comments</span></span>
                                        <h1>Morbi in sem quis dui placerat&nbsp;ornar</h1>
                                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                                    </a>
                                </article>
                                <article>
                                    <a href="#">
                                        <time>April 21, 2015</time>
                                        <h1>Praesent dapibus, neque id cursus faucibus</h1>
                                    </a>
                                </article>
                                <article>
                                    <a href="#">
                                        <time>May 4, 2015</time>
                                        <span class="comments-indicator" title="49 comments">49 <span class="visuallyhidden">Comments</span></span>
                                        <h1>Quisque sit amet est et sapien </h1>
                                    </a>
                                </article>
                                <article>
                                    <a href="#">
                                        <time>June 11, 2015</time>
                                        <h1>Donec eu libero sit amet quam egestas semper </h1>
                                    </a>
                                </article>
                            </ul>

                        </div>


					</div>

                <div class = "col-md-2">
                    <div style = "margin-top:10%;">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Logout</a></li>
                    </ul>
                    </div>

                </div>

    			</div>
    		</div>	
    	</body>
</html>

