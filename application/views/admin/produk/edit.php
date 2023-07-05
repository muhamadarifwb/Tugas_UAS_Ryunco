<?php 
// Notif Error

echo validation_errors('<div class="alert alert-warning">','</div>');

// Notif Error upload
if(isset($error)) {
    echo '<p class="alert alert-warning">';
    echo $error;
    echo '</p>';
}

// form open
echo form_open_multipart(base_url('admin/produk/edit/'.$produk->id_produk),' class="form-horizontal"');
?>

<div class="form-group row form-group-lg">
    <label class="col-md-2 col-form-label">Nama Produk</label>
    <div class="col-md-5">
        <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk" value="<?php echo $produk->nama_produk ?>" required>
    </div>
    </div>

    <div class="form-group row">
    <label class="col-md-2 col-form-label">Kode Produk</label>
    <div class="col-md-5">
        <input type="text" name="kode_produk" class="form-control" placeholder="Kode Produk" value="<?php echo $produk->kode_produk ?>" required>
    </div>
    </div>

    <div class="form-group row">
    <label class="col-md-2 col-form-label">Kategori Produk</label>
    <div class="col-md-5">
        <select name="id_kategori" class="form-control">
            <?php foreach($kategori as $kategori) { ?>
                <option value="<?php echo $kategori->id_kategori ?> <?php if($produk->id_kategori==$kategori->id_kategori) { echo "selected";} ?>">
                <?php echo $kategori->nama_kategori ?>
                </option>
            <?php } ?>
        </select>
    </div>
    </div>

    <div class="form-group row">
    <label class="col-md-2 col-form-label">Harga Produk</label>
    <div class="col-md-3">
        <input type="number" name="harga" class="form-control" placeholder="Harga Produk" value="<?php echo $produk->harga ?>" required>
        <small class="text-success">Harga Jual Produk</small>
    </div>
    <div class="col-md-3">
        <input type="number" name="harga_beli" class="form-control" placeholder="harga Beli Produk" value="<?php echo $produk->harga_beli ?>" required>
        <small class="text-success">Harga Pembelian Produk</small>
    </div>
    </div>

    <!-- <div class="form-group row">
    <label class="col-md-2 col-form-label">Harga Diskon Produk</label>
    <div class="col-md-2">
        <input type="number" name="harga_diskon" class="form-control" placeholder="Harga Diskon Produk" value="<?php echo $produk->harga_diskon ?>" required>
        <small class="text-success">Harga Diskon</small> 
    </div>-->
    <!-- <div class="col-md-2">
        <input type="text" name="tanggal_mulai_diskon" class="form-control reservationdate" placeholder="dd-mm-yyyy" value="" required>
        <small class="text-success">Tanggal Mulai Diskon</small>
    </div>
    <div class="col-md-2">
        <input type="text" name="tanggal_selesai_diskon" class="form-control reservationdate" placeholder="dd-mm-yyyy" value="" required>
        <small class="text-success">Tanggal Selesai Diskon</small>
    </div>
    </div>--> 

    <div class="form-group row">
    <label class="col-md-2 col-form-label">Stok Produk &amp; Stok Minimal</label>
    <div class="col-md-2">
        <input type="number" name="stok" class="form-control" placeholder="Stok Produk" value="<?php echo $produk->stok ?>" required>
        <small>Stok Produk Saat Ini</small>
    </div>
    <div class="col-md-2">
        <input type="number" name="stok_minimal" class="form-control" placeholder="Stok Minimal Produk" value="<?php echo $produk->stok_minimal ?>" required>
        <small>Stok Minimal</small>
    </div>
    </div>

    <div class="form-group row">
    <label class="col-md-2 col-form-label">Berat Produk</label>
    <div class="col-md-2">
        <input type="text" name="berat" class="form-control" placeholder="Berat Produk" value="<?php echo $produk->berat ?>" required>
    </div>
    </div>

    <div class="form-group row">
    <label class="col-md-2 col-form-label">Ukuran Produk</label>
    <div class="col-md-2">
        <input type="text" name="ukuran" class="form-control" placeholder="Ukuran Produk" value="<?php echo $produk->ukuran ?>" required>
    </div>
    </div>

    <div class="form-group row">
    <label class="col-md-2 col-form-label">Deskripsi Produk</label>
    <div class="col-md-10">
        <textarea name="keterangan" class="form-control" id="editor"><?php echo $produk->keterangan ?></textarea>
    </div>
    </div>

    <div class="form-group row">
    <label class="col-md-2 col-form-label">Keyword</label>
    <div class="col-md-10">
        <textarea name="keywords" class="form-control" placeholder="keyword Produk"><?php echo $produk->keywords ?></textarea>
    </div>
    </div>

    <div class="form-group row">
    <label class="col-md-2 col-form-label">Upload Gambar Produk</label>
    <div class="col-md-5">
        <input type="file" name="gambar" class="form-control">
    </div>
    </div>

    <div class="form-group row">
    <label class="col-md-2 col-form-label">Status Produk</label>
    <div class="col-md-5">
        <select name="status_produk" class="form-control">
            <option value="publish">Publikasikan</option>
            <option value="draft" <?php if($produk->status_produk=="Draft") { echo "selected";} ?>>Simpan Sebagai Draft</option>
        </select>
    </div>
    </div>

    <div class="form-group row">
    <label class="col-md-2 col-form-label"></label>
    <div class="col-md-5">
        <button class="btn btn-success btn-lg" name="submit" type="submit">
            <i class="fa fa-save"></i> Simpan
        </button>
        <button class="btn btn-info btn-lg" name="reset" type="reset">
            <i class="fa fa-times"></i> Reset
        </button>
    </div>
    </div>

<?php echo form_open(); ?>


