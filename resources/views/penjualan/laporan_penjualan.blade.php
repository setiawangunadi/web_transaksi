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
                  <th>Tanggal Transaksi</th>
                  <th>Cara Pembayaran</th>
                  <th>Total</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($dataTransaksi as $index => $transaksi)
                  <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $transaksi->tanggal_pembayaran }}</td>
                    <td>{{ $transaksi->cara_pembayaran }}</td>
                    <td>{{ number_format($transaksi->total_pembayaran, 0, ",", ".") }}</td>
                  </tr>
                @endforeach
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