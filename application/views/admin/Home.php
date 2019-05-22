<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("templates/head") ?>
    <title>Home | Dashboard</title>
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view" style="width:100%">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="<?= base_url("admin/dashboard") ?>" class="site_title">
                            <i class="fa fa-paw"></i>
                            <span><?= $this->session->userdata("level") ?></span>
                        </a>
                    </div>
                    <div class="clearfix"></div>
                    <?php $this->load->view("templates/sidebar") ?>

                    <div class="right_col" role="main">
                        <!-- <div class="page-title">
                            <div class="col-md-12 col-xs-12">
                                
                            </div>
                        </div> -->
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">

                                <div class="row tile_count">
                                    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                                        <span class="count_top"><i class="fa fa-users"></i> Jumlah Pengunjung</span>
                                        <div class="count">2500</div>
                                        <span class="count_bottom"><i class="green">4% </i> From last Week</span>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                                        <span class="count_top"><i class="fa fa-cubes"></i> Total Product</span>
                                        <div class="count">123.50</div>
                                        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                                        <span class="count_top"><i class="fa fa-group"></i> Total Karyawan</span>
                                        <div class="count green">2,500</div>
                                        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                                        <span class="count_top"><i class="fa fa-line-chart"></i> Product Terjual</span>
                                        <div class="count">2,500</div>
                                        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
                                    </div>
                                </div>

                                <div class="x_panel">
                                    <div class="row x_title">
                                        <h3 style="font-weight: 400">History Transaksi <small>Data Transaksi Terakhir</small></h3>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="row x_content">
                                        <table class="table table-hover table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama Product</th>
                                                    <th>Category</th>
                                                    <th>Jumlah</td>
                                                    <th>Total Harga</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Kopi Hitam</td>
                                                    <td>Minuman</td>
                                                    <td>3</td>
                                                    <td>Rp. 45.000</td>
                                                    <td>Paid</td>
                                                    <td>
                                                        <a href="">View Details</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Nasi Goreng</td>
                                                    <td>Makanan</td>
                                                    <td>4</td>
                                                    <td>Rp. 60.000</td>
                                                    <td>Paid</td>
                                                    <td>
                                                        <a href="">View Details</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-print"></i> Download</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php $this->load->view("templates/footer") ?>
                </div>
            </div>



        </div>
    </div>

    <?php $this->load->view('templates/script') ?>
</body>

</html>