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
                <th>Id</th>
                <th>Merk Mobil</th>
                <th>Tipe Mobil</th>
                <th>Tahun</th>
                <th>Nama Mobil</th>
                <th>Jumlah Unit</th>
                <th>Tersedia</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($mobils as $mobil)
                @if ($mobil['tersedia'] == 1)
                  <tr>
                    <td>{{$mobil['id']}}</td>
                    <td>{{$mobil['merkmobil']}}</td>
                    <td>{{$mobil['tipemobil']}}</td>
                    <td>{{$mobil['tahunbuat']}}</td>
                    <td>{{$mobil['namamobil']}}</td>
                    <td>{{$mobil['jumlahunit']}}</td>
                    <td>
                        @if  ($mobil['tersedia'] == 1)
                        Tersedia
                        @else  Tidak Tersedia
                        @endif
                    </td>
                    <td>
                      <div class="col-md-4">
                        <a href="{{action('HomeController@showrequestunit', $mobil['id'])}}"
                          class="btn btn-primary">Request</a>
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
