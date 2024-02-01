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
                        <img src="<?= base_url('img/' . $isi['gambar']) ?>" class="card-img-top" alt="Produk 1">
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
            <table class="table table-striped mt-3">
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
        <form action="<?= base_url('penjualan/store') ?>" method="post">
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
        <table id="modal-table-" class="table table-striped">
       <!-- Modal table content goes here -->
       <thead>
            <tr>
                <th>Produk</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody id="modal-table-body" name="modal_table_rows">
            <!-- app/Views/products/cart_table.php -->
        </tbody>
        </table>
        <h4 id="modal-total" name="totalharga"></h4>
        <input type="text" class="form-control" name="totalharga" id="modal-total2" readonly>
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
        var existingRow = findRowByName(productName);

        if (existingRow) {
            // Jika produk sudah ada di dalam keranjang, tambahkan qty dan total
            var qtyCell = existingRow.querySelector('td:nth-child(3)');
            var totalCell = existingRow.querySelector('td:nth-child(4)');

            var qty = parseInt(qtyCell.textContent) + 1;
            var total = parseFloat(productPrice.replace('Rp. ', '').replace(',', '')) * qty;

            qtyCell.textContent = qty;
            totalCell.textContent = 'Rp. ' + total.toFixed(2);
        } else {
            // Jika produk belum ada di dalam keranjang, tambahkan baris baru
            var newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>${productName}</td>
                <td>${productPrice}</td>
                <td>1</td>
                <td>${productPrice}</td>
            `;
            cartTableBody.appendChild(newRow);
        }

        calculateTotal();
        copyCartToModal();
    }

    function findRowByName(productName) {
        // Mencari baris berdasarkan nama produk
        var rows = document.querySelectorAll('#cart-table-body tr');

        for (var i = 0; i < rows.length; i++) {
            var nameCell = rows[i].querySelector('td:first-child');
            if (nameCell && nameCell.textContent.trim() === productName.trim()) {
                return rows[i];
            }
        }

        return null;
    }

    function copyCartToModal() {
    var cartRows = document.querySelectorAll('#cart-table-body tr');
    var modalTableBody = document.getElementById('modal-table-body');

    // Clear existing rows in the modal table
    modalTableBody.innerHTML = '';

    // Loop through cart rows and append corresponding rows to modal table
    cartRows.forEach(function (cartRow) {
        var productName = cartRow.querySelector('td:first-child').textContent.trim();
        var qty = cartRow.querySelector('td:nth-child(3)').textContent.trim();

        var newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>${productName}</td>
            <td>${qty}</td>
        `;
        modalTableBody.appendChild(newRow);
    });
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

    function addToModal(productName, qty) {
    var modalTableBody = document.getElementById('modal-table-body');
    var existingRow = findRowByNameInModal(productName);

    if (existingRow) {
        // If product already exists in modal, update the quantity
        var qtyCell = existingRow.querySelector('td:nth-child(3)');
        var newQty = parseInt(qtyCell.textContent) + qty;
        qtyCell.textContent = newQty;
    } else {
        // If product doesn't exist in modal, add a new row
        var newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>${productName}</td>
            <td>${qty}</td>
        `;
        modalTableBody.appendChild(newRow);
    }

    function findRowByNameInModal(productName) {
    // Mencari baris berdasarkan nama produk di modal
    var rows = document.querySelectorAll('#modal-table-body tr');

    for (var i = 0; i < rows.length; i++) {
        var nameCell = rows[i].querySelector('td:first-child');
        if (nameCell && nameCell.textContent.trim() === productName.trim()) {
            return rows[i];
        }
    }

    return null;
}
}
    
}); 
</script>

<script>
    $(document).ready(function () {
    $(#save).on('click',function(e){
        e.preventDefault();

            $.ajax({
                url: 'penjualan/store',
                type: 'POST',
                data: {
                    tanggalpenjualan: $('[name="tanggalpenjualan"]').val(),
                    pelangganid: $('[name="pelangganid"]').val(),
                    totalharga: $('[name="totalharga"]').val()
                },
                success: function (data) {
                    $('#bayar').modal('hide');
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
        });
    });
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