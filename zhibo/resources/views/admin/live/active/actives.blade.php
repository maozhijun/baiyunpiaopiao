@extends('admin.layout.layout')
@section('content')
    <h1 class="page-header">播放器活动设置</h1>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th width="500px;">活动文案</th>
                    <th>二维码图片</th>
                    <th width="100px;">操作</th>
                </tr>
                </thead>
                <tbody>
                    <form method="post" action="/admin/live/player/actives/save" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <tr>
                            <td>
                                <textarea  style="width: 80%;height: 100px;" name="txt">{{isset($active['txt']) ? $active['txt'] : ''}}</textarea>
                            </td>
                            <td>
                                @if(!empty($active['code'])) <img src="{{$active['code']}}" style="max-width: 70%;max-height: 100px;" /> @endif
                                <input type="file" name="code">
                            </td>
                            <td>
                                <button type="submit" class="btn btn-xs btn-success">保存</button>
                                @if(!empty($active['txt']) || !empty($active['code']))
                                <a class="btn btn-xs btn-danger" href="javascript:delActive()">删除</a>
                                @endif
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
        });

        function delActive(id) {
            if (!confirm('是否确认删除该播放器活动？')) {
                return;
            }
            location.href = '/admin/live/player/actives/del';
        }
    </script>
@endsection