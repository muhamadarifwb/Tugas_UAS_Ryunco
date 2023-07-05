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
echo form_open_multipart(base_url('admin/produk/gambar/'.$produk->id_produk),' class="form-horizontal"');
?>

<div class="form-group row form-group-lg">
    <label class="col-md-2 col-form-label">Judul Gambar</label>
    <div class="col-md-5">
        <input type="text" name="judul_gambar" class="form-control" placeholder="Judul Gambar" value="<?php echo set_value('judul_gambar') ?>" required>
    </div>
</div>

<div class="form-group row form-group-lg">
    <label class="col-md-2 col-form-label">Uggah Gambar</label>
    <div class="col-md-4">
        <input type="file" name="gambar" class="form-control" placeholder="Gambar Produk" value="<?php echo set_value('gambar') ?>" required>
    </div>
    <div class="col-md-4">
        <button class="btn btn-success btn-xs" name="submit" type="submit">
            <i class="fa fa-save"></i> Simpan & Unggah Gambar
        </button>
        <button class="btn btn-info btn-xs" name="reset" type="reset">
            <i class="fa fa-times"></i> Reset
        </button>
    </div>
</div>

<?php echo form_close(); ?>

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
            <th>JUDUL GAMBAR</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
            <td>
                <img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar); ?>" class="img img-responsive img-thumbnail" width="60">
            </td>
            <td><?php echo $produk->nama_produk ?></td>
            
            <td>
            </td>
        </tr>


        <?php $no=2; foreach($gambar as $gambar) { ?>
        <tr>
            <td><?php echo $no ?></td>
            <td>
                <img src="<?php echo base_url('assets/upload/image/thumbs/'.$gambar->gambar); ?>" class="img img-responsive img-thumbnail" width="60">
            </td>
            <td><?php echo $gambar->judul_gambar ?></td>
            
            <td>

                <a href="<?php echo base_url('admin/produk/delete_gambar/'.$produk->id_produk. '/' .$gambar->id_gambar) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Ingin Menghapus Data Gambar Ini')"><i class="fa fa-trash-alt"></i> Delete</a>

            </td>
        </tr>
        <?php $no++; } ?>
    </tbody>
</table>