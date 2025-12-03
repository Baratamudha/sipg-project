@extends('layout.layoutGuru')

@section('title')
Data Guru
@endsection

@section('content')
<div class="container">
<br>
<br>
<div class="table-responsive">
  <table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th width="5">No</th>
        <th>Nama Awal</th>
        <th>Nawa Akhir</th>
        <th>NIP</th>
        <th>Pemgampu Mata Pelajaran</th>
        <th>Agama</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 0;?>
      @foreach($users as $key => $users)
      <?php $no++ ;?>
     <tr>
       <td>{{ $no }}</td>
       <td>{{$users['namaAwal']}}</td>
       <td>{{$users['namaAkhir']}}</td>
       <td>{{$users['NIP']}}</td>
       <td>{{$users['pengampuMapel']}}</td>
       <td>{{$users['agama']}}</td>
     </tr>
     @endforeach
    </tbody>
  </table>

</div>
</div>
@endsection
