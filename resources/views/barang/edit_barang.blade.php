@extends('layouts.main')

@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Barang</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
@endsection

@section('content')
<!-- Default box -->
<div class="card">
        <div class="card-header">
          <h3>Edit Data Barang</h3>
        </div>
        <div class="card-body">
          <form action="{{ url('update-barang', $getdtBarang -> id_barang)}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <input type="text" id="nama_barang" name="nama_barang" class="form-control" placeholder="Nama Barang" value="{{$getdtBarang->nama_barang}}">
            </div>
            <div class="form-group">
                <input type="number" id="harga_barang" name="harga_barang" class="form-control" placeholder="Harga Barang" value="{{$getdtBarang->harga_barang}}">
            </div>
            <div class="form-group">
                <input type="number" id="stok_barang" name="stok_barang" class="form-control" placeholder="Jumlah Barang" value="{{$getdtBarang->stok_barang}}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"> Edit Barang </button>
            </div>
          </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
@endsection