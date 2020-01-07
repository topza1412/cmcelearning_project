 <!--เมนูซ้าย-->
 <?php 
 // var_dump(SettingWeb::CategoryMenu()['menu_main']);
 // var_dump(SettingWeb::CategoryMenu()['menu_sub_level1']);
 // exit;
 ?> 
  <nav id="menu-head">
    <div class="menuLeft">
      <input type="checkbox" id="drawer-toggle" name="drawer-toggle"/>
        <label for="drawer-toggle" id="drawer-toggle-label"></label>
      <nav id="drawer">
        <ul>

          <li class="search">
            <div class="input-group">
              <input type="text" class="form-control font-size-16 form-controlWork" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
              <div class="input-group-prepend">
                <button>
                  <span class="input-group-text input-group-textWork" id="basic-addon1">
                    <i class="fas fa-search font-size-16"></i>
                  </span>
                </button>
              </div>
              </div>
          </li>

          <li class="dropdown dropright flagMobile">
            <button class="btn btn-warning dropdown-toggle" type="button" data-toggle="dropdown">
            @if(app()->getLocale()=='en'){{{'EN'}}}@else{{{'TH'}}}@endif
            </button>
            <ul class="dropdown-menu dropdown-menuWork">
              <li><a tabindex="-1" href="{{url('locale/th')}}">TH</a></li>
              <li><a tabindex="-1" href="{{url('locale/en')}}">EN</a></li>
            </ul>
          </li>

          <li class="platernMobile"><a href="{{url('/')}}">หน้าแรก</a></li>
          <li class="platernMobile"><a href="{{url('about')}}">เกี่ยวกับเรา</a></li>
          <li class="platernMobile"><a href="{{url('joinwork')}}">ร่วมงานกับเรา</a></li>
          <li class="platernMobile"><a href="{{url('contact')}}">ติดต่อเรา</a></li>
          
          <?php 
          $i = 0;
          $menu_main = [];
          ?>
          @foreach(SettingWeb::CategoryMenu()['menu_main'] as $key => $value)
          @if($value->Cat_Submenu==0)
          <?php $url_title = ($value->Cat_SeoTitle!=null) ? $value->Cat_SeoTitle : $value->Cat_Name;?>
          <li><a href="{{url('category/'.$value->Cat_ID.'/'.$url_title)}}"><i class="fas fa-book"></i> {{$value->Cat_Name}}</a></li>
          @elseif($value->Cat_Submenu==1)
          <li class="dropdown dropright dropdownWork">
              <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
              <i class="fas fa-book"></i> {{$value->Cat_Name}}
            </button>
              <ul class="dropdown-menu dropdown-menuWork">
                @foreach(SettingWeb::CategoryMenu()['menu_sub_level1'] as $key2 => $value2)
                @if($value2->Cat_ID == $value->Cat_ID)
                <?php $url_title = ($value2->Scl1_SeoTitle!=null) ? $value2->Scl1_SeoTitle : $value2->Scl1_Name;?>
                  <li><a tabindex="-1" href="{{url('category/subcategory/1/'.$value2->Scl1_ID.'/'.$url_title)}}"><i class="fas fa-book"></i> {{$value2->Scl1_Name}}</a></li>
                @endif
                @endforeach
              </ul>
            </li>
          @endif
          @endforeach
          
        </ul>
      </nav>
    </div>
  </nav>
  <!--end เมนูซ้าย-->