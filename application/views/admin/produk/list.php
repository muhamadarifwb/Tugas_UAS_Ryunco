 <p>
     <a href="<?php echo base_url('admin/produk/tambah') ?>" class="btn btn-success btn-lg">
     <i class="fa fa-plus"></i> Tambah Baru
    </a>
 </p>

<?php 
//  notif
if($this->session->flashdata('success')) {
    echo '<p class="alert alert-success">';
    echo $this->session->flashdata('success');
    echo '</div>';
};
?>
<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th>NO</th>
            <th>GAMBAR</th>
            <th>NAMA</th>
            <th>KATEGORI</th>
            <th>HARGA</th>
            <th>STATUS</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($produk as $produk) { ?>
        <tr>
            <td><?php echo $no ?></td>
            <td>
                <img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar); ?>" class="img img-responsive img-thumbnail" width="60">
            </td>
            <td>
                <?php echo $produk->nama_produk ?>
                <small>
                    <br>Stok: <?php echo number_format($produk->stok,'0',',','.') ?>
                    <br>Stok Minimal: <?php echo number_format($produk->stok_minimal,'0',',','.') ?>
                </small>

            </td>
            <td><?php echo $produk->nama_kategori ?></td>
            <td>Harga Jual: <?php echo number_format($produk->harga,'0',',','.') ?>
                <small>
                    <br>Harga Beli: <?php echo number_format($produk->harga_beli,'0',',','.') ?>
                    <!-- <br>Harga Diskon: <?php echo number_format($produk->harga_diskon,'0',',','.') ?> -->
                    
                </small>
            </td>
            <td><?php echo $produk->status_produk ?></td>
            <td>
            <a href="<?php echo base_url('admin/produk/gambar/'.$produk->id_produk) ?>" class="btn btn-success btn-xs"><i class="fa fa-image"></i> Gambar (<?php echo $produk->total_gambar ?>)</a>


                <a href="<?php echo base_url('admin/produk/edit/'.$produk->id_produk) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>

                <?php include('delete.php') ?>
            </td>
        </tr>
        <?php $no++; } ?>
    </tbody>
</table>