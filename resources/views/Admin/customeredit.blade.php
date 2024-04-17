@extends('layout.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0">Customer Edit</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">Customer Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card-body">
                    <!-- Main content -->
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{route('admin.submit.edit', ['id' =>$findCustomer->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-g-12 mb-3">
                                <label for="name" class="form-label">Enter Name</label>
                                <input type="text" class="form-control" id="name" name="name"  autocomplete="off" value="{{$findCustomer->name}}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-g-12 mb-3">
                                <label for="email" class="form-label">Enter Email</label>
                                <input type="email" class="form-control" id="email" name="email"  autocomplete="off" value="{{$findCustomer->email}}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-g-12 mb-3">
                                <label for="contact" class="form-label">Enter Contact</label>
                                <input type="text" class="form-control" id="contact" name="contact"  autocomplete="off" value="{{$findCustomer->contact}}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-g-12 mb-3">
                                <button type="submit" class="btn submitButtton text-light w-100">SUBMIT</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


