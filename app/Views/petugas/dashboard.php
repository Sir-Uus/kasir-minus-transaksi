<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <h2>Daftar Produk</h2>
            <div class="row">
                <!-- Contoh produk -->
                <?php foreach($produks as $isi): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?= base_url() ?>/img/bakso.png" class="card-img-top" alt="Produk 1">
                        <div class="card-body">
                            <h5 class="card-title"><?= $isi['namaproduk'] ?></h5>
                            <p class="card-text">Harga: Rp. <?=$isi['harga'] ?></p>
                            <a href="#" class="btn btn-success add-to-cart" id="add-to-cart-<?= $isi['produkid'] ?>" data-product="<?= $isi['namaproduk'] ?>" data-price="<?= $isi['harga'] ?>">Tambah ke Keranjang</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <!-- Produk lainnya bisa ditambahkan di sini -->
            </div>
        </div>
        <div class="col-md-4">
            <h2>Rincian Pembelian</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody id="cart-table-body">
                    <!-- app/Views/products/cart_table.php -->
                </tbody>
            </table>
            <h4 id="total-pembelian">Total Pembelian: Rp.0.00</h4>
            <button type="button" class="btn btn-success bayar" data-toggle="modal" data-target="#bayar">Proses Pembayaran</button>
        </div>
    </div>
</div>  

<div class="modal fade" id="bayar" tabindex="-1" role="dialog" aria-labelledby="contohModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="contohModalLabel">Transaksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('admin/penjualan/store') ?>" method="post">
        <h4>Detail Produk pesanan :</h4>
        <div>
            <label for="">Tanggal transaksi:</label>
            <input type="text" class="form-control" name="tanggalpenjualan" id="tanggalpenjualan" value="<?= date('Y-m-d') ?>" readonly>
        </div>
        <ul id="modal-product-list"></ul>   
        <div>
            <label for="">Pilih Pelanggan : </label>
            <select class="form-control" name="pelangganid" id="pelangganid">
            <?php foreach($pelanggans as $row): ?>
                <option value="<?= $row['pelangganid'] ?>"><?= $row['namapelanggan'] ?></option>
            <?php endforeach; ?>
            </select>
        </div></br>
        <h4 id="modal-total" name="totalharga"></h4>
        <input type="text" class="form-control" name="totalharga" id="modal-total2">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary simpan" id="save">Konfirmasi</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> 
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var addToCartButtons = document.querySelectorAll('.add-to-cart');

        addToCartButtons.forEach(function (button) {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                var productName = button.getAttribute('data-product');
                var productPrice = button.getAttribute('data-price');
                addToCart(productName, productPrice);
            });
        });

        function addToCart(productName, productPrice) {
            var cartTableBody = document.getElementById('cart-table-body');
            var newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>${productName}</td>
                <td>${productPrice}</td>
                <td>1</td>
                <td>${productPrice}</td>
            `;
            cartTableBody.appendChild(newRow);
            calculateTotal();
        }

        function calculateTotal() {
            var prices = document.querySelectorAll('#cart-table-body td:nth-child(4)');

            var total = 0;

            prices.forEach(function (price) {
                total += parseFloat(price.textContent.replace('Rp. ', '').replace(',', ''));
            });

            document.querySelector('#total-pembelian').textContent = 'Total Pembelian: Rp. ' + total.toFixed(2);

            document.querySelector('#modal-total').textContent = 'Total Pembelian: Rp. ' + total.toFixed(2);
            $('#modal-total2').val(total);
        }

    });
</script>
<script>
$(document).ready(function(){
    $('#save').click(function(){
    swal.fire({
    title: "Berhasil!",
    text:  "Penjualan berhasil Ditambahakan!",
    icon:  "success",
    button: "OK",
        });
    });
});

</script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<?= $this->endsection() ?>