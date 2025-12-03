@extends('layout.layoutTU')

@section('title')
Edit Data Guru
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

              <form role="form" method="POST" action="{{url(action('RegisterController@update', $id))}}">
                <input type="hidden" name="_token" value="<?php echo csrf_token();?>" >

                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <input class="form-control" placeholder="Nama Awal" type="text" name="namaAwal" value="{{ $user->namaAwal }}" required autofocus>
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <input class="form-control" placeholder="Nama Akhir" type="text" name="namaAkhir" value="{{ $user->namaAkhir }}" required autofocus>
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <input class="form-control" placeholder="NIP" type="text" name="NIP" value="{{ $user->NIP }}" required autofocus>
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <input class="form-control" placeholder="Password" type="password" name="password">
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <input class="form-control" placeholder="Tanggal Lahir" type="date" name="tglLahir" required autofocus>
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <select class="form-control" placeholder="Barang" name="agama" required autofocus>
                      <option value="">Pilih Agama</option>
                      <option value="Islam">Islam</option>
                      <option value="Katolik">Katolik</option>
                      <option value="Protestan">Protestan</option>
                      <option value="Hindu">Hindu</option>
                      <option value="Budha">Budha</option>
                      <option value="Kong Hu Chu">Kong Hu Chu</option>
                    </select>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary mt-4">Ganti Data</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
