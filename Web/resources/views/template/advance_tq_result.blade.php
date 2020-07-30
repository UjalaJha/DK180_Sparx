

@include('includes/header')
@include('includes/sidebar')


<head>
    <link href="../bi_assets/vendor/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">
    <link rel="stylesheet" href="../bi_assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="../bi_assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="../bi_assets/vendor/charts/morris-bundle/morris.css">
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
   <!-- <link rel="stylesheet" href="../bi_assets/libs/css/style.css"/> -->
</head>

<body class="">
  <div class="wrapper ">

    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo"><b>Student Performance</b></a>
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

              <p id="iq_test_score"> </p>
              <h3 class="card-title">Congratulations</h3>
              <p class="card-category">Your test score is</p>
            </div>
            <input type="hidden" id="score_id" value="{{$score}}">
            <div class="card-body">
              <ul>
                <br>
                <li><h4>Your Score : {{$score}} </h4></li>
                 <li><h4>Number of questions in each section : 20.</h4></li>
                 <li><h4>Number of questions in each section {{$level}}.</h4></li>
              </ul>
              



              <h4 style="margin-left:40px;"><b><i></i></b></h4>
              <a href="/next_tq_test">
                <button style="margin-left:30px;" type="submit" class="btn btn-primary">Start Your Next  Test Now!!</button>
              </a>
            </div>

              <div class="row">

                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header" style="font-weight: bold">Performance in TQ</h5>
                                <div class="card-body">
                                    <div id="morris_gross" style="height: 272px;"></div>
                                </div>
                                <div class="container" style="margin-left: 50px;">
                                    <p>Correct Answers <span class="text-dark">:&nbsp; <b>{{$score}}</b></span></p>
                                    <p>Incorrect Answers<span class="text-dark"> :&nbsp; {{10-$score}}</span>
                                  
                                </div>
                            </div>
                        </div>
            </div>


          </div>
        </div>

      </div>
    </div>

  </div>





 
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="../assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="../assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="../assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->

  <script>
      $.getJSON('https://jobs.github.com/positions.json', function(data) {
          $.each(data, function(index) {
              // alert(data[index].TEST1);
              console.log(data[index].url);
              var html='';
              html=html+'<div class="row align-items-start job-item border-bottom pb-3 mb-3 pt-3">'
              html=html+'<div class="col-md-2">'
              html=html+'  <a href="job-single.html"><img src="'+data[index].company_logo+'" alt="Image" class="img-fluid"></a>'
              html=html+'</div>'
              html=html+'<div class="col-md-4">'
              html=html+'  <span class="badge badge-warning px-2 py-1 mb-3">'+data[index].type+'</span>'
              html=html+'  <h2><a href="job-single.html">'+data[index].title+'</a> </h2>'
              html=html+'  <p class="meta">Publisher: <strong>'+data[index].company+'</strong> In: <strong>Design</strong></p>'
              html=html+'</div>'
              html=html+'<div class="col-md-3 text-left">'
              html=html+'  <h3>'+data[index].location+'</h3>'
              /*html=html+'  <span class="meta">United Kingdom</span>'*/
              html=html+'</div>'
              html=html+'<div class="col-md-3 text-md-right">'
              html=html+'  <strong class="text-black"><a href="'+data[index].url+'">'+data[index].url+'</a></strong>'
              html=html+'</div>'
              html=html+'</div>'
              $('.jobs').append(html);
          });
      });
  </script>







 <!-- <script src="../bi_assets/vendor/bootstrap/js/bootstrap.bundle.js"></script> -->
    <!-- slimscroll js -->
    <script src="../bi_assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- chart chartist js -->
    <script src="../bi_assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <script src="../bi_assets/vendor/charts/chartist-bundle/Chartistjs.js"></script>
    <script src="../bi_assets/vendor/charts/chartist-bundle/chartist-plugin-threshold.js"></script>
    <!-- chart C3 js -->
    <script src="../bi_assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="../bi_assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <!-- chartjs js -->
    <script src="../bi_assets/vendor/charts/charts-bundle/Chart.bundle.js"></script>
    <script src="../bi_assets/vendor/charts/charts-bundle/chartjs.js"></script>
    <!-- sparkline js -->
    <script src="../bi_assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- dashboard finance js -->
    <!-- <script src="../bi_assets/libs/js/dashboard-finance.js"></script> -->
    <!-- main js -->
    <script src="../bi_assets/libs/js/main-js.js"></script>
    <!-- gauge js -->
    <script src="../bi_assets/vendor/gauge/gauge.min.js"></script>
    <!-- morris js -->
    <script src="../bi_assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="../bi_assets/vendor/charts/morris-bundle/morris.js"></script>
    <script src="../bi_assets/vendor/charts/morris-bundle/morrisjs.html"></script>
    <!-- daterangepicker js -->
