@extends('layout.layoutTU')

@section('title')
Tambah Data Murid
@endsection

@section('content')
<div class="container mt--8 pb-5">
  <div class="">
    <a type="button" class="btn btn-raised btn-warning pull-right" href="{{ URL::previous() }}">Kembali</a>
  </div>
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card shadow border-0">

            <div class="card-body px-lg-5 py-lg-5">

              <form role="form" method="POST" action="{{url(action('MuridController@store'))}}">
                <input type="hidden" name="_token" value="<?php echo csrf_token();?>" >

                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <input class="form-control" placeholder="NIS" type="text" name="nis" value="{{ old('nis') }}" required autofocus>
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <input class="form-control" placeholder="Nama" type="text" name="nama" value="{{ old('nama') }}" required autofocus>
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <input class="form-control" placeholder="Tanggal Lahir" type="date" name="tglLahir" value="{{ old('tglLahir') }}" required autofocus>
                  </div>
                </div>

                <div class="input-group input-group-alternative mb-3">
                <select class="form-control" placeholder="Jenis Kelamin" name="jenisKelamin" required autofocus>
                  <option value="">Pilih Jenis Kelamin</option>
                  <option value="Pria">Pria</option>
                  <option value="Wanita">Wanita</option>
                </select>
              </div>

              <div class="form-group">
              <select class="form-control" name="id_kelas">
                <option value="0" disable="true" selected="true">Select Kelas</option>
                @foreach ($kelas as $key => $value)
                <option value="{{$value->id}}">{{ $value->namaKelas }}</option>
                @endforeach
              </select>
            </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary mt-4">Tambah Data</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
