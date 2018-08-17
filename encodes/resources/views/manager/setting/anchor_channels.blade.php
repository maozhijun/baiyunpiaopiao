@extends('layouts.setting')
@section('content')
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <td>名称</td>
                <td>推流地址</td>
                <td>播放地址</td>
                <td>操作</td>
            </tr>
            </thead>
            <tbody>
            @foreach($channels as $level=>$channelItems)
                @if(count($channelItems) > 0)
                    <tr>
                        <td colspan="4">等级{{$level}}</td>
                    </tr>
                    @foreach($channelItems as $channel)
                        <tr>
                            <td width="8%">{{ $channel->name }}</td>
                            <td>
                                <textarea rows="3" style="width:100%;" readonly>{{ $channel->pushWholeUrl() }}</textarea>
                            </td>
                            <td>
                                <textarea rows="3" style="width:100%;" readonly>{{ $channel->playAllUrl() }}</textarea>
                            </td>
                            <td width="10%">
                                <form action="/setting/anchor/channels/save/" method="post">
                                    <?php
                                        $id = $channel->id;
                                        $isDisable = in_array($id, $disableIds);
                                    ?>
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{$id}}">
                                    <select name="disable">
                                        <option value="0" @if(!$isDisable) selected @endif>有效</option>
                                        <option value="1" @if($isDisable) selected @endif>无效</option>
                                    </select>
                                    <br>
                                    <br>
                                    <button class="btn btn-xs @if($isDisable) btn-info @else btn-danger @endif" type="submit">保存</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
@endsection