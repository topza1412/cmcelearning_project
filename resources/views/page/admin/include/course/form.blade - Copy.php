<script type="text/javascript">
$('#form_pre_post')[0].reset();
</script>

<div class="row">
<div class="col-sm-12">

   @include('layouts.admin.flash-message')

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

   @if($data['page']=='Main')

   @if(isset($data['detail']['course_name']))
    <?php $course = $data['detail']['course_name'];?>
    @else
    <?php $course = null;?>
    @endif

   @if(isset($data['detail']['course_cat_id']))
    <?php $category_id = $data['detail']['course_cat_id'];?>
    @else
    <?php $category_id = null;?>
    @endif

    @if(isset($data['detail']['course_teacher_id']))
    <?php $teacher_id = $data['detail']['course_teacher_id'];?>
    @else
    <?php $teacher_id = null;?>
    @endif

    @if(isset($data['detail']['course_vdo_url']))
    <?php $vdo_url = $data['detail']['course_vdo_url'];?>
    @else
    <?php $vdo_url = null;?>
    @endif

    @if(isset($data['detail']['course_price']))
    <?php $course_price = $data['detail']['course_price'];?>
    @else
    <?php $course_price = null;?>
    @endif

    @if(isset($data['detail']['course_description']))
    <?php $course_description = $data['detail']['course_description'];?>
    @else
    <?php $course_description = null;?>
    @endif

    @if(isset($data['detail']['course_description']))
    <?php $course_description = $data['detail']['course_description'];?>
    @else
    <?php $course_description = null;?>
    @endif

    @if(file_exists(public_path().'/upload/member/course/images/'.$data['detail']['course_image']) && $data['detail']['course_image']!=null)
    <?php $img = asset('upload/member/course/images/'.$data['detail']['course_image']);?>
    @else
    <?php $img = asset('assets/member/images/no-image.png');?>
    @endif

    @if(isset($data['detail']['course_is_required']))
    <?php $course_is_required_id = $data['detail']['course_is_required'];?>
    @else
    <?php $course_is_required_id = null;?>
    @endif

    @if(isset($data['pre_post_test']['pretest_header']))
    <?php $pretest = $data['pre_post_test']['pretest_header'];?>
    @else
    <?php $pretest = null;?>
    @endif

    @if(isset($data['pre_post_test']['posttest_header']))
    <?php $posttest = $data['pre_post_test']['posttest_header'];?>
    @else
    <?php $posttest = null;?>
    @endif

    @if(isset($data['pre_post_test']['score_required']))
    <?php $score = $data['pre_post_test']['score_required'];?>
    @else
    <?php $score = null;?>
    @endif


    @if(isset($data['question']['question']))
    <?php $question = $data['question']['question'];?>
    @else
    <?php $question = null;?>
    @endif

    @if(isset($data['question']['question_type']))
    <?php $question_type = $data['question']['question_type'];?>
    @else
    <?php $question_type = null;?>
    @endif

    @if(isset($data['question']['choices']))
    <?php $choices = $data['question']['choices'];?>
    @else
    <?php $choices = null;?>
    @endif

    @if(isset($data['question']['answers']))
    <?php $answers = $data['question']['answers'];?>
    @else
    <?php $answers = null;?>
    @endif

    @if(isset($data['detail']['course_status']))
    <?php $status = $data['detail']['course_status'];?>
    @else
    <?php $status = null;?>
    @endif



    <section class="panel panel-default">
      <header class="panel-heading">
        <span class="h4">{{$data['action']}} Course</span>
      </header>

      <div class="panel-body">                     
       
       <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item active">
        <a class="nav-link" id="course-tab" data-toggle="tab" href="#course" role="tab" aria-controls="home" aria-selected="true">Course detail</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pre-tab" data-toggle="tab" href="#pre" role="tab" aria-controls="profile" aria-selected="false">Pre & Post Test</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="lessons-tab" data-toggle="tab" href="#lessons" role="tab" aria-controls="contact" aria-selected="false">Lessons</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="gradebook-tab" data-toggle="tab" href="#gradebook" role="tab" aria-controls="contact" aria-selected="false">Gradebook</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">

      <div class="tab-pane fade active in" id="course" role="tabpanel" aria-labelledby="course-tab">

         <form class="form-horizontal" action="{{url('admin/course/'.$data['page'].'/action')}}" method="post" enctype="multipart/form-data" autocomplete="off">
       @csrf

       <input type="hidden" name="img_hidden" value="{{$data['detail']['course_image']}}">

       <input type="hidden" name="type_action" value="{{$data['action']}}">

      <input type="hidden" name="id" value="@if(isset($data['id'])){{$data['id']}}@else{{''}}@endif">

        <div class="col-lg-7">

        <br>

        <div class="form-group col-sm-12">
          <label>Course Name</label>
          <input name="course_name" type="text" class="form-control" placeholder="Course Name" value="{{$course}}" required>
        </div>
         <div class="form-group col-sm-12">
          <label>Category</label>
          <select name="category" class="form-control" required>
          <option value="">Select</option>
          @foreach($data['category'] as $value)
          <option value="{{$value->category_id}}" @if($category_id==$value->category_id){{'selected'}}@endif>{{$value->category_name}}</option>  
          @endforeach  
          </select>
        </div>
        <div class="form-group col-sm-12">
          <label>Teacher</label>
          <select name="teacher" class="form-control" required>
          <option value="">Select</option>
          @foreach($data['teacher'] as $value)
          <option value="{{$value->user_id}}" @if($teacher_id==$value->user_id){{'selected'}}@endif>{{$value->first_name.' '.$value->last_name}}</option>  
          @endforeach  
          </select>
        </div>
        <div class="form-group col-sm-12">
          <label>Video Url</label>
          <input name="video_url" type="text" class="form-control" placeholder="Embed Video" value="{{$vdo_url}}" required>
        </div>
        <div class="form-group col-sm-12">
          <label>Price Course</label>
          <div class="input-group">
          <span class="input-group-addon">$</span>
          <input name="price" type="number" class="form-control" placeholder="Price Course" value="{{$course_price}}" required>
          <span class="input-group-addon">.00</span>
         </div>
        </div>
        <div class="form-group col-sm-12">
          <label>Description</label>
          <textarea name="description" class="form-control ckeditor" placeholder="Course Description" required>{{$course_description}}</textarea>
        </div>
        <div class="form-group col-sm-12">
          <label>Course is required</label>
          <select name="course_is_required" class="form-control">
          <option value="">Select</option>
          @foreach($data['course_is_required'] as $value)
          <option value="{{$value->course_id}}" @if($course_is_required_id==$value->course_id){{'selected'}}@endif>{{$value->course_name}}</option>  
          @endforeach  
          </select>
        </div>

        </div>

        <div class="col-lg-5">

        <br>

        <div class="form-group col-sm-12">
          <div align="center">
            <a href="{{$img}}" target="_blank">
              <img src="{{$img}}" width="300" class="img-thumbnail">
              </a>
          </div>
          <br>
          <input type="file" name="img" class="form-control" id="img">
          <p class="text-danger">Only support jpeg, jpg, png files. || Upload file a maximum of 2 mb.</p>
        </div>

        <div class="col-sm-5">
            <div class="line line-dashed line-lg pull-in"></div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Status</label>
              <div class="col-sm-9">
                <label class="switch">
                  <input name="status" type="checkbox" @if($status==1){{'checked'}}@endif value="1">
                  <span></span>
                </label>
              </div>
            </div>
          </div>
         
        </div>

        <div class="col-lg-12">

        <footer class="panel-footer text-right bg-light lter">
        <button type="submit" class="btn btn-success btn-s-xs">Save</button>
        <button type="reset" class="btn btn-danger btn-s-xs">Cancel</button>
        </footer>

      </div>

      </form>

      </div>


      <div class="tab-pane fade" id="pre" role="tabpanel" aria-labelledby="pre-tab">

        <form id="form_pre_post" class="form-horizontal" action="{{url('admin/course/'.$data['page'].'/action')}}" method="post" enctype="multipart/form-data" autocomplete="off">
       @csrf

       <input type="hidden" name="type_action" value="{{$data['action']}}">

      <input type="hidden" name="id" value="@if(isset($data['id'])){{$data['id']}}@else{{''}}@endif">
      
        <div class="col-lg-3">

        <br>

        <div class="form-group col-sm-12">
          <label>Pretest header</label>
          <input name="pretest" type="text" class="form-control" placeholder="Pretest header" value="{{$pretest}}" required>
        </div>

        </div>

        <div class="col-lg-3">

        <br>
        
        <div class="form-group col-sm-12">
          <label>Posttest header</label>
          <input name="posttest" type="text" class="form-control" placeholder="Posttest header" value="{{$posttest}}" required>
        </div>
         
        </div>

        <div class="col-lg-3">

        <br>

        <div class="form-group col-sm-12">
          <label>Minimum score required</label>
          <input name="score" type="text" class="form-control" placeholder="Minimum score required" value="{{$score}}" required>
        </div>

        </div>

        <div class="col-lg-3">

        <br>

        <div class="form-group col-sm-12">
          <label>Question type</label>
          <select name="question_type" id="question_type" class="form-control" required>
          <option value="">Select</option>
          <option value="1" @if($question_type==1){{'selected'}}@endif>คำถามปรนัย</option>  
          <option value="2" @if($question_type==2){{'selected'}}@endif>คำถามอัตนัย</option>      
          </select>
        </div>

        </div>

        <div id="show_question1" style="display: none;">

        <div class="col-lg-6">

        <button type="button" id="addRow" class="btn btn-warning btn-s-xs">Add Question <i class="fa fa-plus"></i></button>

        <br><br>

        </div>

        <div class="clearfix"></div>

        <div class="col-lg-6">

        <table border="0" width="100%" id="mytbl">

        <tbody>
        <tr>
        <td width="100%" class="alert alert-success">

        <div class="form-group col-sm-10">
          <label class="text-info"><b>Question</b></label>
          <input name="question[]" type="text" class="form-control" placeholder="Question" value="{{$question}}" required>
        </div>

        <div class="form-group col-sm-2 text-right" style="padding: 5px;">
          <button type="button" class="btn btn-danger" onclick="doRemoveItem(this);"><i class="fa fa-trash-o"></i></button>
        </div>

        <div class="clearfix"></div>
      
        <button type="button" id="addRow2" class="btn btn-info btn-s-xs addRow2">Add Choice <i class="fa fa-plus"></i></button>

        <br><br>

        <div id="add_row">

        <div class="form-group col-sm-10">
          <label><b>Choice</b> <button type="button" class="btn btn-danger btn-xs" onclick="doRemoveItem2(this);"><i class="fa fa-trash-o"></i></button></label>
          <input name="choices[]" type="text" class="form-control" placeholder="Choice" value="{{$choices}}" required>
        </div>

        <div class="form-group col-sm-2">
          &nbsp;&nbsp;<label><b>Answer</b></label>
          <div style="padding: 5px;">
          &nbsp;&nbsp;&nbsp;&nbsp;<input name="answers[]" type="radio" @if($answers=='true'){{'checked'}}@endif value="true">
        </div>
        </div>


      </div>


        </td>
        </tr>

      
    </tbody>

    </table>

        </div>

      </div>


      <div id="show_question2" style="display: none;">

        <div class="col-lg-6">

        <button type="button" id="addRow3" class="btn btn-primary btn-s-xs">Add Question <i class="fa fa-plus"></i></button>

        <br><br>

        </div>

        <div class="clearfix"></div>

        <div class="col-lg-6">

        <table border="0" width="100%" class="mytbl3">
        <tr>
        <td width="100%" class="alert alert-success">

        <div class="form-group col-sm-10">
          <label class="text-info"><b>Question</b></label>
          <input name="question2[]" type="text" class="form-control" placeholder="Question" value="{{$question}}" required>
        </div>

        <div class="form-group col-sm-2 text-right" style="padding: 5px;">
          <button type="button" class="btn btn-danger" onclick="doRemoveItem2(this);"><i class="fa fa-trash-o"></i></button>
        </div>

          </td>
        </tr>

    </table>

        </div>

      </div>

       <div class="col-lg-12">

        <footer class="panel-footer text-right bg-light lter">
        <button type="submit" class="btn btn-success btn-s-xs">Save</button>
        <button type="reset" class="btn btn-danger btn-s-xs">Cancel</button>
        </footer>

      </div>

      </form>


      </div>


      <div class="tab-pane fade" id="lessons" role="tabpanel" aria-labelledby="lessons-tab">

        <br>

        <div class="col-lg-12 text-right">
                 <button type="button" class="btn btn-primary" onclick="btn_create_lesson('Create','{{$data['lesson']['document_file']}}','{{$data['detail']['course_id']}}','{{$data['lesson']['lesson_id']}}');"><i class="fa fa-plus"></i> Create</button>
                </div>
        <br><br><br>
        
       <form action="{{url('admin/course/'.$data['page'].'/search')}}" method="post" enctype="multipart/form-data">
                    @csrf

                  <div class="col-sm-5 m-b-xs">
                    <div class="col-sm-6">
                    <div class="input-group">
                    <input type="text" name="date_start" class="input-sm form-control datepicker-input" placeholder="Start Date">
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button"><i class="fa fa-calendar"></i></button>
                      </span>
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="input-group">
                    <input type="text" name="date_end" id="date_end" class="input-sm form-control datepicker-input" placeholder="End Date">
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button"><i class="fa fa-calendar"></i></button>
                      </span>
                    </div>
                    </div>             
                  </div>

                  <div class="col-sm-5 m-b-xs">
                  <div class="col-sm-5">
                  <select name="status" class="input-sm form-control ">
                    <option value="">=======Status========</option>
                      <option value="1">Activate</option>
                      <option value="0">Draft</option>
                    </select>
                    </div>
                    <div class="col-sm-7">
                    <div class="input-group">
                      <input name="txt_search" type="text" class="input-sm form-control" placeholder="Search">
                      <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button">Search</button>
                      </span>
                    </div>
                    </div>
                  </div>

                  <div class="col-sm-2">
                    <button type="submit" class="btn btn-sm btn-info">Apply Filter</button>
                    <button type="reset" class="btn btn-sm btn-warning">Reset Filter</button>
                  </div>

              </form>

        <div class="row">
                            <div class="col-lg-12">  
                                 <br>
                            <table class="table table-striped b-t b-light"  cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Lesson Name</th>
                                        <th>Status</th>
                                        <th>Create Date</th>
                                        <th>Modify Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($data['lesson'])>0)
                                <?php $i = 1;?>
                                @foreach($data['lesson'] as $value)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$value->lesson_name}}</a></td>
                                    <td>
                                    @if($value->lesson_status==1)
                                    <span class="label label-success">Activate</span>
                                    @else
                                    <span class="label label-warning">Draft</span>
                                    @endif
                                    </td>
                                    <td>{{date("d-m-Y",strtotime($value->date_create))}}</td>
                                    <td>{{date("d-m-Y",strtotime($value->date_update))}}</td>                                 
                                    <td>
                                    <a  href="javascript:void()" class="btn btn-success" onclick="btn_create_lesson('Edit','{{$value->document_file}}','{{$value->course_id}}','{{$value->lesson_id}}','{{$value->lesson_name}}','{{$value->lesson_vdo_url}}','{{$value->lesson_content}}','{{$value->lesson_status}}');" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a href="#" class="btn btn-danger" onclick="confirm_delete('{{url('admin/course/delete/lesson/')}}','{{$value->lesson_id}}');" title="Delete"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                <td colspan="10" class="text-danger"><div align="center">{{trans('other.data_not_found')}}</div></td>    
                                </tr>
                                @endif
                            </tbody>
                            </table>

                          <footer class="panel-footer">
                          <div class="row">
                            <div class="col-sm-2 text-left">
                              <small class="text-muted inline m-t-sm m-b-sm">@if(count($data['lesson'])>10){{'Showing 1-10 of'.count($data['lesson']).'items'}}@else{{'Showing '.count($data['lesson']).' items'}}@endif</small>
                            </div>
                            <div class="col-sm-8">
                            </div>
                            <div class="col-sm-3 text-right">                
                              {{$data['lesson']->links()}}
                            </div>
                          </div>
                        </footer>

                        </div>
                        </div>

      </div>


      <div class="tab-pane fade" id="gradebook" role="tabpanel" aria-labelledby="gradebook-tab">
          
      <br>

       <form action="{{url('admin/course/'.$data['page'])}}" method="post" enctype="multipart/form-data">
       @csrf

                  <div class="col-sm-5 m-b-xs">
                    <div class="col-sm-6">
                    <div class="input-group">
                    <input type="text" name="date_start" class="input-sm form-control datepicker-input" placeholder="Start Date">
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button"><i class="fa fa-calendar"></i></button>
                      </span>
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="input-group">
                    <input type="text" name="date_end" id="date_end" class="input-sm form-control datepicker-input" placeholder="End Date">
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button"><i class="fa fa-calendar"></i></button>
                      </span>
                    </div>
                    </div>             
                  </div>

                  <div class="col-sm-5 m-b-xs">
                  <div class="col-sm-5">
                  <select name="status" class="input-sm form-control ">
                    <option value="0">=======Status========</option>
                      <option value="1">Wait</option>
                      <option value="2">False</option>
                      <option value="3">Pass</option>
                    </select>
                    </div>
                    <div class="col-sm-7">
                    <div class="input-group">
                      <input name="txt_search" type="text" class="input-sm form-control" placeholder="Search">
                      <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button">Search</button>
                      </span>
                    </div>
                    </div>
                  </div>

                  <div class="col-sm-2">
                    <button type="submit" class="btn btn-sm btn-info">Apply Filter</button>
                    <button type="reset" class="btn btn-sm btn-warning">Reset Filter</button>
                  </div>

              </form>

        <div class="row">
                            <div class="col-lg-12">  
                                 <br>
                            <table class="table table-striped b-t b-light"  cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student Name</th>
                                        <th>Start Date</th>
                                        <th>Finish Date</th>
                                        <th>Total Score</th>
                                        <th>Grade Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($data['gradebook'])>0)
                                <?php $i = 1;?>
                                @foreach($data['gradebook'] as $value)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$value->first_name.' '.$value->last_name}}</a></td>
                                    <td>{{$value->total_score}}</td>
                                    <td>{{date("d-m-Y",strtotime($value->start_date))}}</td>
                                    <td>{{date("d-m-Y",strtotime($value->finish_date))}}</td>
                                    <td>
                                    @if($value->user_course_status==0)
                                    <span class="badge badge-warning">Wait</span>
                                    @elseif($value->user_course_status==1)
                                    <span class="badge badge-success">Pass</span>
                                    @else
                                    <span class="badge badge-danger">False</span>
                                    @endif
                                    </td>
                                                                        
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                <td colspan="10" class="text-danger"><div align="center">{{trans('other.data_not_found')}}</div></td>    
                                </tr>
                                @endif
                            </tbody>
                            </table>

                          <footer class="panel-footer">
                          <div class="row">
                            <div class="col-sm-2 text-left">
                              <small class="text-muted inline m-t-sm m-b-sm">@if(count($data['gradebook'])>10){{'Showing 1-10 of'.count($data['gradebook']).'items'}}@else{{'Showing '.count($data['gradebook']).' items'}}@endif</small>
                            </div>
                            <div class="col-sm-8">
                            </div>
                            <div class="col-sm-3 text-right">                
                              {{$data['gradebook']->links()}}
                            </div>
                          </div>
                        </footer>
                        </div>
                        </div>

      </div>

    </div>

      </div>
      
    </section>
    @endif


   @if($data['page']=='Category')

    @if(isset($data['detail']['category_name']))
    <?php $category = $data['detail']['category_name'];?>
    @else
    <?php $category = null;?>
    @endif

    @if(isset($data['detail']['category_status']))
    <?php $status = $data['detail']['category_status'];?>
    @else
    <?php $status = null;?>
    @endif

    <form class="form-horizontal" action="{{url('admin/course/'.$data['page'].'/action')}}" method="post" enctype="multipart/form-data" autocomplete="off">
       @csrf

    <input type="hidden" name="type_action" value="{{$data['action']}}">

    <input type="hidden" name="id" value="@if(isset($data['id'])){{$data['id']}}@else{{''}}@endif">

    <section class="panel panel-default">
      <header class="panel-heading">
        <span class="h4">{{$data['action']}} Category</span>
      </header>
      <div class="panel-body">                     
       <div class="form-group pull-in clearfix">
            <div class="col-sm-6">
              <label>Category Name</label>
              <input name="category" type="text" class="form-control" placeholder="Category Name" value="{{$category}}" required>
            </div>
        <div class="clearfix"></div>
            <div class="col-sm-5">
            <div class="line line-dashed line-lg pull-in"></div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Status</label>
              <div class="col-sm-10">
                <label class="switch">
                  <input name="status" type="checkbox" @if($status==1){{'checked'}}@endif value="1">
                  <span></span>
                </label>
              </div>
            </div>
          </div>
      </div>
      <footer class="panel-footer text-right bg-light lter">
        <button type="submit" class="btn btn-success btn-s-xs">Save</button>
        <button type="reset" class="btn btn-danger btn-s-xs">Cancel</button>
      </footer>
    </section>

    </form>
    @endif

</div>
</div>


