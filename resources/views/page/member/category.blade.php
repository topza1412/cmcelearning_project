@extends('layouts.member.template')

@section('detail') 

<section id="mu-course-content">
   <div class="container">
     <div class="row">
      <div class="col-md-12 text-left">
      <a href="{{url('/')}}">Home</a> > <a href="{{url('course')}}" class="text-primary">Course</a>
      <hr>
      </div>
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">

              <div class="col-md-3">
                <!-- start sidebar -->
                <aside class="mu-sidebar">

                  <form name="form_search" id="form_search" method="post" action="{{url('course/search')}}">
                  @csrf
                  <input type="text" name="txt_search" class="form-control" placeholder="Search our course" required>
                  </form>
     
                 <br>

                  <!-- start single sidebar -->
                  <div class="mu-single-sidebar">
                    <h4><b>Course Categories</b></h4>
                    <ul class="mu-sidebar-catg">
                      @if(isset($data['category']))
                      @foreach ($data['category'] as $value)
                      <li><a href="{{url('course/category/'.$value->category_id.'/'.$value->category_name)}}">{{$value->category_name}}</a></li>
                      @endforeach
                      @endif
                    </ul>

                    <h4><b>Instructors</b></h4>
                    <ul class="mu-sidebar-catg">
                      <li><a href="#">Web Design</a></li>
                      <li><a href="">Web Development</a></li>
                      <li><a href="">Math</a></li>
                      <li><a href="">Physics</a></li>
                      <li><a href="">Camestry</a></li>
                      <li><a href="">English</a></li>
                    </ul>

                    <h4><b>Price</b></h4>
                    <div class="col-md-12">
                    <p>
                    <input type="text" id="amount" readonly style="border:0; color:#337ab7; font-weight:bold;">
                    </p>
                    <div id="price_range"></div>
                    </div>

                  </div>
                  <!-- end single sidebar -->

                  
                  <!-- start single sidebar -->
                  <div class="mu-single-sidebar">
                    <h4><b>All Course</b></h4>
                    <ul class="mu-sidebar-catg mu-sidebar-archives">
                      <li><a href="#">May <span>(25)</span></a></li>
                      <li><a href="">June <span>(35)</span></a></li>
                      <li><a href="">July <span>(20)</span></a></li>
                      <li><a href="">August <span>(125)</span></a></li>
                      <li><a href="">September <span>(45)</span></a></li>
                      <li><a href="">October <span>(85)</span></a></li>
                    </ul>
                  </div>
                  <!-- end single sidebar -->

                  <!-- start single sidebar -->
                  <div class="mu-single-sidebar">
                    <h3>Tags Cloud</h3>
                    <div class="tag-cloud">
                      <a href="#">Health</a>
                      <a href="#">Science</a>
                      <a href="#">Sports</a>
                      <a href="#">Mathematics</a>
                      <a href="#">Web Design</a>
                      <a href="#">Admission</a>
                      <a href="#">History</a>
                      <a href="#">Environment</a>
                    </div>
                  </div>
                  <!-- end single sidebar -->

                  <!-- start ads1 -->
                  <div class="mu-single-sidebar">
                   <img src="{{asset('assets/member/images/no-image.png')}}" class="img-responsive">
                  </div>
                  <!-- end ads1 -->

                  <!-- start ads2 -->
                  <div class="mu-single-sidebar">
                   <img src="{{asset('assets/member/images/no-image.png')}}" class="img-responsive">
                  </div>
                  <!-- end ads2 -->


                </aside>
                <!-- / end sidebar -->
             </div>

              <div class="col-md-9">
                <!-- start course content container -->
                <div class="mu-course-container">
                  <div class="row">

                    <input type="hidden" name="category_id" id="category_id" value="{{$data['category_id']}}">
                    
                    <div class="loader"></div>
                    <div id="tag_container">
                    <div id="show_course_category"></div>
                    </div>

                  </div>
                </div>
                <!-- end course content container -->

               
              </div>

           </div>
         </div>
       </div>
     </div>
   </div>
 </section>

@stop

