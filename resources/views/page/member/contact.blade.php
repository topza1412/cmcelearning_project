@extends('layouts.member.template')

@section('detail') 

<section id="mu-course-content">
    <div class="container">
     <div class="row">
        <div class="col-12">
          <div class="row">
            <div class="col-lg-12">
                <h2><b>Contact Us</b></h2>
                <hr>

                <div class="col-lg-8">
                @if(count($data['detail']->map_google)>0)
                 {!! $data['detail']->map_google !!}
                 @else
                 @include('page.member.data_not_found')
                 @endif
               </div>

               <div class="col-lg-4">
                @if(count($data['detail']->address)>0)
                 <b>Address:</b> {!! $data['detail']->address !!}
                 @else
                 @include('page.member.data_not_found')
                 @endif

                 @if(count($data['detail']->email)>0)
                 <b>Email:</b> {!! $data['detail']->email !!}
                 @else
                 @include('page.member.data_not_found')
                 @endif
               </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
    
@stop

