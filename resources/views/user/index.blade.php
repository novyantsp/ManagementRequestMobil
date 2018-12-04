@extends('layouts.default')

@section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">List Unit</li>
    </ol>

    @if  ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach  ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
    @endif

    @if  (\Session::has('success'))
    <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
    </div><br />
    @endif

    <!-- DataTables Example -->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-table"></i>
        Data Table Example</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Id</th>
                <th>Nama Warehouse</th>
                <th>Cabang</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
                <tr>
                  <td>{{$user['id']}}</td>
                  <td>{{$user['name']}}</td>
                  <td>{{$user['branch']}}</td>
                  <td>{{$user['address']}}</td>
                  <td>{{$user['email']}}</td>
                  <td>
                    <div class="row">
                        <form action="{{action('AdminController@destroyuser', $user['id'])}}" method="post">
                              {{csrf_field()}}
                              <input name="_method" type="hidden" value="DELETE">
                              <button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
                          </form>
                      </span>
                    </div>
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
@endsection
