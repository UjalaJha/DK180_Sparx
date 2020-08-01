@include('includes/header')
@include('includes/sidebar')
  <style type="text/css">
    .card-header,
.card-footer {
    background-color: #fff !important
}



.badge {
    cursor: pointer
}

button {
    justify-content: center;
    border: none !important
}

/*a {
    color: black !important;
    text-decoration: none !important
}*/

.badge-outline {
    border: 1px solid #999;
    background-color: transparent
}

/*li {
    color: rgb(65, 65, 65);
    font-size: 20px
}*/

.hl {
    align-content: center;
    width: 25%
}

/*p {
    font-size: 15px !important
}*/

span {
    /*font-size: 18px !important*/
}

.badge {
    padding: 0.5em .4em !important;
    font-size: 13px !important
}

.badge-pill {
    padding-right: 0.8rem !important;
    padding-left: 0.8rem !important
}

.footer {
    /*font-size: 16px !important*/
}

img {
    opacity: 0.8 !important
}

h6 {
    font-size: 10px !important
}

@media (max-width: 756px) {
    .card .card-body {
        padding: 0 !important
    }

    .card {
        margin-top: 5px !important
    }
}

@media (min-width: 1200px) {
    .col-xl-3 {
        flex: 0 0 35%;
        max-width: 31%
    }
}

  </style>

    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">User Profile</a>
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
                  <a class="dropdown-item" href="/logout">Log out</a>
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
                  <h3 class="card-title">Job Recommendations</h3>
                  <p class="card-category">Some jobs that match your interests and skills!!</p>
                </div>
            <div class="row" style="margin-top:40px;padding-left:20px;padding-right:20px;">



      <div class="card">
            <!-- <div class="card-header card-header-primary">
              <h3 class="card-title">Notifications</h3>
              <p class="card-category">Handcrafted by our friend
                <a target="_blank" href="https://github.com/mouse0270">Robert McIntosh</a>. Please checkout the
                <a href="http://bootstrap-notify.remabledesigns.com/" target="_blank">full documentation.</a>
              </p>
            </div> -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-8">
                  <h4 class="card-header" style="font-weight: bold;margin-left: -15px;">You look like a good fit in below job roles</h4><br>
                  <?php 
                  $classes=array("alert alert-info","alert alert-success","alert alert-warning");
                  $count=0;
                  ?>
                  @foreach($job_recommendation as $job)

                  <div class="{{$classes[$count]}}">
                    <span style="font-weight: bold;font-size:16px;">{{$job}}</span>
                  </div>
                  <?php 
                  $count++;
                  if($count==3){
                    $count=0;
                  }
                  ?>
                  @endforeach
                  <!-- 
                  <div class="alert alert-success">
                    <span>This is a plain notification</span>
                  </div>
                  <div class="alert alert-primary">
                    <span>This is a plain notification</span>
                  </div>
                  <div class="alert alert-warning">
                    <span>This is a plain notification</span>
                  </div>
                  <div class="alert alert-info">
                    <span>This is a plain notification</span>
                  </div>
                  <div class="alert alert-info">
                    <span>This is a plain notification</span>
                  </div> -->
                 
              
              </div>
            </div>
            
        </div>
    </div>
                    
  <div class="container-fluid" style="margin-top:10px;">
    <h4 class="card-header" style="font-weight: bold;">Some jobs where you may apply</h4><br>
    <div class="d-md-inline-flex row justify-content-center">
                      @foreach($jobs_list as $jobs)

      <div class="col-md-5 col-lg-4 col-xl-3 col-sm-6 d-flex align-items-stretch">


            <div class=" card shadow-lg border-0 py-2">
                <div class="card-header border-0 mb-0">
                    <div class="row justify-content-between">
                        <div class="col-auto col-sm-auto">
                            <h4> <span class="badge badge-pill badge-success">Full Time</span></h4>
                        </div>
                        <div class="col-auto col-sm-auto">
                            <div class="row mx-auto pt-2">
                             <!--            {{$jobs['job_company']}}

                             <img src="https://uxwing.com/wp-content/themes/uxwing/download/17-currency/dollar.png" alt="Image result for dollar icon png" width="20" height="20">
                              -->   <h5 class="text-info my-1" style="font-weight: bold;">
                                    {{$jobs['job_company']}}

                                </h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class=" card-body text-center pb-0 mt-0 pt-3">
                    <div class="d-block">
                        <h5 class="card-title mb-0 font-weight-bold">
                                          {{$jobs['job_title']}}
                      </h5> <small class="text-info my-1"> <i class="fa fa-file-code-o small"></i> 
                                          {{$jobs['from']}}
                      </small>
                    </div>
                    <div class="d-inline-flex row mb-3 ">
                        <div class="col-md-auto">
                            <ul class="list-inline my-0">
                                <!-- <li class="list-inline-item"> <span class="badge badge-pill badge-outline ">UI</span></li>
                                <li class="list-inline-item"> <span class="badge badge-pill badge-outline ">UX</span></li>
                                <li class="list-inline-item"> <span class="badge badge-pill badge-outline ">photoshop</span></li>
                                <li class="list-inline-item "> <button class="badge badge-pill badge-primary" type="button">+4</button></li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="d-flex row mb-0">
                        <div class="col ">
                            <p class="text-muted">
                                        Desciption:   {{$jobs['job_summary']}}

                           </p>
                        </div>
                    </div>
                    <h5></h5>
                </div>
                             <h5>  Location:                                        {{$jobs['job_location']}}
</h5>
                <div>
                    <hr class="hl">
                </div>
         
                <div class="card-footer border-0 text-center mx-auto ">
                    <h5 class="footer"> <a href="" class="text-decoration-none"> VIEW JOB</a></h5>
                </div>
            </div>
        </div>


        @endforeach
        
            </div>
        </div>
      </div>
    </div>
  </div>

      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="https://creative-tim.com/presentation">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
              <li>
                <a href="https://www.creative-tim.com/license">
                  Licenses
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
          </div>
        </div>
      </footer>
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
  <script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
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
  <script src="../assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> -->
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
   <script type="text/javascript">
    $(document).ready(function() {
      $('.mdb-select').materialSelect();
      });
  </script>
  <script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
<script type="text/javascript">
jQuery(function($){
  var $internship = $('#internship1'), count = 1;
  $('#addinternship').click(function(e){
    e.preventDefault();
    var idname = 'internship' + (++count);
    $internship.parent().append($internship.clone().attr({id: idname, name: idname}));
  });
  
});
</script>
<script type="text/javascript">
jQuery(function($){
  var $project = $('#project1'), count = 1;
  $('#addproject').click(function(e){
    e.preventDefault();
    var idname = 'project' + (++count);
    $project.parent().append($project.clone().attr({id: idname, name: idname}));
  });
  
});
</script>

</body>

</html>
