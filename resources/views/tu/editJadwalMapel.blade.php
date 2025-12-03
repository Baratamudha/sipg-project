@extends('layout.layoutTU')

@section('title')
Edit Jadwal Mata Pelajaran
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

              <form role="form" method="POST" action="{{url(action('JadwalMapelController@update', $id))}}">
                <input type="hidden" name="_token" value="<?php echo csrf_token();?>" >

                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <select class="form-control" placeholder="Hari" name="hari" required autofocus>
                      <option value="">Pilih Hari</option>
                      <option value="Senin">Senin</option>
                      <option value="Selasa">Selasa</option>
                      <option value="Rabu">Rabu</option>
                      <option value="Kamis">Kamis</option>
                      <option value="Jumat">Jumat</option>
                      <option value="Sabtu">Sabtu</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <input class="form-control" placeholder="Jam Awal" type="time" name="jamAwal" required autofocus>
                    <input class="form-control" placeholder="Jam Akhir" type="time" name="jamAkhir" required autofocus>
                  </div>
                </div>

                <div class="form-group">
                <select class="form-control" name="id_kelas">
                  <option value="0" disable="true" selected="true">Select Kelas</option>
                  @foreach ($kelas as $key => $value)
                  <option value="{{$value->id}}">{{ $value->namaKelas }}</option>
                  @endforeach
                </select>
              </div>

                <div class="form-group">
                <select class="form-control" name="id_mapel">
                  <option value="0" disable="true" selected="true">Select Mapel</option>
                  @foreach ($mapel as $key => $value)
                  <option value="{{$value->id}}">{{ $value->namaMapel }}</option>
                  @endforeach
                </select>
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
