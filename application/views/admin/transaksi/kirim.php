<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <style type="text/css" media="print">
        body {
            font-size: 12px;
            font-family: Arial;
        }
        table {
            border: solid thin #000;
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 1cm;
        }
        td {
            padding: 6px 12px;
            border: solid thin #000;
            text-align: left;
        }
        .bg-success{
            background-color: #f5f5f5;
            font-weight: bold;
            border: solid thin #000;
        }
    </style>
</head>
<body>
    <div style="width: 19cm; height: 27cm; padding-top: 1cm;">
        <h1 style="text-align: center; font-size: 18px; font-weight: bold; border-top: solid thin #EEE; padding-top: 20px;">PENGIRIMAN</h1>
        <table>
            <tr>
                <td>
                    <strong>PENGIRIM:</strong>
                        <p><?php echo $site->namaweb ?>
                        <br><?php echo $site->alamat ?>
                        <br>Telephone: <?php echo $site->telephone ?>
                    </p>
                </td>
                <td>
                    <strong>PENERIMA:</strong>
                    <p>
                        <?php echo $header_transaksi->nama_pelanggan ?>
                        <br><?php echo $header_transaksi->alamat ?>
                        <br>Telephone: <?php echo $header_transaksi->telephon ?>
                    </p>
                </td>
            </tr>
        </table>

        <h2 style="font-weight: bold; text-align: center;"> Data Pembelian</h2>
        <table class="table table-bordered" width="100%">
    <thead>
        <tr class="bg-success">
            <th>NO</th>
            <th>KODE</th>
            <th>NAMA PRODUK</th>
            <th>JUMLAH</th>
            <th>HARGA</th>
            <th>SUB TOTAL</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; foreach($transaksi as $transaksi) { ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $transaksi->kode_transaksi ?></td>
            <td><?php echo $transaksi->nama_produk ?></td>
            <td><?php echo number_format($transaksi->jumlah) ?></td>
            <td><?php echo number_format($transaksi->harga) ?></td>
            <td><?php echo number_format($transaksi->total_harga) ?></td>
        </tr>
        <?php $i++; } ?>
    </tbody>
</table>
    </div>
</body>
</html>