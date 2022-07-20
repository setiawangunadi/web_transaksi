@extends('layouts.main')

@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Daftar Barang</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
@endsection

@section('content')
<!-- Default box -->
<div class="card">
  <div class="card-header">
    <div class="card-tools">
      <a href="{{ route('tambah-barang')}}" class="btn btn-success">Tambah Data <i class="fas fa-plus-square"></i></a>
    </div>
  </div>
  <div class="card-body">
    <table class="table table-bordered">
      <tr>
        <th>No.</th>
        <th>Nama Barang</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Aksi</th>
      </tr>
      <?php $no=1;?>
      @foreach ($dtBarang as $item)
      <tr>
        <td>{{$no++}}</td>
        <td>{{$item->nama_barang}}</td>
        <td>Rp. {{$item->harga_barang}}</td>
        <td>{{$item->stok_barang}}</td>
        <td>
            <a href="{{ route('edit-barang', $item->id_barang)}}" class="btn btn-sm btn-primary mb-2"><i class="fa fa-edit"></i></a> 
            |
            <a href="{{ route('delete-barang', $item->id_barang)}}" class="btn btn-sm btn-danger mb-2"><i class="fa fa-trash"></i></a>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
    <!-- /.card-body -->
  <div class="card-footer">
    {{$dtBarang->links()}}
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection