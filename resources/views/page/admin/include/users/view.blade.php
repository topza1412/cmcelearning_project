@if($data['page']=='Admin')
<?php $page = 'admin';?>
@elseif($data['page']=='User')
<?php $page = 'user';?>
@elseif($data['page']=='Teacher')
<?php $page = 'teacher';?>
@endif
                        
                        <div class="row">
                            <div class="col-lg-12">  
                            <table class="table table-striped b-t b-light"  cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Status</th>
                                        <th>Create Date</th>
                                        <th>Modify Date</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($data['detail'])>0)
                                <?php $i = 1;?>
                                @foreach($data['detail'] as $value)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$value->first_name}}</a></td>
                                    <td>{{$value->last_name}}</td>
                                    <td>
                                    @if($value->user_status==1)
                                    <span class="label label-success">Activate</span>
                                    @else
                                    <span class="label label-warning">Draft</span>
                                    @endif
                                    </td>
                                    <td>{{date("d-m-Y",strtotime($value->created_at))}}</td>
                                    <td>{{date("d-m-Y",strtotime($value->updated_at))}}</td>
                                    <td>@if($value->user_type==1){{'Admin'}}@elseif($value->user_type==2){{'User'}}@elseif($value->user_type==3){{'Teacher'}} @endif</td>                                  
                                    <td>
                                    <a href="{{url('admin/users/'.$page.'/edit/'.$value->user_id)}}" class="btn btn-success" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a href="#" class="btn btn-danger" onclick="confirm_delete('{{url('admin/users/delete/'.$data['page'])}}','{{$value->user_id}}');" title="Delete"><i class="fa fa-trash-o"></i></a>
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
                              <small class="text-muted inline m-t-sm m-b-sm">@if(count($data['detail'])>10){{'Showing 1-10 of'.count($data['detail']).'items'}}@else{{'Showing '.count($data['detail']).' items'}}@endif</small>
                            </div>
                            <div class="col-sm-8">
                            </div>
                            <div class="col-sm-3 text-right">                
                              {{$data['detail']->links()}}
                            </div>
                          </div>
                        </footer>
                        </div>
                        </div>
                       
