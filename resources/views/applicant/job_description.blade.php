@extends('master')
@include('applicant.header')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-10" style="margin-top: 20px;">
                        <h2>{{$job->job_title}}</h2><br>
                        <p>{{$job->date}}</p>
                    </div>
                    <div class="col-md-2 d-flex align-items-center">
                        <a href="{{URL::to('/applicant/job/'.$job->id.'/apply')}}" class="btn btn-success {{$is_applied == true?'disabled':''}}" >Apply</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <p style="margin-left: 1%;">{{$job->job_description}}</p>

                </div>
                <hr>
                <div class="row">
                    <p style="margin-left: 1%;"><b>Salary:</b> {{$job->salary}}</p>
                    <hr>
                </div>
                <div class="row">
                    <p style="margin-left: 1%;"><b>Job Location:</b> {{$job->location}}, {{$job->country}}</p>
                    <hr>
                </div>
            </div>
        </div>
    </div>
@stop
