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
                        <div class="row" id="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="row x_title">
                                        <div class="col-md-8">
                                            <h3 style="font-weight: 400">Data Karyawan <small>Daftar Karyawan</small></h3>
                                        </div>
                                    </div>
                                    <div class="row x_content">
                                        <table class="table table-hover table-bordered table-responsive" id="tableKaryawan">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>NIK</th>
                                                    <th>Nama</th>
                                                    <th>No.Telp</td>
                                                    <th>Jenis Kelamin</td>
                                                    <th>Jabatan</td>
                                                    <th>Status</td>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="showProduct">
                                                <?php foreach ($karyawan as $row) : ?>
                                                    <tr>
                                                        <td><?= $row['ID_karyawan'] ?></td>
                                                        <td><?= $row['nik'] ?></td>
                                                        <td><?= $row['nama'] ?></td>
                                                        <td><?= $row['no_telp'] ?></td>
                                                        <?php if ($row['jenis_kelamin'] == 'L') { ?>
                                                            <td>Laki-Laki</td>
                                                        <?php } else { ?>
                                                            <td>Perempuan</td>
                                                        <?php } ?>
                                                        <td><?= $row['jabatan'] ?></td>
                                                        <td><?= $row['status'] ?></td>
                                                        <td>
                                                            <button type="button" data-toggle='modal' data-target='#detail<?= $row['ID_karyawan'] ?>' class="btn btn-warning btn-xs"><i class="fa fa-eye"></i> Detail</button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                        <a href="<?= base_url("admin/tambah-karyawan") ?>" class="btn btn-info btn-sm" name="input_karyawan"><i class="fa fa-plus-square-o"></i> Tambah Data Karyawan</a>

                                        <!-- Modal Detail Karyawan -->
                                        <?php foreach ($karyawan as $row) : ?>
                                            <div class="modal fade bs-example-modal-lg" id="detail<?= $row['ID_karyawan'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                            </button>
                                                            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-users"></i> Detail Karyawan</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading">Detail Profile Karyawan</div>
                                                                <div class="panel-body">
                                                                    <table class="table table-bordered table-striped table-responsive">
                                                                        <tr>
                                                                            <td rowspan="8" style="width: 100px;">
                                                                                <img src="<?= base_url("./foto/") . $row['foto'] ?>" style="widht: 100px; height: 100px;">
                                                                            </td>
                                                                            <td style="width: 173px;">
                                                                                <p>Nama</p>
                                                                            </td>
                                                                            <td><?= $row['nama'] ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width: 173px;">
                                                                                <p>NIK</p>
                                                                            </td>
                                                                            <td>
                                                                                <p><?= $row['nik'] ?></p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width: 173px;">
                                                                                <p>No.Telp</p>
                                                                            </td>
                                                                            <td>
                                                                                <p><?= $row['no_telp'] ?></p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width: 173px;">
                                                                                <p>Jenis Kelamin</p>
                                                                            </td>
                                                                            <?php if ($row['jenis_kelamin'] == 'L') { ?>
                                                                                <td>
                                                                                    <p>Laki-Laki</p>
                                                                                </td>
                                                                            <?php } else { ?>
                                                                                <td>
                                                                                    <p>Perempuan</p>
                                                                                </td>
                                                                            <?php } ?>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width: 173px;">
                                                                                <p>Alamat</p>
                                                                            </td>
                                                                            <td>
                                                                                <p><?= $row['alamat'] ?></p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width: 173px;">
                                                                                <p>Jabatan</p>
                                                                            </td>
                                                                            <td>
                                                                                <p><?= $row['jabatan'] ?></p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width: 173px;">
                                                                                <p>Status</p>
                                                                            </td>
                                                                            <td>
                                                                                <p><?= $row['status'] ?></p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width: 173px;">
                                                                                <p>Tanggal Masuk</p>
                                                                            </td>
                                                                            <td>
                                                                                <p><?= $row['tanggal_masuk'] ?></p>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <div class="panel-footer">
                                                                    <button type="button" data-toggle='modal' data-target='#edit<?= $row['ID_karyawan'] ?>' data-dismiss="modal" class="btn btn-danger"><i class="fa fa-edit"></i> Edit Data Karyawan</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                        <!-- Modal Detail Karyawan -->

                                        <!-- Modal Edit Data Karyawan -->
                                        <?php foreach ($karyawan as $row) : ?>
                                            <div class="modal fade bs-example-modal-lg" id="edit<?= $row['ID_karyawan'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                            </button>
                                                            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-users"></i> Edit Data Karyawan</h4>
                                                        </div>
                                                        <form action="<?= base_url("admin/karyawan") ?>" method="post">
                                                            <div class="modal-body">
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading">Edit Profile Karyawan &nbsp;<span style="color: red">Note* <em>Foto,Jenis Kelamin dan Tanggal Masuk Tak dapat di Ubah!</em></span></div>
                                                                    <div class="panel-body">
                                                                        <table class="table table-bordered table-striped table-responsive">
                                                                            <tr>
                                                                                <td rowspan="8" style="width: 100px;">
                                                                                    <img src="<?= base_url("./foto/") . $row['foto'] ?>" style="widht: 100px; height: 100px;">
                                                                                </td>
                                                                                <td style="width: 173px;">
                                                                                    <p>Nama</p>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" name="nama" class="form-control" value="<?= $row['nama'] ?>">
                                                                                    <input type="hidden" name="id_karyawan" value="<?= $row['ID_karyawan'] ?>">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="width: 173px;">
                                                                                    <p>NIK</p>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" name="nik" class="form-control" value="<?= $row['nik'] ?>">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="width: 173px;">
                                                                                    <p>No.Telp</p>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" name="no_telp" class="form-control" value="<?= $row['no_telp'] ?>">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="width: 173px;">
                                                                                    <p>Jenis Kelamin</p>
                                                                                </td>
                                                                                <?php if ($row['jenis_kelamin'] == 'L') { ?>
                                                                                    <td>
                                                                                        <input type="text" name="jenis_kelamin" class="form-control" value="Laki-Laki" disabled>
                                                                                    </td>
                                                                                <?php } else { ?>
                                                                                    <td>
                                                                                        <input type="text" name="jenis_kelamin" class="form-control" value="Perempuan" disabled>
                                                                                    </td>
                                                                                <?php } ?>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="width: 173px;">
                                                                                    <p>Alamat</p>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" name="alamat" class="form-control" value="<?= $row['alamat'] ?>">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="width: 173px;">
                                                                                    <p>Jabatan</p>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" name="jabatan" class="form-control" value="<?= $row['jabatan'] ?>">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="width: 173px;">
                                                                                    <p>Status</p>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" name="status" class="form-control" value="<?= $row['status'] ?>">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="width: 173px;">
                                                                                    <p>Tanggal Masuk</p>
                                                                                </td>
                                                                                <td>
                                                                                    <p><?= $row['tanggal_masuk'] ?></p>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <button type="submit" name="update" class="btn btn-primary">Simpan Perubahan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                        <!-- Modal Edit Data Karyawan -->
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
        $("#tableKaryawan").DataTable()
    </script>
</body>

</html>