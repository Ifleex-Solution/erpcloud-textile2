<link href="<?php echo base_url('assets/css/gui_pos.css') ?>" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url() ?>my-assets/js/admin_js/pos_invoice.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>my-assets/js/admin_js/guibarcode.js" type="text/javascript"></script>
<script src="assets/js/perfect-scrollbar.min.js" type="text/javascript"></script>

<style>
    input[type="password"]::-ms-reveal,
    input[type="password"]::-ms-clear {
        display: none;
    }
</style>

<input type="hidden" name="baseUrl2" id="baseUrl2" class="baseUrl" value="<?php echo base_url(); ?>" />

<div class="pl-3 pr-3">
    <div class="top-bar">
        <ul class="nav nav-tabs" role="tablist">
            <li class="active">
                <a href="#home" role="tab" data-toggle="tab" class="home" id="new_sale">
                    New Sale </a>
            </li>
            <li class="onprocessg"><a href="#saleList" role="tab" data-toggle="tab" class="ongord" id="todays_salelist">
                    Todays sale </a>
            </li>
        </ul>
        <div class="tgbar d-flex">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <!-- Sidebar toggle button-->
                <span class="sr-only">Toggle navigation</span>
                <span class="pe-7s-keypad"></span>
            </a>
            <a href="" class="topbar-icon" id="keyshortcut" aria-hidden="true" data-toggle="modal"
                data-target="#cheetsheet"><i class="fa fa-keyboard-o"></i></a>
        </div>
    </div>
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane fade active in" id="home">
            <div class="row">
                <div class="col-sm-12 col-md-6">

                    <div class="row">
                        <div class="col-xs-4 col-sm-3 col-md-4 col-lg-3 col-xl-2">
                            <div class="btn-check-group">
                                <div class="btn-check">
                                    <input type="checkbox" checked autocomplete="off" id="all"
                                        onclick="check_category('all')">
                                    <label class="btn btn-success btn-block" for="all">
                                        All
                                    </label>
                                </div>
                                <?php if ($categorylist) { ?>
                                    <?php foreach ($categorylist as $categories) { ?>
                                        <div class="btn-check">
                                            <input type="checkbox" autocomplete="off"
                                                id="cat_<?php echo $categories['category_id'] ?>"
                                                value="<?php echo $categories['category_id'] ?>"
                                                onclick="check_category(<?php echo $categories['category_id'] ?>)"
                                                name="cat_id[]">
                                            <label class="btn btn-success btn-block"
                                                for="cat_<?php echo $categories['category_id'] ?>">
                                                <?php echo $categories['category_name'] ?>
                                            </label>
                                        </div>
                                <?php }
                                } ?>

                                <input name="url" type="hidden" id="posurl"
                                    value="<?php echo base_url("invoice/invoice/getitemlist") ?>" />
                                <input name="url" type="hidden" id="posurl_productname"
                                    value="<?php echo base_url("invoice/invoice/getitemlist_byname") ?>" />

                            </div>
                        </div>
                        <div class="col-xs-8 col-sm-9 col-md-8 col-lg-9 col-xl-10 " id="style-3">

                            <div class="row search-bar">
                                <div class="col-sm-6">
                                    <!-- Actual search box -->
                                    <div class="form-group has-feedback has-search">
                                        <span
                                            class="ti-search form-control-feedback d-flex align-items-center justify-content-center"></span>
                                        <input type="text" class="form-control" id="product_name"
                                            placeholder="Search Product" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <form class="navbar-search">
                                        <label class="sr-only screen-reader-text" for="search">Search :</label>
                                        <div class="input-group">
                                            <select name="productlist" class="form-control filter-select"
                                                onchange="onselectimage(this.value)">
                                                <option value='' selected>Select Product</option>
                                                <?php if ($product_list) { ?>
                                                    <?php foreach ($product_list as $products) { ?>
                                                        <option value="<?php echo $products['product_id'] ?>">
                                                            <?php echo $products['product_name'] ?></option>
                                                <?php }
                                                } ?>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>



                            <div class="product-grid">
                                <div class="row row-m-3" id="product_search">
                                    <?php $i = 0;
                                    if ($itemlist) {
                                        foreach ($itemlist as $item) {
                                    ?>

                                            <div class="col-xs-4 col-sm-3 col-md-4 col-lg-3 col-p-3">
                                                <div class="product-panel overflow-hidden border-0 shadow-sm"
                                                    id="image-active_<?php echo $item->product_id ?>">
                                                    <div class="item-image position-relative overflow-hidden">
                                                        <div class="" id="image-active_count_<?php echo $item->product_id ?>">
                                                            <span id="active_pro_<?php echo $item->product_id ?>"
                                                                class="active_qty"></span>
                                                        </div>
                                                        <img src="<?php echo !empty($item->image) ? $item->image : 'assets/img/icons/default.jpg'; ?>"
                                                            onclick="onselectimage('<?php echo $item->product_id ?>')" alt=""
                                                            class="img-responsive">
                                                    </div>
                                                    <div class="panel-footer border-0 bg-white"
                                                        onclick="onselectimage('<?php echo $item->product_id ?>')">
                                                        <h3 class="item-details-title">
                                                            <?php echo  $text = html_escape($item->product_name); ?></h3>
                                                    </div>
                                                </div>
                                            </div>

                                    <?php }
                                    } ?>





                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <form class="form-inline mb-3">
                        <div class="form-group">
                            <input type="text" id="add_item" class="form-control"
                                placeholder="Barcode or QR-code scan here">
                        </div>
                        <div class="form-group">
                            <label class="mr-3 ml-3">OR</label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="add_item_m" placeholder="Manual Input barcode">
                        </div>
                    </form>
                    <?php echo form_open_multipart('invoice/invoice/bdtask_manual_possales_insert', array('class' => 'form-vertical', 'id' => 'gui_sale_insert', 'name' => 'insert_pos_invoice')) ?>
                    <div class="d-flex align-items-center mb-3">
                        <?php if ($this->permission1->method('gui_pos', 'view')->access()) { ?>
                            <label for="empid" class="mr-2 mb-0">Emp Id</label>
                            <div class="input-group mr-4" style="width: 150px;">
                                <input type="password" tabindex="4" class="form-control" name="empid" id="empid" autocomplete="new-password">
                            </div>
                        <?php } ?>

                        <?php if (!$this->permission1->method('gui_pos', 'view')->access()) { ?>
                            <input type="hidden" tabindex="4" class="form-control" name="empid" id="empid" value="123">
                        <?php } ?>



                        <label for="employee_id" class="mr-2 mb-0">Employee<i class="text-danger">*</i></label>
                        <div class="input-group " style="width: 150px;">
                            <select tabindex="4" class="form-control" name="employee_id" id="employee_id" required>
                            </select>
                        </div>


                    </div>


                    <input type="hidden" name="csrf_test_name" id=""
                        value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <input type="hidden" name="tax_type" id="tax_type" value="<?php echo $tax_type; ?>">

                    <div class="table-responsive guiproductdata">
                        <table class="table table-bordered table-hover table-sm nowrap gui-products-table"
                            id="addinvoice">
                            <thead>
                                <tr>
                                    <th class="text-center gui_productname"><?php echo display('item_information') ?> <i
                                            class="text-danger">*</i></th>

                                    <th class="text-center"><?php echo display('quantity') ?> <i
                                            class="text-danger">*</i></th>
                                    <th class="text-center"><?php echo display('rate') ?> <i class="text-danger">*</i>
                                    </th>
                                    <?php if ($discount_type == 1) { ?>
                                        <th class="text-center" style="width: 90px;"><?php echo display('disc') ?></th>
                                    <?php } elseif ($discount_type == 2) { ?>
                                        <th class="text-center"><?php echo display('discount') ?> </th>
                                    <?php } elseif ($discount_type == 3) { ?>
                                        <th class="text-center"><?php echo display('fixed_dis') ?> </th>
                                    <?php } ?>
                                    <th class="text-center invoice_fields"><?php echo display('dis_val') ?> </th>
                                    <th class="text-center invoice_fields"><?php echo display('vat') . ' %' ?> </th>
                                    <th class="text-center invoice_fields"><?php echo display('vat_val') ?> </th>
                                    <th class="text-center"><?php echo display('total') ?></th>
                                    <th class="text-center"><?php echo display('action') ?></th>
                                </tr>
                            </thead>
                            <tbody id="addinvoiceItem">

                            </tbody>
                        </table>
                    </div>
                    <div class="footer">
                        <div class="form-group row guifooterpanel">
                            <div class="col-sm-12">
                                <label for="date"
                                    class="col-sm-6 col-lg-6 col-xl-7 col-form-label"><?php echo display('invoice_discount') ?>:</label>
                                <div class="col-sm-6 col-lg-5 col-xl-4">
                                    <input type="text" onkeyup="quantity_calculate(1);"
                                        onchange="quantity_calculate(1);" id="invoice_discount"
                                        class="form-control total_discount gui-foot text-right" name="invoice_discount"
                                        placeholder="0.00" />
                                    <input type="hidden" id="txfieldnum" value="<?php echo $taxnumber ?>" />
                                    <input type="hidden" name="paytype" value="1" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group row guifooterpanel">
                            <div class="col-sm-12">
                                <label for="date"
                                    class="col-sm-6 col-lg-6 col-xl-7 col-form-label"><?php echo display('total_discount') ?>:</label>
                                <div class="col-sm-6 col-lg-5 col-xl-4">
                                    <input type="text" id="total_discount_ammount"
                                        class="form-control gui-foot text-right" name="total_discount" value="0.00"
                                        readonly="readonly" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group row guifooterpanel">
                            <div class="col-sm-12">
                                <label for="date"
                                    class="col-sm-6 col-lg-6 col-xl-7 col-form-label"><?php echo display('ttl_val') ?>:</label>
                                <div class="col-sm-6 col-lg-5 col-xl-4">
                                    <input type="text" id="total_vat_amnt" class="form-control gui-foot text-right"
                                        name="total_vat_amnt" value="0.00" readonly="readonly" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group row guifooterpanel">
                            <div class="col-sm-12">
                                <label for="date"
                                    class="col-sm-6 col-lg-6 col-xl-7 col-form-label"><?php echo display('shipping_cost') ?>:</label>
                                <div class="col-sm-6 col-lg-5 col-xl-4">
                                    <input type="text" id="shipping_cost" class="form-control gui-foot text-right"
                                        name="shipping_cost" onkeyup="quantity_calculate(1);"
                                        onchange="quantity_calculate(1);" placeholder="0.00" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group row guifooterpanel">
                            <div class="col-sm-12">
                                <label for="date"
                                    class="col-sm-6 col-lg-6 col-xl-7 col-form-label"><?php echo display('grand_total') ?>:</label>
                                <div class="col-sm-6 col-lg-5 col-xl-4"><input type="text" id="grandTotal"
                                        class="form-control gui-foot text-right grandTotalamnt" name="grand_total_price"
                                        value="0.00" readonly="readonly" />
                                    <input type="hidden" name="baseUrl" class="baseUrl"
                                        value="<?php echo base_url(); ?>" id="baseurl" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group row guifooterpanel">
                            <div class="col-sm-12">
                                <label for="date"
                                    class="col-sm-6 col-lg-6 col-xl-7 col-form-label"><?php echo display('previous'); ?>:</label>
                                <div class="col-sm-6 col-lg-5 col-xl-4"><input type="text" id="previous"
                                        class="form-control gui-foot text-right" name="previous" value="0.00"
                                        readonly="readonly" /></div>
                            </div>
                        </div>
                        <div class="form-group row guifooterpanel">
                            <div class="col-sm-12">
                                <label for="change"
                                    class="col-sm-6 col-lg-6 col-xl-7 col-form-label"><?php echo display('change'); ?>:</label>
                                <div class="col-sm-6 col-lg-5 col-xl-4"><input type="text" id="change"
                                        class="form-control gui-foot text-right" name="change" value="0.00"
                                        readonly="readonly" /></div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="finyear" value="<?php echo financial_year(); ?>">
                    <p hidden id="pay-amount"></p>
                    <p hidden id="change-amount"></p>
                    <div class="col-sm-12 table-bordered p-20">
                        <div id="adddiscount" class="display-none">
                            <div class="row no-gutters">
                                <div class="form-group col-md-6">
                                    <label for="payments"
                                        class="col-form-label pb-2"><?php echo display('payment_type'); ?></label>

                                    <?php $card_type = 1020101;
                                    echo form_dropdown('multipaytype[]', $all_pmethod, (!empty($card_type) ? $card_type : null), 'onchange = "check_creditsale()" class="card_typesl postform resizeselect form-control "') ?>

                                </div>
                                <div class="form-group col-md-6">
                                    <label for="4digit"
                                        class="col-form-label pb-2"><?php echo display('paid_amount'); ?></label>

                                    <input type="text" id="pamount_by_method" class="form-control number pay "
                                        name="pamount_by_method[]" value="" onkeyup="changedueamount()"
                                        placeholder="0" />

                                </div>
                            </div>

                            <div class="" id="add_new_payment">



                            </div>
                            <div class="form-group text-right">
                                <div class="col-sm-12 pr-0">

                                    <button type="button" id="add_new_payment_type"
                                        class="btn btn-success w-md m-b-5"><?php echo display('new_p_method'); ?></button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="fixedclasspos">
                        <div class="bottomarea">
                            <div class="row">
                                <div class="col-lg-8 col-xl-8">
                                    <div class="calculation d-lg-flex">
                                        <div class="cal-box d-lg-flex align-items-lg-center mr-4">
                                            <label
                                                class="cal-label mr-2 mb-0"><?php echo display('net_total'); ?>:</label><span
                                                class="amount" id="net_total_text">0.00</span>
                                            <input type="hidden" id="n_total"
                                                class="form-control text-right guifooterfixedinput" name="n_total"
                                                value="0" readonly="readonly" placeholder="" />
                                        </div>
                                        <div class="cal-box d-lg-flex align-items-lg-center mr-4">
                                            <div class="form-inline d-inline-flex align-items-center">
                                                <label
                                                    class="cal-label mr-2 mb-0"><?php echo display('paid_ammount') ?>:</label>
                                                <input type="text" class="form-control" id="paidAmount"
                                                    onkeyup="invoice_paidamount()" name="paid_amount"
                                                    onkeypress="invoice_paidamount()" placeholder="0.00">
                                            </div>
                                        </div>
                                        <div class="cal-box d-lg-flex align-items-lg-center mr-4">
                                            <label
                                                class="cal-label mr-2 mb-0"><?php echo display('due') ?>:</label><span
                                                class="amount" id="due_text">0.00</span>
                                            <input type="hidden" id="dueAmmount"
                                                class="form-control text-right guifooterfixedinput" name="due_amount"
                                                value="0.00" readonly="readonly" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-4 text-xl-right">
                                    <div class="action-btns d-flex justify-content-end">

                                        <input type="submit" id="add_invoice" class="btn btn-success btn-lg mr-2"
                                            name="add_invoice" value="Save Sale">
                                        <a href="#" class="btn btn-info btn-lg" data-toggle="modal"
                                            id="calculator_modal" data-target="#calculator"><i class="fa fa-calculator"
                                                aria-hidden="true"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="saleList">


            <div class="panel panel-default">
                <div class="panel-body">

                    <div class="table-responsive padding10" id="invoic_list">
                        <table id="gui_productinfo" class="table table-bordered table-hover datatable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Invoice No</th>
                                    <th>Invoice ID</th>
                                    <th>Date</th>
                                    <th>Total Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="gui_tbody">
                                <!-- Data will be inserted here by JavaScript -->
                            </tbody>
                        </table>


                    </div>

                </div>
            </div>

        </div>
    </div>
