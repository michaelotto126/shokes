@extends('app')

@section('addheader')
    <link href="{{ asset('css/xlab.css') }}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Raleway:200,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/bootstrap-flatly.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flex.css') }}" rel="stylesheet">


    <script type="text/javascript" src="{{asset('js/Chart.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/MultiLevelPieChart.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/Please.js') }}"></script>
@endsection

@section('content')

    <div class="container" style="margin-top:7%">
        
        <div class="row">
            <div class="col-md-4 ">
                <div class="card-container">
                    <div class="card">
                        <div class="front">
                            <h3 class="text-center">INTRODUCTION</h3>

                            <div class="center ImgContainer">
                                <img src="{{asset('img/flyer.png')}}">
                            </div>
                        </div>
                        <!-- end front panel -->
                        <div class="back">
                            {!! $project->description!!}
                        </div>
                        <!-- end back panel -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end card-container -->
            </div>
            <!-- end col md 4 -->

            <div class="col-md-4 ">
                <div class="card-container">
                    <div class="card">
                        <div class="front">
                            <h3 class="text-center">MISCROTASK</h3>

                            <div class="col-xs-6">
                                <h1 class="text-center" style="font-family:'Raleway';font-size:700%;font-weight:300" ;>
                                    {{$count}}
                                </h1>
                            </div>
                            <div class="col-xs-6" style="margin-top:15%;margin-left:-5%">
                                <p>Microtasks now available on this project</p>
                            </div>
                        </div>
                        <!-- end front panel -->
                        <div class="back">
                            <div class = 'slide'>
                                @foreach($tasks as $task)

                                <div id = {{$task->id}} style = "height:280px;display:none">
                                    <h3>{!!$task->name!!}</h3>
                                    <p>{!! $task ->description !!}</p>

                                </div>
                            @endforeach
                            </div>
                        </div>
                        <!-- end back panel -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end card-container -->
            </div>
            <!-- end col md 4 -->

            <div class="col-md-4 ">
                <div class="card-container">
<!--                     <div class="card">
 -->                        <div class="front">
                            <h3 class="text-center" style="margin-bottom:7%">WORKING SPACE</h3>

                            <div class="col-xs-5 col-xs-offset-1">
                                 <a href = "{{url("/project/compile")}}">
                                    <img src="{{asset('img/wege.png')}}">
                                </a>
                            </div>

                            <div class="col-xs-5" style="margin-top:4%; margin-left: 7%">
                                <p>C/C++</p>

                                <p>Java</p>

                                <p>Visual Studio</p>
                            </div>
                        </div>
                        <!-- end front panel -->
                        <div class="back">
                            {{$project->environment}}
                        </div>
                        <!-- end back panel -->
<!--                     </div>
 -->                    <!-- end card -->
                </div>
                <!-- end card-container -->
            </div>
            <!-- end col md 4 -->

            <div class="col-md-3 ">
                <div class="card-container" style="height: 140px;margin-bottom: 0px;">
<!--                     <div class="card">
 -->                        <div class="front">
                            <h3 class="text-center">USER MANAGER</h3>

                            <div class="center">
                                <img src="{{asset('img/People.png')}}">

                            </div>
                        </div>
                        <!-- end front panel -->
                        <div class="back">
                            <img src="{{asset('img/profile1.png')}}" style="height:80px; width:80px">
                            <img src="{{asset('img/profile2.png')}}" style="height:80px; width:80px">
                            <img src="{{asset('img/profile3.png')}}" style="height:80px; width:80px">

                        </div>
                        <!-- end back panel -->
