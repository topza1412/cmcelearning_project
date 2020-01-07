<!-- header -->

  <!--START SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#">
      <i class="fa fa-angle-up"></i>      
    </a>
  <!-- END SCROLL TOP BUTTON -->

  <!-- Start header  -->
  <header id="mu-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="mu-header-area">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="mu-header-top-left" style="padding-top: 10px;">
                  <div class="mu-top-email">
                    <a href="mailto:{{SettingWeb::SettingWeb()->email_web}}">
                    <i class="fa fa-envelope"></i>
                    {{SettingWeb::SettingWeb()->email_web}}
                  </a>
                  </div>
                  <div class="mu-top-phone">
                    <a href="tel:{{SettingWeb::SettingWeb()->phone_web}}" class="text-primary">
                    <i class="fa fa-phone"></i>
                    {{SettingWeb::SettingWeb()->phone_web}}
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="mu-header-top-right">
                  @if(session('session_id')==null)
                  <a href="{{url('register')}}" class="btn btn-default" style="border: none;border-radius: 0px;padding: 10px 25px;color: #0072bc;">Register</a>
                  <a href="{{url('login')}}" class="btn btn-primary" style="border: none;border-radius: 0px;padding: 10px 25px;background-color: #0072bc;"><i class="fa fa-lock"></i> Login</a>
                  @else
                  <a href="{{url('dashboard')}}" class="btn btn-info" style="border: none;border-radius: 0px;padding: 10px 25px;background-color: #0072bc;">Dashboard</a>
                  <a href="{{url('logout')}}" class="btn btn-danger" style="border: none;border-radius: 0px;padding: 10px 25px;">Logout</a>
                  @endif

                  <!-- <nav>
                    <ul class="mu-top-social-nav">
                      <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                      <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                      <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                      <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                      <li><a href="#"><span class="fa fa-youtube"></span></a></li>
                    </ul>
                  </nav> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- End header  -->
  <!-- Start menu -->
  <section id="mu-menu">
    <nav class="navbar navbar-default" role="navigation">  
      <div class="container">
        <div class="navbar-header">
          <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- LOGO -->    
          <?php 
        if(file_exists(public_path().'/upload/admin/logo_web/images/'.SettingWeb::LogoWeb()) && SettingWeb::LogoWeb() != null)
        {
        $image = asset('upload/admin/logo_web/images/'.SettingWeb::LogoWeb());
        }
        else{
        $image = asset('assets/member/images/no-image.png');
        }
        ?>          
          <a class="navbar-brand" href="{{url('/')}}"><img src="{{$image}}" alt="logo" class="img-responsive"></a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
            <li class="@if(Request::segment('1')==null) active @endif"><a href="{{url('/')}}"><b>HOME</b></a></li>
            <li class="@if(Request::segment('1')=='about') active @endif"><a href="{{url('about')}}"><b>ABOUT US</b></a></li>
            <li class="@if(Request::segment('1')=='product') active @endif"><a href="{{url('product')}}"><b>OUR PRODUCTS</b></a></li>
            <li class="@if(Request::segment('1')=='course') active @endif"><a href="{{url('course')}}"><b>TRAINING COURSE</b></a></li>
             <li class="@if(Request::segment('1')=='news') active @endif"><a href="{{url('news')}}"><b>NEWS & EVENT</b></a></li>
              <li class="@if(Request::segment('1')=='contact') active @endif"><a href="{{url('contact')}}"><b>CONTACT US</b></a></li>            
            <!-- <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Course <span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="course.html">Course Archive</a></li>                
                <li><a href="course-detail.html">Course Detail</a></li>                
              </ul>
            </li>    -->                     
            <li><a href="#" id="mu-search-icon"><i class="fa fa-search"></i></a></li>
            <li>
              <a href="{{url('cart')}}" style="padding-left: 2px;">
                <img src="{{asset('assets/member/images/icon/shopping_bag.png')}}" width="15" height="16">
                <span class="cart-count">{{SettingWeb::CartCount()}}</span>
              </a>
            </li>
          </ul>                     
        </div><!--/.nav-collapse -->        
      </div>     
    </nav>
  </section>
  <!-- End menu -->
  <!-- Start search box -->
  <div id="mu-search">
    <div class="mu-search-area">      
      <button class="mu-search-close"><span class="fa fa-close"></span></button>
      <div class="container">
        <div class="row">
          <div class="col-md-12">            
            <form action="{{url('search')}}" class="mu-search-form" method="post">
              @csrf
              <input name="txt_search" type="search" required placeholder="Search Name , Price , Description of Course" autocomplete="off">              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End search box -->