</div>




<div id="detailsmodal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" class="close" data-dismiss="modal">&times;</a>
                <strong>
                    <center> <?php echo display('product_details') ?></center>
                </strong>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="panel panel-bd">

                            <div class="panel-body">
                                <span id="modalimg"></span><br>
                                <h4><?php echo display('product_name') ?> :<span id="modal_productname"></span></h4>
                                <h4><?php echo display('product_model') ?> :<span id="modal_productmodel"></span></h4>
                                <h4><?php echo display('price') ?> :<span id="modal_productprice"></span></h4>
                                <h4><?php echo display('unit') ?> :<span id="modal_productunit"></span></h4>
                                <h4><?php echo display('stock') ?> :<span id="modal_productstock"></span></h4>



                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="modal-footer">

        </div>

    </div>

</div>


<div class="modal fade" id="printconfirmodal" tabindex="-1" role="dialog" aria-labelledby="printconfirmodal"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <a href="" class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
                <h4 class="modal-title" id="myModalLabel"><?php echo display('print') ?></h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('invoice_pos_print', array('class' => 'form-vertical', 'id' => '', 'name' => '')) ?>
                <div id="outputs" class="hide alert alert-danger"></div>
                <h3> <?php echo display('successfully_inserted') ?> </h3>
                <h4><?php echo display('do_you_want_to_print') ?> ??</h4>
                <input type="hidden" name="invoice_id" id="inv_id">
                <input type="hidden" name="url" value="<?php echo base_url('gui_pos'); ?>">
            </div>
            <div class="modal-footer">
                <button type="button" onclick="cancelprint()" class="btn btn-default"
                    data-dismiss="modal"><?php echo display('no') ?></button>
                <button type="submit" class="btn btn-primary" id="yes"><?php echo display('yes') ?></button>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="cheetsheet" tabindex="-1" role="dialog" aria-labelledby="cheetsheet" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <a href="" class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
                <h4 class="modal-title">Keyboard Shortcut</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">

                    <thead>
                        <tr>
                            <th>Event</th>
                            <th>key</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">Submit Invoice</td>
                            <td class="text-center">ctrl+s</td>
                        </tr>
                        <tr>
                            <td class="text-center">Add New Customer</td>
                            <td class="text-center">shif+c</td>
                        </tr>
                        <tr>
                            <td class="text-center">Full Paid</td>
                            <td class="text-center">shif+f</td>
                        </tr>
                        <tr>
                            <td class="text-center">Today's Sale List</td>
                            <td class="text-center">shif+l</td>
                        </tr>
                        <tr>
                            <td class="text-center">New Sale</td>
                            <td class="text-center">shif+n</td>
                        </tr>
                        <tr>
                            <td class="text-center">Open Calculator</td>
                            <td class="text-center">alt+c</td>
                        </tr>
                        <tr>
                            <td class="text-center">Search Old Customer</td>
                            <td class="text-center">alt+n</td>
                        </tr>
                        <tr>
                            <td class="text-center">Invoice Discount</td>
                            <td class="text-center">ctrl+d</td>
                        </tr>
                        <tr>
                            <td class="text-center">Shipping Cost</td>
                            <td class="text-center">alt+s</td>
                        </tr>
                        <tr>
                            <td class="text-center">Paid Amount</td>
                            <td class="text-center">alt+p</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<script src="<?php echo base_url() ?>assets/js/perfect-scrollbar.min.js"></script>


