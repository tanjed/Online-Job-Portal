@extends('master')
@section('content')
    <div class="container">
        <div class="row" style="min-height: 800px">
            <div class="col-md-12 d-flex justify-content-center align-items-center" >
                <div class="jumbotron" style="width: 50%;">
                    <center><h2>Applicant Registration</h2></center>
                    <form action="{{URL::to(route('applicant.register.process'))}}"  method="POST" style="margin-top: 50px;">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="first_name" placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="last_name" placeholder="Last Name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control"  name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control"  name="password" placeholder="Password">
                        </div>
                        <center><button type="submit" class="btn btn-primary" style="width: 50%;">Submit</button></center>
                        <center><small style="padding: 5px;">Already have an account? <a href="{{route('applicant.login.show')}}">Login</a></small></center>
                        @if(!empty($errors))
                            <div class="error-log" style="margin-top:5px;">
                                @foreach($errors->all() as $error)
                                    <small class="text-danger">* {{$error}}</small><br>
                                @endforeach
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
