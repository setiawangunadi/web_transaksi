@extends('layouts.main')

@section('content-header')
  <h1>Sales
    <small>Penjualan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li>Transaksi</li>
    <li class="active">Penjualan</li>
  </ol>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            Data Transaksi
          </h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Invoice</th>
                  <th>Barang</th>
                  <th>Total</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>no++</td>
                  <td>item->id_detail_transaksi</td>
                  <td>#$$</td>
                  <td>item->jumlah_penjualan</td>
                  <td>
                    <a href="#" class="btn btn-sm btn-info mb-2">
                      <i class="fa fa-file"></i>
                    </a>
                    <a href="#" class="btn btn-sm btn-primary mb-2">
                      <i class="fa fa-edit"></i>
                    </a> 
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.card -->
@endsection