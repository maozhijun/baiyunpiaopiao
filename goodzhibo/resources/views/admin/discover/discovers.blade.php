@extends('admin.layout.layout')
@section('content')
    <h1 class="page-header">app发现列表</h1>
    {{--<div>--}}
        {{--<form class="form-inline" action="/cms/tvs">--}}
            {{--<div class="form-group">--}}
                {{--<label>作者</label>--}}
                {{--<input type="text" name="source" value="{{request('source')}}" class="form-control">--}}
                {{--&nbsp;--}}
                {{--<label>标题</label>--}}
                {{--<input type="text" name="title" value="{{request('title')}}" class="form-control">--}}
                {{--&nbsp;--}}
                {{--<label>是否显示</label>--}}
                {{--<select name="show" class="form-control">--}}
                    {{--<option value="-1">全部</option>--}}
                {{--</select>--}}
            {{--</div>--}}
            {{--<button type="submit" class="btn btn-primary">--}}
                {{--<span class="glyphicon glyphicon-search"></span>搜索--}}
            {{--</button>--}}
        {{--</form>--}}
    {{--</div>--}}
    {{--<br>--}}

    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <form method="post" action="/admin/discover/save">
                    <tr>
                        <td>#{{csrf_field()}}</td>
                        <td><input name="name" value="" placeholder="名称" required class="form-control" /></td>
                        <td><input name="image" value="" placeholder="图片链接" required class="form-control" /><br>
                            <input name="link" value="" placeholder="跳转链接" required class="form-control" /></td>
                        <td><button type="submit" class="btn btn-sm btn-success">新建</button></td>
                    </tr>
                </form>
                <tr>
                    <th>ID</th>
                    <th width="200px;">网站名称</th>
                    <th>链接</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($links))
                @foreach($links as $key=>$link)
                    <form method="post" action="/admin/discover/save">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$key}}">
                        <tr>
                            <td><h5>{{$key}}</h5></td>
                            <td><input name="name" value="{{$link['name']}}" class="form-control"></td>
                            <th><input name="image" value="{{$link['image']}}" placeholder="图片链接" class="form-control"><br>
                                <input name="link" value="{{$link['link']}}" placeholder="跳转链接" required class="form-control" /></th>
                            <td>
                                <button type="submit" class="btn btn-sm btn-success">保存</button>
                                <a class="btn btn-sm btn-danger" onclick="delLink('{{$key}}');">删除</a>
                            </td>
                        </tr>
                    </form>
                @endforeach
                @endif
                </tbody>
            </table>
            {{$tvs or ''}}
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
        });

        function delLink(key) {
            if (confirm('是确认否删除该友链？')) {
                location.href = '/admin/discover/del?id=' + key;
            }
        }
    </script>
@endsection