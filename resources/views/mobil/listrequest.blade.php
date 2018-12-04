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
                <th>Nama Toko</th>
                <th>Cabang</th>
                <th>Merk Mobil</th>
                <th>Tipe Mobil</th>
                <th>Tahun</th>
                <th>Nama Mobil</th>
                <th>Jumlah Unit</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($requestunits as $requestunit)
                @if ($requestunit->status == 3)
                  <tr>
                    <td>{{$requestunit->user->name }}</td>
                    <td>{{$requestunit->user->branch }}</td>
                    <td>{{$requestunit->mobil->merkmobil }}</td>
                    <td>{{$requestunit->mobil->tipemobil }}</td>
                    <td>{{$requestunit->mobil->tahunbuat }}</td>
                    <td>{{$requestunit->mobil->namamobil }}</td>
                    <td>{{$requestunit->jumlahunit }}</td>
                    <td>@if ($requestunit->status == 3) <span class="badge badge-secondary">Pending</span>
                    @endif</td>
                    <td>
                      <div class="col-md-4">
                        <a href="{{action('AdminController@editrequest', $requestunit['id'])}}"
                          class="btn btn-primary">Process</a>
                        </div>
                    </td>
                </tr>
                @endif
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
</div>
@endsection