<script>
    $('#product_name').val('');

    var base_url = $("#baseUrl2").val();

    $('.product-grid').each(function() {
        const ps = new PerfectScrollbar($(this)[0]);
    });
    $.ajax({
        type: "post",
        url: base_url + 'invoice/invoice/getAllEmployees',
        data: {
            chequeno: $('#chequeno').val(),
            effectivedate: $('#effectivedate').val(),
            chequereceiveddate: $('#chequereceiveddate').val(),
            amount: $('#amount').val()
        },
        success: function(data1) {
            var employees = JSON.parse(data1);
            var $employeeDropdown = $('#employee_id');
            $employeeDropdown.empty(); // Clear existing options
            $employeeDropdown.append('<option value="" disabled selected>Select Employee</option>'); // Add default option
            $.each(employees, function(index, employee) {
                $employeeDropdown.append('<option value="' + employee.id + '">' + employee.first_name + " " + employee.last_name + '</option>');
            });


        }
    });

   
    $('#todays_salelist').on('click', function(event) {
        const empid = $('#empid').val();

        event.preventDefault();
        $.ajax({
            url: base_url + 'invoice/invoice/get_todays_invoice',
            type: 'GET',
            data: {
                empid: empid
            },
            dataType: 'json',
            success: function(response) {
                console.log(response)
                const tbody = $('#gui_tbody');
                tbody.empty();

                let total = 0;
                const currency = '$';
                const position = 0;
                var type = $('#empid').val() === "god" ? "B" : "A";

                response.forEach((invoice, index) => {
                    const row = `<tr>
                        <td>${index + 1}</td>
                        <td><a href="invoice_details/${invoice.invoice_id}">${invoice.invoice}</a></td>
                        <td><a href="invoice_details/${invoice.invoice_id}">${invoice.invoice_id}</a></td>
                        <td>${invoice.date}</td>
                        <td class="text-right">${position === 0 ? currency + invoice.total_amount : invoice.total_amount + currency}</td>
                        <td>
                            <center>
                                <a href="invoice_details/${invoice.invoice_id}q${type}" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="Invoice">
                                    <i class="fa fa-window-restore" aria-hidden="true"></i>
                                </a>
                                <a href="invoice_pad_print/${invoice.invoice_id}q${type}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="left" title="Pad Print">
                                    <i class="fa fa-fax" aria-hidden="true"></i>
                                </a>
                                <a href="pos_print/${invoice.invoice_id}q${type}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="left" title="POS Invoice">
                                    <i class="fa fa-fax" aria-hidden="true"></i>
                                </a>
                                <a href="invoice_edit/${invoice.invoice_id}q${type}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="edit">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>
                            </center>
                        </td>
                    </tr>`;
                    tbody.append(row);
                });


            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }
        });

    });
</script>