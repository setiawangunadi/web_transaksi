@extends('layouts.main')

@section('content-header')
  <h1>Transaksi Penjualan</h1>
@endsection

@section('content')
<div class="card">
  <div class="card-header">
    <div class="card-tools">
      <h3>Transaksi</h3>
    </div>
  </div>
  <div class="card-body">
    <form action="{{ route('penjualan.store') }}" method="POST">
      @csrf
      <div class="row">
        <div class="col-lg-4">
          <div class="box box-widget">
            <div class="box-body">
              <table width="100%">
                <tr>
                  <td style="vertical-align:top">
                    <label for="tanggal_pembayaran">Tanggal</label>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="date" name="tanggal_pembayaran" id="tanggal_pembayaran" value="<?=date('Y-m-d')?>" class="form-control">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td style="vertical-align:top">
                    <label>Cara Pembayaran</label>
                  </td>
                  <td>
                    <div>
                      <select id="cara_pembayaran" name="cara_pembayaran" class="form-control">
                        <option value="cash">Cash</option>
                        <option value="debit">Debit</option>
                      </select>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
  
        <div class="col-lg-4">
          <div class="box box-widget">
            <div class="box-body">
              <table width="100%">
                <tr>
                  <td style="vertical-align:top; width:30%">
                    <label for="barcode">Cari Barang</label>
                  </td>
                  <td>
                    <div class="form-group input-group">
                      <input type="text" id="nama_barang" class="form-control">
                      <span class="input-group-btn">
                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                          <i class="fa fa-search"></i>
                        </button>
                      </span>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        
        <div class="col-lg-4">
          <div class="box box-widget">
            <div class="box-body">
              <div align="right">
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
              </div>
            </div>
          </div>
        </div>
    </div>
  </form>
    <div class="row">
      <div class="col-lg-12">
        <div class="box box-widget">
          <div class="box-body table-responsive">
            <br>
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Product Item</th>
                  <th>Price</th>
                  <th>Qty</th>
                  <th>Total</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody id="cart_table">
                @php
                  $totalPembelian = 0;
                @endphp
                @forelse($dtDetailTransaksi as $index => $transaksi)
                  <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $transaksi->barang->nama_barang }}</td>
                    <td>{{ number_format($transaksi->barang->harga_barang, 0, ",", ".") }}</td>
                    <td>{{ $transaksi->qty }}</td>
                    <td>{{ number_format($transaksi->jumlah_penjualan, 0, ",", ".") }}</td>
                    <td>
                      <form method="POST" action="{{ route('penjualan.detail_penjualan.destroy', $transaksi->id_detail_transaksi) }}">
                        @csrf
                        {!! method_field('delete') !!}
                        <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                      </form>
                    </td>
                  </tr>
                  @php
                    $totalPembelian += $transaksi->jumlah_penjualan;
                  @endphp
                @empty
                  <tr>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                  </tr>
                @endforelse
              </tbody>
            </table>

            <br>
            <br>
            <table class="table table-bordered table-striped">
              <tbody>
                <tr>
                  <th>Total Pembelian</th>
                  <th>:</th>
                  <th>{{ number_Format($totalPembelian, 0, ",", ".") }}</th>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  
  </div>
    <!-- /.card-body -->
  <div class="card-footer">
    <p>Mohon Diperiksa Kembali Atas Semua Barang Yang Dibeli!</p>
  </div>
  <!-- /.card-footer-->
</div>

<div class="modal fade" id="modal-item" style="width:100%;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title">Select Product Item</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive">

          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <td>Nama Barang</td>
                <td>Harga Barang</td>
                <td>Stock Barang</td>
                <td>Kuantitas</td>
                <td>Aksi</td>
              </tr>
            </thead>
            @foreach ($dtBarang as $item)
              <tbody>
                <form action="{{ route('penjualan.detail_penjualan.store') }}" method="POST">
                  @csrf
                  <tr>
                    <td>
                      <input type="hidden" name="id_barang" value="{{ $item->id_barang }}">
                      {{ $item->nama_barang }}
                    </td>
                    <td>
                      <input type="hidden" value="{{ $item->harga_barang }}" name="harga_barang">
                      {{ number_format($item->harga_barang, 0, ",", ".") }}</td>
                    <td>{{ $item->stok_barang }}</td>
                    <td>
                      <input type="text" name="qty" class="form-control">
                    </td>
                    <td>
                      <button type="submit" class="btn btn-sm btn-primary mb-2">
                        <i class="fa fa-cart-plus"></i>Add
                      </button>
                    </td>
                  </tr>
                </form>
              </tbody>
            @endforeach
          </table>  
      </div>
    </div>
  </div>
</div>
@endsection

