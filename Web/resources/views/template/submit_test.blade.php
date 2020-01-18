
@include('includes/header')
@include('includes/sidebar')

<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <a class="navbar-brand" href="#pablo">Dashboard</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end">
                <form class="navbar-form">
                    <div class="input-group no-border">
                        <input type="text" value="" class="form-control" placeholder="Search...">
                        <button type="submit" class="btn btn-white btn-round btn-just-icon">
                            <i class="material-icons">search</i>
                            <div class="ripple-container"></div>
                        </button>
                    </div>
                </form>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#pablo">
                            <i class="material-icons">dashboard</i>
                            <p class="d-lg-none d-md-block">
                                Stats
                            </p>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">notifications</i>
                            <span class="notification">5</span>
                            <p class="d-lg-none d-md-block">
                                Some Actions
                            </p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Mike John responded to your email</a>
                            <a class="dropdown-item" href="#">You have 5 new tasks</a>
                            <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                            <a class="dropdown-item" href="#">Another Notification</a>
                            <a class="dropdown-item" href="#">Another One</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">person</i>
                            <p class="d-lg-none d-md-block">
                                Account
                            </p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                            <a class="dropdown-item" href="#">Profile</a>
                            <a class="dropdown-item" href="#">Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Log out</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">

{{--                            <p id="iq_test_score"> </p>--}}
                            <h3 class="card-title">Submit your Test Scores</h3>
                            <p class="card-category">Read the below guidelines properly.</p>
                        </div>
                        <div class="card-body">

                            <!-- <h4></h4> --><br>

                                <ul>
                    <br>
                    <h1>Thank You</h1>
                    <h4>Your Test Ends Here</h4>
                   <h4>Get your Results</h4>
                    <h4>We will recommend you the best job</h4>
<!--
                    
                    <li><h4>Total Time to complete the test : 1 hr 20 minutes.</h4></li>
                    <li><h4>Each question carry 1 mark, no negative marks.</h4></li>
                    <li><h4>DO NOT Referesh the page.</h4></li>
                    <li><h4>DO NOT Switch between sections.</h4></li>
                    <li><h4>DO NOT Switch tabs.</h4></li>
-->
                   <!--  <li><h4>Number of questions in each section : 30.</h4></li>
                    <li><h4>Number of questions in each section : 30.</h4></li> -->
                  </ul>
                            
                            

                            <form method="post" action="/save_scores">
                                @csrf
                                <input type="hidden" id="iq_score" name="iq_score">

                                <input type="hidden" id="self_awareness" name="self_awareness">
                                <input type="hidden" id="self_control" name="self_control">
                                <input type="hidden" id="achievement_orientation" name="achievement_orientation">
                                <input type="hidden" id="positive_outlook" name="positive_outlook">
                                <input type="hidden" id="inspirational_leadership" name="inspirational_leadership">
                                <input type="hidden" id="social_awareness" name="social_awareness">

                                <input type="hidden" id="persistence" name="persistence">
                                <input type="hidden" id="boldness" name="boldness">
                                <input type="hidden" id="complexity" name="complexity">
                                <input type="hidden" id="abstraction" name="abstraction">
                                <input type="hidden" id="curiosity" name="curiosity">


{{--                                <a href="/">--}}
                                    <button style="margin-left:30px;" type="submit" class="btn btn-primary">Submit</button>
{{--                                </a>--}}



                            </form>





                            <p>



                            </p>

                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>

    @include('includes/footer')


    <script>

        document.getElementById("iq_score").value=localStorage.getItem('iq_score');

        document.getElementById("self_awareness").value=localStorage.getItem('self awareness');
        document.getElementById("self_control").value=localStorage.getItem('self control');
        document.getElementById("achievement_orientation").value=localStorage.getItem('achievement orientation');
        document.getElementById("positive_outlook").value=localStorage.getItem('positive outlook');
        document.getElementById("inspirational_leadership").value=localStorage.getItem('inspirational leadership');
        document.getElementById("social_awareness").value=localStorage.getItem('social awareness');

        document.getElementById("persistence").value=localStorage.getItem('persistence');
        document.getElementById("boldness").value=localStorage.getItem('boldness');
        document.getElementById("complexity").value=localStorage.getItem('complexity');
        document.getElementById("abstraction").value=localStorage.getItem('abstraction');
        document.getElementById("curiosity").value=localStorage.getItem('curiosity');


    </script>
