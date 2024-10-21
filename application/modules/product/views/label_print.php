<input type="hidden" name="baseUrl2" id="baseUrl2" class="baseUrl" value="<?php echo base_url(); ?>" />

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">

            <div class="panel-heading">
                <div class="panel-title">
                    <h4>Label Print</h4>
                </div>
            </div>
            <br />
            <div class="panel-body">

                <!-- Trigger button for modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#productModal">
                    Add Product
                </button>
                <br /><br />
                <table id="dataTable" class="table1 table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width: 10%;">No. of Labels</th>
                            <th style="width: 15%;">Product Code</th>
                            <th style="width: 20%;">Description</th>
                            <th style="width: 20%;">Group</th>
                            <th style="width: 20%;">Brand</th>
                            <th style="width: 15%;">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data will be populated here -->
                    </tbody>
                </table>

                <!-- Modal Structure -->
                <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="categoryBrandModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document" style="width: 1000px;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <p class="modal-title" id="categoryBrandModalLabel">Add Product</p>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Your form content -->
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group row">
                                            <label for="category_id" class="col-sm-4 col-form-label"><?php echo display('category') ?>
                                                <i class="text-danger">*</i></label>
                                            <div class="col-sm-8">
                                                <select class="form-control" id="category_id" required name="category_id" tabindex="4">
                                                    <option value=""></option>
                                                    <?php if ($category_list) { ?>
                                                        <?php foreach ($category_list as $categories) { ?>
                                                            <option value="<?php echo $categories['category_id'] ?>" <?php if ($product->category_id == $categories['category_id']) {
                                                                                                                            echo 'selected';
                                                                                                                        } ?>>
                                                                <?php echo $categories['category_code'] . '-' . $categories['category_name'] ?>
                                                            </option>
                                                    <?php }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group row">
                                            <label for="brandcode_id" class="col-sm-4 col-form-label">Brand Code
                                                <i class="text-danger">*</i></label>
                                            <div class="col-sm-8">
                                                <select class="form-control" id="brandcode_id" required name="brandcode_id" tabindex="9">
                                                    <option value=""></option>
                                                    <?php if ($brandcode_list) { ?>
                                                        <?php foreach ($brandcode_list as $categories) { ?>
                                                            <option value="<?php echo $categories['brandcode_id'] ?>" <?php if ($product->brandcode_id == $categories['brandcode_id']) {
                                                                                                                            echo 'selected';
                                                                                                                        } ?>>
                                                                <?php echo $categories['brand_code'] . '-' . $categories['brandcode_name'] ?>
                                                            </option>
                                                    <?php }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-success" data-toggle="modal" onclick="findbyBrandCodeAndLabelCode()">
                                            Find
                                        </button>
                                    </div>


                                </div>
                                <div class="table-responsive">
                                    <table class="table-bordered" cellspacing="0" width="100%" id="productList">
                                        <thead>
                                            <tr>

                                                <th>Product Code</th>
                                                <th>Description</th>
                                                <th>Group</th>
                                                <th>Brand</th>
                                                <th><?php echo display('price') ?></th>
                                                <th></th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="model2" tabindex="-1" role="dialog" aria-labelledby="model2" aria-hidden="true">
                    <div class="modal-dialog" role="document" style="width: 300px;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <p class="modal-title" id="model2">Add No Of Labels</p>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <input type="number" name="noOfLabel" id="noOfLabel" class="form-control" value="" placeholder="No Of Label" style="width: 200px; margin-left:20px;">
                                <br />
                                <button type="button" class="btn btn-success" data-toggle="modal" onclick="closeLabelCount()" style=" margin-left:20px;">
                                    Add
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


                <br /><br />


                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group row">
                            <form>
                            <p style=" margin-left:20px;">Barcode Qunatity Each Row<p>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <input type="number" name="cqty" class="form-control" value="1"  id="cqty" style="width: 200px; margin-left:20px;">
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-success" onclick="generateLabels()">Generate</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var base_url = $('#baseUrl2').val();
    $(document).ready(function() {
        $('#productList').DataTable({
            responsive: true,
            "aaSorting": [
                [1, "asc"]
            ],
            "columnDefs": [{
                "bSortable": false,
                "aTargets": [0, 2, 3, 4] // Disable sorting for specific columns
            }],
            'processing': true,
            'serverSide': true,

            'lengthMenu': [
                [10, 25, 50, 100, 250, 500, 1000],
                [10, 25, 50, 100, 250, 500, 1000]
            ],

            dom: "'<'col-sm-4'l><'col-sm-4 text-center'><'col-sm-4'>Bfrtip",
            buttons: [],

            'serverMethod': 'post',
            'ajax': {
                'url': base_url + 'product/product/CheckProductListForLabelPrint',
                data: {
                    csrf_test_name: "",
                    category: null,
                    brand: null
                }
            },
            'columns': [

                {
                    data: 'sl'
                },
                {
                    data: 'product_name'
                },
                {
                    data: 'category'
                },
                {
                    data: 'brandcode'
                },
                {
                    data: 'price',
                    className: 'text-right'

                },
                {
                    data: 'button'
                },
            ],
        });
    });

    let iD = 0;
    let product_ID = 0;
    let product_NAME = "";
    let catgory_NAME = "";
    let brandcode_NAME = "";
    let pricE = 0;
    let arrItem = [];

    function openLabelCount(id, productId, productName, categoryName, brandcodeName, price) {
        $("#model2").modal('show');
        iD = id;
        product_ID = productId;
        product_NAME = productName;
        catgory_NAME = categoryName;
        brandcode_NAME = brandcodeName;
        pricE = price;
    }

    function generateLabels() {
        $.ajax({
            type: "post",
            url: $('#baseUrl2').val() + 'product/product/printlabel',
            data: {
                labels: arrItem,
                cqty: $('#cqty').val()

            },
            success: function(data1) {
                datas = JSON.parse(data1);
                if (datas.length != 0) {
                    window.open(`barcode`, '_blank');

                } else {
                    alert("There is no data available for the selected parameters.")
                }


            }
        });
    }

    function findbyBrandCodeAndLabelCode() {
        if ($.fn.dataTable.isDataTable('#productList')) {
            $('#productList').DataTable().destroy();
        }
        $('#productList').DataTable({
            responsive: true,
            "aaSorting": [
                [1, "asc"]
            ],
            "columnDefs": [{
                "bSortable": false,
                "aTargets": [0, 2, 3, 4] // Disable sorting for specific columns
            }],
            'processing': true,
            'serverSide': true,

            'lengthMenu': [
                [10, 25, 50, 100, 250, 500, 1000],
                [10, 25, 50, 100, 250, 500, 1000]
            ],

            dom: "'<'col-sm-4'l><'col-sm-4 text-center'><'col-sm-4'>Bfrtip",
            buttons: [],

            'serverMethod': 'post',
            'ajax': {
                'url': base_url + 'product/product/CheckProductListForLabelPrint',
                data: {
                    csrf_test_name: "",
                    category: $("#category_id").val() !== "" ? $("#category_id").val() : null,
                    brand: $("#brandcode_id").val() !== "" ? $("#brandcode_id").val() : null
                }
            },
            'columns': [

                {
                    data: 'sl'
                },
                {
                    data: 'product_name'
                },
                {
                    data: 'category'
                },
                {
                    data: 'brandcode'
                },
                {
                    data: 'price',
                    className: 'text-right'

                },
                {
                    data: 'button'
                },
            ],
        });
    }

    function closeLabelCount(productId) {
        $("#model2").modal('hide');
        $("#productModal").modal('hide');
        arrItem.push({
            id: iD,
            productId: product_ID,
            productName: product_NAME,
            categoryName: catgory_NAME,
            brandcodeName: brandcode_NAME,
            price: pricE,
            noOfLabel: $('#noOfLabel').val()
        });
        var table = $('#dataTable').DataTable({
            destroy: true, // Allow the table to be destroyed
            data: arrItem,
            columns: [{
                    data: 'noOfLabel',
                    orderable: false,

                },
                {
                    data: 'productId',
                    orderable: false,
                },
                {
                    data: 'productName',
                    orderable: false
                },
                {
                    data: 'categoryName',
                    orderable: false
                },
                {
                    data: 'brandcodeName',
                    orderable: false
                },
                {
                    data: 'price',
                    orderable: false,
                    className: 'text-right',
                    render: function(data, type, row) {
                        return parseFloat(data).toFixed(2); // Format the price with 2 decimal places
                    }
                },
            ],
            paging: false,
            ordering: false
        });
        $('#noOfLabel').val("")


    }
</script>