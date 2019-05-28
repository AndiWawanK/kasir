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
                                            <h3 style="font-weight: 400">Product Stock <small>Daftar Product Tersedia</small></h3>
                                        </div>
                                        <div class="col-md-4">
                                            <select name="" id="categoryId" onchange="filterProduct()" class="form-control pull-right" style="margin-top:5px;">
                                                <option value="reload" id="reload">All Product</option>
                                                <?php foreach ($category as $filter) : ?>
                                                    <option value="<?= $filter['ID_category'] ?>"><?= $filter['nama_category'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row x_content">
                                        <table class="table table-hover table-responsive" id="tableProduct">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama Product</th>
                                                    <th>Category</th>
                                                    <th>Harga</td>
                                                    <th style="width: 150px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="showProduct">
                                                <?php foreach ($product as $products) : ?>
                                                    <tr>
                                                        <td><?= $products['ID_product'] ?></td>
                                                        <td><?= $products['nama_product'] ?></td>
                                                        <td><?= $products['nama_category'] ?></td>
                                                        <td><?= $products['harga'] ?></td>
                                                        <td>
                                                            <button class='btn btn-warning btn-xs' data-toggle='modal' data-target='#editproduct<?= $products['ID_product'] ?>'><i class='fa fa-edit'></i> Edit</button>
                                                            <a href='<?= base_url("admin/product/") . $products['ID_product'] ?>' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i> Delete</a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambahproduct"><i class="fa fa-plus-square-o"></i> Tambah Product</button>

                                        <?php if ($this->session->flashdata("message") == "") { ?>
                                            <div class="alert alert-success alert-dismissible fade in" role="alert" style="display:none">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                                </button>
                                                <p><?= $this->session->flashdata("message") ?></p>
                                            </div>
                                        <?php } else { ?>
                                            <div class="alert alert-success alert-dismissible fade in" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                                </button>
                                                <p><?= $this->session->flashdata("message") ?></p>
                                            </div>
                                        <?php } ?>
                                        <!-- Modal Tambah Product -->
                                        <div class="modal fade bs-example-modal-lg" id="tambahproduct" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                        </button>
                                                        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-cubes"></i> Tambah Product</h4>
                                                    </div>
                                                    <form action="<?= base_url("admin/product") ?>" method="post" class="form-horizontal form-label-left">
                                                        <div class="modal-body">
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
                                                                    <select name="category" class="form-control">
                                                                        <option>Select Category</option>
                                                                        <?php foreach ($category as $categorys) : ?>
                                                                            <option value="<?= $categorys['ID_category'] ?>"><?= $categorys['nama_category'] ?></option>
                                                                        <?php endforeach ?>
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
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            <button type="submit" name="submit" class="btn btn-primary">Save Product</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal Tambah Product -->


                                        <!-- Modal Edit Product -->
                                        <?php foreach ($product as $key => $productEdit) : ?>
                                            <div class="modal fade bs-example-modal-lg" id="editproduct<?= $productEdit['ID_product'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                            </button>
                                                            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-cubes"></i> Tambah Product</h4>
                                                        </div>
                                                        <form action="<?= base_url("admin/product") ?>" method="post" class="form-horizontal form-label-left">
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                                        Nama Product
                                                                        <span class="required" style="color:red">*</span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                                        <input type="text" name="nama_product" required="required" class="form-control col-md-7 col-xs-12" value="<?= $productEdit['nama_product'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                                        Category
                                                                        <span class="required" style="color:red">*</span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                                        <select name="category" class="form-control">
                                                                            <option>Select Category</option>
                                                                            <option value="<?= $productEdit['ID_category'] ?>" selected><?= $productEdit['nama_category'] ?></option>
                                                                            <?php
                                                                            $keyProduct = $productEdit['ID_category'] - 1;
                                                                            $categorys = $category;

                                                                            if (array_key_exists($keyProduct, $category)) {
                                                                                unset($categorys[$keyProduct]);
                                                                            }
                                                                            foreach ($categorys as $categoryChosen) {
                                                                                echo "<option value=" . $categoryChosen['ID_category'] . ">" . $categoryChosen['nama_category'] . "</option>";
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                                        Harga
                                                                        <span class="required" style="color:red">*</span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                                        <input type="text" name="harga" required="required" class="form-control col-md-7 col-xs-12" value="<?= $productEdit['harga'] ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <button type="submit" name="submit" class="btn btn-primary">Save Product</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                        <!-- Modal Edit Product -->

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
        var dataTab = $("#tableProduct").DataTable({
            "aLengthMenu": [
                [5, 10, 50],
                [5, 10, 50]
            ],
        })

        function filterProduct() {
            let id = $("#categoryId option:selected").val()
            if(id === "reload"){
                location.reload()
            }
            fetch("<?= base_url('ajax/getproduct/') ?>" + id)
                .then(res => res.json())
                .then(json => {
                    let product = json.data
                    let table = ""
                    if (product.length === 0) {
                        dataTab
                            .clear()
                            .draw();
                    } else {
                        for (let i = 0; i < product.length; i++) {
                            table += "<tr>"
                            table += "<td>" + product[i].ID_product + "</td>"
                            table += "<td>" + product[i].nama_product + "</td>"
                            table += "<td>" + product[i].harga + "</td>"
                            table += "<td>" + product[i].nama_category + "</td>"
                            table += "<td>"
                            table += "<button class='btn btn-warning btn-xs' data-toggle='modal' data-target='#editproduct" + product[i].ID_product + "'><i class='fa fa-edit'></i> Edit</button>"
                            table += "<a href='<?= base_url("admin/product/") ?>" + product[i].ID_product + "' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i> Delete</a>"

                            table += "</td>"
                            table += "</tr>"
                            $("#showProduct").html(table);
                        }
                    }
                })
        }
    </script>
</body>

</html>