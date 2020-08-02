
@include('includes/admin_header')
@include('includes/admin_sidebar')
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
                        <h4 class="card-title">Add a new Question</h4>
                        <p class="card-category">Add a new question for test</p>
                    </div>
                    <div class="card-body">



                        <form action="/proceed_with_add_ques_form" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Category</label>
                                        <div class="form-group">
                                            <select onchange="selectedCategory(this)" name="category" id="category_select" class="form-control">
                                                <option value="">Select category...</option>
                                            @foreach($categories as $value)
                                                    <option value="{{$value->category}}">{{$value->category}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Sub Category</label>
                                        <div class="form-group">

                                            <select disabled name="sub_category" id="sub_category_select" onchange="selectedSubCategory(this)" class="form-control">
                                                <option value="0">Select sub category...</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>



                            </div>




                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Concept</label>
                                        <div class="form-group">

                                            <select disabled onchange="selectedConcept(this)" name="concept" id="concept_select" class="form-control">
                                                <option value="">Select level/concept...</option>
                                                <option value="0">Basics</option>
                                                <option value="1">Advance</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Sub Concept</label>
                                        <div class="form-group">

                                            <select disabled name="sub_concept" id="sub_concept_select" class="form-control">
                                                <option value="">Select sub concept...</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="row">
                                    <div class="col-md-6">
                                        <div id="excel-button" onclick="buttonCheck('excel')">
                                            <a class="btn btn-success btn-block">Use Excel sheet</a>
                                        </div>
                                    </div>
                                <div class="col-md-6">
                                    <div id="manual-button" onclick="buttonCheck('manual')">
                                        <a class="btn btn-warning btn-block">Use Manual Fields</a>
                                    </div>
                                </div>
                            </div>



                            <div class="row" id="excel-operations" style="display: none;">
                                <div class="col-md-12 alert-warning" style="color:#222;">
                                    <h3>Note: The requred excel file should have the following template:</h3>
                                    <ol>
                                        <li>Category Details Id</li>
                                        <li>Concept Details Id</li>
                                        <li>level</li>
                                        <li>Options Available</li>
                                        <li>Question Statement</li>
                                        <li>Option 1</li>
                                        <li>Option 2</li>
                                        <li>Option 3</li>
                                        <li>Option 4</li>
                                        <li>Correct Option/Answer</li>
                                    </ol>
                                </div>
                                <div class="col-md-12">
                                    <label style="">Upload file : </label><span><input type="file" id="ques_file" name="ques_file" accept=".xls,.xlsx,.csv"></span>
                                </div>

                            </div>

                            <div id="manual-operations" style="display: none;">
                                <div class="manual-div">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="">Enter no of questions</label>
                                                <input type="number" class="form-control" min="1" id="no_of_ques" name="no_of_ques" value="1">
                                            </div>
                                        </div>
                                    </div>
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="bmd-label-floating">Enter question</label>--}}
{{--                                            <input type="text" class="form-control" name="question_statement">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="row">--}}
{{--                                    <div class="col-md-4">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="bmd-label-floating">Is options available?</label>--}}
{{--                                            <input type="radio" onclick="yesNoCheck()" id="yesCheck" name="question_statement">--}}
{{--                                            <label for="defaultRadio">Yes</label>--}}
{{--                                            <input type="radio" onclick="yesNoCheck()" id="noCheck"  name="question_statement">--}}
{{--                                            <label for="defaultRadio">No</label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="row" id="ifYes" style="display: none">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="col-md-2">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label class="bmd-label-floating" for="">Option 1</label>--}}
{{--                                                <input type="text" class="form-control">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-2">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label class="bmd-label-floating" for="">Option 2</label>--}}
{{--                                                <input type="text" class="form-control">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-2">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label class="bmd-label-floating" for="">Option 3</label>--}}
{{--                                                <input type="text" class="form-control">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-2">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label class="bmd-label-floating" for="">Option 4</label>--}}
{{--                                                <input type="text" class="form-control">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-4">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="bmd-label-floating" for="">Correct option</label>--}}
{{--                                            <input type="number" class="form-control" min="1" max="4">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="row" id="ifNo" style="display: none">--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="bmd-label-floating" for="">Enter Answer</label>--}}
{{--                                            <input type="text" class="form-control">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                            </div>
{{--                                <div>--}}
{{--                                    <button type="button" name="add" id="add_fields" class="btn btn-success add_fields">Add</button>--}}
{{--                                </div>--}}
                            </div>





                            <button type="submit" name="proceed" onclick="checkforfields()" class="btn btn-primary pull-right">Proceed</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


</div>
</div>
</body>





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
<script src="../assets/select2/js/select2.min.js"></script>

<script>

    jQuery(document).ready(function() {

        $("#category_select").select2({

        }),
            $("#sub_category_select").select2({


            }),

        $("#concept_select").select2({
            placeholder: 'Select Category...'

        }),
            $("#sub_concept_select").select2({


            });


    });

</script>


<script>

    function buttonCheck(buttontype){
        if(buttontype=='excel'){
            document.getElementById('excel-operations').style.display = 'block';
            document.getElementById('manual-operations').style.display = 'none';
            document.getElementById('no_of_ques').value = 101010;
        }if(buttontype=='manual'){
            document.getElementById('excel-operations').style.display = 'none';
            document.getElementById('manual-operations').style.display = 'block';
            document.getElementById('no_of_ques').value = 1;
        }
    }

    function yesNoCheck() {
        if (document.getElementById('yesCheck').checked) {
            document.getElementById('ifYes').style.display = 'block';
            document.getElementById('ifNo').style.display = 'none';

        } else {
            document.getElementById('ifYes').style.display = 'none';
            document.getElementById('ifNo').style.display = 'block';
        }
    }

    function checkforfields() {
        var x = document.getElementById('ques_file').value;
        var y = document.getElementById('no_of_ques').value;
        if(x=="" && (y==1 || y==101010)){
            // alert("hee");
            document.getElementById('no_of_ques').value = 1;
        }
    }
    
    
    // window.test = function (e) {
    //
    // }

    window.selectedCategory = function (e) {
        document.getElementById('sub_category_select').removeAttribute('disabled');
    }

    window.selectedSubCategory = function (e) {
        localStorage.setItem('currentSubCategory', e.value);
        document.getElementById('concept_select').removeAttribute('disabled');
    }

    window.selectedConcept = function (e) {
        document.getElementById('sub_concept_select').removeAttribute('disabled');
    }


</script>


<script>
    $(document).ready(function () {

        $('#category_select').change(function () {
            // alert("hihihihi");
            //category_name
            var category_name = $(this).val();

            //empty the dropdown
            $('#sub_category_select').find('option').not(':first').remove();

            // AJAX request
            $.ajax({
                url: 'getSubCategory/'+category_name,
                type: 'get',
                dataType: 'json',
                success: function(response){
                    // alert("success");
                    var len = 0;
                    if(response['data'] != null){
                        len = response['data'].length;
                        // alert(len);
                    }

                    if(len > 0){
                        // alert("len>0");
                        // Read data and create <option >
                        for(var i=0; i<len; i++){

                            var id = response['data'][i].sub_category;
                            var name = response['data'][i].sub_category;

                            var option = "<option value='"+id+"'>"+name+"</option>";

                            $("#sub_category_select").append(option);
                        }
                    }

                }
            });


        });
    });
    
</script>



<script>
    $(document).ready(function () {

        $('#concept_select').change(function () {
            // alert("hihihihi");
            //category_name
            var concept = $(this).val();
            // alert(localStorage.getItem('currentSubCategory')+ concept);
            //empty the dropdown
            $('#sub_concept_select').find('option').not(':first').remove();

            // AJAX request
            $.ajax({
                url: 'getSubConcept/'+localStorage.getItem('currentSubCategory')+'/'+concept,
                type: 'get',
                dataType: 'json',
                success: function(response){
                    // alert("success");
                    var len = 0;
                    if(response['data'] != null){
                        len = response['data'].length;
                        // alert(len);
                    }

                    if(len > 0){
                        // alert("len>0");
                        // Read data and create <option >
                        for(var i=0; i<len; i++){

                            var id = response['data'][i].sub_concept;
                            var name = response['data'][i].sub_concept;

                            var option = "<option value='"+id+"'>"+name+"</option>";

                            $("#sub_concept_select").append(option);
                        }
                    }

                }
            });


        });
    });

</script>














{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">--}}
{{--</script>--}}

{{--<script>--}}
{{--    //Add Input Fields--}}
{{--    $(document).ready(function() {--}}
{{--        var max_fields = 100; //Maximum allowed input fields--}}
{{--        var wrapper    = $(".manual-div"); //Input fields wrapper--}}
{{--        var add_button = $(".add_fields"); //Add button class or ID--}}
{{--        var x = 1; //Initial input field is set to 1--}}

{{--        //When user click on add input button--}}
{{--        $(add_button).click(function(e){--}}
{{--            e.preventDefault();--}}
{{--            //Check maximum allowed input fields--}}
{{--            if(x < max_fields){--}}
{{--                x++; //input field increment--}}
{{--                //add input field--}}
{{--                $(wrapper).append('<div class="manual-div">\n' +--}}
{{--                    '                                <div class="row">\n' +--}}
{{--                    '                                    <div class="col-md-12">\n' +--}}
{{--                    '                                        <div class="form-group">\n' +--}}
{{--                    '                                            <label class="bmd-label-floating">Enter question</label>\n' +--}}
{{--                    '                                            <input type="text" class="form-control" name="question_statement">\n' +--}}
{{--                    '                                        </div>\n' +--}}
{{--                    '                                    </div>\n' +--}}
{{--                    '                                </div>\n' +--}}
{{--                    '\n' +--}}
{{--                    '                                <div class="row">\n' +--}}
{{--                    '                                    <div class="col-md-4">\n' +--}}
{{--                    '                                        <div class="form-group">\n' +--}}
{{--                    '                                            <label class="bmd-label-floating">Is options available?</label>\n' +--}}
{{--                    '                                            <input type="radio" onclick="yesNoCheck()" id="yesCheck" name="question_statement">\n' +--}}
{{--                    '                                            <label for="defaultRadio">Yes</label>\n' +--}}
{{--                    '                                            <input type="radio" onclick="yesNoCheck()" id="noCheck"  name="question_statement">\n' +--}}
{{--                    '                                            <label for="defaultRadio">No</label>\n' +--}}
{{--                    '                                        </div>\n' +--}}
{{--                    '                                    </div>\n' +--}}
{{--                    '                                </div>\n' +--}}
{{--                    '\n' +--}}
{{--                    '                                <div class="row" id="ifYes" style="display: none">\n' +--}}
{{--                    '                                    <div class="col-md-12">\n' +--}}
{{--                    '                                        <div class="col-md-2">\n' +--}}
{{--                    '                                            <div class="form-group">\n' +--}}
{{--                    '                                                <label class="bmd-label-floating" for="">Option 1</label>\n' +--}}
{{--                    '                                                <input type="text" class="form-control">\n' +--}}
{{--                    '                                            </div>\n' +--}}
{{--                    '                                        </div>\n' +--}}
{{--                    '                                        <div class="col-md-2">\n' +--}}
{{--                    '                                            <div class="form-group">\n' +--}}
{{--                    '                                                <label class="bmd-label-floating" for="">Option 2</label>\n' +--}}
{{--                    '                                                <input type="text" class="form-control">\n' +--}}
{{--                    '                                            </div>\n' +--}}
{{--                    '                                        </div>\n' +--}}
{{--                    '                                        <div class="col-md-2">\n' +--}}
{{--                    '                                            <div class="form-group">\n' +--}}
{{--                    '                                                <label class="bmd-label-floating" for="">Option 3</label>\n' +--}}
{{--                    '                                                <input type="text" class="form-control">\n' +--}}
{{--                    '                                            </div>\n' +--}}
{{--                    '                                        </div>\n' +--}}
{{--                    '                                        <div class="col-md-2">\n' +--}}
{{--                    '                                            <div class="form-group">\n' +--}}
{{--                    '                                                <label class="bmd-label-floating" for="">Option 4</label>\n' +--}}
{{--                    '                                                <input type="text" class="form-control">\n' +--}}
{{--                    '                                            </div>\n' +--}}
{{--                    '                                        </div>\n' +--}}
{{--                    '                                    </div>\n' +--}}
{{--                    '                                    <div class="col-md-4">\n' +--}}
{{--                    '                                        <div class="form-group">\n' +--}}
{{--                    '                                            <label class="bmd-label-floating" for="">Correct option</label>\n' +--}}
{{--                    '                                            <input type="number" class="form-control" min="1" max="4">\n' +--}}
{{--                    '                                        </div>\n' +--}}
{{--                    '                                    </div>\n' +--}}
{{--                    '                                </div>\n' +--}}
{{--                    '\n' +--}}
{{--                    '                                <div class="row" id="ifNo" style="display: none">\n' +--}}
{{--                    '                                    <div class="col-md-12">\n' +--}}
{{--                    '                                        <div class="form-group">\n' +--}}
{{--                    '                                            <label class="bmd-label-floating" for="">Enter Answer</label>\n' +--}}
{{--                    '                                            <input type="text" class="form-control">\n' +--}}
{{--                    '                                        </div>\n' +--}}
{{--                    '                                    </div>\n' +--}}
{{--                    '                                </div>\n' +--}}
{{--                    '\n' +--}}
{{--                    '                            </div>');--}}
{{--            }--}}
{{--        });--}}

{{--        //when user click on remove button--}}
{{--        $(wrapper).on("click",".remove_field", function(e){--}}
{{--            e.preventDefault();--}}
{{--            // $(this).parent(".manual-div").remove(); //remove inout field--}}
{{--            $(this).closest("div").parent("div").remove();--}}
{{--            // alert("hi");--}}
{{--            // var y = $(this).parentNode.nodeName;--}}
{{--            // alert(y);--}}
{{--            x--; //inout field decrement--}}
{{--        })--}}
{{--    });--}}

{{--    // <div><a href="javascript:void(0);" class="remove_field">Remove</a></div>--}}
{{--</script>--}}


</body>

</html>
