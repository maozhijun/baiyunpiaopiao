@extends('admin.layout.layout')
@section('css')
    <style>
        select {
            height: 26px;
        }
    </style>
@endsection
@section('content')
    <h1 class="page-header">社区列表</h1>
    <div style="margin-bottom: 20px;">
        <form class="form-inline" action="/admin/comm/communities">
            <div class="form-group">
                <label>名称</label>
                <input type="text" name="name" value="{{request('name')}}">
                &nbsp;
                <label>是否显示</label>
                <select name="status">
                    <option value="1">显示</option>
                    <option value="-1" @if(request('status') == '-1') selected @endif >删除</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">
                <span class="glyphicon glyphicon-search"></span>搜索
            </button>
        </form>
    </div>

    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <form method="post" action="/admin/comm/communities/save" enctype="multipart/form-data">
                    <tr>
                        <th>#{{csrf_field()}}</th>
                        <th><input name="name" value="" placeholder="名称" required /></th>
                        <th><input name="intro" value="" placeholder="简介" required /></th>
                        <th><input type="file" name="icon"></th>
                        <th><input name="od" value="" style="width: 60px;"></th>
                        <th><button type="submit" class="btn btn-sm btn-success">新建</button></th>
                    </tr>
                </form>
                <tr>
                    <th>ID</th>
                    <th width="200px;">社区名称</th>
                    <th>简介</th>
                    <th>图片</th>
                    <th>排序</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($communities))
                    @foreach($communities as $community)
                        <form method="post" action="/admin/comm/communities/save" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$community->id}}">
                            <tr>
                                <td>{{$community->id}}</td>
                                <td><input name="name" value="{{$community->name}}" ></td>
                                <td><input name="intro" value="{{$community->intro}}" ></td>
                                <td>
                                    @if(!empty($community->icon)) <img src="{{$community->icon}}" style="max-width: 100%;max-height: 100px;" /> @endif
                                    <input type="file" name="icon">
                                </td>
                                <td><input name="od" value="{{$community->od}}" style="width: 60px;"></td>
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success">保存</button>
                                    @if($community->status == 1)
                                    <a class="btn btn-sm btn-danger" onclick="delLink('{{$community->id}}');">删除</a>
                                    @else
                                    <a class="btn btn-sm btn-danger" onclick="showLink('{{$community->id}}');">恢复</a>
                                    @endif
                                </td>
                            </tr>
                        </form>
                    @endforeach
                @endif
                </tbody>
            </table>
            {{$communities or ''}}
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
        });

        function delLink(id) {
            if (confirm('是否确认删除该社区？')) {
                location.href = '/admin/comm/communities/change?type=1&id=' + id;
            }
        }

        function showLink(id) {
            if (confirm('是否确认恢复显示该社区？')) {
                location.href = '/admin/comm/communities/change?type=2&id=' + id;
            }
        }
    </script>
@endsection