<!--     <script src="../../../../cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="../../../../cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script> -->













  <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--  Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="../assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="../assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="../assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
 
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>

  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
  
  <script type="text/javascript">
     /*
Template Name: Influence Admin Template
Author: jitu
Email: chauhanjitu3@gmail.com
File: js
*/
$(function() {
    "use strict";
    var score=document.getElementById("score_id").value;
    var score_percent=score*5;

    // alert(score);
    // var iq_score=localStorage.getItem('iq_score');
    // iq_score=iq_score* 3.3;
    // var percentage_iq_score=iq_score.toFixed(1);
    // var wrong_per=100-iq_score;
    // wrong_per=wrong_per.toFixed(1);
    // // alert(percentage_iq_score);
    // var score=document.getElementById("score_id").value();

   Morris.Donut({
                element: 'morris_gross',

                data: [
                    { value: score_percent, label: 'Score' },
                    { value: 100-score_percent, label: 'Lost' }
                   
                ],
             
                labelColor: '#5969ff',

                colors: [
                    '#5969ff',
                    '#FF0000'
                   
                ],

                formatter: function(x) { return x + "%" },
                  resize: true

            });

    // ============================================================== 
    // Net Profit Margin
    // ============================================================== 
    var x=90;
    
    Morris.Donut({
                element: 'morris_profit',
            
                data: [
                    { value: percentage_iq_score, label: 'Eligible' },
                    { value: 15, label: '' }
                   
                ],
             
                labelColor: '#ff407b',


                colors: [
                    '#ff407b',
                    '#ffd5e1'
                   
                ],

                formatter: function(x) { return x + "%" },
                  resize: true

            });




    // ============================================================== 
    //EBIT Morris
    // ============================================================== 

    Morris.Bar({
        element: 'ebit_morris',
        
        data: [
            { x: 'SA', y: 20 },
            { x: 'SC', y: 25 },
            { x: 'SOA', y: -40 },
            { x: 'IL', y: -40 },
            { x: 'OA', y: -25 },
            { x: 'P', y: 30 },
            { x: 'A', y: 50 },
            { x: 'E', y: -50 },
            { x: 'AO', y: -17 },
            { x: 'H', y: -20 },
            { x: 'CM', y: 35 },


        ],
        xkey: 'x',
        ykeys: ['y'],
        labels: ['Y'],
        /*barColors: ['lightblue','blue','green'],*/
        barColors: function (row, series, type) {
            console.log("--> "+row.label, series, type);
            if(row.label == "SA") return "#AD1D28";
            else if(row.label == "SC") return "#DEBB27";
            else if(row.label == "SOA") return "#fec04c";
            else if(row.label == "IL") return "#1AB244";
            else if(row.label == "OA") return "#ff407b";
            else if(row.label == "P") return "#25d5f2";
            else if(row.label == "A") return "#5969ff";
            else if(row.label == "E") return "lightpink";
            else if(row.label == "AO") return "lightblue";
            else if(row.label == "H") return "orange";
            else if(row.label == "CM") return "maroon";

        },
        preUnits: [""]

    });





    // ============================================================== 
    //EBIT Morris
    // ============================================================== 
   /* var a = c3.generate({
        bindto: "#goodservice",
        size: { height: 350 },
        color: { pattern: ["#5969ff"] },
        data: {
            columns: [
                ["Service", 20000, 25000, 30000, 80000, 10000, 50000],
                
            ],
            types: { Service: "bar" }
        },
        bar: {

            width: 45

        },
        
        axis: {
            y: {
                tick: {
                    format: d3.format("$")
                }
            }

        },

    });*/



    // ============================================================== 
    // Disputed vs Overdue Invoices
    // ============================================================== 
    /*var data = {
        labels: ['Disputed Invoice', 'Overdue Invoice'],
        series: [20, 15]
    };

    var options = {
        labelInterpolationFnc: function(value) {
            return value[0]
        }
    };

    var responsiveOptions = [
        ['screen and (min-width: 640px)', {
            chartPadding: 30,
            labelOffset: 100,
            labelDirection: 'explode',
            labelInterpolationFnc: function(value) {
                return value;
            }
        }],
        ['screen and (min-width: 1024px)', {
            labelOffset: 80,
            chartPadding: 20
        }]
    ];

    new Chartist.Pie('.ct-chart-invoice', data, options, responsiveOptions);*/


    // ============================================================== 
    // Disputed vs Overdue Invoices
    // ============================================================== 

    /*new Chartist.Line('.ct-chart-line-invoice', {
        labels: ['Jan 2018', 'Mar 2018', 'May 2018', 'Jul 2018', 'Sep 2018', 'Oct 2018', 'Nov 2018'],
        series: [
            [12, 8, 6, 7, 3, 2.5, 7, 8],
            [7, 7, 7, 7, 7, 7, 7, 7]

        ]
    }, {
        fullWidth: true,
        chartPadding: {
            right: 40
        },
        axisY: {
            labelInterpolationFnc: function(value) {
                return '$'+ (value / 1000);
            }
        },


    });*/



    // ============================================================== 
    // Accounts Payable Age
    // ============================================================== 

    /*var chart = c3.generate({
        bindto: "#account",
        color: { pattern: ["#5969ff", "#ff407b", "#25d5f2", "#ffc750"] },
        data: {
            // iris data from R
            columns: [
                ['30 days', 120],
                ['60 days', 70],
                ['90 days', 50],
                 ['90+ Days', 30],

            ],
            type: 'pie',
            
        }
    });

    setTimeout(function() {
        chart.load({
            
        });
    }, 1500);

    setTimeout(function() {
        chart.unload({
            ids: 'data1'
        });
        chart.unload({
            ids: 'data2'
        });
    }, 
    2500
    );*/

    // ============================================================== 
    // Working Capital
    // ============================================================== 

    // // Use Morris.Area instead of Morris.Line
    /*Morris.Area({
        element: 'capital',
        behaveLikeLine: true,



        data: [
            { x: '2010 Q1', y: 20000 },
            { x: '2010 Q2', y: 24000 },
            { x: '2010 Q3', y: 33000 },
            { x: '2010 Q4', y: 40000 },
            { x: '2011 Q1', y: 25000 },
            { x: '2011 Q2', y: 70000 },
            { x: '2011 Q3', y: 52000 },
            { x: '2012 Q1', y: 39000 },
            { x: '2012 Q2', y: 80000 }
        ],
        xkey: 'x',
        ykeys: ['y'],
        labels: ['Y'],
        lineColors: ['#ff407b'],
        preUnits: ["$"]



    });*/
   
    // ============================================================== 
    // Working Capital
    // ============================================================== 
    /*new Chartist.Bar('.ct-chart-inventory', {
        labels: ['Q1', 'Q2', 'Q3', 'Q4'],
        series: [
            [800000, 1200000, 1400000, 1300000],
            [200000, 400000, 500000, 300000],
            [100000, 200000, 400000, 600000]
        ]
    }, {
        stackBars: true,
        axisY: {
            labelInterpolationFnc: function(value) {
                return  '$' + (value / 1000);
            }
        }
    }).on('draw', function(data) {
        if (data.type === 'bar') {
            data.element.attr({
                style: 'stroke-width: 30px'
            });
        }
    });*/


    // Total Sale
    // ============================================================== 
 var ctx = document.getElementById("total-sale").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                
                data: {
                    labels: ["Java", " Python", "Machine Learning","C"],
                    datasets: [{
                        backgroundColor: [
                            "#5969ff",
                            "#ff407b",
                            "#25d5f2",
                            "#ffc750"
                        ],
                        data: [20, 15, 12,30]
                    }]
                },
                options: {
                    legend: {
                        display: false

                    }
                }

            });
     


});


  </script>
  <script>
