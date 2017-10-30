<div style="display: none">
    {{$nav = \App\Model\Navigation::with('secondLevel')->where ( 'level', '1' )->orderBy('rank','asc')->get()}}
</div>
@foreach($nav as $value)
    @if(Auth::guard('admin')->user()->can($value->permission))
        <li class="treeview">
            <a href="#">
                <i class="fa {{$value->icon}}"></i>
                <span>{{$value->name}}</span>
                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>
            <ul class="treeview-menu" @if(session('navFid') == $value->id) style="display: block;" @endif >
                @if($value->secondLevel)
                    @foreach($value->secondLevel as $value2)
                        @if(Auth::guard('admin')->user()->can($value2->permission))
                            <li id="{{$value2->permission}}"
                                @if($value2->permission == session('navSelect')) class="active" @endif>
                                <a href="{{url("$value2->url")}}" onclick="selectNav({{$value2->permission}})">
                                    <i class="fa fa-circle-o @if($value2->permission == session('navSelect')) text-blue @endif"></i>{{$value2->name}}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </li>
    @endif
@endforeach
<script>
    function selectNav(id) {
        $.ajax({
            type: "get", url: "<?php echo url('/admin/nav/select');?>", data: {
                id: id.id,
            }, cache: false, async: true, dataType: 'json',
            success: function (data) {
            }
        });
    }
</script>
