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

                                <div class="x_panel">
                                    <div class="row x_title">
                                        <h3 style="font-weight: 400">Booking / Pemesanan<small></small></h3>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="row x_content">

                                        <div class="col-md-8">
                                            <form class="form-horizontal form-label-left" action="<?= base_url("kasir/dashboard") ?>" method="post">
                                                <div class="col-md-12 col-sm-6 col-xs-12 form-group">
                                                    <label>Nama Pemesan</label>
                                                    <input type="text" name="nama_pemesanan" class="form-control" placeholder="Nama Pemesanan">
                                                </div>
                                                <div class="col-md-12 col-sm-6 col-xs-12 form-group">
                                                    <label>No.Telp</label>
                                                    <input type="number" name="no_telp" class="form-control" placeholder="Nomor Telepon">
                                                </div>
                                                <div id="listPesanan">
                                                    <div id="itemPesanan">

                                                        <div class="col-md-8 col-sm-6 col-xs-12 form-group">
                                                            <label>Pesanan</label>
                                                            <select onchange="hitungTotal(1)" name="pesanan[]" class="form-control" id="pesanan1">
                                                                <option value="">--NO SELECTED--</option>
                                                                <?php foreach ($product as $products) : ?>
                                                                    <option data-harga="<?= $products['harga'] ?>" value="<?= $products['ID_product'] ?>"><?= $products['nama_product'] ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4 col-sm-6 col-xs-12 form-group">
                                                            <label></label>
                                                            <input type="number" id="jumlah1" value="1" onchange="hitungTotal(1)" name="jumlah[]" class="form-control" placeholder="Jumlah" style="margin-top:5px" required>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-6 col-xs-12 form-group">
                                                    <label></label>
                                                    <button type="button" class="btn btn-info btn-xs" id="tambahPesanan"><i class="fa fa-plus-square-o"></i> Tambah Pesanan</button>
                                                </div>
                                                <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                                                    <label>Total Harga</label>
                                                    <input type="text" id="totalHargaDisplay" class="form-control has-feedback-left" placeholder="Total Harga" disabled>
                                                    <input type="hidden" id="totalHarga" name="total_harga" class="form-control has-feedback-left">
                                                    <span class="fa fa-dollar form-control-feedback left" aria-hidden="true"></span>
                                                </div>
                                                <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                                                    <label>Tanggal</label>
                                                    <input type="text" class="form-control has-feedback-left" value="<?= date('d-m-Y') ?>" disabled>
                                                    <input type="hidden" name="tanggal" class="form-control has-feedback-left" value="<?= date('d-m-Y') ?>">
                                                    <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                                                </div>
                                                <div class="col-md-12 col-sm-6 col-xs-12 form-group">
                                                    <label>Keterangan</label>
                                                    <input type="text" class="form-control" name="keterangan" placeholder="Keterangan">
                                                </div>
                                                <div class="col-md-12 col-sm-6 col-xs-12 form-group">
                                                    <div class="ln_solid"></div>
                                                    <button class="btn btn-danger" type="reset"><i class="fa fa-refresh"></i> Reset</button>
                                                    <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-check"></i> Submit Pesanan</button>
                                                </div>
                                            </form>
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
        var idPesanan = 2
        var totalHarga = 0
        $("#tambahPesanan").click(function() {
            let itemPesanan = ""
            itemPesanan += "<div class='col-md-8 col-sm-6 col-xs-12 form-group'>"

            itemPesanan += "<select onchange='hitungTotal(" + idPesanan + ")' name='pesanan[]' class='form-control' id='pesanan" + idPesanan + "'>"
            itemPesanan += "<option>--NO SELECTED--</option>"
            <?php foreach ($product as $products) : ?>
                itemPesanan += "<option data-harga='<?= $products["harga"] ?>' value='<?= $products["ID_product"] ?>'><?= $products["nama_product"] ?></option>"
            <?php endforeach ?>
            itemPesanan += "</select>"
            itemPesanan += "</div>"
            itemPesanan += "<div class='col-md-4 col-sm-6 col-xs-12 form-group'>"
            itemPesanan += "<input onchange='hitungTotal(" + idPesanan + ")' type='number' id='jumlah" + idPesanan +"' value='1' name='jumlah[]' class='form-control' placeholder='Jumlah'>"
            itemPesanan += "</div>"

            $("#listPesanan").append(itemPesanan)
            idPesanan++;
        })

        function hitungTotal(id) {
            let totalHargaTemp = 0;
            for (i = 1; i < idPesanan; i++) {
                let idSelect = "#pesanan" + i;
                let idJumlah = "#jumlah" + i;

                let hargaPesanan = $("option:selected", $(idSelect)).attr("data-harga");
                let jumlahPesanan = $(idJumlah).val();

                let harga = hargaPesanan * jumlahPesanan;

                console.log(hargaPesanan, jumlahPesanan, harga);

                totalHargaTemp = totalHargaTemp + harga;
            }
            totalHarga = totalHargaTemp;

            $("#totalHarga").val(totalHarga);
            let formated = formatRupiah(totalHarga.toString(), "Rp. ");
            
            console.log(formated)

            $("#totalHargaDisplay").val(formated);
        }

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>
</body>

</html>