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
                                    <td>
                                        @if ($value->approved == 1)
                                            <span class="badge bg-success">Approved</span>
                                        @elseif ($value->approved == 2)
                                            <span class="badge bg-secondary">Rejected</span>
                                        @elseif ($value->approved == 0)
                                            <span class="badge bg-warning">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.approved', ['id' => $value->id]) }}" class="badge bg-success">Approved</a>
                                        <a href="{{ route('admin.reject', ['id' => $value->id]) }}" class="badge bg-danger">Reject</a>
                                        <a href="{{ route('admin.edit', ['id' => $value->id]) }}" class="badge bg-danger">Edit</a>
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