(function(window, document, $, undefined) {
    "use strict";
    $(function() {

        if ($('.ct-chart-line').length) {
            new Chartist.Line('.ct-chart-line', {
                labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                series: [
                    [12, 9, 7, 8, 5],
                    [2, 1, 3.5, 7, 3],
                    [1, 3, 4, 5, 6]
                ]
            }, {
                fullWidth: true,
                chartPadding: {
                    right: 40
                },
                axisY: {
                    
                }
            });

        }


        if ($('.ct-chart-holes').length) {
            var chart = new Chartist.Line('.ct-chart-holes', {
                labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16],
                series: [
                    [5, 5, 10, 8, 7, 5, 4, null, null, null, 10, 10, 7, 8, 6, 9],
                    [10, 15, null, 12, null, 10, 12, 15, null, null, 12, null, 14, null, null, null],
                    [null, null, null, null, 3, 4, 1, 3, 4, 6, 7, 9, 5, null, null, null],
                    [{ x: 3, y: 3 }, { x: 4, y: 3 }, { x: 5, y: undefined }, { x: 6, y: 4 }, { x: 7, y: null }, { x: 8, y: 4 }, { x: 9, y: 4 }]
                ]

            }, {
                fullWidth: true,


                chartPadding: {
                    right: 10
                },
                axisY: {
                  
                },

                low: 0

            });
        }

        if ($('.ct-chart-wnumbers').length) {
            new Chartist.Line('.ct-chart-wnumbers', {
                labels: [1, 2, 3, 4, 5, 6, 7, 8],
                series: [
                    [1, 2, 3, 1, -2, 0, 1, 0],
                    [-2, -1, -2, -1, -3, -1, -2, -1],
                    [0, 0, 0, 1, 2, 3, 2, 1],
                    [3, 2, 1, 0.5, 1, 0, -1, -3]
                ]
            }, {
                high: 3,
                low: -3,
                fullWidth: true,
                // As this is axis specific we need to tell Chartist to use whole numbers only on the concerned axis
                axisY: {
                    onlyInteger: true,
                    offset: 20,
                    
                },

            });
        }


        if ($('.ct-chart-scatter').length) {
            var times = function(n) {
                return Array.apply(null, new Array(n));
            };

            var data = times(52).map(Math.random).reduce(function(data, rnd, index) {
                data.labels.push(index + 1);
                data.series.forEach(function(series) {
                    series.push(Math.random() * 100)
                });

                return data;
            }, {
                labels: [],
                series: times(4).map(function() { return new Array() })
            });

            var options = {
                showLine: false,
                axisX: {
                    labelInterpolationFnc: function(value, index) {
                        return index % 13 === 0 ? 'W' + value : null;
                    }
                },
                axisY: {
                    labelInterpolationFnc: function(value) {
                        return '$' + (value / 1000);
                    }
                }

            };

            var responsiveOptions = [
                ['screen and (min-width: 640px)', {
                    axisX: {
                        labelInterpolationFnc: function(value, index) {
                            return index % 4 === 0 ? 'W' + value : null;
                        }
                    }

                }]
            ];

            new Chartist.Line('.ct-chart-scatter', data, options, responsiveOptions);
        }


        if ($('.ct-chart-area').length) {
            new Chartist.Line('.ct-chart-area', {
                    labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
                    series: [
                        [5, 9, 7, 8, 5, 3, 5, 4, 10, 4]
                    ]
                },


                {
                    low: 0,
                    showArea: true,
                    
                });
        }


        if ($('.ct-chart-polar').length) {
            new Chartist.Line('.ct-chart-polar', {
                labels: [1, 2, 3, 4, 5, 6, 7, 8],
                series: [
                    [1, 2, 3, 1, -2, 0, 1, 0],
                    [-2, -1, -2, -1, -2.5, -1, -2, -1],
                    [0, 0, 0, 1, 2, 2.5, 2, 1],
                    [2.5, 2, 1, 0.5, 1, 0.5, -1, -2.5]
                ]
            }, {
                high: 3,
                low: -3,
                showArea: true,
                showLine: false,
                showPoint: false,
                fullWidth: true,
                axisX: {
                    showLabel: false,
                    showGrid: false
                },
               
            });
        }

        if ($('.ct-chart-scatter-bar').length) {
            new Chartist.Bar('.ct-chart-scatter-bar', {
                labels: ['Q1', 'Q2', 'Q3', 'Q4'],
                series: [
                    [800000, 1200000, 1400000, 1300000],
                    [200000, 400000, 500000, 300000],
                    [100000, 200000, 400000, 600000]
                ]
            }, {
                stackBars: true,
                axisY: {
                    
                }
            }).on('draw', function(data) {
                if (data.type === 'bar') {
                    data.element.attr({
                        style: 'stroke-width: 30px'
                    });
                }
            });
        }

        if ($('.ct-chart-multilines').length) {
            new Chartist.Bar('.ct-chart-multilines', {
                labels: ['First quarter of the year', 'Second quarter of the year', 'Third quarter of the year', 'Fourth quarter of the year'],
                series: [
                    [60000, 40000, 80000, 70000],
                    [40000, 30000, 70000, 65000],
                    [8000, 3000, 10000, 6000]
                ]
            }, {
                seriesBarDistance: 10,
                axisX: {
                    offset: 60
                },
                axisY: {
                    offset: 80,
                    labelInterpolationFnc: function(value) {
                        return value + ' CHF'
                    },
                    scaleMinSpace: 15
                }
            });
        }

        if ($('.ct-chart-bipolar').length) {
            var data = {
                labels: ['W1', 'W2', 'W3', 'W4', 'W5', 'W6', 'W7', 'W8', 'W9', 'W10'],
                series: [
                    [1, 2, 4, 8, 6, -2, -1, -4, -6, -2]
                ]
            };

            var options = {
                high: 10,
                low: -10,
                axisX: {
                    labelInterpolationFnc: function(value, index) {
                        return index % 2 === 0 ? value : null;
                    }
                },
                axisY: {
                    
                }
            };

            new Chartist.Bar('.ct-chart-bipolar', data, options);
        }

        if ($('.ct-chart-events').length) {
            // Create a simple bi-polar bar chart
            var chart = new Chartist.Bar('.ct-chart-events', {
                labels: ['W1', 'W2', 'W3', 'W4', 'W5', 'W6', 'W7', 'W8', 'W9', 'W10'],
                series: [
                    [1, 2, 4, 8, 6, -2, -1, -4, -6, -2]
                ]
            }, {
                high: 10,
                low: -10,
                axisX: {
                    labelInterpolationFnc: function(value, index) {
                        return index % 2 === 0 ? value : null;
                    }
                },
                axisY: {
                    
                }
            });

            // Listen for draw events on the bar chart
            chart.on('draw', function(data) {
                // If this draw event is of type bar we can use the data to create additional content
                if (data.type === 'bar') {
                    // We use the group element of the current series to append a simple circle with the bar peek coordinates and a circle radius that is depending on the value
                    data.group.append(new Chartist.Svg('circle', {
                        cx: data.x2,
                        cy: data.y2,
                        r: Math.abs(Chartist.getMultiValue(data.value)) * 1 + 7
                    }, 'ct-slice-pie'));
                }
            });
        }

        if ($('.ct-chart-pie').length) {
            var data = {
                series: [5, 3, 4]
            };

            var sum = function(a, b) { return a + b };

            new Chartist.Pie('.ct-chart-pie', data, {
                labelInterpolationFnc: function(value) {
                    return Math.round(value / data.series.reduce(sum) * 100) + '%';
                }
            });
        }


        if ($('.ct-chart-donut').length) {
            new Chartist.Pie('.ct-chart-donut', {
                series: [20, 10, 30, 40]
            }, {
                donut: true,
                donutWidth: 60,
                donutSolid: true,
                startAngle: 270,
                showLabel: true
            });
        }


        if ($('.ct-chart-animated').length) {
            var chart = new Chartist.Pie('.ct-chart-animated', {
                    series: [50, 20, 30, 20, 5, 20, 15],
                    labels: [1, 2, 3, 4, 5, 6, 7]
                },


                {
                    donut: true,
                    showLabel: false



                });

            chart.on('draw', function(data) {
                if (data.type === 'slice') {
                    // Get the total path length in order to use for dash array animation
                    var pathLength = data.element._node.getTotalLength();

                    // Set a dasharray that matches the path length as prerequisite to animate dashoffset
                    data.element.attr({
                        'stroke-dasharray': pathLength + 'px ' + pathLength + 'px'
                    });

                    // Create animation definition while also assigning an ID to the animation for later sync usage
                    var animationDefinition = {
                        'stroke-dashoffset': {
                            id: 'anim' + data.index,
                            dur: 1000,
                            from: -pathLength + 'px',
                            to: '0px',
                            easing: Chartist.Svg.Easing.easeOutQuint,
                            // We need to use `fill: 'freeze'` otherwise our animation will fall back to initial (not visible)
                            fill: 'freeze'
                        }
                    };

                    // If this was not the first slice, we need to time the animation so that it uses the end sync event of the previous animation
                    if (data.index !== 0) {
                        animationDefinition['stroke-dashoffset'].begin = 'anim' + (data.index - 1) + '.end';
                    }

                    // We need to set an initial value before the animation starts as we are not in guided mode which would do that for us
                    data.element.attr({
                        'stroke-dashoffset': -pathLength + 'px'
                    });

                    // We can't use guided mode as the animations need to rely on setting begin manually
                    // See http://gionkunz.github.io/chartist-js/api-documentation.html#chartistsvg-function-animate
                    data.element.animate(animationDefinition, false);
                }
            });

            // For the sake of the example we update the chart every time it's created with a delay of 8 seconds
            chart.on('created', function() {
                if (window.__anim21278907124) {
                    clearTimeout(window.__anim21278907124);
                    window.__anim21278907124 = null;
                }
                window.__anim21278907124 = setTimeout(chart.update.bind(chart), 10000);
            });
        }


        if ($('.ct-chart-animation').length) {
            var chart = new Chartist.Line('.ct-chart-animation', {
                labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
                series: [
                    [12, 9, 7, 8, 5, 4, 6, 2, 3, 3, 4, 6],
                    [4, 5, 3, 7, 3, 5, 5, 3, 4, 4, 5, 5],
                    [5, 3, 4, 5, 6, 3, 3, 4, 5, 6, 3, 4],
                    [3, 4, 5, 6, 7, 6, 4, 5, 6, 7, 6, 3]
                ]
            }, {
                low: 0
            });

            // Let's put a sequence number aside so we can use it in the event callbacks
            var seq = 0,
                delays = 80,
                durations = 500;

            // Once the chart is fully created we reset the sequence
            chart.on('created', function() {
                seq = 0;
            });

            // On each drawn element by Chartist we use the Chartist.Svg API to trigger SMIL animations
            chart.on('draw', function(data) {
                seq++;

                if (data.type === 'line') {
                    // If the drawn element is a line we do a simple opacity fade in. This could also be achieved using CSS3 animations.
                    data.element.animate({
                        opacity: {
                            // The delay when we like to start the animation
                            begin: seq * delays + 1000,
                            // Duration of the animation
                            dur: durations,
                            // The value where the animation should start
                            from: 0,
                            // The value where it should end
                            to: 1
                        }
                    });
                } else if (data.type === 'label' && data.axis === 'x') {
                    data.element.animate({
                        y: {
                            begin: seq * delays,
                            dur: durations,
                            from: data.y + 100,
                            to: data.y,
                            // We can specify an easing function from Chartist.Svg.Easing
                            easing: 'easeOutQuart'
                        }
                    });
                } else if (data.type === 'label' && data.axis === 'y') {
                    data.element.animate({
                        x: {
                            begin: seq * delays,
                            dur: durations,
                            from: data.x - 100,
                            to: data.x,
                            easing: 'easeOutQuart'
                        }
                    });
                } else if (data.type === 'point') {
                    data.element.animate({
                        x1: {
                            begin: seq * delays,
                            dur: durations,
                            from: data.x - 10,
                            to: data.x,
                            easing: 'easeOutQuart'
                        },
                        x2: {
                            begin: seq * delays,
                            dur: durations,
                            from: data.x - 10,
                            to: data.x,
                            easing: 'easeOutQuart'
                        },
                        opacity: {
                            begin: seq * delays,
                            dur: durations,
                            from: 0,
                            to: 1,
                            easing: 'easeOutQuart'
                        }
                    });
                } else if (data.type === 'grid') {
                    // Using data.axis we get x or y which we can use to construct our animation definition objects
                    var pos1Animation = {
                        begin: seq * delays,
                        dur: durations,
                        from: data[data.axis.units.pos + '1'] - 30,
                        to: data[data.axis.units.pos + '1'],
                        easing: 'easeOutQuart'
                    };

                    var pos2Animation = {
                        begin: seq * delays,
                        dur: durations,
                        from: data[data.axis.units.pos + '2'] - 100,
                        to: data[data.axis.units.pos + '2'],
                        easing: 'easeOutQuart'
                    };

                    var animations = {};
                    animations[data.axis.units.pos + '1'] = pos1Animation;
                    animations[data.axis.units.pos + '2'] = pos2Animation;
                    animations['opacity'] = {
                        begin: seq * delays,
                        dur: durations,
                        from: 0,
                        to: 1,
                        easing: 'easeOutQuart'
                    };

                    data.element.animate(animations);
                }
            });

            // For the sake of the example we update the chart every time it's created with a delay of 10 seconds
            chart.on('created', function() {
                if (window.__exampleAnimateTimeout) {
                    clearTimeout(window.__exampleAnimateTimeout);
                    window.__exampleAnimateTimeout = null;
                }
                window.__exampleAnimateTimeout = setTimeout(chart.update.bind(chart), 12000);
            });



        }

        if ($('.ct-chart-horizontal').length) {
            new Chartist.Bar('.ct-chart-horizontal', {
                labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                series: [
                    [5, 4, 3, 7, 5, 10, 3],
                    [3, 2, 9, 5, 4, 6, 4]
                ]
            }, {
                seriesBarDistance: 10,
                reverseData: true,
                horizontalBars: true,
                axisY: {
                    offset: 70
                }
            });

        }







    });

})(window, document, window.jQuery);
</script>
<script type="text/javascript">
  
</script>
</body>

</html>
