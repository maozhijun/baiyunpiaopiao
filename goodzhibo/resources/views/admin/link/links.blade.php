@extends('admin.layout.layout')
@section('content')
    <h1 class="page-header">热门频道列表</h1>
    <div>
        <form class="form-inline" action="/cms/tvs">
            <div class="form-group">
                <label>作者</label>
                <input type="text" name="source" value="{{request('source')}}" class="form-control">
                &nbsp;
                <label>标题</label>
                <input type="text" name="title" value="{{request('title')}}" class="form-control">
                &nbsp;
                <label>是否显示</label>
                <select name="show" class="form-control">
                    <option value="-1">全部</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">
                <span class="glyphicon glyphicon-search"></span>搜索
            </button>
        </form>
    </div>
    <br>

    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <form method="post" action="/cms/tvs/save" enctype="multipart/form-data">
                    <tr>
                        {{csrf_field()}}
                        <th><input name="name" value="" placeholder="网站名称" required class="form-control" /></th>
                        <th><input name="link" value="" placeholder="链接" type="number" class="form-control" /></th>
                        <th><button type="submit" class="btn btn-sm btn-success">新建</button></th>
                    </tr>
                </form>

                <tr>
                    <th width="200px;">网站名称</th>
                    <th>链接</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($links))
                @foreach($links as $link)
                    <form method="post" action="/cms/tvs/save" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$tv->id}}">
                        <tr>
                            <td><h5>{{$tv->id or ''}}</h5></td>
                            <td><input name="name" value="{{$tv->name or ''}}" class="form-control"></td>
                            <td>
                                @if(!empty($tv->image)) <img src="{{$tv->image}}" style="max-width: 100%;max-height: 100px;" /> @endif
                                <input type="file" name="image" class="form-control">
                            </td>
                            <th><input name="od" value="{{$tv->od or ''}}" class="form-control"></th>
                            <td>
                                <button type="submit" class="btn btn-sm btn-success">保存</button>
                                @if($tv->show == 1)
                                    <a class="btn btn-sm btn-danger" href="/cms/tvs/channel/show-hide?id={{$tv->id}}&show=0">隐藏</a>
                                @else
                                    <a class="btn btn-sm btn-info" href="/cms/tvs/channel/show-hide?id={{$tv->id}}&show=1">显示</a>
                                @endif
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
    </script>
@endsection