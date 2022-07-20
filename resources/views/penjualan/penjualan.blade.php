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
    <div class="row">
      <div class="col-lg-4">
        <div class="box box-widget">
          <div class="box-body">
            <table width="100%">
              <tr>
                <td style="vertical-align:top">
                  <label for="date">Date</label>
                </td>
                <td>
                  <div class="form-group">
                    <input type="date" id="date" value="<?=date('Y-m-d')?>" class="form-control">
                  </div>
                </td>
              </tr>
              <tr>
                <td style="vertical-align:top">
                  <label for="customer">Customer</label>
                </td>
                <td>
                  <div>
                    <select id="customer" class="form-control">
                      <option value="">Umum</option>
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
              <tr>
                <td style="vertical-align: top">
                  <label for="qty">Qty</label>
                </td>
                <td>
                  <div class="form-group">
                    <input type="number" id="qty" value="1" min="1" class="form-control">
                  </div>
                </td>
              </tr>
              <tr>
                <td></td>
                <td>
                  <div>
                    <button type="button" id="add_cart" class="btn btn-primary">
                      <i class="fa fa-cart-plus"></i>Add
                    </button>
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
              <h4>Invoice <b><span id="invoice">MP1909250001</span></b></h4>
              <h1><b><span id="grand_total2" style="font-size:50pt">0</span></b></h1>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="box box-widget">
          <div class="box-body table-responsive">
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
                <tr>
                  <td>#</td>
                  <td>#</td>
                  <td>#</td>
                  <td>#</td>
                  <td>#</td>
                  <td>#</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-3">
        <div class="box box-widget">
          <div class="box-body">
            <table width="100%">
              <tr>
                <td style="vertical-align: top; width: 30%">
                  <label for="sub_total">Sub Total</label>
                </td>
              </tr>
              <tr>
                <td>
                  <div style="form-group">
                    <input type="number" id="sub_total" value="" class="form-control" readonly>
                  </div>
                </td>
              </tr>
              <tr>
                <td style="vertical-align: top">
                  <label for="discount">Discount</label>
                </td>
                <td>
                  <div class="form-group">
                    <input type="number" id="discount" value="0" min="0" class="form-control">
                  </div>
                </td>
              </tr>
              <tr>
                <td style="vertical-align: top">
                  <label for="grand_total">Grand Total</label>
                </td>
                <td>
                  <div class="form-group">
                    <input type="number" id="grand_total" class="form-control" readonly>
                  </div>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="box box-widget">
          <div class="box-body">
            <table width="100%">
              <tr>
                <td style="vertical-align: top; width: 30%">
                  <label for="cash">Cash</label>
                </td>
                <td>
                  <div class="form-group">
                    <input type="number" id="cash" value="0" min="0" class="form-control" readonly>
                  </div>
                </td>
              </tr>
              <tr>
                <td style="vertical-align: top">
                  <label for="change">Change</label>
                </td>
                <td>
                  <div>
                    <input type="number" id="change" class="form-control" readonly>
                  </div>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="box box-widget">
          <div class="box-body">
            <table width="100%">
              <tr>
                <td style="vertical-align: top">
                  <label for="note">Note</label>
                </td>
                <td>
                  <div>
                    <textarea id="note" rows="3" class="form-control"></textarea>
                  </div>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>

      <div class="col-lg-3">
        <div>
          <button id="cancel_payment" class="btn btn-flat btn-warning">
            <i class="fa fa-refresh"></i> Cancel
          </button><br><br>
          <button id="process_payment" class="btn btn-flat btn-lg btn-success">
            <i class="fa fa-paper-plane-o"></i> Proses Payment
          </button>
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
@endsection

<div class="modal fade" id="modal-item">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Select Product Item</h4>
      </div>
      <div class="modal-body table-responsive">
        <form action="{{ route('penjualan')}}" method="get">
        <table class="table table-bordered table-striped" id="table1">
          <thead>
            <tr>
              <td>ID Barang</td>
              <td>Nama Barang</td>
              <td>Harga Barang</td>
              <td>Stock Barang</td>
              <td>Aksi</td>
            </tr>
          </thead>
          <form action="{{ route('tambah-penjualan')}}" method="post">
          @foreach ($dtBarang as $item)
          <tbody>
            <tr>
            <td><input type="text" id="id_barang" name="id_barang" class="form-control" value="{{$item->id_barang}}" readonly></td>
              <td><input type="text" id="nama_barang" name="nama_barang" class="form-control" value="{{$item->nama_barang}}" readonly></td>
              <td><input type="text" id="harga_barang" name="harga_barang" class="form-control" value="{{$item->harga_barang}}" readonly></td>
              <td><input type="text" id="stok_barang" name="stok_barang" class="form-control" value="{{$item->stok_barang}}" readonly></td>
              <td>
                <button type="submit" class="btn btn-sm btn-primary mb-2">
                  <i class="fa fa-cart-plus"></i>Add
                </button>
              </td>
            </tr>
          </tbody>
          @endforeach
          </form>
        </table>
        </form>        
      </div>
    </div>
  </div>
</div>