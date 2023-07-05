<?php 
// Notif Error

echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('admin/user/edit/'.$user->id_user),' class="form-horizontal"');
?>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Nama Pengguna</label>
    <div class="col-md-5">
        <input type="text" name="nama" class="form-control" placeholder="Nama Pengguna" value="<?php echo $user->nama ?>" required>
    </div>
    </div>

    <div class="form-group row">
    <label class="col-md-2 col-form-label">Email</label>
    <div class="col-md-5">
        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $user->email ?>" required>
    </div>
    </div>

    <div class="form-group row">
    <label class="col-md-2 col-form-label">Username</label>
    <div class="col-md-5">
        <input type="text" name="username" class="form-control" placeholder="Username " value="<?php echo $user->username ?>" readonly>
    </div>
    </div>

    <div class="form-group row">
    <label class="col-md-2 col-form-label">Password</label>
    <div class="col-md-5">
        <input type="password" name="password" class="form-control" placeholder="password" value="<?php echo $user->password ?>" required>
    </div>
    </div>

    <div class="form-group row">
    <label class="col-md-2 col-form-label">level Hak Akses</label>
    <div class="col-md-5">
        <select name="akses_level" class="form-control">
            <option value="Admin">Admin</option>
            <option value="Admin" <?php if($user->akses_level=="User") { echo "selected"; } ?>>User</option>
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
