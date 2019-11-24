@extends('master')
@include('applicant.header')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                @if(Session::has('message'))
                    <p id="alert" class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
                <center><h1 style="padding: 20px;background: aqua">Recent Job Posting</h1></center>
                <table class="table table-striped">
                    <thead class="text-center">
                    <tr>
                        <th>Job Title</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    @foreach($jobs as $job)
                    <tr>
                        <td><a href="{{URL::to('applicant/job/'.$job->id.'/description')}}">{{$job->job_title}}</a></td>
                        <td>{{$job->date}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$jobs->links()}}
            </div>
        </div>
    </div>

    <script>
        $().ready(function(){
            $('#alert').delay(1500).hide(1000);
        });
    </script>
@stop
