<!--Start footer -->
  <footer id="mu-footer">
    <!-- start footer top -->
    <div class="mu-footer-top">
      <div class="container">
        <div class="mu-footer-top-area">
          <div class="row">
            <div class="col-lg-4 col-md-3 col-sm-3">
              <div class="mu-footer-widget">
                <h4>Information</h4>
                <ul>
                  <li><a href="{{url('/')}}">Home</a></li>
                  <li><a href="{{url('about')}}">About Us</a></li>
                  <li><a href="{{url('product')}}">Our Products</a></li>
                  <li><a href="{{url('course')}}">Training Course</a></li>
                  <li><a href="{{url('news')}}">News & Event</a></li>
                  <li><a href="{{url('terms')}}">Terms & Condition</a></li>
                  <li><a href="{{url('contact')}}">Contact Us</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-3">
              <div class="mu-footer-widget">
                <h4>QUICK LINKS</h4>
                <ul>
                  <li><a href="{{url('about')}}">About Us</a></li>
                  <li><a href="{{url('product')}}">Our Products</a></li>
                  <li><a href="{{url('course')}}">Training Course</a></li>
                  <li><a href="{{url('news')}}">News & Event</a></li>
                  <li><a href="{{url('terms')}}">Terms & Condition</a></li>
                  <li><a href="{{url('contact')}}">Contact Us</a></li>             
                </ul>
              </div>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-3">
              <div class="mu-footer-widget" align="right">
                <h4>News letter</h4>
                <p>Get latest update, news & academic offers</p>
                <form class="form-horizontal" action="{{url('subscribe')}}" method="post">
                  @csrf
                  <div class="input-group">
                  <input name="email" type="email" class="form-control" required placeholder="Type your email">
                  <span class="input-group-addon btn btn-info" style="background-color: #0072bc; color:#fff;">Subscribe!</span>
                  </div>
                </form>

            <div class="alert">

            @include('layouts.member.flash-message')

            @if(count($errors))
                <div class="alert alert-danger alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <div style="padding: 10px;">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                  </div>
                </div>
           @endif

         </div>

              </div>
            </div>
            <!-- <div class="col-lg-3 col-md-3 col-sm-3">
              <div class="mu-footer-widget">
                <h4>Contact</h4>
                <address>
                  <p>Address</p>
                  <p>Phone: xxx </p>
                  <p>Website: xxx</p>
                  <p>Email: xxx</p>
                </address>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </div>
    <!-- end footer top -->
    <!-- start footer bottom -->
    <div class="mu-footer-bottom">
      <div class="container">
        <div class="mu-footer-bottom-area">
          <p>&copy; 2019 All Right Reserved. <a href="{{url('/')}}" rel="nofollow">{{SettingWeb::SettingWeb()->footer_web}}</a></p>
        </div>
      </div>
    </div>
    <!-- end footer bottom -->
  </footer>
  <!-- End footer