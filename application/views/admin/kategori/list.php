 <p>
     <a href="<?php echo base_url('admin/kategori/tambah') ?>" class="btn btn-success btn-lg">
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
            <th>NAMA</th>
            <th>SLUG</th>
            <th>URUTAN</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($kategori as $kategori) { ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $kategori->nama_kategori ?></td>
            <td><?php echo $kategori->slug_kategori ?></td>
            <td><?php echo $kategori->urutan ?></td>
            <td>
                <a href="<?php echo base_url('admin/kategori/edit/'.$kategori->id_kategori) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>

                <a href="<?php echo base_url('admin/kategori/delete/'.$kategori->id_kategori) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Ingin menghapus Data ini ?')"><i class="fa fa-trash-alt"></i> Delete</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>