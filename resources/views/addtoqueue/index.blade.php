@extends('layouts.mainappqueue')

@section('title', trans('messages.issue').' '.trans('messages.display.token'))

@section('css')
    <style>
        .btn-queue{padding:25px;font-size:47px;line-height:36px;height:auto;margin:10px;letter-spacing:0;text-transform:none}
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col s12">
            <div class="card" style="background:#f9f9f9;box-shadow:none">
                <span class="card-title" style="line-height:0;font-size:22px">{{ trans('messages.call.click_department') }}</span>
                <!-- <span class="card-title" style="line-height:0;font-size:22px">Please input the your details below</span> -->
                <div class="divider" style="margin:10px 0 10px 0"></div>
                @foreach($departments as $department)
                    <span class="btn btn-large btn-queue waves-effect waves-light" onclick="queue_dept({{ $department->id }})">{{ $department->name }}</span>
                @endforeach<br><br><br>
             <span class="card-title" style="line-height:0;font-size:22px">Please input the your number  below</span><br><br>
            Priority No. : <input type="text" class="" value="{{ session()->get('number') }}">
            Mobile No. : <input type="text" class="">
            <input type="button" class="btn waves-effect waves-light" value="Send Me">


            </div>
        </div>
    </div>
@endsection

@section('print')
    @if(session()->has('department_name'))
        <style>#printarea{display:none;text-align:center}@media print{#loader-wrapper,header,#main,footer,#toast-container{display:none}#printarea{display:block;}}@page{margin:0}</style>
        <div id="printarea" style="line-height:1.25">
            <span style="font-size:27px; font-weight: bold">{{ $settings->name }}</span><br>
            <span style="font-size:25px">{{ session()->get('department_name') }}</span><br>
            <span style="font-size:20px">Your Priority Number</span><br>
            <span><h3 style="font-size:70px;font-weight:bold;margin:0;line-height:1.5">{{ session()->get('number') }}</h3></span>
            <span style="font-size:20px">Please wait for your turn</span><br>
            <!-- <span style="font-size:20px">Total customer(s) waiting: {{ session()->get('total')-1 }}</span><br> -->
            <span>{{ \Carbon\Carbon::now()->format('d-m-Y') }}</span> | <span>{{ \Carbon\Carbon::now()->format('h:i:s A') }}</span>
        </div>
        <script>
            window.onload = function(){window.print();}
        </script>
    @endif
@endsection

@section('script')
    <script type="text/javascript">
        $(function() {
            $('#main').css({'min-height': $(window).height()-134+'px'});
        });
        $(window).resize(function() {
            $('#main').css({'min-height': $(window).height()-134+'px'});
        });
        function queue_dept(value) {
            $('body').removeClass('loaded');
            var myForm2 = '<form id="hidfrm2" action="{{ route('post_add_to_queue') }}" method="post">{{ csrf_field() }}<input type="hidden" name="department" value="'+value+'"></form>';
            $('body').append(myForm2);
            myForm2 = $('#hidfrm2');
            myForm2.submit();
        }
    </script>
@endsection
