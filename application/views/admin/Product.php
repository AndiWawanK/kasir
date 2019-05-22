<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("templates/head") ?>
    <title>Product | Dashboard</title>
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
                                <div class="x_panel">
                                    <div class="row x_title">
                                        <div class="col-md-8">
                                            <h3 style="font-weight: 400">Product Stock <small>Daftar Product Tersedia</small></h3>
                                        </div>
                                        <div class="col-md-4">
                                            <select name="" class="form-control pull-right" style="margin-top:5px;">
                                                <option value="">Filter Product</option>
                                                <option value="">Option 1</option>
                                                <option value="">Option 2</option>
                                                <option value="">Option 3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row x_content">
                                        <table class="table table-hover table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama Product</th>
                                                    <th>Category</th>
                                                    <th>Harga</td>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th>1</th>
                                                    <td>Kopi Arabika Moca Aceh</td>
                                                    <td>Minuman</td>
                                                    <td>Rp. 10.000</td>
                                                    <td>
                                                        <button class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</button>
                                                        <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>2</th>
                                                    <td>Nasi Goreng</td>
                                                    <td>Makanan</td>
                                                    <td>Rp. 15.000</td>
                                                    <td>
                                                        <button class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</button>
                                                        <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambahproduct"><i class="fa fa-plus-square-o"></i> Tambah Product</button>

                                        <!-- Modal Tambah Product -->
                                        <div class="modal fade bs-example-modal-lg" id="tambahproduct" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                        </button>
                                                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-cubes"></i> Tambah Product</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="" class="form-horizontal form-label-left">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                                    Nama Product
                                                                    <span class="required" style="color:red">*</span>
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <input type="text" name="nama_product" required="required" class="form-control col-md-7 col-xs-12">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                                    Category
                                                                    <span class="required" style="color:red">*</span>
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <!-- <input type="text" name="category" required="required" class="form-control col-md-7 col-xs-12"> -->
                                                                    <select name="category" class="form-control">
                                                                        
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                                    Harga
                                                                    <span class="required" style="color:red">*</span>
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <input type="text" name="harga" required="required" class="form-control col-md-7 col-xs-12">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal Tambah Product -->

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