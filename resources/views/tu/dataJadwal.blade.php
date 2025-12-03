@extends('layout.layoutTU')

@section('title')
Data Jadwal
@endsection

@section('content')
<div class="container">
  <a href="{{ ('tambahJadwalMapel') }}" class="btn btn-raised btn-primary pull-right">Tambah Jadwal Pelajaran</a>
  <a href="{{ ('tambahJadwalEkskul') }}" class="btn btn-raised btn-primary pull-right">Tambah Jadwal Ekstrakulikuler</a>
<br>
<br>
<div class="table-responsive">
  <table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th width="5">No</th>
        <th width="20">ID</th>
        <th width="80">Hari</th>
        <th width="250">Jam</th>
        <th width="150">Kelas</th>
        <th>Nama Pelajaran</th>
        <th width="20">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 0;?>
      @foreach($jadwal_mapel as $key => $jadwal_mapel)
      <?php $no++ ;?>
     <tr>
       <td>{{ $no }}</td>
       <td>{{$jadwal_mapel['id']}}</td>
       <td>{{$jadwal_mapel['hari']}}</td>
       <td>{{$jadwal_mapel['jamAwal']}} - {{$jadwal_mapel['jamAkhir']}}</td>
       <td>{{$jadwal_mapel->kelas->namaKelas}}</td>
       <td>{{$jadwal_mapel->mapel->namaMapel}}</td>

       <td><a href="{{action('JadwalMapelController@edit', $jadwal_mapel['id'])}}" class="btn btn-block btn-warning">Edit</a>
         <form action="{{action('JadwalMapelController@destroy', $jadwal_mapel['id'])}}" method="">
           @csrf
           <input name="_method" type="hidden" value="DELETE">
           <button class="btn btn-block btn-danger" type="submit">Delete</button>
         </form>
       </td>
     </tr>
     @endforeach
    </tbody>
  </table>

</div>
<div class="table-responsive">
  <table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th width="5">No</th>
        <th width="20">ID</th>
        <th width="80">Hari</th>
        <th width="250">Jam</th>
        <th>Ektrakulikuler</th>
        <th width="20">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 0;?>
      @foreach($jadwal_ekskul as $key => $jadwal_ekskul)
      <?php $no++ ;?>
     <tr>
       <td>{{ $no }}</td>
       <td>{{$jadwal_ekskul['id']}}</td>
       <td>{{$jadwal_ekskul['hari']}}</td>
       <td>{{$jadwal_ekskul['jamAwal']}} - {{$jadwal_ekskul['jamAkhir']}}</td>
       <td>{{$jadwal_ekskul->ekskul->namaEkskul}}</td>

       <td><a href="{{action('JadwalEkskulController@edit', $jadwal_ekskul['id'])}}" class="btn btn-block btn-warning">Edit</a>
         <form action="{{action('JadwalEkskulController@destroy', $jadwal_ekskul['id'])}}" method="">
           @csrf
           <input name="_method" type="hidden" value="DELETE">
           <button class="btn btn-block btn-danger" type="submit">Delete</button>
         </form>
       </td>
     </tr>
     @endforeach
    </tbody>
  </table>

</div>
</div>
@endsection
