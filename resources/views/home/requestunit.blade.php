@extends('layouts.home.default')

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
            <form method="post" action="{{action('HomeController@requestunit', $mobil['id'])}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">


                <div class="">
                    <div class="row"></div>
                    <div class="form-group row">
                        <label for="merkmobil" class="col-sm-2 col-form-label" >Merk Mobil</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" name="merkmobil" value="{{$mobil->merkmobil}}">
                        </div>
                    </div>
                </div>

                </div>

                <div class="">
                    <div class="row"></div>
                    <div class="form-group row">
                        <label for="tipemobil" class="col-sm-2 col-form-label" >Tipe Mobil</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" name="tipemobil" value="{{$mobil->tipemobil}}">
                        </div>
                    </div>
                </div>

                <div class="">
                    <div class="row"></div>
                    <div class="form-group row">
                        <label for="tahunbuat" class="col-sm-2 col-form-label" >Tahun Pembuatan</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" name="tahunbuat" value="{{$mobil->tahunbuat}}">
                        </div>
                    </div>
                </div>

                <div class="">
                    <div class="row"></div>
                    <div class="form-group row">
                        <label for="namamobil" class="col-sm-2 col-form-label" >Nama Mobil</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" name="namamobil" value="{{$mobil->namamobil}}">
                        </div>
                    </div>
                </div>

                <div class="">
                    <div class="row"></div>
                    <div class="form-group row">
                        <label for="jumlahunit" class="col-sm-2 col-form-label" >Jumlah Unit</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="jumlahunit" min="0" max="{{$mobil->jumlahunit}}">
                            <input type="hidden"  name="mobil_id" value="{{$mobil->id}}">
                            <input type="hidden"  name="status" value="3">
                        </div>
                    </div>
                </div>

                    <br>
                    <div class="">
                        <div class="col-md-4"></div>
                        <div class="form-group row">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-success" style="marginleft:38px">Request Unit</button>
                          </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection
