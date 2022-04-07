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
                <h4 class="mb-0"> Companies List</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="/" class="default-color">Home</a></li>
                    <li class="breadcrumb-item active">Companies</li>
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
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                @if(session()->has('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{ session()->get('error') }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">


                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add New Company</button><br><br>

                                    <div class="table-responsive">
                                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                               data-page-length="50"
                                               style="text-align: center">
                                            <thead>
                                            <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Logo</th>
                                            <th>Website</th>
                                            <th>Email</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($Compoanies as $value)
                                            <tr>

                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$value->Name}}</td>
                                                <td><img src="{{asset('/storage/attachments/'.$value->Logo)}}" width="100"></td>
                                                <td>{{$value->Website}}</td>
                                                <td>{{$value->Email}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit{{ $value->id }}" title="edit"><i class="fa fa-edit"></i></button>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_Company{{ $value->id }}" title="delete"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
@include('Company.Delete')
@include('Company.edit')
                                        @endforeach
                                    </table>
                                        {!! $Compoanies->render() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
    <!-- models start -->


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Company</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{Route('Company.store')}}" method="Post"  enctype='multipart/form-data'>
                        @csrf
                        <div class="form-group">
                            <label for="Name" class="col-form-label">Name:</label>
                            <input type="text" name="Name" class="form-control" id="Name">
                        </div>
                        <div class="form-group">
                            <label for="Email" class="col-form-label">Email:</label>
                            <input type="Email" name="Email" class="form-control" id="Email">
                        </div>
                        <div class="form-group">
                            <label for="Website" class="col-form-label">Website:</label>
                            <input type="text" name="Website" class="form-control" id="Website">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Upload Logo </label>
                            <input type="file"  name="file" class="form-control-file" id="exampleFormControlFile1">
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
    <!-- models end -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
