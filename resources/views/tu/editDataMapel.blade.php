@extends('layout.layoutTU')

@section('title')
Edit Data Mata Pelajaran
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

              <form role="form" method="POST" action="{{url(action('MapelController@update', $id))}}">
                <input type="hidden" name="_token" value="<?php echo csrf_token();?>" >

                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <input class="form-control" placeholder="Nama Mata Pelajaran" type="text" name="namaMapel" value="{{ $mapel->namaMapel }}" required autofocus>
                  </div>
                </div>

                <div class="form-group">
                <select class="form-control" placeholder="Id Guru" name="id_guru" required autofocus>
                  <option value="" disable="true" selected="true">Pilih Guru</option>
                  @foreach ($users as $key => $value)
                  <option value="{{$value->id}}">{{ $value->namaAwal }}</option>
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
