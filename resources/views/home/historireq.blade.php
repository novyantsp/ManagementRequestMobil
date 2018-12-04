@extends('layouts.home.default')

@section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home') }}">Dashboard</a>
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
                <th>Merk Mobil</th>
                <th>Tipe Mobil</th>
                <th>Tahun</th>
                <th>Nama Mobil</th>
                <th>Jumlah Unit</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach($requestunits as $requestunit)
                <tr>
                  <td>{{$requestunit->mobil->merkmobil }}</td>
                  <td>{{$requestunit->mobil->tipemobil }}</td>
                  <td>{{$requestunit->mobil->tahunbuat }}</td>
                  <td>{{$requestunit->mobil->namamobil }}</td>
                  <td>{{$requestunit->jumlahunit }}</td>
                  <td>@if ($requestunit->status == 0) <span class="badge badge-danger">Gagal</span>
                  @elseif ($requestunit->status == 1) <span class="badge badge-success">Approved</span>
                  @else <span class="badge badge-secondary">Pending</span>
                  @endif</td>
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
