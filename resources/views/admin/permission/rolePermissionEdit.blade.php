@extends('admin.auth.main')
@section('content')
    <section class="content-header">
        <h1>
            <a class="btn bg-gray-active btn-sm" href="{{url("/admin/roles")}}">角色列表</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url("/admin/index")}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">权限管理</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('admin.others.alert')
        <div class="row">
            <!-- right column -->
            <div class="col-xs-12">
                <!-- general form elements disabled -->
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">修改角色权限</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="box box-widget widget-user-2">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-gray">
                                <h4 class="widget-user-username">{{$role->name}}</h4>
                                <h5 class="widget-user-desc">ID:{{$role->id}}</h5>
                                <h5 class="widget-user-desc">类型:{{$role->display_name}}</h5>
                            </div>
                        </div>
                        <div class="form-horizontal">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default bg-gray" onclick="chooseBox(1)">
                                            全选
                                        </button>
                                        <button type="button" class="btn btn-default bg-gray" onclick="chooseBox(2)">
                                            反选
                                        </button>
                                        <button type="button" class="btn btn-default bg-gray" onclick="chooseBox(3)">
                                            全不选
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ url('admin/roles/permissionEditPost') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                            <input type="hidden" name="id" value="{{$role->id}}"/>
                            @foreach ($data as $value)
                                <div class="form-group">
                                    <div class="col-sm-10">
                                        <input type="checkbox" name="ids[]" value="{{$value->id}}"
                                               class="icheckbox_flat"
                                               @if(in_array($value->id,$yan)) checked @endif> {{$value->display_name}}
                                        - {{$value->name}}
                                    </div>
                                </div>
                            @endforeach
                            <div class="box-footer">
                                <button type="submit" class="btn btn-sm bg-yellow-active" style="float: right">提交
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    <script>
        //checkbox 选择
        function chooseBox(id) {
            var ch = document.getElementsByName("ids[]");
            for (var i = 0; i < ch.length; i++) {
                if (id == 1) {
                    ch[i].checked = true;
                } else if (id == 2) {
                    ch[i].checked = !ch[i].checked;
                } else {
                    ch[i].checked = false;
                }
            }
        }
    </script>
@endsection
