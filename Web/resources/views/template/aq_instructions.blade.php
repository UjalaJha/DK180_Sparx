
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

                            <p id="tq_test_score"> AQ</p>
                            <h3 class="card-title">Adversity Questions Test Instructions !!</h3>
                            <p class="card-category">Read the below guidelines properly.</p>
                        </div>
                        <div class="card-body">
                            <ul>
                                <br>
                                <li><h4>Total number of sections : 4 (Intelligent + Emotional + Technical + Adversity)</h4></li>
                                <li><h4>Total number of questions : 90 + Technical Section</h4></li>
                                <li><h4>Number of questions in each section : 30.</h4></li>
                                <li><h4>Time alloted for each section : 30 minutes.</h4></li>
                                <li><h4>Total Time to complete the test : 1 hr 20 minutes.</h4></li>
                                <li><h4>Each question carry 1 mark, no negative marks.</h4></li>
                                <li><h4>DO NOT Referesh the page.</h4></li>
                                <li><h4>DO NOT Switch between sections.</h4></li>
                                <li><h4>DO NOT Switch tabs.</h4></li>
                                <!--  <li><h4>Number of questions in each section : 30.</h4></li>
                                 <li><h4>Number of questions in each section : 30.</h4></li> -->
                            </ul>

                            <!-- <h4></h4> --><br>



                            <h4 style="margin-left:40px;"><b><i>All the best :-).</i></b></h4>
                            <a href="/aq">
                                <button style="margin-left:30px;" type="submit" class="btn btn-primary">Start Your Adversity Quotient Test Now!!</button>
                            </a>
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
        var tq_score_var = localStorage.getItem('tq_score');
        // alert(tq_score_var);
        document.getElementById("tq_test_score").innerHTML="TQ test score "+tq_score_var;

        // var iq_score=localStorage.getItem('iq_score');
        // document.getElementById.innerHTML=iq_score;
    </script>

    <script type="text/javascript">
        localStorage.setItem('aq_score',0);
        // localStorage.setItem('connection',0);
        localStorage.setItem('persistence',0);
        localStorage.setItem('boldness',0);
        localStorage.setItem('complexity',0);
        localStorage.setItem('abstraction',0);
        // localStorage.setItem('paradox',0);
        localStorage.setItem('curiosity',0);


    </script>
