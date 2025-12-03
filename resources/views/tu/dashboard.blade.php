@extends('layout.layoutTU')

@section('title')
Data Guru
@endsection

@section('content')
<div class="container">
  <a href="{{ ('register') }}" class="btn btn-raised btn-primary pull-right">Tambah</a>
<br>
<br>
<div class="table-responsive">
  <table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th width="5">No</th>
        <th>ID</th>
        <th>Nama Awal</th>
        <th>Nawa Akhir</th>
        <th>NIP</th>
        <th>Agama</th>
        <th width="20">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 0;?>
      @foreach($users as $key => $users)
      <?php $no++ ;?>
     <tr>
       <td>{{ $no }}</td>
       <td>{{$users['id']}}</td>
       <td>{{$users['namaAwal']}}</td>
       <td>{{$users['namaAkhir']}}</td>
       <td>{{$users['NIP']}}</td>
       <td>{{$users['agama']}}</td>

       <td><a href="{{action('RegisterController@edit', $users['id'])}}" class="btn btn-block btn-warning">Edit</a>
         <form action="{{action('RegisterController@destroy', $users['id'])}}" method="">
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
