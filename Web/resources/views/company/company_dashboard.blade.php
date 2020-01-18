  

@include('includes/company_header')
@include('includes/company_sidebar')

<div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">Company Login</a>
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
                  <h4 class="card-title">Hire Students to raise your company profits !!</h4>
                  <p class="card-category">Look for top category students!</p>
                </div>
                <div class="card-body">
                 
          <div class="row" >
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">wb_incandescent</i>
                  </div>
                  <!-- <p class="card-category">Used Space</p> -->
                  <h3 class="card-title">Data Analysts
                   
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">people_alt</i>45 Students Specialize 
                  </div>

                </div>
                 <a href="/instructions"><button type="submit"  style="width:100%" class="btn btn-info">View Students</button></a>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">tag_faces</i>
                  </div>
                
                  <h3 class="card-title">Full Stack Developers</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">people_alt</i>32 Students Specialize 
                  </div>
                </div>
                <a href="/instructions"><button type="submit"  style="width:100%" class="btn btn-info">View Students</button></a>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">computer</i>
                  </div>
                  <!-- <p class="card-category">Fixed Issues</p> -->
                  <h3 class="card-title">Application Developers</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">people_alt</i>21 Students Specialize 
                  </div>
                </div>
              <a href="/search_students"><button type="submit" style="width:100%" class="btn btn-info">View Students</button></a>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-primary card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">build</i>
                  </div>
                  <!-- <p class="card-category">Followers</p> -->
                  <h3 class="card-title">Business Analysts</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">people_alt</i>12 Students Specialize 
                  </div>
                </div>
                <a href="/instructions"><button type="submit"  style="width:100%" class="btn btn-info">View Students</button></a>
              </div>
            </div>
          </div>
                </div>

              </div>
            </div>
           
          </div>
        </div>
    
      <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Your Performance !!!</h4>
                  <p class="card-category">Check out your strong points in aptitude!</p>
                </div>
                <div class="card-body">
                 
         <div class="row">
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-success">
                  <div class="ct-chart" id="dailySalesChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Intelligent and Adversity Quotients</h4>
                  <p class="card-category">
                    <span class="text-success"><i class="fa fa-long-arrow-up"></i> 75% </span> Intelligence and problem solving skills</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">grade</i>Good grades, Keep it up!!
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-warning">
                  <div class="ct-chart" id="websiteViewsChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Technical Quotient</h4>
                 <p class="card-category">
                    <span class="text-success"><i class="fa fa-long-arrow-up"></i> 65% </span> Technical skills</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">grade</i>You are having average grading
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-danger">
                  <div class="ct-chart" id="completedTasksChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Emotional Quotient</h4>
                  <p class="card-category">
                    <span class="text-success"><i class="fa fa-long-arrow-down"></i> 45% </span>Emotional skills</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">grade</i>You need to work hard !!
                  </div>
                </div>
              </div>
            </div>
           
          </div>
                </div>

              </div>
            </div>
           
          </div>
      </div>
    </div>

@include('includes/company_footer')
 
