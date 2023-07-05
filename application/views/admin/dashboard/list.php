<!-- Info boxes -->
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fa fa-book"></i></span>
        
            <div class="info-box-content">
                <span class="info-box-text">Data Produk</span>
                <span class="info-box-number">
                <?php echo $this->dashboard_model->total_produk()->total; ?>
                    <small>Produk</small>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>
        
            <div class="info-box-content">
                <span class="info-box-text">Customer</span>
                <span class="info-box-number"><?php echo $this->dashboard_model->total_pelanggan()->total; ?> <small>Orang</small></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fa fa-money"></i></span>
        
            <div class="info-box-content">
                <span class="info-box-text">Transaksi</span>
                <span class="info-box-number"><?php echo $this->dashboard_model->total_header_transaksi()->total; ?><small>Transaksi</small></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-money"></i></span>
        
            <div class="info-box-content">
                <span class="info-box-text">Nilai Transaksi</span>
                <span class="info-box-number">Rp. <?php echo number_format($this->dashboard_model->total_transaksi()->total) ?><br><small>Semua Transaksi</small></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-warning elevation-1"><i class="fa-solid fa-money-check-dollar"></i></span>
        
            <div class="info-box-content">
                <span class="info-box-text">Rekening</span>
                <span class="info-box-number"> <?php echo number_format($this->dashboard_model->total_rekening()->total) ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>