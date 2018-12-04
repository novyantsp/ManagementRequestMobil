@extends('layouts.default')

@section('content')
  <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
          <li class="breadcrumb-item">
              <a href="{{ route('admin.dashboard') }}">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Edit Unit</li>
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
              Tambah Unit
          </div>

          <br>

          <div class="card-body">
              <form method="post" action="{{action('AdminController@updateunit', $mobil['id'])}}" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  <div class="">
                      <div class="col-md-4"></div>
                      <div class="form-group row">
                          <label for="merkmobil" class="col-sm-2 col-form-label" >Merk Mobil</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" name="merkmobil" value="{{$mobil->merkmobil}}">
                          </div>
                      </div>
                  </div>

                  <div class="">
                      <div class="row"></div>
                      <div class="form-group row">
                          <label for="tipemobil" class="col-sm-2 col-form-label" >Tipe Mobil</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" name="tipemobil" value="{{$mobil->tipemobil}}">
                          </div>
                      </div>
                  </div>

                  <div class="">
                      <div class="row"></div>
                      <div class="form-group row">
                          <label for="tahunbuat" class="col-sm-2 col-form-label" >Tahun Pembuatan</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" name="tahunbuat" value="{{$mobil->tahunbuat}}">
                          </div>
                      </div>
                  </div>

                  <div class="">
                      <div class="row"></div>
                      <div class="form-group row">
                          <label for="namamobil" class="col-sm-2 col-form-label" >Nama Mobil</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" name="namamobil" value="{{$mobil->namamobil}}">
                          </div>
                      </div>
                  </div>

                  <div class="">
                      <div class="row"></div>
                      <div class="form-group row">
                          <label for="jumlahunit" class="col-sm-2 col-form-label" >Jumlah Unit</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" name="jumlahunit" value="{{$mobil->jumlahunit}}">
                          </div>
                      </div>
                  </div>

                  <div class="">
                      <div class="col-md-4"></div>
                      <div class="form-group row">
                          <label for="tersedia" class="col-sm-2 col-form-label">Tersedia</label>
                          <div class="col-sm-10">
                              <div class="form-check form-check-inline">
                                  <input type="radio" name="tersedia" @if ($mobil->tersedia == 1) checked="checked" @endif value="1" id="tersedia">
                                  <label class="form-check-label" for="tersedia">Tersedia</label>
                              </div>
                              <div class="form-check form-check-inline">
                                  <input type="radio" name="tersedia" @if ($mobil->tersedia == 0) checked="checked" @endif value="0" id="tiada">
                                  <label class="form-check-label" for="tiada">Tidak Tersedia</label>
                              </div>
                          </div>
                      </div>

                      <br>
                      <div class="">
                          <div class="col-md-4"></div>
                          <div class="form-group row">
                            <div class="col-sm-10">
                              <button type="submit" class="btn btn-success" style="marginleft:38px">Edit Unit</button>
                            </div>
                          </div>
                      </div>
              </form>
          </div>
      </div>
  </div>
@endsection
