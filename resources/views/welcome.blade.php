<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, nice admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template" />
    <meta name="description" content="Nice is powerful and clean admin dashboard template" />
    <title>Mobsign</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../package/assets/images/favicon.png" />
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        (function(i, s, o, g, r, a, m) {
            i["GoogleAnalyticsObject"] = r;
            (i[r] =
                i[r] ||
                function() {
                    (i[r].q = i[r].q || []).push(arguments);
                }),
            (i[r].l = 1 * new Date());
            (a = s.createElement(o)), (m = s.getElementsByTagName(o)[0]);
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m);
        })(
            window,
            document,
            "script",
            "https://www.google-analytics.com/analytics.js",
            "ga"
        );
        ga("create", "UA-85622565-1", "auto");
        ga("send", "pageview");
    </script>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Main wrapper -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Header part -->
        <!-- ============================================================== -->
        <header class="topbar position-relative">
            <!-- ============================================================== -->
            <!-- Wave animation -->
            <!-- ============================================================== -->
            <div class="waveWrapper waveAnimation">
                <div class="waveWrapperInner bgTop">
                    <div class="wave waveTop" style="background-image: url('dist/images/wave-top.png')"></div>
                </div>
                <div class="waveWrapperInner bgMiddle">
                    <div class="wave waveMiddle" style="background-image: url('dist/images/wave-mid.png')"></div>
                </div>
                <div class="waveWrapperInner bgBottom">
                    <div class="wave waveBottom" style="background-image: url('dist/images/wave-bot.png')"></div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Wave animation -->
            <!-- ============================================================== -->
            <div class="container position-relative">
                <!-- Start Header -->
                <div class="header p-t-20">
                    <nav class="navbar navbar-expand-md navbar-dark">
                        <a class="navbar-brand" href="#">
                            <span class="db"><img src="../package/assets/images/logo-mobsign-400x93.png" alt="logo" /></span></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto">
                                <!-- <li class="nav-item">
                    <a class="nav-link scroll-link" href="#demos">Live Demos</a>
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link"
                      href="../docs/documentation.html"
                      target="_blank"
                      >Documentation</a
                    >
                  </li> -->
                                <li class="nav-item p-l-15">
                                    <a href="{{ route('login') }}" class="btn btn-custom btn-info" target="">Iniciar Sesión</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <!-- <div class="row header-banner align-items-center">
              <div class="col-lg-5">
                <h2>
                  Create Stunning User Inteface for your<span class="font-bold">
                    Applications</span
                  >
                  & <span class="font-bold">Products</span> with
                  <span class="text-info border-bottom border-info">
                    Nice Admin Pro!
                  </span>
                </h2>
                <p class="m-t-40">
                  <span class="font-bold text-dark"
                    >3+ Dashboard Variations,</span
                  >
                  900+ Page Templates, Unlimited Color Schemes,
                  <span class="font-bold text-dark">6+ Unique Demos,</span> 500+
                  UI Elements, 70+ Integrated Plugins & much more...
                </p>
                <a
                  href="#demos"
                  class="btn btn-custom-md btn-info m-t-40 m-b-40 dm-btn"
                  >Live Demo</a
                >
                <a
                  href="https://wrappixel.com/templates/niceadmin/"
                  class="
                    btn btn-custom-md btn-outline-info
                    m-t-40 m-b-40 m-l-10
                  "
                  >Buy Now!</a
                >
              </div>
              <div class="col-lg-6 offset-lg-1 text-end">
                <img
                  class="img-shadow img-fluid"
                  src="dist/images/db.jpg"
                  alt="db"
                />
              </div>
            </div> -->
                </div>
                <!-- End Header -->
            </div>
        </header>
        <!-- ============================================================== -->
        <!-- Header part -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Page wrapper part -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Demos part -->
            <!-- ============================================================== -->
            <!-- <section id="demos" class="demos spacer">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-7 text-center">
                <h1>Ready to use Demos for your project</h1>
                <p class="m-t-20">
                  Our Demos are awesomely designed and carefully crafted, which
                  helps you to create your project in no-time. Check them out!
                </p>
              </div>
              <div class="col-md-6 m-t-40">
                <div class="live-box bg-light text-center p-t-30 p-b-0">
                  <img
                    class="shadow img-fluid"
                    src="dist/images/1.jpg"
                    alt="d4"
                  />
                  <div class="overlay">
                    <a
                      class="btn btn-danger live-btn"
                      href="../package/html/ltr/index.html"
                      target="_blank"
                      >Live Preview</a
                    >
                  </div>
                </div>
                <div class="m-l-30 m-t-30">
                  <span class="font-12 font-bold text-uppercase"
                    >Neat and Clean</span
                  >
                  <h3>Left Sidebar Demo</h3>
                </div>
              </div>
              <div class="col-md-6 m-t-40">
                <div class="live-box bg-light text-center p-t-30 p-b-0">
                  <img
                    class="shadow img-fluid"
                    src="dist/images/2.jpg"
                    alt="d4"
                  />
                  <div class="overlay">
                    <a
                      class="btn btn-danger live-btn"
                      href="../package/html/minisidebar/index2.html"
                      target="_blank"
                      >Live Preview</a
                    >
                  </div>
                </div>
                <div class="m-l-30 m-t-30">
                  <span class="font-12 font-bold text-uppercase"
                    >Modern and Trendy</span
                  >
                  <h3>Mini Sidebar Demo</h3>
                </div>
              </div>
              <div class="col-md-6 m-t-40">
                <div class="live-box bg-light text-center p-t-30 p-b-0">
                  <img
                    class="shadow img-fluid"
                    src="dist/images/3.jpg"
                    alt="d4"
                  />
                  <div class="overlay">
                    <a
                      class="btn btn-danger live-btn"
                      href="../package/html/horizontal/index3.html"
                      target="_blank"
                      >Live Preview</a
                    >
                  </div>
                </div>
                <div class="m-l-30 m-t-30">
                  <span class="font-12 font-bold text-uppercase"
                    >Minimal and Clean</span
                  >
                  <h3>Horizontal Demo</h3>
                </div>
              </div>

              <div class="col-md-6 m-t-40">
                <div class="live-box bg-light text-center p-t-30 p-b-0">
                  <img
                    class="shadow img-fluid"
                    src="dist/images/4.jpg"
                    alt="d4"
                  />
                  <div class="overlay">
                    <a
                      class="btn btn-danger live-btn"
                      href="../package/html/dark/index2.html"
                      target="_blank"
                      >Live Preview</a
                    >
                  </div>
                </div>
                <div class="m-l-30 m-t-30">
                  <span class="font-12 font-bold text-uppercase"
                    >Pure Classic</span
                  >
                  <h3>Dark Version Demo</h3>
                </div>
              </div>

              <div class="col-md-6 m-t-40">
                <div class="live-box bg-light text-center p-t-30 p-b-0">
                  <img
                    class="shadow img-fluid"
                    src="dist/images/5.jpg"
                    alt="d4"
                  />
                  <div class="overlay">
                    <a
                      class="btn btn-danger live-btn"
                      href="../package/html/iconbar/index.html"
                      target="_blank"
                      >Live Preview</a
                    >
                  </div>
                </div>
                <div class="m-l-30 m-t-30">
                  <span class="font-12 font-bold text-uppercase"
                    >Stunning Combination</span
                  >
                  <h3>Iconbar Demo</h3>
                </div>
              </div>

              <div class="col-md-6 m-t-40">
                <div class="live-box bg-light text-center p-t-30 p-b-0">
                  <img
                    class="shadow img-fluid"
                    src="dist/images/6.jpg"
                    alt="d4"
                  />
                  <div class="overlay">
                    <a
                      class="btn btn-danger live-btn"
                      href="../package/html/rtl/index3.html"
                      target="_blank"
                      >Live Preview</a
                    >
                  </div>
                </div>
                <div class="m-l-30 m-t-30">
                  <span class="font-12 font-bold text-uppercase"
                    >Right to Left Version</span
                  >
                  <h3>RTL Demo</h3>
                </div>
              </div>
            </div>
          </div>
        </section> -->
            <!-- ============================================================== -->
            <!-- Apps part -->
            <!-- ============================================================== -->
            <!-- <section id="apps" class="spacer bg-light">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-7 text-center">
                <h1>Ready to use Apps for your project</h1>
                <p class="m-t-20">
                  Our Apps are awesomely designed and carefully crafted, which
                  helps you to create your project in no-time. Check them out!
                </p>
              </div>
              <div class="col-md-6 m-t-40">
                <div class="live-box bg-white text-center p-t-30 p-b-0">
                  <img
                    class="shadow img-fluid"
                    src="dist/images/app-mail.jpg"
                    alt="d4"
                  />
                  <div class="overlay">
                    <a
                      class="btn btn-danger live-btn"
                      href="../package/html/ltr/inbox-email.html"
                      target="_blank"
                      >Live Preview</a
                    >
                  </div>
                </div>
                <div class="m-l-30 m-t-30">
                  <span class="font-12 font-bold text-uppercase"
                    >Awesome Design</span
                  >
                  <h3>Email Application</h3>
                </div>
              </div>
              <div class="col-md-6 m-t-40">
                <div class="live-box bg-white text-center p-t-30 p-b-0">
                  <img
                    class="shadow img-fluid"
                    src="dist/images/app-taskboard.jpg"
                    alt="d4"
                  />
                  <div class="overlay">
                    <a
                      class="btn btn-danger live-btn"
                      href="../package/html/ltr/app-taskboard.html"
                      target="_blank"
                      >Live Preview</a
                    >
                  </div>
                </div>
                <div class="m-l-30 m-t-30">
                  <span class="font-12 font-bold text-uppercase"
                    >Easy to Use</span
                  >
                  <h3>Taskboard Application</h3>
                </div>
              </div>
              <div class="col-md-6 m-t-40">
                <div class="live-box bg-white text-center p-t-30 p-b-0">
                  <img
                    class="shadow img-fluid"
                    src="dist/images/app-invoice.jpg"
                    alt="d4"
                  />
                  <div class="overlay">
                    <a
                      class="btn btn-danger live-btn"
                      href="../package/html/ltr/app-invoice.html"
                      target="_blank"
                      >Live Preview</a
                    >
                  </div>
                </div>
                <div class="m-l-30 m-t-30">
                  <span class="font-12 font-bold text-uppercase"
                    >Ready to Use</span
                  >
                  <h3>
                    Invoice Application
                    <span class="ml-2 badge badge-danger font-weight-normal"
                      >New</span
                    >
                  </h3>
                </div>
              </div>
              <div class="col-md-6 m-t-40">
                <div class="live-box bg-white text-center p-t-30 p-b-0">
                  <img
                    class="shadow img-fluid"
                    src="dist/images/app-todo.jpg"
                    alt="d4"
                  />
                  <div class="overlay">
                    <a
                      class="btn btn-danger live-btn"
                      href="../package/html/ltr/app-todo.html"
                      target="_blank"
                      >Live Preview</a
                    >
                  </div>
                </div>
                <div class="m-l-30 m-t-30">
                  <span class="font-12 font-bold text-uppercase"
                    >Ready to Use</span
                  >
                  <h3>
                    Todo Application
                    <span class="ml-2 badge badge-danger font-weight-normal"
                      >New</span
                    >
                  </h3>
                </div>
              </div>
              <div class="col-md-6 m-t-40">
                <div class="live-box bg-white text-center p-t-30 p-b-0">
                  <img
                    class="shadow img-fluid"
                    src="dist/images/app-note.jpg"
                    alt="d4"
                  />
                  <div class="overlay">
                    <a
                      class="btn btn-danger live-btn"
                      href="../package/html/ltr/app-notes.html"
                      target="_blank"
                      >Live Preview</a
                    >
                  </div>
                </div>
                <div class="m-l-30 m-t-30">
                  <span class="font-12 font-bold text-uppercase"
                    >Ready to Use</span
                  >
                  <h3>
                    Notes Application
                    <span class="ml-2 badge badge-danger font-weight-normal"
                      >New</span
                    >
                  </h3>
                </div>
              </div>
              <div class="col-md-6 m-t-40">
                <div class="live-box bg-white text-center p-t-30 p-b-0">
                  <img
                    class="shadow img-fluid"
                    src="dist/images/app-calendar.jpg"
                    alt="d4"
                  />
                  <div class="overlay">
                    <a
                      class="btn btn-danger live-btn"
                      href="../package/html/ltr/app-calendar.html"
                      target="_blank"
                      >Live Preview</a
                    >
                  </div>
                </div>
                <div class="m-l-30 m-t-30">
                  <span class="font-12 font-bold text-uppercase"
                    >Clean and Modern</span
                  >
                  <h3>Calendar Application</h3>
                </div>
              </div>
              <div class="col-md-6 m-t-40">
                <div class="live-box bg-white text-center p-t-30 p-b-0">
                  <img
                    class="shadow img-fluid"
                    src="dist/images/app-chat.jpg"
                    alt="d4"
                  />
                  <div class="overlay">
                    <a
                      class="btn btn-danger live-btn"
                      href="../package/html/ltr/app-chats.html"
                      target="_blank"
                      >Live Preview</a
                    >
                  </div>
                </div>
                <div class="m-l-30 m-t-30">
                  <span class="font-12 font-bold text-uppercase"
                    >Ready to Use</span
                  >
                  <h3>Chat Application</h3>
                </div>
              </div>
              <div class="col-md-6 m-t-40">
                <div class="live-box bg-white text-center p-t-30 p-b-0">
                  <img
                    class="shadow img-fluid"
                    src="dist/images/app-contact.jpg"
                    alt="d4"
                  />
                  <div class="overlay">
                    <a
                      class="btn btn-danger live-btn"
                      href="../package/html/ltr/app-contacts.html"
                      target="_blank"
                      >Live Preview</a
                    >
                  </div>
                </div>
                <div class="m-l-30 m-t-30">
                  <span class="font-12 font-bold text-uppercase"
                    >Killer Listing</span
                  >
                  <h3>Contact Application</h3>
                </div>
              </div>
              <div class="col-md-6 m-t-40">
                <div class="live-box bg-white text-center p-t-30 p-b-0">
                  <img
                    class="shadow img-fluid"
                    src="dist/images/app-contact-list.jpg"
                    alt="d4"
                  />
                  <div class="overlay">
                    <a
                      class="btn btn-danger live-btn"
                      href="../package/html/ltr/ui-user-contacts.html"
                      target="_blank"
                      >Live Preview</a
                    >
                  </div>
                </div>
                <div class="m-l-30 m-t-30">
                  <span class="font-12 font-bold text-uppercase"
                    >Killer Listing</span
                  >
                  <h3>Contact List Application</h3>
                </div>
              </div>
              <div class="col-md-6 m-t-40">
                <div class="live-box bg-white text-center p-t-30 p-b-0">
                  <img
                    class="shadow img-fluid"
                    src="dist/images/app-ticket.jpg"
                    alt="d4"
                  />
                  <div class="overlay">
                    <a
                      class="btn btn-danger live-btn"
                      href="../package/html/ltr/ticket-list.html"
                      target="_blank"
                      >Live Preview</a
                    >
                  </div>
                </div>
                <div class="m-l-30 m-t-30">
                  <span class="font-12 font-bold text-uppercase"
                    >Easier and Faster</span
                  >
                  <h3>Ticket Application</h3>
                </div>
              </div>
            </div>
          </div>
        </section> -->
            <!-- ============================================================== -->
            <!-- Feature part 2 -->
            <!-- ============================================================== -->
            <!-- <section id="feature2" class="feature2 spacer">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-7 text-center">
                <h1>Features which will Amaze you!</h1>
                <p class="m-t-20">
                  We know how important is for you to save time and create
                  something stunning for your client, its easily possible with
                  Nice admin
                </p>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-3 col-md-6 text-center m-t-40">
                <span>
                  <i class="icon-magic-wand text-info display-6"></i>
                </span>
                <h4 class="m-t-30">6 Color Schemes</h4>
                <p class="m-t-20">
                  We have included 6 pre-defined color schemes with Nice admin.
                </p>
              </div>
              <div class="col-lg-3 col-md-6 text-center m-t-40">
                <span>
                  <i class="icon-film display-6 text-info"></i>
                </span>
                <h4 class="m-t-30">Colored / Dark / Light Sidebar</h4>
                <p class="m-t-20">
                  Options available to select suitable sidebar for your project
                </p>
              </div>
              <div class="col-lg-3 col-md-6 text-center m-t-40">
                <span>
                  <i class="icon-drawar text-info display-6"></i>
                </span>
                <h4 class="m-t-30">900+ Page Templates</h4>
                <p class="m-t-20">
                  Yes, we have added 900+ Pages template to make it easier.
                </p>
              </div>
              <div class="col-lg-3 col-md-6 text-center m-t-40">
                <span>
                  <i class="icon-equalizer text-info display-6"></i>
                </span>
                <h4 class="m-t-30">500+ UI Components</h4>
                <p class="m-t-20">
                  You will get more than 500 unique UI Components
                </p>
              </div>
            </div>
            <div class="row m-t-40">
              <div class="col-lg-3 col-md-6 text-center m-t-40">
                <span>
                  <i class="icon-grid text-info display-6"></i>
                </span>
                <h4 class="m-t-30">Lots of Widgets</h4>
                <p class="m-t-20">
                  Widgets are important and we have included lots of them
                </p>
              </div>
              <div class="col-lg-3 col-md-6 text-center m-t-40">
                <span>
                  <i class="icon-tag text-info display-6"></i>
                </span>
                <h4 class="m-t-30">Bootstrap 5</h4>
                <p class="m-t-20">
                  Nice admin is build with latest Bootstrap 5 Framework
                </p>
              </div>
              <div class="col-lg-3 col-md-6 text-center m-t-40">
                <span>
                  <i class="icon-diamond text-info display-6"></i>
                </span>
                <h4 class="m-t-30">2000+ Font Icons</h4>
                <p class="m-t-20">Included more than 2000 Premium Font Icons</p>
              </div>
              <div class="col-lg-3 col-md-6 text-center m-t-40">
                <span>
                  <i class="icon-screen-desktop text-info display-6"></i>
                </span>
                <h4 class="m-t-30">Fully Responsive</h4>
                <p class="m-t-20">
                  Nice admin is fully responsive with Bootstrap Framework
                </p>
              </div>
            </div>
            <div class="row m-t-40">
              <div class="col-lg-3 col-md-6 text-center m-t-40">
                <span>
                  <i class="icon-layers text-info display-6"></i>
                </span>
                <h4 class="m-t-30">Lots of Table Example</h4>
                <p class="m-t-20">
                  We made sure that you get lots of table options to choose
                </p>
              </div>
              <div class="col-lg-3 col-md-6 text-center m-t-40">
                <span>
                  <i class="icon-shuffle display-6 text-info"></i>
                </span>
                <h4 class="m-t-30">Easy to Customize</h4>
                <p class="m-t-20">
                  Our Template is easy to do any required changes
                </p>
              </div>
              <div class="col-lg-3 col-md-6 text-center m-t-40">
                <span>
                  <i class="icon-pie-chart text-info display-6"></i>
                </span>
                <h4 class="m-t-30">Lots of Chart Options</h4>
                <p class="m-t-20">
                  Included best possible chart options for your project
                </p>
              </div>
              <div class="col-lg-3 col-md-6 text-center m-t-40">
                <span>
                  <i class="icon-cloud-upload text-info display-6"></i>
                </span>
                <h4 class="m-t-30">Multiple File Uploads</h4>
                <p class="m-t-20">
                  Option to upload more than one file at one time
                </p>
              </div>
            </div>
            <div class="row m-t-40">
              <div class="col-lg-3 col-md-6 text-center m-t-40">
                <span>
                  <i class="icon-docs display-6 text-info"></i>
                </span>
                <h4 class="m-t-30">Validation Forms</h4>
                <p class="m-t-20">
                  We have included validation forms with Nice admin
                </p>
              </div>
              <div class="col-lg-3 col-md-6 text-center m-t-40">
                <span>
                  <i class="icon-basket text-info display-6"></i>
                </span>
                <h4 class="m-t-30">eCommerce Pages</h4>
                <p class="m-t-20">
                  If you are eCommerce company, you got covered
                </p>
              </div>
              <div class="col-lg-3 col-md-6 text-center m-t-40">
                <span>
                  <i class="icon-calender display-6 text-info"></i>
                </span>
                <h4 class="m-t-30">Calendar Design</h4>
                <p class="m-t-20">
                  We have included Calendar application with Nice admin
                </p>
              </div>
              <div class="col-lg-3 col-md-6 text-center m-t-40">
                <span>
                  <i class="icon-picture display-6 text-info"></i>
                </span>
                <h4 class="m-t-30">Gallery Options</h4>
                <p class="m-t-20">
                  Included gallery options for you to showcase products
                </p>
              </div>
            </div>
          </div>
        </section>  -->
            <!-- ============================================================== -->
            <!-- Footer part -->
            <!-- ============================================================== -->
            <section id="footer" class="footer">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-5">
                            <!--<img
                  class="img-shadow img-fluid"
                  src="dist/images/db.jpg"
                  alt="db"
                /> -->
                        </div>
                        <div class="col-lg-6 offset-lg-1">
                            <!-- <h1 class="m-t-40">
                  Create Stunning User Interface for your
                  <span class="font-bold">Application</span> &
                  <span class="font-bold">Products</span> with
                  <span class="text-info"> Nice Admin Pro! </span>
                </h1>
                <p class="m-t-40">
                  <span class="font-bold text-dark"
                    >3+ Dashboard Variations,</span
                  >
                  900+ Page Templates, Unlimited Color Schemes,
                  <span class="font-bold text-dark">6+ Unique Demos,</span> 500+
                  UI Elements, 70+ Integrated Plugins & much more...
                </p>
                <a
                  href="https://wrappixel.com/templates/niceadmin/"
                  class="btn btn-custom btn-info btn-lg m-t-30"
                  >Buy Now</a
                >  -->
                            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- ============================================================== -->
        <!-- End page wrapperHeader part -->
        <!-- ============================================================== -->
    </div>
</body>
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="../package/dist/libs/jquery/dist/jquery.min.js"></script>
<script src="../package/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/custom.js"></script>

</html>