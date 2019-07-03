<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("templates/head") ?>
    <title>Product | Dashboard</title>
    <style>
        i.colsr:hover{color: red;font-size:30px}
    </style>
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
                                            <h3 style="font-weight: 400"><i class="fa fa-image"></i> Gallery</h3>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="button" data-toggle="modal" data-target="#uploadImages" class="btn btn-danger pull-right" style="margin-top:5px;border-radius:0px"><i class="fa fa-cloud-upload"></i> Upload Gambar</button>
                                        </div>
                                    </div>
                                    <div class="row x_content">
                                        <?php if($image){ ?>
                                            <?php foreach ($image as $row) : ?>
                                            <div class="col-xs-6 col-md-3">
                                                <div class="thumbnail" style="border: none;">
                                                    <div class="image view view-first">
                                                        <img style="width: 100%; display: block;" src="<?= base_url("/foto/gallery/").$row["gambar"] ?>" alt="image">
                                                        <div class="mask" style="height:100%">
                                                            <div class="tools tools-bottom" style="background: transparent">
                                                                <a href="<?= base_url("admin/dashboard/gallery/").$row["ID_gambar"] ?>"><i class="fa fa-trash fa-2x colsr"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                        <?php }else{ ?>
                                            <h4 align="center" style="color:tomato">Tidak ada gambar yang ingin ditampikan!</h4>
                                        <?php } ?>
                                        <div class="col-md-12">
                                            <!-- feedback message -->
                                            <?php if ($this->session->flashdata("success")) { ?>
                                                <div class="alert alert-success alert-dismissible fade in" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                                    </button>
                                                    <p><?= $this->session->flashdata("success") ?></p>
                                                </div>
                                            <?php } ?>
                                        </div>


                                        <!-- Modal Upload Images -->
                                        <div class="modal fade" id="uploadImages" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Upload Images</h4>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="dropzone">
                                                            <div class="dz-message">
                                                                <h4> Klik atau Drop gambar disini</h4>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="<?= base_url("admin/dashboard/gallery_upload") ?>" method="post">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius:0px">Close</button>
                                                            <button type="submit" name="isUpload" class="btn btn-primary" style="border-radius:0px"><i class="fa fa-cloud-upload"></i> Upload</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


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
        Dropzone.autoDiscover = false;

        var upload = new Dropzone(".dropzone", {
            url: "<?= base_url('admin/dashboard/gallery_upload') ?>",
            maxFilesize: 50,
            method: "POST",
            acceptedFiles: "image/*",
            paramName: "userfile",
            dictInvalidFileType: "Type file ini tidak dizinkan",
            addRemoveLinks: true,
        });
    </script>
</body>

</html>