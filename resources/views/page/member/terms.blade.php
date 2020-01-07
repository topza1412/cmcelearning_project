@extends('layouts.member.template')

@section('detail') 

<section id="mu-course-content">
   <div class="container">
     <div class="row">
      <div class="col-md-12 text-left">
        <br>
      <a href="{{url('/')}}">Home</a> > <a href="{{url('terms')}}" class="text text-primary">Terms & Condition</a>
      <br><hr>
      </div>
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">

              @if(count($data['detail']->content)>0)
              <div class="col-md-12">
              {!! $data['detail']->content !!}
              </div>
              @else
              @include('page.member.data_not_found')
              @endif

              </div>

              </div>

           </div>
         </div>
       </div>
     </div>
   </div>
 <br>
 </section>
    
@stop

