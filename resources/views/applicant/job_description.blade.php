@extends('master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-10">
                        <h2>{{$job->job_title}}</h2><br>
                        <p>{{$job->date}}</p>
                    </div>
                    <div class="col-md-2 d-flex align-items-center">
                        <a href="{{URL::to('/job/'.$job->id.'/apply')}}" class="btn btn-success {{$is_applied == true?'disabled':''}}" >Apply</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <p>{{$job->job_description}}</p>
                </div>
            </div>
        </div>
    </div>
@stop
