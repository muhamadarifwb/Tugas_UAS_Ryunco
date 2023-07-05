<?php 
//  notif
if($this->session->flashdata('success')) {
    echo '<p class="alert alert-success">';
    echo $this->session->flashdata('success');
    echo '</div>';
};
?>

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
echo form_open_multipart(base_url('admin/konfigurasi'),' class="form-horizontal"');
?>

<div class="form-group row form-group-lg">
    <label class="col-md-2 col-form-label">Nama Website</label>
    <div class="col-md-5">
        <input type="text" name="namaweb" class="form-control" placeholder="Nama WEBSITE" value="<?php echo $konfigurasi->namaweb ?>" required>
    </div>
    </div>

    <div class="form-group row">
    <label class="col-md-2 col-form-label">Tagline</label>
    <div class="col-md-8">
        <input type="text" name="tagline" class="form-control" placeholder="Tagline" value="<?php echo $konfigurasi->tagline ?>" required>
    </div>
    </div>

    <div class="form-group row">
    <label class="col-md-2 col-form-label">Email</label>
    <div class="col-md-8">
        <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $konfigurasi->email ?>" required>
    </div>
    </div>

    <div class="form-group row">
    <label class="col-md-2 col-form-label">Website</label>
    <div class="col-md-8">
        <input type="text" name="website" class="form-control" placeholder="Website" value="<?php echo $konfigurasi->website ?>" required>
    </div>
    </div>

    <div class="form-group row">
    <label class="col-md-2 col-form-label">Facebook</label>
    <div class="col-md-8">
        <input type="url" name="facebook" class="form-control" placeholder="Facebook" value="<?php echo $konfigurasi->facebook ?>" required>
    </div>
    </div>

    <div class="form-group row">
    <label class="col-md-2 col-form-label">Instagram</label>
    <div class="col-md-8">
        <input type="url" name="instagram" class="form-control" placeholder="Instagram" value="<?php echo $konfigurasi->instagram ?>" required>
    </div>
    </div>

    <div class="form-group row">
    <label class="col-md-2 col-form-label">Telephone/HP</label>
    <div class="col-md-8">
        <input type="text" name="telephone" class="form-control" placeholder="Telephone/HP" value="<?php echo $konfigurasi->telephone ?>" required>
    </div>
    </div>

    <div class="form-group row">
    <label class="col-md-2 col-form-label">Alamat</label>
    <div class="col-md-10">
        <textarea name="alamat" class="form-control" placeholder="Alamat"><?php echo $konfigurasi->alamat ?></textarea>
    </div>
    </div>

    <div class="form-group row">
    <label class="col-md-2 col-form-label">Keyword</label>
    <div class="col-md-10">
        <textarea name="keywords" class="form-control" placeholder="keyword"><?php echo $konfigurasi->keywords ?></textarea>
    </div>
    </div>

    <div class="form-group row">
    <label class="col-md-2 col-form-label">Metatext</label>
    <div class="col-md-10">
        <textarea name="metatext" class="form-control" placeholder="metatext"><?php echo $konfigurasi->metatext ?></textarea>
    </div>
    </div>

    <div class="form-group row">
    <label class="col-md-2 col-form-label">Deskripsi</label>
    <div class="col-md-10">
        <textarea name="deskripsi" class="form-control" placeholder="Deskripsi"><?php echo $konfigurasi->deskripsi ?></textarea>
    </div>
    </div>

    <div class="form-group row">
    <label class="col-md-2 col-form-label">Rekenening Pembayaran</label>
    <div class="col-md-10">
        <textarea name="rekening_pembayaran" class="form-control" placeholder="Rekenening Pembayaran"><?php echo $konfigurasi->rekening_pembayaran ?></textarea>
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


