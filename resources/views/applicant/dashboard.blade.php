@extends('master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" id="side-nav" style="background: black;">dbd</div>
            <div class="col-md-10">
                <center><h1>Recent Job Posting</h1></center>
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
                        <td><a href="{{URL::to('/job/'.$job->id.'/description')}}">{{$job->job_title}}</a></td>
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
        $height = $(window).height() - 46;
        $('#side-nav').css("height",$height+"px");
    </script>
@stop
