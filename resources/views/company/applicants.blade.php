@extends('master')
@section('content')
    <div class="container-fluid">
        <div class="row">
           <div class="col-md-2"></div>
            <div class="col-md-10">
                <div class="col-md-12">
                    <center> <h1 style="padding: 20px;background: aqua;margin-top: 20px;">Applicants</h1></center>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Resume</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($job as $job_applicant)
                            @foreach($job_applicant->applicants as $applicant)
                                <tr>
                                    <td>{{$applicant->first_name." ".$applicant->last_name}}</td>
                                    <td><a href="{{URL::to('company/show/resume/'.$applicant->id)}}">PDF</a></td>
                                </tr>
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
