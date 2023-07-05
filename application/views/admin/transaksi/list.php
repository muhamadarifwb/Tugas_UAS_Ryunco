<table class="table table-bordered" width="100%">
<thead>
    <tr class="bg-success text-center">
        <th>NO</th>
        <th>PELANGGAN</th>
        <th>KODE</th>
        <th>TANGGAL</th>
        <th>JUMLAH TOTAL</th>
        <th>JUMLAH ITEM</th>
        <th>STATUS BAYAR</th>
        <th width="30%">ACTION</th>
    </tr>
</thead>
<tbody>
    <?php $i=1; foreach($header_transaksi as $header_transaksi) { ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td>
            <?php echo $header_transaksi->nama_pelanggan ?>
            <br><small>
                Telephone: <?php echo $header_transaksi->telephon ?>
                <br>Email: <?php echo $header_transaksi->email ?>
                <br>Alamat Kirim: <br><?php echo nl2br($header_transaksi->alamat) ?>
            </small>

        </td>
        <td><?php echo $header_transaksi->kode_transaksi ?></td>
        <td><?php echo date('d-m-y',strtotime($header_transaksi->tanggal_transaksi)) ?></td>
        <td><?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
        <td><?php echo $header_transaksi->total_item ?></td>
        <td><?php echo $header_transaksi->status_bayar ?></td>
        <td>
            <div class="btn-group">
                <a href="<?php echo base_url('admin/transaksi/detail/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-success btn-xs"><i class="fa fa-eye"></i>Detail</a>
                <a href="<?php echo base_url('admin/transaksi/cetak/'.$header_transaksi->kode_transaksi) ?>" target="_blank" class="btn btn-primary btn-xs"><i class="fa fa-print"></i>Cetak</a>
                <a href="<?php echo base_url('admin/transaksi/status/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-warning btn-xs"><i class="fa fa-check"></i>Update Status</a>
            </div>
            <div class="celarfix"></div>
            <br>
            <div class="btn-group">
                <a href="<?php echo base_url('admin/transaksi/pdf/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-success btn-xs"><i class="fa fa-file-pdf"></i>Unduh PDF</a>
                <a href="<?php echo base_url('admin/transaksi/kirim/'.$header_transaksi->kode_transaksi) ?>" target="_blank" class="btn btn-primary btn-xs"><i class="fa fa-print"></i>Pengiriman</a>
                <a href="<?php echo base_url('admin/transaksi/word/'.$header_transaksi->kode_transaksi) ?>" class="btn btn-warning btn-xs"><i class="fa fa-file-word"></i>Word</a>
            </div>
        </td>
    </tr>
    <?php $i++; } ?>
</tbody>
</table>