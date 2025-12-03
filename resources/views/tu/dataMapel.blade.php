@extends('layout.layoutTU')

@section('title')
Mata Pelajaran
@endsection

@section('content')
<div class="container">
  <a href="{{ ('tambahDataMapel') }}" class="btn btn-raised btn-primary pull-right">Tambah</a>
<br>
<br>
<div class="table-responsive">
  <table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th width="5">No</th>
        <th>ID</th>
        <th>Nama Mata Pelajaran</th>
        <th>Pengampu</th>
        <th width="20">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 0;?>
      @foreach($mapel as $key => $mapel)
      <?php $no++ ;?>
     <tr>
       <td>{{ $no }}</td>
       <td>{{$mapel['id']}}</td>
       <td>{{$mapel['namaMapel']}}</td>
       <td>{{$mapel->guru->namaAwal}}</td>
       <td><a href="{{action('MapelController@edit', $mapel['id'])}}" class="btn btn-block btn-warning">Edit</a>
         <form action="{{action('MapelController@destroy', $mapel['id'])}}" method="">
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
