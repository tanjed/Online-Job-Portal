@extends('master')
@section('content')
    <div class="container">
        <div class="row" style="padding: 10px;background: antiquewhite;margin: 20px 0px 0px 0px; ">
            <div class="col-md-6">
                <h2>Posted Jobs</h2>
            </div>
            <div class="col-md-6 text-right">
                <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><span>Post a New Job</span></a>
            </div>
        </div>
        @if(!empty($errors))
            <div class="error-log" style="margin-top:5px;">
                @foreach($errors->all() as $error)
                    <small class="text-danger">* {{$error}}</small><br>
                @endforeach
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Jobs</th>
                        <th>Date</th>
                        <th>Applicants</th>
                        <th>CRUD</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($jobs as $job)
                            <tr>
                                <td><a href="{{URL::to('/job/'.$job->id.'/applicants')}}">{{$job->job_title}}</a></td>
                                <td>{{$job->date}}</td>
                                <td>23</td>
                                <td>
                                    <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="fa fa-edit"></i></a>
                                    <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Add Job Modal HTML -->
        <div id="addEmployeeModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{URL::to(route('post.job'))}}" method="POST">
                        {{csrf_field()}}
                        <div class="modal-header">
                            <h4 class="modal-title">Post Job</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Job Title" name="job_title" required >
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Job Description" name="job_description" required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Salary" name="salary" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Location" name="location" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Country" name="country" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input type="submit" class="btn btn-info" value="Post">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Modal HTML -->
        <div id="editEmployeeModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Employee</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input type="submit" class="btn btn-info" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Delete Modal HTML -->
        <div id="deleteEmployeeModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <h4 class="modal-title">Delete Employee</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete these Records?</p>
                            <p class="text-warning"><small>This action cannot be undone.</small></p>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>






@stop
