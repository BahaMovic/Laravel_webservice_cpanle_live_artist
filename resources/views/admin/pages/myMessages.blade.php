@extends('admin.layout.app')

@section('header')
<link rel="stylesheet" href="{{url('css/style.css')}}">
@endsection

@section('content')
<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 no-padding no-margin dashbord-toggle">
  <div class="box-content-dashbords">
    @foreach($data as $ms)
    <div class="col-lg-12">
      @if(Auth::user()->id == $ms->user_id)
      <div class="right chat-box">

        <h4>{{$ms->message}}</h4>
        <p>{{$ms->created_at}}</p>

      </div>
      @else
      <div class="left chat-box">
        <h4>{{$ms->message}}</h4>
        <p>{{$ms->created_at}}</p>
          </div>
      @endif
    </div>
    @endforeach

    <div class="sent-box">

      <form action="{{url('admin/add/message/'.Auth::user()->id."/".Auth::user()->id)}}" method="post">
        <input type="text" name="message" placeholder="الرساله">
        <button type="submit"><i class="fa fa-paper-plane"></i></button>
      </form>
    </div>

  </div>
</div>



@endsection
@section('jq')
<script src="{{url('admin/js/jquery-3.1.1.min.js')}}"></script>

@endsection
