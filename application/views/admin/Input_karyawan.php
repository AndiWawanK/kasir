<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("templates/head") ?>
    <title>Karyawan | Dashboard</title>
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
                        <div class="row" id="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="row x_title">
                                        <div class="col-md-8">
                                            <h3 style="font-weight: 400">Data Karyawan <small>Input Data Karyawan</small></h3>
                                        </div>
                                    </div>
                                    <div class="row x_content">

                                        <form action="<?= base_url("admin/dashboard/karyawan/tambah-karyawan") ?>" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    Nama Lengkap
                                                    <span class="required" style="color:red">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" name="nama" required="required" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    NIK (No Induk Kependudukan)
                                                    <span class="required" style="color:red">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" name="nik" required="required" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    Nomor Telepon
                                                    <span class="required" style="color:red">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" name="no_telp" required="required" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    Jenis Kelamin
                                                    <span class="required" style="color:red">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <!-- <input type="text" name="jenis_kelamin" required="required" class="form-control col-md-7 col-xs-12"> -->
                                                    <input type="radio" name="jenis_kelamin" value="L" class="iradio_flat-green"> Laki-Laki &nbsp;
                                                    <input type="radio" name="jenis_kelamin" value="P" class="iradio_flat-green"> Perempuan
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    Alamat
                                                    <span class="required" style="color:red">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <textarea name="alamat" rows="5" class="form-control col-md-7 col-xs-12"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    Jabatan
                                                    <span class="required" style="color:red">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" name="jabatan" required="required" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    Status
                                                    <span class="required" style="color:red">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" name="status" required="required" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    Tanggal Masuk
                                                    <span class="required" style="color:red">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <?php $date = date("d-m-Y") ?>
                                                    <input type="text" required="required" value="<?= $date ?>" class="form-control col-md-7 col-xs-12" disabled>
                                                    <input type="hidden" name="tanggal_masuk" required="required" value="<?= $date ?>" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                    Foto
                                                    <span class="required" style="color:red">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="file" id="imgUpload" accept="image/*" onchange="loadFile(event)" name="gambar" required="required" class="form-control col-md-7 col-xs-12">
                                                    <img id="imgPreview" style="widht: 100px; height: 100px">
                                                </div>
                                            </div>
                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                    <a href="<?= base_url("admin/dashboard/karyawan") ?>" class="btn btn-danger" type="button">Back</a>
                                                    <button class="btn btn-primary" type="reset">Reset</button>
                                                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                        <?php if($this->session->flashdata("success")){ ?>
                                            <div class="alert alert-success alert-dismissible fade in" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                                </button>
                                                <p><?= $this->session->flashdata("success") ?></p>
                                            </div>
                                        <?php } ?>
                                        <?php if($this->session->flashdata("error")){ ?>
                                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                                </button>
                                                <p><?= $this->session->flashdata("success") ?></p>
                                            </div>
                                        <?php } ?>
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
        var loadFile = function(event) {
            var output = document.getElementById('imgPreview');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
</body>

</html>