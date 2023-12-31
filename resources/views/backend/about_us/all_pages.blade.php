@extends('layout')
@section('meta_desc',$meta_desc)
@section('title',$title)
@section('content')
<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="index.html">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Overview</li>
  </ol>


  <!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i> About Us
      <a href="{{url('admin/about/create')}}" class="float-right btn btn-sm btn-dark">Add Data</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Create Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Create Date</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
              @foreach($data as $about_content)
              <tr>
                <td>{{$about_content->id}}</td>
                <td>{{$about_content->page_name}}</td>
                <td>{{$about_content->create_date}}</td>
                <td>
                  <a class="btn btn-info btn-sm" href="{{url('admin/about/'.$about_content->id.'/edit')}}">Update</a>
                  <a onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm" href="{{url('admin/about/'.$about_content->id.'/delete')}}">Delete</a>
                </td>
              </tr>
              @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>

</div>
<!-- /.container-fluid -->
@endsection
