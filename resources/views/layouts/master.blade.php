<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title')</title>
  <!-- Agrega tus enlaces a CSS aquí -->
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="../../package/assets/images/favicon.png" />
  <!-- Custom CSS -->
  <link rel="stylesheet" href="../../package/dist/libs/jvectormap/jquery-jvectormap.css">
  <!-- Custom CSS -->
  <link href="../../package/dist/css/style.min.css" rel="stylesheet" />
</head>

<body>
  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <div class="preloader">
    <svg class="tea lds-ripple" width="37" height="48" viewbox="0 0 37 48" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M27.0819 17H3.02508C1.91076 17 1.01376 17.9059 1.0485 19.0197C1.15761 22.5177 1.49703 29.7374 2.5 34C4.07125 40.6778 7.18553 44.8868 8.44856 46.3845C8.79051 46.79 9.29799 47 9.82843 47H20.0218C20.639 47 21.2193 46.7159 21.5659 46.2052C22.6765 44.5687 25.2312 40.4282 27.5 34C28.9757 29.8188 29.084 22.4043 29.0441 18.9156C29.0319 17.8436 28.1539 17 27.0819 17Z" stroke="#233242" stroke-width="2"></path>
      <path d="M29 23.5C29 23.5 34.5 20.5 35.5 25.4999C36.0986 28.4926 34.2033 31.5383 32 32.8713C29.4555 34.4108 28 34 28 34" stroke="#233242" stroke-width="2"></path>
      <path id="teabag" fill="#233242" fill-rule="evenodd" clip-rule="evenodd" d="M16 25V17H14V25H12C10.3431 25 9 26.3431 9 28V34C9 35.6569 10.3431 37 12 37H18C19.6569 37 21 35.6569 21 34V28C21 26.3431 19.6569 25 18 25H16ZM11 28C11 27.4477 11.4477 27 12 27H18C18.5523 27 19 27.4477 19 28V34C19 34.5523 18.5523 35 18 35H12C11.4477 35 11 34.5523 11 34V28Z"></path>
      <path id="steamL" d="M17 1C17 1 17 4.5 14 6.5C11 8.5 11 12 11 12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke="#233242"></path>
      <path id="steamR" d="M21 6C21 6 21 8.22727 19 9.5C17 10.7727 17 13 17 13" stroke="#233242" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
    </svg>
  </div>
  <div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar">
      <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header">
          <!-- This is for the sidebar toggle which is visible on mobile only -->
          <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ri-close-line fs-6 ri-menu-2-line"></i></a>
          <!-- ============================================================== -->
          <!-- Logo -->
          <!-- ============================================================== -->
          <div class="navbar-brand">
            <a href="{{ url('/') }}" class="logo">
              <!-- Logo icon -->
              <b class="logo-icon">
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Dark Logo icon -->
                <img src="https://mobsign.com/wp-content/uploads/2022/07/logo-mobsign-200x47.png" alt="homepage" class="dark-logo" />
                <!-- Light Logo icon -->
                <a href="{{ url('/') }}"> <img src="https://mobsign.com/wp-content/uploads/2022/07/logo-mobsign-200x47.png" alt="homepage" class="light-logo" /></a>
              </b>
              </span>
            </a>
            <a class="sidebartoggler d-none d-md-block" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-toggle-switch mdi-toggle-switch-off fs-6"></i></a>
          </div>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Toggle which is visible on mobile only -->
          <!-- ============================================================== -->
          <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i data-feather="more-horizontal" class="feather-sm"></i>
          </a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
          <!-- ============================================================== -->
          <!-- toggle and nav items -->
          <!-- ============================================================== -->
          <ul class="navbar-nav me-auto">
            <!-- <li class="nav-item d-none d-md-block">
                            <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                                <i class="mdi mdi-menu font-24"></i>
                            </a>
                        </li> -->
            <!-- ============================================================== -->
            <!-- Search -->
            <!-- ============================================================== -->
            <li class="nav-item search-box">
              <a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                <div class="d-flex align-items-center">
                  <i data-feather="search" class="feather-sm me-1"></i>
                  <div class="ms-1 d-none d-sm-block">
                    <span>Buscar</span>
                  </div>
                </div>
              </a>
              <form class="app-search position-absolute">
                <input type="text" class="form-control" placeholder="Search &amp; enter" />
                <a class="srh-btn"><i data-feather="x" class="feather-sm"></i></a>
              </form>
            </li>
          </ul>
          <!-- ============================================================== -->
          <!-- Right side toggle and nav items -->
          <!-- ============================================================== -->
          <ul class="navbar-nav">
            <!-- ============================================================== -->
            <!-- Messages -->
            <!-- ============================================================== -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i data-feather="mail"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-end mailbox dropdown-menu-animate-up " aria-labelledby="2">
                <span class="with-arrow">
                  <span class="bg-danger"></span>
                </span>
                <ul class="list-style-none">
                  <li>
                    <div class="drop-title text-white bg-danger">
                      <h4 class="mb-0 m-t-5">5 New</h4>
                      <span class="fw-light">Messages</span>
                    </div>
                  </li>
                  <li>
                    <div class="message-center message-body position-relative" style="height: 230px">
                      <!-- Message -->
                      <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2 ">
                        <span class="user-img position-relative d-inline-block">
                          <img src="../../package/assets/images/users/1.jpg" alt="user" class="rounded-circle w-100" />
                          <span class="profile-status rounded-circle online"></span>
                        </span>
                        <div class="w-75 d-inline-block v-middle ps-3">
                          <h5 class="message-title mb-0 mt-1 fs-3 font-weight-medium ">Pavan kumar</h5>
                          <span class="fs-2 text-nowrap d-block time text-truncate fw-normal mt-1 ">Just see the my admin!</span>
                          <span class="fs-2 text-nowrap d-block subtext text-muted">9:30 AM</span>
                        </div>
                      </a>
                      <!-- Message -->
                      <a href="javascript:void(0)" class=" message-item d-flex align-items-center border-bottom px-3 py-2">
                        <span class="user-img position-relative d-inline-block">
                          <img src="../../package/assets/images/users/2.jpg" alt="user" class="rounded-circle w-100" />
                          <span class="profile-status rounded-circle busy"></span>
                        </span>
                        <div class="w-75 d-inline-block v-middle ps-3">
                          <h5 class="message-title mb-0 mt-1 fs-3 font-weight-medium">Sonu Nigam</h5>
                          <span class=" fs-2 text-nowrap d-block time text-truncate">I've sung a song! See you at</span>
                          <span class=" fs-2 text-nowrap d-block subtext text-muted">9:10 AM</span>
                        </div>
                      </a>
                      <!-- Message -->
                      <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2">
                        <span class="user-img position-relative d-inline-block">
                          <img src="../../package/assets/images/users/3.jpg" alt="user" class="rounded-circle w-100" />
                          <span class="profile-status rounded-circle away"></span>
                        </span>
                        <div class="w-75 d-inline-block v-middle ps-3">
                          <h5 class="message-title mb-0 mt-1 fs-3 font-weight-medium ">Arijit Sinh</h5>
                          <span class="fs-2 text-nowrap d-block time text-truncate">I am a singer!</span>
                          <span class="fs-2 text-nowrap d-block subtext text-muted">9:08 AM</span>
                        </div>
                      </a>
                      <!-- Message -->
                      <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2">
                        <span class="user-img position-relative d-inline-block">
                          <img src="../../package/assets/images/users/4.jpg" alt="user" class="rounded-circle w-100" />
                          <span class="profile-status rounded-circle offline"></span>
                        </span>
                        <div class="w-75 d-inline-block v-middle ps-3">
                          <h5 class="message-title mb-0 mt-1 fs-3 font-weight-medium">Pavan kumar</h5>
                          <span class="fs-2 text-nowrap d-block time text-truncate">Just see the my admin!</span>
                          <span class="fs-2 text-nowrap d-block subtext text-muted">9:02 AM</span>
                        </div>
                      </a>
                    </div>
                  </li>
                  <li><a class="nav-link text-center link text-dark" href="javascript:void(0);">
                      <b>See all e-Mails</b>
                      <i data-feather="chevron-right" class="feather-sm"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <!-- ============================================================== -->
            <!-- End Messages -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Comment -->
            <!-- ============================================================== -->
            <li class="nav-item dropdown border-end">
              <a class="nav-link dropdown-toggle waves-effect waves-dark position-relative" href="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i data-feather="bell"></i>
                <span class="badge rounded-pill bg-info noti">3</span>
              </a>
              <div class="dropdown-menu dropdown-menu-end mailbox dropdown-menu-animate-up">
                <span class="with-arrow">
                  <span class="bg-primary"></span>
                </span>
                <ul class="list-style-none">
                  <li>
                    <div class="drop-title bg-primary text-white">
                      <h4 class="mb-0 m-t-5">4 New</h4>
                      <span class="fw-light">Notifications</span>
                    </div>
                  </li>
                  <li>
                    <div class="message-center notifications position-relative" style="height: 230px">
                      <!-- Message -->
                      <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2">
                        <span class="btn btn-light-danger text-danger btn-circle">
                          <i data-feather="link" class="feather-sm fill-white"></i>
                        </span>
                        <div class="w-75 d-inline-block v-middle ps-3">
                          <h5 class="message-title mb-0 mt-1 fs-3 font-weight-medium ">Luanch Admin</h5>
                          <span class="fs-2 text-nowrap d-block time text-truncate fw-normal text-muted mt-1">Just see the my new admin!</span>
                          <span class="fs-2 text-nowrap d-block subtext text-muted">9:30 AM</span>
                        </div>
                      </a>
                      <!-- Message -->
                      <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2">
                        <span class="btn btn-light-success text-success btn-circle">
                          <i data-feather="calendar" class="feather-sm fill-white"></i>
                        </span>
                        <div class="w-75 d-inline-block v-middle ps-3">
                          <h5 class="message-title mb-0 mt-1 fs-3 font-weight-medium">Event today</h5>
                          <span class="fs-2 text-nowrap d-block time text-truncate fw-normal text-muted mt-1">Just a reminder that you have event</span>
                          <span class="fs-2 text-nowrap d-block subtext text-muted">9:10 AM</span>
                        </div>
                      </a>
                  </li>
                  <li>
                    <a class="nav-link text-center mb-1 text-dark" href="javascript:void(0);"><strong>Check all notifications</strong>
                      <i data-feather="chevron-right" class="feather-sm"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <!-- ============================================================== -->
            <!-- End Comment -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="../../package/assets/images/users/2.jpg" alt="user" class="rounded-circle" width="40" />
                <span class="ms-1 font-weight-medium d-none d-sm-inline-block">{{ session('userName') }}<i data-feather="chevron-down" class="feather-sm"></i></span>
              </a>
              <div class="dropdown-menu dropdown-menu-end user-dd animated flipInY">
                <span class="with-arrow">
                  <span class="bg-primary"></span>
                </span>
                <div class="d-flex no-block align-items-center p-3 bg-primary text-white mb-2">
                  <div class="">
                    <img src="../../package/assets/images/users/5.jpg" alt="user" class="rounded-circle" width="60" />
                  </div>

                  <div class="ms-2">
                    <h4 class="mb-0 text-white">{{ session('userName') }}</h4>
                    <p class="mb-0">{{ session('userEmail') }}</p>
                  </div>

                </div>
                <a class="dropdown-item" href="{{ route('profile') }}"><i data-feather="user" class="feather-sm text-info me-1 ms-1"></i>Mi Perfil</a>
                <!-- <a class="dropdown-item" href="#"><i data-feather="credit-card" class="feather-sm text-info me-1 ms-1"></i>My Balance</a>
                <a class="dropdown-item" href="#"><i data-feather="mail" class="feather-sm text-success me-1 ms-1"></i>Inbox</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><i data-feather="settings" class="feather-sm text-warning me-1 ms-1"></i>Account Setting</a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}"><i data-feather="log-out" class="feather-sm text-danger me-1 ms-1"></i>Logout</a>
                <div class="dropdown-divider"></div>
                <div class="p-2"><a href="{{ route('profile') }}" class="btn d-block w-100 btn-primary rounded-pill">View Profile</a>
                </div>
              </div>
            </li>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
          </ul>
        </div>
      </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="mdi mdi-dots-horizontal"></i>
              <span class="hide-menu">Administración</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                <i class="mdi mdi-cards-variant"></i>
                <span class="hide-menu">Catálogos </span>
                <!-- <span class="badge rounded-pill bg-info ms-auto mr-3">3</span> -->
              </a>
              <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item">
                  <a href="{{ route('usuarios') }}" class="sidebar-link">
                    <i class="mdi mdi-adjust"></i>
                    <span class="hide-menu"> Usuarios </span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="{{ route('empresas') }}" class="sidebar-link">
                    <i class="mdi mdi-adjust"></i>
                    <span class="hide-menu"> Empresas </span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="{{ route('equipos') }}" class="sidebar-link">
                    <i class="mdi mdi-adjust"></i>
                    <span class="hide-menu"> Equipos </span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="{{ route('mantenimientos') }}" class="sidebar-link">
                    <i class="mdi mdi-adjust"></i>
                    <span class="hide-menu"> Mantenimientos </span>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
      <!-- ============================================================== -->
      <!-- Bread crumb and right sidebar toggle -->
      <!-- ============================================================== -->
      <div class="page-breadcrumb">
        @yield('breadcrumb')
        <div class="content-wrapper">
          @yield('content')
        </div>
      </div>
      <!-- ============================================================== -->
      <!-- footer -->
      <!-- ============================================================== -->
      <footer class="footer text-center">Mobsign developments S.A. de C.V. ®</footer>
      <!-- ============================================================== -->
      <!-- End footer -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
  </div>

  <aside class="customizer">
    <a href="javascript:void(0)" class="service-panel-toggle"><i data-feather="settings" class="feather-sm fa fa-spin"></i></a>
    <div class="customizer-body">
      <ul class="nav customizer-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="ri-tools-fill fs-6"></i></a>
        </li>
        <li class="nav-item"><a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#chat" role="tab" aria-controls="chat" aria-selected="false"><i class="ri-message-3-line fs-6"></i></a>
        </li>
        <li class="nav-item"><a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"><i class="ri-timer-line fs-6"></i></a>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <!-- Tab 1 -->
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
          <div class="p-3 border-bottom">
            <!-- Sidebar -->
            <h5 class="font-weight-medium mb-2 mt-2">Layout Settings</h5>
            <div class="form-check mt-3">
              <input type="checkbox" name="theme-view" class="form-check-input" id="theme-view" />
              <label class="form-check-label" for="theme-view"><span>Dark Theme</span></label>
            </div>
            <div class="form-check mt-2">
              <input type="checkbox" class="sidebartoggler form-check-input" name="collapssidebar" id="collapssidebar" />
              <label class="form-check-label" for="collapssidebar"><span>Collapse Sidebar</span></label>
            </div>
            <div class="form-check mt-2">
              <input type="checkbox" name="sidebar-position" class="form-check-input" id="sidebar-position" />
              <label class="form-check-label" for="sidebar-position"><span>Fixed Sidebar</span></label>
            </div>
            <div class="form-check mt-2">
              <input type="checkbox" name="header-position" class="form-check-input" id="header-position" />
              <label class="form-check-label" for="header-position"><span>Fixed Header</span></label>
            </div>
            <div class="form-check mt-2">
              <input type="checkbox" name="boxed-layout" class="form-check-input" id="boxed-layout" />
              <label class="form-check-label" for="boxed-layout"><span>Boxed Layout</span></label>
            </div>
          </div>
          <div class="p-3 border-bottom">
            <!-- Logo BG -->
            <h5 class="font-weight-medium mb-2 mt-2">Logo Backgrounds</h5>
            <ul class="theme-color m-0 p-0">
              <li class="theme-item list-inline-item me-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block" data-logobg="skin1"></a></li>
              <li class="theme-item list-inline-item me-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block" data-logobg="skin2"></a></li>
              <li class="theme-item list-inline-item me-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block" data-logobg="skin3"></a></li>
              <li class="theme-item list-inline-item me-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block" data-logobg="skin4"></a></li>
              <li class="theme-item list-inline-item me-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block" data-logobg="skin5"></a></li>
              <li class="theme-item list-inline-item me-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block" data-logobg="skin6"></a></li>
            </ul>
            <!-- Logo BG -->
          </div>
          <div class="p-3 border-bottom">
            <!-- Navbar BG -->
            <h5 class="font-weight-medium mb-2 mt-2">Navbar Backgrounds</h5>
            <ul class="theme-color m-0 p-0">
              <li class="theme-item list-inline-item me-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block" data-navbarbg="skin1"></a></li>
              <li class="theme-item list-inline-item me-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block" data-navbarbg="skin2"></a></li>
              <li class="theme-item list-inline-item me-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block" data-navbarbg="skin3"></a></li>
              <li class="theme-item list-inline-item me-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block" data-navbarbg="skin4"></a></li>
              <li class="theme-item list-inline-item me-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block" data-navbarbg="skin5"></a></li>
              <li class="theme-item list-inline-item me-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block" data-navbarbg="skin6"></a></li>
            </ul>
            <!-- Navbar BG -->
          </div>
          <div class="p-3 border-bottom">
            <!-- Logo BG -->
            <h5 class="font-weight-medium mb-2 mt-2">Sidebar Backgrounds</h5>
            <ul class="theme-color m-0 p-0">
              <li class="theme-item list-inline-item me-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block" data-sidebarbg="skin1"></a></li>
              <li class="theme-item list-inline-item me-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block" data-sidebarbg="skin2"></a></li>
              <li class="theme-item list-inline-item me-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block" data-sidebarbg="skin3"></a></li>
              <li class="theme-item list-inline-item me-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block" data-sidebarbg="skin4"></a></li>
              <li class="theme-item list-inline-item me-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block" data-sidebarbg="skin5"></a></li>
              <li class="theme-item list-inline-item me-1"><a href="javascript:void(0)" class="theme-link rounded-circle d-block" data-sidebarbg="skin6"></a></li>
            </ul>
            <!-- Logo BG -->
          </div>
        </div>
        <!-- End Tab 1 -->
        <!-- Tab 2 -->
        <div class="tab-pane fade" id="chat" role="tabpanel" aria-labelledby="pills-profile-tab">
          <ul class="mailbox list-style-none mt-3">
            <li>
              <div class="message-center chat-scroll position-relative">
                <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2" id="chat_user_1" data-user-id="1">
                  <span class="user-img position-relative d-inline-block">
                    <img src="../../package/assets/images/users/1.jpg" alt="user" class="rounded-circle w-100" />
                    <span class="profile-status rounded-circle online"></span>
                  </span>
                  <div class="w-75 d-inline-block v-middle ps-3">
                    <h5 class="message-title mb-0 mt-1">Pavan kumar</h5>
                    <span class="fs-2 text-nowrap d-block text-muted text-truncate">Just see the my admin!</span>
                    <span class="fs-2 text-nowrap d-block text-muted">9:30 AM</span>
                  </div>
                </a>
                <!-- Message -->
                <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2" id="chat_user_2" data-user-id="2">
                  <span class="user-img position-relative d-inline-block">
                    <img src="../../package/assets/images/users/2.jpg" alt="user" class="rounded-circle w-100" />
                    <span class="profile-status rounded-circle busy"></span>
                  </span>
                  <div class="w-75 d-inline-block v-middle ps-3">
                    <h5 class="message-title mb-0 mt-1">Sonu Nigam</h5>
                    <span class="fs-2 text-nowrap d-block text-muted text-truncate">I've sung a song! See you at</span>
                    <span class="fs-2 text-nowrap d-block text-muted">9:10 AM</span>
                  </div>
                </a>
                <!-- Message -->
                <a href="javascript:void(0)" class=" message-item d-flex align-items-center border-bottom px-3 py-2" id="chat_user_3" data-user-id="3">
                  <span class="user-img position-relative d-inline-block">
                    <img src="../../package/assets/images/users/3.jpg" alt="user" class="rounded-circle w-100" />
                    <span class="profile-status rounded-circle away"></span>
                  </span>
                  <div class="w-75 d-inline-block v-middle ps-3">
                    <h5 class="message-title mb-0 mt-1">Arijit Sinh</h5>
                    <span class="fs-2 text-nowrap d-block text-muted text-truncate">I am a singer!</span>
                    <span class="fs-2 text-nowrap d-block text-muted">9:08 AM</span>
                  </div>
                </a>
                <!-- Message -->
                <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2" id="chat_user_4" data-user-id="4">
                  <span class="user-img position-relative d-inline-block">
                    <img src="../../package/assets/images/users/4.jpg" alt="user" class="rounded-circle w-100" />
                    <span class="profile-status rounded-circle offline"></span>
                  </span>
                  <div class="w-75 d-inline-block v-middle ps-3">
                    <h5 class="message-title mb-0 mt-1">Nirav Joshi</h5>
                    <span class="fs-2 text-nowrap d-block text-muted text-truncate">Just see the my admin!</span>
                    <span class="fs-2 text-nowrap d-block text-muted">9:02 AM</span>
                  </div>
                </a>
                <!-- Message -->
                <!-- Message -->
                <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2" id="chat_user_5" data-user-id="5">
                  <span class="user-img position-relative d-inline-block">
                    <img src="../../package/assets/images/users/5.jpg" alt="user" class="rounded-circle w-100" />
                    <span class="profile-status rounded-circle offline"></span>
                  </span>
                  <div class="w-75 d-inline-block v-middle ps-3">
                    <h5 class="message-title mb-0 mt-1">Sunil Joshi</h5>
                    <span class="fs-2 text-nowrap d-block text-muted text-truncate">Just see the my admin!</span>
                    <span class="fs-2 text-nowrap d-block text-muted">9:02 AM</span>
                  </div>
                </a>
                <!-- Message -->
                <!-- Message -->
                <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2" id="chat_user_6" data-user-id="6">
                  <span class="user-img position-relative d-inline-block">
                    <img src="../../package/assets/images/users/6.jpg" alt="user" class="rounded-circle w-100" />
                    <span class="profile-status rounded-circle offline"></span>
                  </span>
                  <div class="w-75 d-inline-block v-middle ps-3">
                    <h5 class="message-title mb-0 mt-1">Akshay Kumar</h5>
                    <span class="fs-2 text-nowrap d-block text-muted text-truncate">Just see the my admin!</span>
                    <span class="fs-2 text-nowrap d-block text-muted">9:02 AM</span>
                  </div>
                </a>
                <!-- Message -->
                <!-- Message -->
                <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2" id="chat_user_7" data-user-id="7">
                  <span class="user-img position-relative d-inline-block">
                    <img src="../../package/assets/images/users/7.jpg" alt="user" class="rounded-circle w-100" />
                    <span class="profile-status rounded-circle offline"></span>
                  </span>
                  <div class="w-75 d-inline-block v-middle ps-3">
                    <h5 class="message-title mb-0 mt-1">Pavan kumar</h5>
                    <span class="fs-2 text-nowrap d-block text-muted text-truncate">Just see the my admin!</span>
                    <span class="fs-2 text-nowrap d-block text-muted">9:02 AM</span>
                  </div>
                </a>
                <!-- Message -->
                <!-- Message -->
                <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2" id="chat_user_8" data-user-id="8">
                  <span class="user-img position-relative d-inline-block">
                    <img src="../../package/assets/images/users/8.jpg" alt="user" class="rounded-circle w-100" />
                    <span class="profile-status rounded-circle offline"></span>
                  </span>
                  <div class="w-75 d-inline-block v-middle ps-3">
                    <h5 class="message-title mb-0 mt-1">Varun Dhavan</h5>
                    <span class="fs-2 text-nowrap d-block text-muted text-truncate">Just see the my admin!</span>
                    <span class="fs-2 text-nowrap d-block text-muted">9:02 AM</span>
                  </div>
                </a>
                <!-- Message -->
              </div>
            </li>
          </ul>
        </div>
        <!-- End Tab 2 -->
        <!-- Tab 3 -->
        <div class="tab-pane fade p-3" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
          <h6 class="mt-3 mb-3">Activity Timeline</h6>
          <div class="steamline">
            <div class="sl-item">
              <div class="sl-left bg-light-success text-success">
                <i data-feather="user" class="feather-sm fill-white"></i>
              </div>
              <div class="sl-right">
                <div class="font-weight-medium">
                  Meeting today
                  <span class="sl-date"> 5pm</span>
                </div>
                <div class="desc">you can write anything</div>
              </div>
            </div>
            <div class="sl-item">
              <div class="sl-left bg-light-info text-info">
                <i data-feather="camera" class="feather-sm fill-white"></i>
              </div>
              <div class="sl-right">
                <div class="font-weight-medium">Send documents to Clark</div>
                <div class="desc">Lorem Ipsum is simply</div>
              </div>
            </div>
            <div class="sl-item">
              <div class="sl-left">
                <img class="rounded-circle" alt="user" src="../../package/assets/images/users/2.jpg" />
              </div>
              <div class="sl-right">
                <div class="font-weight-medium">
                  Go to the Doctor
                  <span class="sl-date">5 minutes ago</span>
                </div>
                <div class="desc">Contrary to popular belief</div>
              </div>
            </div>
            <div class="sl-item">
              <div class="sl-left">
                <img class="rounded-circle" alt="user" src="../../package/assets/images/users/1.jpg" />
              </div>
              <div class="sl-right">
                <div><a href="javascript:void(0)">Stephen</a>
                  <span class="sl-date">5 minutes ago</span>
                </div>
                <div class="desc">Approve meeting with tiger</div>
              </div>
            </div>
            <div class="sl-item">
              <div class="sl-left bg-light-primary text-primary">
                <i data-feather="user" class="feather-sm fill-white"></i>
              </div>
              <div class="sl-right">
                <div class="font-weight-medium">
                  Meeting today
                  <span class="sl-date"> 5pm</span>
                </div>
                <div class="desc">you can write anything</div>
              </div>
            </div>
            <div class="sl-item">
              <div class="sl-left bg-light-info text-info">
                <i data-feather="send" class="feather-sm fill-white"></i>
              </div>
              <div class="sl-right">
                <div class="font-weight-medium">Send documents to Clark</div>
                <div class="desc">Lorem Ipsum is simply</div>
              </div>
            </div>
            <div class="sl-item">
              <div class="sl-left">
                <img class="rounded-circle" alt="user" src="../../package/assets/images/users/4.jpg" />
              </div>
              <div class="sl-right">
                <div class="font-weight-medium">
                  Go to the Doctor
                  <span class="sl-date">5 minutes ago</span>
                </div>
                <div class="desc">Contrary to popular belief</div>
              </div>
            </div>
            <div class="sl-item">
              <div class="sl-left">
                <img class="rounded-circle" alt="user" src="../../package/assets/images/users/6.jpg" />
              </div>
              <div class="sl-right">
                <div>
                  <a href="javascript:void(0)">Stephen</a>
                  <span class="sl-date">5 minutes ago</span>
                </div>
                <div class="desc">Approve meeting with tiger</div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Tab 3 -->
      </div>
    </div>
  </aside>
  <!-- ============================================================== -->
  <!-- End Wrapper -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- customizer Panel -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- All Jquery -->
  <!-- ============================================================== -->
  <script src="../../package/dist/libs/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap tether Core JavaScript -->
  <script src="../../package/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- apps -->
  <script src="../../package/dist/js/app.min.js"></script>
  <script src="../../package/dist/js/app.init.js"></script>
  <script src="../../package/dist/js/app-style-switcher.js"></script>
  <!-- slimscrollbar scrollbar JavaScript -->
  <script src="../../package/dist/libs/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.js"></script>
  <script src="../../package/dist/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
  <!--Wave Effects -->
  <script src="../../package/dist/js/waves/.js"></script>
  <!--Menu sidebar -->
  <script src="../../package/dist/js/sidebarmenu.js"></script>
  <!--Custom JavaScript -->
  <script src="../../package/dist/js/feather.min.js"></script>
  <script src="../../package/dist/js/custom.min.js"></script>
  <!--This page plugins -->
  <script src="../../package/dist/libs/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../../package/dist/js/pages/datatable/custom-datatable.js"></script>
  <!-- start - This is for export functionality only -->
  <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
  <script src="../../package/dist/js/pages/datatable/datatable-advanced.init.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

  <!--This page JavaScript Dashboard -->
  <script src="../../package/assets/extra-libs/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
  <script src="../../package/assets/extra-libs/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="../../package/dist/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../../package/dist/js/pages/dashboards/dashboard1.js"></script>

  <script>
    $(document).ready(function() {
      $('#file_export').DataTable();
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
  <script>
    feather.replace()
  </script>
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->

  <script>
    // Llenar el modal de edición con los datos de la empresa seleccionada
    $('#editmodel').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget); // Botón que activó el modal
      var id = button.data('id');
      var name = button.data('name');
      var address = button.data('address');
      var phone = button.data('phone');

      var modal = $(this);
      modal.find('.modal-body #edit-id').val(id);
      modal.find('.modal-body #edit-name').val(name);
      modal.find('.modal-body #edit-address').val(address);
      modal.find('.modal-body #edit-phone').val(phone);
      modal.find('form').attr('action', '/empresas/' + id); // Corregir la asignación de la acción del formulario
    });
  </script>

  <script>
    $(document).ready(function() {
      $('#createUserForm').on('submit', function(e) {
        e.preventDefault();
        var form = $(this);

        $.ajax({
          url: form.attr('action'),
          method: 'POST',
          data: form.serialize(),
          success: function(response) {
            if (response.success) {
              // Si la creación del usuario es exitosa, redirige a la vista de usuarios
              window.location.href = '/usuarios';
            } else {
              // Si hay errores, muéstralos en el modal
              var errorMessages = $('#error-messages');
              errorMessages.html('');
              errorMessages.removeClass('d-none');

              if (response.message.email) {
                errorMessages.append('<p>' + response.message.email[0] + '</p>');
              }
              if (response.message.password) {
                errorMessages.append('<p>' + response.message.password[0] + '</p>');
              }
              if (response.message) {
                errorMessages.append('<p>' + response.message + '</p>');
              }
            }
          },
          error: function(xhr) {
            // Maneja los errores del servidor
            var errorMessages = $('#error-messages');
            errorMessages.html('');
            errorMessages.removeClass('d-none');
            var errors = xhr.responseJSON.errors;
            $.each(errors, function(key, value) {
              errorMessages.append('<p>' + value[0] + '</p>');
            });
          }
        });
      });
    });
  </script>

  <script>
    $(document).ready(function() {
      $('.edit-company-button').click(function() {
        // Obtener los datos de la empresa desde el botón
        var id = $(this).data('id');
        var name = $(this).data('name');
        var address = $(this).data('address');
        var phone = $(this).data('phone');

        // Asignar los datos a los campos del formulario en la modal
        $('#edit-company-id').val(id);
        $('#edit-name').val(name);
        $('#edit-address').val(address);
        $('#edit-phone').val(phone);
      });
    });
  </script>


</body>

</html>