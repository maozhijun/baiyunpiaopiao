@extends('pc.layout.base_new')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{env('CDN_URL')}}/css/pc/download.css">
@endsection
@section('content')
    <div id="Content">
        <div class="code"><div class="img"><img src="{{env('CDN_URL')}}/img/pc/code.jpg"></div><p>扫码下载</p></div>
        <img src="{{env('CDN_URL')}}/img/pc/phone_logoall_n.png">
    </div>
@endsection