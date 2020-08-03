
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
                  <h3 class="card-title">Congratulations on winning the badges!!</h3>
                  <p class="card-category">Get more badges and upgrade you skills to prove youself better</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Organization
                        </th>
                        <th>
                          Skill
                        </th>
                        <th>
                          Date
                        </th>
                        <th>
                          View Certificate
                        </th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            1
                          </td>
                          <td>
                            JP Morgan & Co.
                          </td>
                          <td>
                            AWS Certified Blockchain Practitioner
                          </td>
                          <td>
                            3rd & 4th August
                          </td>
                          <td class="text-primary">
                             <a href="/viewcerti" target="_blank" class="btn btn-info">View Certificate</a>
                          </td>
                        </tr>
                         <tr>
                          <td>
                            1
                          </td>
                          <td>
                            Microsoft
                          </td>
                          <td>
                            Microsoft Certified Artificial Intelligence Practitioner
                          </td>
                          <td>
                            23rd & 24th May
                          </td>
                          <td class="text-primary">
                             <a href="/viewcerti" target="_blank" class="btn btn-info">View Certificate</a>
                          </td>
                        </tr>
                         <tr>
                          <td>
                            1
                          </td>
                          <td>
                            JP Morgan & Co.
                          </td>
                          <td>
                            AWS Certified Blockchain Practitioner
                          </td>
                          <td>
                            3rd & 4th August
                          </td>
                          <td class="text-primary">
                             <a href="/viewcerti" target="_blank" class="btn btn-info">View Certificate</a>
                          </td>
                        </tr>
                         <tr>
                          <td>
                            1
                          </td>
                          <td>
                            JP Morgan & Co.
                          </td>
                          <td>
                            AWS Certified Blockchain Practitioner
                          </td>
                          <td>
                            3rd & 4th August
                          </td>
                          <td class="text-primary">
                             <a href="/viewcerti" target="_blank" class="btn btn-info">View Certificate</a>
                          </td>
                        </tr>
                         <tr>
                          <td>
                            1
                          </td>
                          <td>
                            JP Morgan & Co.
                          </td>
                          <td>
                            AWS Certified Blockchain Practitioner
                          </td>
                          <td>
                            3rd & 4th August
                          </td>
                          <td class="text-primary">
                             <a href="/viewcerti" target="_blank" class="btn btn-info">View Certificate</a>
                          </td>
                        </tr>
                         <tr>
                          <td>
                            1
                          </td>
                          <td>
                            JP Morgan & Co.
                          </td>
                          <td>
                            AWS Certified Blockchain Practitioner
                          </td>
                          <td>
                            3rd & 4th August
                          </td>
                          <td class="text-primary">
                             <a href="/viewcerti" target="_blank" class="btn btn-info">View Certificate</a>
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

      @include('includes/footer')

      <script type="text/javascript">
      	      localStorage.setItem('iq_score',0);

      </script>
