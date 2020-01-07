  <!-- Start Slider -->
  <section id="mu-slider">


    <!-- Start single slider item -->
    @foreach(SettingWeb::SlideBanner() as $key => $value)
    <?php 
    if(file_exists(public_path().'/upload/admin/banner/images/'.$value->banner_image) && $value->banner_image != null)
    {
    $image = asset('upload/admin/banner/images/'.$value->banner_image);
    }
    else{
    $image = asset('assets/member/images/no-image.png');
    }
    ?>
    <a href="{{$value->banner_url}}">
    <div class="mu-slider-single">
      <div class="mu-slider-img">
        <figure>
          <img src="{{$image}}">
          <span class="banner_title">{{$value->banner_title}}</span>
        </figure>
      </div>
    </div>
    </a>
     @endforeach
    <!-- Start single slider item -->


  </section>
  <!-- End Slider -->