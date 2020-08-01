
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" /> -->


<style type="text/css">
  /*@import "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css";*/

  /* Select2 css */
  @import "http://propeller.in/components/select2/css/select2.min.css";
  @import "http://propeller.in/components/select2/css/select2-bootstrap.css";

  /* Propeller typography */
  @import "http://propeller.in/components/typography/css/typography.css";

  /* Propeller text fields */
  @import "http://propeller.in/components/textfield/css/textfield.css";

  /* Propeller select2 */
  @import "http://propeller.in/components/select2/css/pmd-select2.css";

</style>
@include('includes/company_header')
@include('includes/company_sidebar')

<div class="main-panel">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <a class="navbar-brand" href="#pablo">Suggested Students</a>
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
              <h3 class="card-title">Filter Students based on their Skills, Branch and Designation</h3>

            </div>
            <form action="/filter" method="post">
              @csrf

              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <!-- <div class="form-group"> -->
                      <!-- <label for="sel1">Gender</label> -->

                      <select name="skills[]" id="skill_select" multiple="multiple" class="form-control" name="skills">
                        <option value="C">C</option>
                        <option value="Java">Java</option>
                        <option value="C++">C++</option>
                        <option value="Python">Python</option>
                        <option value="Sql">Oracle</option>
                        <option value="Sql">MongoDB</option>
                        <option value="Sql">DBMS</option>

                        <option value="Sql">HTML</option>
                        <option value="Sql">Laravel</option>
                        <option value="Sql">Bootstrap</option>
                        <option value="Sql">CSS</option>
                        <option value="Sql">Javascript</option>
                        <option value="Sql">Node</option>
                        <option value="Sql">Code Igniter</option>

                      </select>
                      <!-- </div> -->
                    </div>
                  </div>
                  <div class="col-md-3" style="margin-top: 10px;">
                    <div class="form-group">
                      <input type="radio" id="defaultRadio" name="experience" value="Experienced">
                      <label for="defaultRadio">Experienced</label>
                      <input type="radio" id="defaultRadio" name="experience" value="Fresher" style="margin-left: 10px;">
                      <label for="defaultRadio">Fresher</label>
                      <input type="radio" id="defaultRadio" name="experience" value="Intern" style="margin-left: 10px;">
                      <label for="defaultRadio">Intern</label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <!-- <div class="form-group"> -->
                      <!-- <label for="sel1">Gender</label> -->

                      <select name="branch[]" id="branch_select" multiple="multiple" class="form-control" >
                        <option value="Computer Science">Computer Science</option>
                        <option value="Information Technology">Information Technology</option>
                        <option value="Electronics">Electronics </option>
                        <option value="Electrical">Electrical </option>
                        <option value="Intrumentation">Intrumentation </option>

                      </select>
                      <!-- </div> -->
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-warning">Filter Students</button>
                <!-- <div class="row">
                    <div class="form-group">

          <select class="selectpicker" multiple data-live-search="true">
    <option>Mustard</option>
    <option>Ketchup</option>
    <option>Relish</option>
  </select>
      </div>
  </div>     -->
              </div>
            </form>

            <!-- <button class="btn-save btn btn-primary btn-sm">Save</button> -->
          </div>
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h3 class="card-title">Some Bright Students</h3>
                <p class="card-category"> Here are some students having such special skills</p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">


                    <th name="sr_no">
                      Sr No
                    </th>
                    <th name="name">
                      Name
                    </th>
                    <th name="stream">
                      Stream
                    <th name="skills">
                      Special Skills
                    </th>

                    <th>
                      Experience
                    </th>
                    <th>
                      View Profile
                    </th>
                    </thead>
                    <tbody>



                    <tr>
                      <td>

                      </td>
                      <td>

                      </td>
                      <td>

                      </td>
                      <td>


                      </td>


                      <td>

                      </td>
                      <td>
                        <a href="/instructions"><button type="submit" class="btn btn-info">View Profile</button></a>
                      </td>

                    </tr>










                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  @include('includes/company_footer')
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></scri -->
    <script src="../../assets/select2/js/select2.min.js"></script>
    <!-- <script type="" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> -->

    <script>

      jQuery(document).ready(function() {

        $("#skill_select").select2({
          multiple: true,
          placeholder: "Choose required Skillset",

        });

        $("#branch_select").select2({
          multiple: true,
          placeholder: "Choose required Branch",

        });


      });

    </script>

