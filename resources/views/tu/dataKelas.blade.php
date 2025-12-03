@extends('layout.layoutTU')

@section('title')
Data Kelas
@endsection

@section('content')
<div class="container">
  <a href="{{ ('tambahKelas') }}" class="btn btn-raised btn-primary pull-right">Tambah</a>
<br>
<br>
<div class="table-responsive">
  <table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th width="5">No</th>
        <th>ID</th>
        <th>Nama Kelas</th>
        <th width="20">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 0;?>
      @foreach($kelas as $key => $kelas)
      <?php $no++ ;?>
     <tr>
       <td>{{ $no }}</td>
       <td>{{$kelas['id']}}</td>
       <td>{{$kelas['namaKelas']}}</td>

       <td><a href="{{action('KelasController@edit', $kelas['id'])}}" class="btn btn-block btn-warning">Edit</a>
         <form action="{{action('KelasController@destroy', $kelas['id'])}}" method="">
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
