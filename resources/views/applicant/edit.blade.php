@extends('master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                <center><h1 style="padding: 20px;background: aqua">Edit Your Profile</h1></center>
                <hr>
                @if(Session::has('message'))
                    <p id="alert" class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
                @if(!empty($errors))
                    <div class="error-log" style="margin-top:5px;">
                        @foreach($errors->all() as $error)
                            <small class="text-danger">* {{$error}}</small><br>
                        @endforeach
                    </div>
                @endif

                <form action="{{URL::to('applicant/'.$applicant->id.'/update')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="usr">First Name:</label>
                                <input type="text" name="first_name" class="form-control" value="{{$applicant->first_name}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="usr">Upload Resume:</label>
                                <input type="file" class="form-control-file border" name="resume">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="usr">Last Name:</label>
                                <input type="text" name="last_name" class="form-control" value="{{$applicant->last_name}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="usr">Upload Image:</label>
                                <input type="file" class="form-control-file border" name="profile_pic">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="usr">Email:</label>
                                <input type="text" name="email" class="form-control" value="{{$applicant->email}}">
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                    <button class="btn btn-success" type="submit">Update</button>
                </form>
                <hr>
                <center><h1 style="padding: 20px;background: aqua">Add Skills</h1></center>
                <hr>
                <div class="row">
                    <div class="col-md-7">
                        <center>Input Skills Here</center>
                        <hr>
                        <form action="{{route('skill.add')}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="usr">Skill:</label>
                                <input type="text" name="skill" class="form-control">
                            </div>
                            <button class="btn btn-success" type="submit">Add</button>
                        </form>
                    </div>
                    <div class="col-md-5">
                        <center>Skills</center>
                        <hr>
                        <ul class="list-group">
                            @foreach($applicant->skills as $skill)
                            <li class="list-group-item text-center">{{$skill->skill_title}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @if(!empty($errors))
                <div class="error-log" style="margin-top:5px;">
                    @foreach($errors->all() as $error)
                        <small class="text-danger">* {{$error}}</small><br>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    <script>
        $().ready(function(){
            $('#alert').delay(1500).hide(1000);
        });
    </script>
@stop
