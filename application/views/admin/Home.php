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
                                        <div class="count"><?= $totalCustomers ?></div>
                                        <span class="count_bottom"><i class="green">4% </i> From last Week</span>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                                        <span class="count_top"><i class="fa fa-cubes"></i> Total Product</span>
                                        <div class="count"><?= $totalProduct ?></div>
                                        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                                        <span class="count_top"><i class="fa fa-group"></i> Total Karyawan</span>
                                        <div class="count green"><?= $totalKaryawan ?></div>
                                        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                                        <span class="count_top"><i class="fa fa-line-chart"></i> Product Terjual</span>
                                        <div class="count"><?= $productTerjual ?></div>
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
                                                    <th>Pesanan</th>
                                                    <th>Tanggal</td>
                                                    <th>Jumlah Pesanan</th>
                                                    <th>Total Harga</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($transaction as $row) : ?>
                                                    <tr>
                                                        <td><a href="">#CF100<?= $row['ID_booking'] ?></a></td>
                                                        <td><?= $row['tanggal'] ?></td>
                                                        <td><?= $row['jumlah'] ?> Pesanan</td>
                                                        <td>Rp. <?= $row['total_harga'] ?></td>
                                                        <td><?= $row['keterangan'] ?> <i class="fa fa-check" style="color:#79ef4a"></i></td>
                                                        <td>
                                                            <a href="" onclick="getDetailTransaction(<?= $row['ID_booking'] ?>)" data-toggle="modal" data-target="#myModal<?= $row['ID_booking'] ?>"><i class="fa fa-eye"></i> View Details</a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-print"></i> Download</button>
                                    </div>
                                    <!-- Modal Detail Transaksi -->
                                    <div id="showDetailTransaction">

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
    <script>
        function getDetailTransaction(id){
            fetch("<?= base_url('ajax/getdetailtransaction/') ?>"+id,{
                method: "GET"
            }).then(res => {
                return res.json()
            }).then(data => {
                console.log(data[0].nama)  
                let detailTransaction = ''
                let jumlahProduct = []   
                let results = [];
                data.forEach(d => {
                    results.push(d.nama_product)
                });      
                let towTotal = results.length + 1
                for(let i=0; i<data.length; i++){

                        console.log(data[i].nama_product)

                        detailTransaction += '<div class="modal fade" id="myModal'+ data[0].ID_booking +'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">'
                        detailTransaction += '<div class="modal-dialog" role="document">'
                        detailTransaction += '<div class="modal-content">'
                        detailTransaction += '<div class="modal-header">'                          
                        detailTransaction += '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
                        detailTransaction += '<h4 class="modal-title" id="myModalLabel">Detail Transaksi</h4>'
                        detailTransaction += '</div>'
                        detailTransaction += '<div class="modal-body">'
                        detailTransaction += '<table class="table table-bordered table-stripped">'
                        detailTransaction += '<tr>'                     
                        detailTransaction += '<th>Nama Customers</th>'                             
                        detailTransaction += '<td colspan="4">'+ data[0].nama +'</td>'
                        detailTransaction += '</tr>'
                        detailTransaction += '<tr>'                               
                        detailTransaction += '<th>No.Telp</th>'                                  
                        detailTransaction += '<td colspan="4">'+ data[0].no_telp +'</td>'                                                                         
                        detailTransaction += '</tr>'
                        detailTransaction += '<tr>'                              
                        detailTransaction += '<th>Tanggal Transaksi</th>'                                    
                        detailTransaction += '<td colspan="4">'+ data[0].tanggal +'</td>'                                                              
                        detailTransaction += '</tr>'
                        detailTransaction += '<tr>'
                        detailTransaction += '<th rowspan="'+ towTotal +'">Detail Pesanan</th>'                                   
                        detailTransaction += '<th>Pesanan</th>'                                    
                        detailTransaction += '<th>Category</th>'                                    
                        detailTransaction += '<th>Harga</th>'                                   
                        detailTransaction += '</tr>'   
                        for(let a=0; a<data.length; a++){
                            detailTransaction += '<tr>'
                            detailTransaction += '<td>'+ data[a].nama_product +'</td>'
                            detailTransaction += '<td>'+ data[a].nama_category +'</td>'
                            detailTransaction += '<td>Rp. '+ data[a].harga +'</td>'
                            detailTransaction += '</tr>'
                        }                       
                        detailTransaction += '<tr>'
                        detailTransaction += '<th colspan="3">Total Harga</th>'                                   
                        detailTransaction += '<td style="background-color:#fcfcde"><b>Rp. '+ data[0].total_harga +'</b></td>'                                    
                        detailTransaction += '</tr>'
                        detailTransaction += '<tr>'
                        detailTransaction += '<th colspan="3" style="background-color:#fcfcde">Catatan</th>'                                   
                        detailTransaction += '<td style="background-color:#fcfcde"><b>'+ data[0].keterangan +'</b></td>'                                    
                        detailTransaction += '</tr>'   
                        detailTransaction += '</table>'                                                                                  
                        detailTransaction += '</div>'
                        detailTransaction += '<div class="modal-footer">'
                        detailTransaction += '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>'
                        detailTransaction += '</div>'
                        detailTransaction += '</div>'
                        detailTransaction += '</div>'
                        detailTransaction += '</div>'
                        
                        $("#showDetailTransaction").append(detailTransaction)
                        
                }
                
                // $("#myModal").modal("show");
                
            })
        }
    </script>
</body>

</html>