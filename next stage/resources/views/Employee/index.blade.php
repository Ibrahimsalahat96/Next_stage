@extends('layouts.master')
@section('css')
    <link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <!-- css -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />
    @toastr_css
@section('title')
    Next Stage
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> Employee</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                    <li class="breadcrumb-item active">Employee</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#employee" data-whatever="@mdo">Add New Employee</button><br><br>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Company Name</th>
                                <th>Phone</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($Employee as $value)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$value->First_name}}</td>
                                <td>{{$value->Last_name}}</td>
                                <td>{{$value->Email}}</td>
                                <td>{{$value->company->Name}}</td>
                                <td>{{$value->Phone}}</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit{{ $value->id}}" title="edit"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $value->id}}" title="delete"><i class="fa fa-trash"></i></button>

                                    @include('Employee.edit')
                                    @include('Employee.Delete')

                                </td>

                            </tr>

                            @endforeach


                            </tbody>

                        </table>
                        {!! $Employee->render() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- row closed -->
    <div class="modal fade" id="employee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{Route('Employee.store')}}" method="Post"  enctype='multipart/form-data'>
                        @csrf
                        <div class="form-group">
                            <label for="Name" class="col-form-label">First Name:</label>
                            <input type="text" name="First_name" class="form-control" id="Name">
                        </div>
                        <div class="form-group">
                            <label for="Name" class="col-form-label">Last Name:</label>
                            <input type="text" name="Last_name" class="form-control" id="Name">
                        </div>

                        <div class="form-group">
                            <select class="select" name="Company_id" required>
                                <option value="" selected disabled>Select Company</option>
                                @foreach ($Company as $value)
                                    <option value="{{ $value->id }}">{{ $value->Name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Email" class="col-form-label">Email:</label>
                            <input type="Email" name="Email" class="form-control" id="Email">
                        </div>
                        <div class="form-group">
                            <label for="Website" class="col-form-label">Phone:</label>
                            <input type="text" name="Phone" class="form-control" id="Website">
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Save </button>
                </div>
                </form>
            </div>
        </div>
    </div>


@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
