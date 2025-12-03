@extends('layout.layoutTU')

@section('title')
Ekstrakulikuler
@endsection

@section('content')
<div class="container">
  <a href="{{ ('tambahDataEkskul') }}" class="btn btn-raised btn-primary pull-right">Tambah</a>
<br>
<br>
<div class="table-responsive">
  <table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th width="5">No</th>
        <th>ID</th>
        <th>Nama Ekstrakulikuler</th>
        <th>Pembina</th>
        <th width="20">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 0;?>
      @foreach($ekskul as $key => $ekskul)
      <?php $no++ ;?>
     <tr>
       <td>{{ $no }}</td>
       <td>{{$ekskul['id']}}</td>
       <td>{{$ekskul['namaEkskul']}}</td>
       <td>{{$ekskul->guru->namaAwal}}</td>
       <td><a href="{{action('EkskulController@edit', $ekskul['id'])}}" class="btn btn-block btn-warning">Edit</a>
         <form action="{{action('EkskulController@destroy', $ekskul['id'])}}" method="">
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
