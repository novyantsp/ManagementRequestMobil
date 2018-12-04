@extends('layouts.default')

@section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Request Unit</li>
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

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-plus-square"></i>
            Request Unit
        </div>

        <br>

        <div class="card-body">
            <form method="post" action="{{action('AdminController@updaterequest', $requestunit['id'])}}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="">
                    <div class="row"></div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label" >Nama Toko</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" name="name" value="{{$requestunit->user->name }}">
                        </div>
                    </div>
                </div>

                <div class="">
                    <div class="row"></div>
                    <div class="form-group row">
                        <label for="branch" class="col-sm-2 col-form-label" >Tipe Mobil</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" name="branch" value="{{$requestunit->user->branch }}">
                        </div>
                    </div>
                </div>

                <div class="">
                    <div class="row"></div>
                    <div class="form-group row">
                        <label for="merkmobil" class="col-sm-2 col-form-label" >Tahun Pembuatan</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" name="merkmobil" value="{{$requestunit->mobil->merkmobil }}">
                        </div>
                    </div>
                </div>

                <div class="">
                    <div class="row"></div>
                    <div class="form-group row">
                        <label for="tipemobil" class="col-sm-2 col-form-label" >Nama Mobil</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" name="tipemobil" value="{{$requestunit->mobil->tipemobil }}">
                        </div>
                    </div>
                </div>

                <div class="">
                    <div class="row"></div>
                    <div class="form-group row">
                        <label for="tahunbuat" class="col-sm-2 col-form-label" >Jumlah Unit</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" name="tahunbuat" value="{{$requestunit->mobil->tahunbuat }}">
                        </div>
                    </div>
                </div>

                <div class="">
                    <div class="row"></div>
                    <div class="form-group row">
                        <label for="namamobil" class="col-sm-2 col-form-label" >Jumlah Unit</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" name="namamobil" value="{{$requestunit->mobil->namamobil }}">
                        </div>
                    </div>
                </div>

                <div class="">
                    <div class="row"></div>
                    <div class="form-group row">
                        <label for="jumlahunit" class="col-sm-2 col-form-label" >Jumlah Request</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" name="" value="{{$requestunit->jumlahunit}}">
                        </div>
                    </div>
                </div>

                <div class="">
                    <div class="row"></div>
                    <div class="form-group row">
                        <label for="unittersedia" class="col-sm-2 col-form-label" >Unit Tersedia</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" name="unittersedia" value="{{$requestunit->mobil->jumlahunit}}">
                            <input type="hidden" readonly class="form-control-plaintext" name="sisa" value="{{$requestunit->mobil->jumlahunit - $requestunit->jumlahunit}}">
                        </div>
                    </div>
                </div>

                <div class="">
                    <div class="row"></div>
                    <div class="form-group row">
                        <label for="status" class="col-sm-2 col-form-label" >Status</label>
                        <div class="col-sm-10">
                          <select class="form-control" id="status" name="status">
                            <option>Pilih Tindakan</option>
                            <option value="1">Terima Request</option>
                            <option value="0">Tolak Request</option>
                          </select>
                        </div>
                    </div>
                </div>

                    <br>
                    <div class="">
                        <div class="col-md-4"></div>
                        <div class="form-group row">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-success" style="marginleft:38px">Proses Request</button>
                          </div>
                        </div>
                    </div>
        </div>
    </div>
</div>
@endsection
