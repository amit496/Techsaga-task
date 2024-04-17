@extends('layout.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0">Customer List</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">Customer List</li>
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
                    <table class="table" id="customerTable">
                        <thead>
                            <tr>
                                <th>S no</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>contact</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($customerList as  $key => $value)
                                <tr>
                                    <td>{{$counter++}}</td>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->email}}</td>
                                    <td>{{$value->contact}}</td>
                                    <td>{!!$value->status!!}</td>
                                    <td>
                                        <a href="">Approved</a>
                                        <a href="">Dis</a>
                                        {{-- <a href="{{ route('product.edit', ['id' => $value->id]) }}" class="btn btn-success">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('product.delete', ['id' => $value->id]) }}" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


