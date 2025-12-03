@extends('layout.layoutTU')

@section('title')
Data Murid
@endsection

@section('content')
<div class="container">
  <a href="{{ ('tambahDataMurid') }}" class="btn btn-raised btn-primary pull-right">Tambah</a>
<br>
<br>
<div class="table-responsive">
  <table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th width="5">No</th>
        <th>ID</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Kelas</th>
        <th width="20">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 0;?>
      @foreach($murid as $key => $murid)
      <?php $no++ ;?>
     <tr>
       <td>{{ $no }}</td>
       <td>{{$murid['id']}}</td>
       <td>{{$murid['nis']}}</td>
       <td>{{$murid['nama']}}</td>
       <td>{{$murid['tglLahir']}}</td>
       <td>{{$murid['jenisKelamin']}}</td>
       <td>{{$murid->kelas->namaKelas}}</td>
       <td><a href="{{action('MuridController@edit', $murid['id'])}}" class="btn btn-block btn-warning">Edit</a>
         <form action="{{action('MuridController@destroy', $murid['id'])}}" method="">
           @csrf
           <input name="_method" type="hidden" value="DELETE">
           <button class="btn btn-block btn-danger" type="submit">Delete</button>
         </form>
       </td>
     @endforeach
     </tr>
    </tbody>
  </table>

</div>
</div>
@endsection
