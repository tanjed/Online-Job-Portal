@extends('master')
@section('content')
    <div class="container">
        <div class="row" style="min-height: 800px">
            <div class="col-md-12 d-flex justify-content-center align-items-center" >
                <div class="jumbotron" style="width: 50%;">
                    <center><h2>Applicant Login</h2></center>
                    <form action="{{URL::to(route('applicant.login.process'))}}"  method="POST" style="margin-top: 50px;">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="text" class="form-control"  name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control"  name="password" placeholder="Password">
                        </div>
                        <center><button type="submit" class="btn btn-primary" style="width: 50%;">Submit</button></center>
                        <center><small style="padding: 15px;">Do not have an account? <a href="{{route('applicant.register.show')}}">Register</a></small></center>
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