<!--                     </div>
 -->                    <!-- end card -->
                </div>
                <!-- end card-container -->

                <div class="row">
                    <div class="col-xs-6 center" style="margin-top:2%; height:8em;padding-top:5%">

                        <div class="card-container" style="height: 140px;margin-bottom: 0px;">
                            <div class="card">
                                <div class="front">

                                    <img src="{{asset('img/Reward.png')}}">
                                </div>
                                <!-- end front panel -->

                                <div class="back">

                                    <h5>Award Startbucks Gift Card</h5>
                                </div>
                                <!-- end back panel -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end card-container -->
                    </div>

                    <div class="col-xs-6 center" style="margin-top:2%;height:8em;padding-top:5%">

                        <img src="{{asset('img/delete.png')}}">
                    </div>
                </div>

            </div>
            <!-- end col md 4 -->

            <div class="col-md-6">
                <div class="card-container">
                    <div class="card">
                        <div class="front">
                            <h3 class="text-center">PROJECT SCOPE</h3>

                            <div class="center col-md-6" style="margin-top:3%;">
                                <img src="{{asset('img/performence.png')}}">
                            </div>

                            <div class="center col-md-6" style="margin-top:3%;">
                                <img src="{{asset('img/Piechart.png')}}">
                            </div>
                        </div>
                        <!-- end front panel -->
                        <div class="back">
                            <div class="col-md-6">
                                <canvas id="demo" width="280" height="280" style="margin-top:-7%;"></canvas>
                            </div>
                            <div class="col-md-6">
                                <h4>Estimate Time</h4>
                                <ul>
                                    <li>Elementery Engineer: 15 Hour</li>
                                    <li>Sinior Engineer: 10 Hour</li>
                                </ul>
                                <h4>Project Distribution</h4>
                                <ul>
                                    <li>Back End: 5~10 Hour</li>
                                    <li>Front End: 10~20 Hour</li>
                                    <li>Debut: 5~ 10 Hour</li>
                                </ul>
                            </div>
                        </div>
                        <!-- end back panel -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end card-container -->
            </div>
            <!-- end col md 4 -->

            <div class="col-md-2">
                <div class="card-container">
                    <div class="card">
                        <div class="front">
                            <h3 class="text-center">START PROJECT</h3>

                            <div class="center">
                                <img src="{{asset('img/Download.png')}}">

                            </div>
                        </div>
                        <!-- end front panel -->
                        <div class="back center">
                            <div style="margin-top:35%">

                        {!! Form::open(array('url'=>'/project/update','method'=>'POST', 'files'=>true)) !!}
                                <h4>Upload File</h4>
                                <div class = "form-group">
                                    {!!Form::label('')!!}
                                    {!!Form::file('zip')!!}
                                </div>

                        {!! Form::submit('Submit', array('class'=>'send-btn')) !!}
                        {!! Form::close() !!}
                            </div>

                        </div>
                        <!-- end back panel -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end card-container -->
            </div>
            <!-- end col md 4 -->


        </div>

    </div>



    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

    <script type="text/javascript">

        var count = 1;
        $('.slide').click(function() {
            $(".slide #"+count).show('fade');

             $('.slide').click(function(){
                $(".slide #"+count).delay(1000).hide('slide');
            });
            
            if(count<{{$count}}){
            count +=1;
            };
            else{count=1};

            var tasks = {!! $tasks !!};

            document.getElementById('test').innerHTML = "{{$task->name}}";

        })


    </script>


        <script type="text/javascript">
        $().ready(function () {
            $('[rel="tooltip"]').tooltip();

            $('a.scroll-down').click(function (e) {
                e.preventDefault();
                scroll_target = $(this).data('href');
                $('html, body').animate({
                    scrollTop: $(scroll_target).offset().top - 60
                }, 1000);
            });

        });

        function rotateCard(btn) {
            var $card = $(btn).closest('.card-container');
            console.log($card);
            if ($card.hasClass('hover')) {
                $card.removeClass('hover');
            } else {
                $card.addClass('hover');
            }
        }


    </script>

    <script>
        (function () {
            var canvas = document.getElementById('demo'),
                    test = canvas.getContext('2d'),
                    config = {
                        responsive: true
                    };

            var tasks = {!! $tasks !!};

            var chart = [];

            for(i= 0;i<tasks.length; i++){
                var slides = {
                label:"",
                value:"",
                color:Please.make_color()[0],
                children:[]
            };
                slides.label = tasks[i].name;
                slides.value = tasks[i].estimateTime;
                slides.color = Please.make_color()[0];
                slides.sequence = i;
                chart.push(slides);
            }

            new Chart(test).MultiLevelPie(chart);

        }).call(this);

    </script>

@endsection