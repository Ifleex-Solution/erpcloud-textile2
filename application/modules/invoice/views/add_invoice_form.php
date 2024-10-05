<!-- Invoice js -->
<script src="<?php echo base_url() ?>my-assets/js/admin_js/invoice.js" type="text/javascript"></script>
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->


<style>
    /* #searchResults {
        margin-top: 10px;
    }

    .resultItem {
        padding: 5px;
        border: 1px solid #ccc;
        margin-top: 5px;
        background-color: #f9f9f9;
        color: black;
        cursor: pointer;
    } */

    .highlight {
        background-color: #007BFF;
        color: white;
    }
    .modal-dialog {
      position: absolute;
      left: 0; /* Aligns the modal to the left */
      margin-left: 250px; /* Removes any margin on the left */
  }
</style>


<!--Add Invoice -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <span><?php echo display('new_invoice') ?></span>
                    <span class="padding-lefttitle">
                        <?php if ($this->permission1->method('manage_invoice', 'read')->access()) { ?>
                            <a href="<?php echo base_url('invoice_list') ?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo display('manage_invoice') ?> </a>
                        <?php } ?>
                    </span>
                </div>
            </div>

            <div class="panel-body">
                <?php echo form_open_multipart('invoice/invoice/bdtask_manual_sales_insert', array('class' => 'form-vertical', 'id' => 'insert_sale', 'name' => 'insert_sale', 'onsubmit' => 'return validateFormWrapper()')) ?>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="date" class="col-sm-3 col-form-label"><?php echo display('date') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <?php
                                date_default_timezone_set('Asia/Colombo');

                                $date = date('Y-m-d');
                                ?>
                                <input class="datepicker form-control" type="text" size="50" name="invoice_date" id="date" required value="<?php echo html_escape($date); ?>" tabindex="4" />
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6" id="bank_div">
                        <div class="form-group row">
                            <label for="bank" class="col-sm-3 col-form-label"><?php
                                                                                echo display('bank');
                                                                                ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <select name="bank_id" class="form-control bankpayment" id="bank_id">
                                    <option value="">Select Location</option>
                                    <?php foreach ($bank_list as $bank) { ?>
                                        <option value="<?php echo html_escape($bank['bank_id']) ?>">
                                            <?php echo html_escape($bank['bank_name']); ?></option>
                                    <?php } ?>
                                </select>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <form class="form-inline" style="display: flex; align-items: center; width: 100%;">
                        <div class="col-sm-3">
                            <input type="text" id="add_item" class="form-control" placeholder="Barcode or QR-code scan here">
                        </div>
                        <!-- <div class="col-sm-2">
                            <label class="mr-3 ml-3">OR</label>
                        </div> -->
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="add_item_m" placeholder="Manual Input barcode">
                        </div>
                    </form>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="normalinvoice">
                        <thead>
                            <tr>
                                <th class="text-center product_field"><?php echo display('item_information') ?> <i class="text-danger">*</i></th>
                                <th class="text-center invoice_fields"><?php echo display('unit') ?></th>
                                <th class="text-center product_field">Emp Id</th>

                                <th class="text-center invoice_fields"><?php echo display('quantity') ?> <i class="text-danger">*</i>
                                </th>
                                <th class="text-center product_field"><?php echo display('rate') ?> <i class="text-danger">*</i></th>
                                <th class="text-center product_field">Discount type </th>

                                <th class="text-center product_field">Dis LKR / Percentage </th>


                                <th class="text-center product_field"><?php echo display('dis_val') ?> </th>
                                <th class="text-center product_field"><?php echo display('total') ?>
                                </th>
                                <th class="text-center"><?php echo display('action') ?></th>
                            </tr>
                        </thead>
                        <tbody id="addinvoiceItem">

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="8" class="text-right"><b><?php echo display('grand_total') ?>:</b></td>
                                <td class="text-right">
                                    <input type="text" id="grandTotal" class="form-control text-right grandTotalamnt" name="grand_total_price" value="0.00" readonly="readonly" />
                                </td>
                            </tr>

                            <tr>

                            </tr>
                        </tfoot>
                    </table>
                    <input type="hidden" name="finyear" value="<?php echo financial_year(); ?>">
                    <p hidden id="old-amount"><?php echo 0; ?></p>
                    <p hidden id="pay-amount"></p>
                    <p hidden id="change-amount"></p>

                </div>
                <div class="form-group row text-right">
                    <div class="col-sm-12 p-20">
                        <input type="submit" id="add_invoice" class="btn btn-success" name="add-invoice" value="<?php echo display('submit') ?>" tabindex="17" />

                    </div>
                </div>
                <?php echo form_close() ?>
            </div>

        </div>
    </div>


</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="height: 900px;width: 1000px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Manage Sales</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="col-sm-15">
                                    <?php echo form_open('', array('class' => 'form-inline', 'method' => 'get', 'autocomplete' => 'off')) ?>
                                    <?php
                                    date_default_timezone_set('Asia/Colombo');

                                    $today = date('Y-m-d');
                                    ?>
                                    <div class="form-group">
                                        <label class="" for="from_date"><?php echo display('start_date') ?></label>
                                        <input type="text" name="from_date" class="form-control datepicker" id="from_date" value=""
                                            placeholder="<?php echo display('start_date') ?>">
                                    </div>

                                    <div class="form-group">
                                        <label class="" for="to_date"><?php echo display('end_date') ?></label>
                                        <input type="text" name="to_date" class="form-control datepicker" id="to_date"
                                            placeholder="<?php echo display('end_date') ?>" value="" autocomplete="off">
                                    </div>

                                    <div class="form-group">

                                        <?php if ($this->permission1->method('manage_invoice', 'view')->access()) { ?>
                                            <label for="empid" class="mr-2 mb-0">Emp Id</label>
                                            <div class="input-group mr-4" style="width: 150px;">
                                                <input type="password" tabindex="4" class="form-control" name="empid" id="empid" autocomplete="new-password">
                                            </div>
                                        <?php } ?>

                                        <?php if (!$this->permission1->method('manage_invoice', 'view')->access()) { ?>
                                            <input type="hidden" tabindex="4" class="form-control" name="empid" id="empid" value="123">
                                        <?php } ?>
                                    </div>




                                    <button type="button" id="btn-filter"
                                        class="btn btn-success"><?php echo display('find') ?></button>

                                    <?php echo form_close() ?>
                                </div>

                                <div class="col-sm-4 text-right">

                                    <span class="newtooltiop" data-toggle="tooltip" data-html="true" data-placement="left" title="** How to show invoice edit option ?<br><br>
                    1. To show new invoice edit button in manage sales please go to 'Settings -> Software Setting -> Settings'. <br><br>

                    2. Then uncheck 'Auto Approve Invoice Voucher' option from the setting list & click on save button.<br><br>

                    3. Then create new invoice now you can edit your new invoice (For this you have to approve all your vouchers manually form Accounts -> Voucher Approval 
                    otherwise you don't get those data in accounts report).<br><br>

                    N:B: Please do not edit any auto generated voucher if you do your system calculations can be wrong.<br>">
                                        <i class="fa fa-question-circle fa-2x" aria-hidden="true"></i>
                                    </span>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                </div>
                <!-- Manage Invoice report -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-bd lobidrag">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <span><?php echo display('manage_invoice') ?></span>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" cellspacing="0" width="100%" id="InvList2">
                                        <thead>
                                            <tr>
                                                <th><?php echo display('sl') ?></th>
                                                <th><?php echo display('invoice_no') ?></th>
                                                <th><?php echo display('sale_by') ?></th>
                                                <th><?php echo display('date') ?></th>
                                                <th><?php echo display('total_amount') ?></th>
                                                <th class="text-center"><?php echo display('action') ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>

                                    </table>


                                </div>


                            </div>
                        </div>
                        <input type="hidden" id="total_invoice" value="<?php echo $total_invoice; ?>" name="">

                    </div>

                    <div id="add0" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <strong><?php echo display('delivery_note') ?></strong>
                                </div>
                                <div class="modal-body" id="invoice_note_show">


                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    var mode = "+"
    document.addEventListener('keydown', function(event) {
        // Check if Shift is pressed and the key is '+'
        if (event.shiftKey && event.key === '+') {
            mode = "+"
            alert("mode changed to +");
        }

        if (event.shiftKey && event.key === '_') {
            mode = "-"
            alert("mode changed to -");
        }

        if (event.shiftKey && event.key === 'Enter') {
            // Show the Bootstrap modal
            dataTable().ajax.reload();

            $("#exampleModal").modal('show');

        }
        if (event.shiftKey && event.key === 'S') {
            swal({
                title: "",
                text: "Do You Want To Proceed Further?",
                type: "success",
                showCancelButton: true,
                cancelButtonText: "ESC",
                cancelButtonColor: "red",
                confirmButtonText: "Enter",
                confirmButtonColor: "#008000"
            }, function(proceedValue) {
                if (proceedValue) {
                    setTimeout(function() {

                        swal({
                            title: "",
                            showCancelButton: true,
                            cancelButtonText: "ESC",
                            cancelButtonColor: "red",
                            confirmButtonText: "Enter",
                            confirmButtonColor: "#008000",
                            text: "Are you sure you want to save this record?",
                            type: "success",


                        }, function(inputValue) {
                            if (inputValue === true) {

                                saverecord()
                            } else {

                                location.reload();
                            }

                        });

                    }, 1000);



                } else {
                    // If the user cancels the first popup, reload the page
                    // location.reload();
                }
            });


        }
    });

    function saverecord() {
        setTimeout(function() {


            var productIds = $("input[name='product_id[]']").map(function() {
                return $(this).val();
            }).get();

            var productQuantities = $("input[name='product_quantity[]']").map(function() {
                return $(this).val();
            }).get();

            var productRates = $("input[name='product_rate[]']").map(function() {
                return $(this).val();
            }).get();

            var discountTypes = $("input[name='discount_type[]']").map(function() {
                return $(this).val();
            }).get();

            var discounts = $("input[name='discount[]']").map(function() {
                return $(this).val();
            }).get();

            var discountValues = $("input[name='discountvalue[]']").map(function() {
                return $(this).val();
            }).get();

            var totalPrices = $("input[name='total_price[]']").map(function() {
                return $(this).val();
            }).get();
            var employeeIds = $("input[name='employee_id[]']").map(function() {
                return $(this).val();
            }).get();

            $.ajax({
                type: "post",
                url: $('#base_url').val() + 'invoice/invoice/sales_insert',
                data: {
                    productIds: productIds,
                    productQuantities: productQuantities,
                    productRates: productRates,
                    discountTypes: discountTypes,
                    discounts: discounts,
                    discountValues: discountValues,
                    totalPrices: totalPrices,
                    grandTotal: $('#grandTotal').val(),
                    date: $('#date').val(),
                    employeeIds: employeeIds,
                },
                success: function(data1) {

                    datas = JSON.parse(data1);
                    swal({
                        title: "Success!",
                        showCancelButton: true,
                        cancelButtonText: "ESC",
                        cancelButtonColor: "red",
                        confirmButtonText: "Enter",
                        confirmButtonColor: "#008000",
                        text: "Do You Want To Print ?",
                        type: "success",


                    }, function(inputValue) {
                        if (inputValue === true) {

                            printRawHtml(datas.details);
                        } else {

                            location.reload();
                        }

                    });

                }
            });

        }, 1000); //
    }

    var count = 0;
    let arr = [];
    var tabindex = 1;

    function addinvoice(t, data) {
        var row = $("#normalinvoice tbody tr").length;
        count = count + 1;
        arr.push(count)
        var tab1 = 0;
        var tab2 = 0;
        var tab3 = 0;
        var tab4 = 0;
        var tab5 = 0;
        var tab6 = 0;
        var tab7 = 0;
        var tab8 = 0;
        var limits = 500;
        var taxnumber = $("#txfieldnum").val();
        var tbfild = '';
        for (var i = 0; i < taxnumber; i++) {
            var taxincrefield = '<input id="total_tax' + i + '_' + count + '" class="total_tax' + i + '_' + count + '" type="hidden"><input id="all_tax' + i + '_' + count + '" class="total_tax' + i + '" type="hidden" name="tax[]">';
            tbfild += taxincrefield;
        }
        if (count == limits)
            alert("You have reached the limit of adding " + count + " inputs");
        else {


            e = document.createElement("tr");
            tab1 = tabindex + 1;
            tab2 = tabindex + 2;
            tab3 = tabindex + 3;
            tab4 = tabindex + 4;
            tab5 = tabindex + 5;
            tab6 = tabindex + 6;
            tab7 = tabindex + 7;
            tab8 = tabindex + 8;
            tabindex = tabindex + 9;

            if (mode === "+") {
                e.innerHTML = "<td '><input type='text' name='product_name' class='form-control' placeholder='Product Name' id='" + "product_name_" + count +
                    "' required tabindex='" + tab1 + "' readonly='readonly'><input type='hidden' class='common_product autocomplete_hidden_value  product_id_" + count +
                    "' name='product_id[]'  id='product_id_" + count + "'/></td><td><input class='form-control text-right common_name unit_" + count +
                    " valid'  id='unit_type_" + count + "' value='None' readonly='' aria-invalid='false' type='text'></td>" +
                    "<td><input class='form-control' type='text' id='searchInput_" + count + "' tabindex='" + tab3 + "' placeholder='Employee Id...' onkeyup='handleEmployeeKeyPress(event," + count + ")'  autocomplete='off' /><input type='text' name='employee_id[]' id='employeeId_" + count + "' hidden /><div id='searchResults_" + count + "' style='width: 200px;'></div></td>" +
                    "<td> <input type='text' name='product_quantity[]' value='1' required='required' onkeyup='bdtask_invoice_quantitycalculate(" +
                    count + ",event);' onchange='bdtask_invoice_quantitycalculate(" + count + ",event);' id='total_qntt_" + count + "' class='common_qnt total_qntt_" +
                    count + " form-control text-right'  placeholder='0.00' min='0' tabindex='" + tab3 + "'/></td><td><input type='text' name='product_rate[]' onkeyup='bdtask_invoice_quantitycalculate(" +
                    count + ",event);' onchange='bdtask_invoice_quantitycalculate(" + count + ",event);' id='price_item_" + count + "' class='common_rate price_item" +
                    count + " form-control text-right' required placeholder='0.00' min='0' tabindex='" + tab4 + "'/></td><td><input type='text' name='discount_type[]' onkeyup='bdtask_invoice_quantitycalculate(" +
                    count + ",event);'  id='discount_type_" + count + "' class='form-control'  tabindex='" + tab5 +
                    "' /></td><td><input type='text' class='form-control text-right common_discount'  tabindex='" + tab6 + "' placeholder='0.00' min='0' onkeyup='bdtask_invoice_quantitycalculate(" + count + ",event);'  value='' name='discount[]' id='discount_" + count + "'  ></td><td><input type='text' name='discountvalue[]'  id='discount_value_" + count +
                    "' class='form-control text-right common_discount' placeholder='0.00' min='0' tabindex='" + tab7 + "' readonly /></td><td class='text-right'><input class='common_total_price total_price form-control text-right' type='text' name='total_price[]' id='total_price_" +
                    count + "' value='0.00' readonly='readonly'/></td><td>" + tbfild + "<input type='hidden' id='all_discount_" + count +
                    "' class='total_discount dppr' name='discount_amount[]'/><button tabindex='" + tab8 +
                    "' style='text-align: right;' class='btn btn-danger' type='button' value='Delete' onclick='deleteRow_invoice(this," + count + ")'><i class='fa fa-close'></i></button></td>",
                    document.getElementById(t).appendChild(e);

            } else {
                e.innerHTML = "<td style='background-color:#f9f9c1;'><input type='text' name='product_name' class='form-control' placeholder='Product Name' id='" + "product_name_" + count +
                    "' required tabindex='" + tab1 + "' readonly='readonly'><input type='hidden' class='common_product autocomplete_hidden_value  product_id_" + count +
                    "' name='product_id[]'  id='product_id_" + count + "'/></td><td style='background-color:#f9f9c1;'><input class='form-control text-right common_name unit_" + count +
                    " valid'  id='unit_type_" + count + "' value='None' readonly='' aria-invalid='false' type='text'></td>" +
                    "<td style='background-color:#f9f9c1;'><input class='form-control' type='text' id='searchInput_" + count + "' tabindex='" + tab3 + "' placeholder='Employee Id...' onkeyup='handleEmployeeKeyPress(event," + count + ")' autocomplete='off' /><input type='text' name='employee_id[]' id='employeeId_" + count + "' hidden /><div id='searchResults_" + count + "' style='width: 200px;'></div></td>" +
                    "<td style='background-color:#f9f9c1;'> <input type='text' name='product_quantity[]' value='-1' required='required' onkeyup='bdtask_invoice_quantitycalculate(" +
                    count + ",event);' onchange='bdtask_invoice_quantitycalculate(" + count + ",event);' id='total_qntt_" + count + "' class='common_qnt total_qntt_" +
                    count + " form-control text-right'  placeholder='0.00' min='0' tabindex='" + tab3 + "'/></td><td style='background-color:#f9f9c1;'><input type='text' name='product_rate[]' onkeyup='bdtask_invoice_quantitycalculate(" +
                    count + ",event);' onchange='bdtask_invoice_quantitycalculate(" + count + ",event);' id='price_item_" + count + "' class='common_rate price_item" +
                    count + " form-control text-right' required placeholder='0.00' min='0' tabindex='" + tab4 + "'/></td><td style='background-color:#f9f9c1;'><input type='text' name='discount_type[]' onkeyup='bdtask_invoice_quantitycalculate(" +
                    count + ",event);'  id='discount_type_" + count + "' class='form-control'  tabindex='" + tab5 +
                    "' /></td><td style='background-color:#f9f9c1;'><input type='text' class='form-control text-right common_discount'  tabindex='" + tab6 + "' placeholder='0.00' min='0' onkeyup='bdtask_invoice_quantitycalculate(" + count + ",event);'  value='' name='discount[]' id='discount_" + count + "'  ></td><td style='background-color:#f9f9c1;'><input type='text' name='discountvalue[]'  id='discount_value_" + count +
                    "' class='form-control text-right common_discount' placeholder='0.00' min='0' tabindex='" + tab7 + "' readonly /></td><td class='text-right' style='background-color:#f9f9c1;'><input class='common_total_price total_price form-control text-right' type='text' name='total_price[]' id='total_price_" +
                    count + "' value='0.00' readonly='readonly'/></td><td style='background-color:#f9f9c1;'>" + tbfild + "<input type='hidden' id='all_discount_" + count +
                    "' class='total_discount dppr' name='discount_amount[]'/><button tabindex='" + tab8 +
                    "' style='text-align: right;' class='btn btn-danger' type='button' value='Delete' onclick='deleteRow_invoice(this," + count + ")'><i class='fa fa-close'></i></button></td>",
                    document.getElementById(t).appendChild(e);
            }




            let element2 = document.getElementById("searchInput_" + count);
            $("#discount_type_" + count).val("Percentage");
            $("#discount_" + count).val(0)
            $("searchInput_" + count).val($("searchInput_" + (count - 1)).val(0))
            element2.focus();
            element2.select();
            $("#price_item_" + count).val(data.price);
            $("#product_id_" + count).val(data.product_id);
            $("#unit_type_" + count).val(data.unit);
            $("#product_name_" + count).val(data.product_name);

            var quantity = $("#total_qntt_" + count).val();
            var price_item = $("#price_item_" + count).val();
            var price = quantity * price_item;


            $("#total_price_" + count).val(price);
            $('#add_item_m').val("");

            var total = 0;
            arr.forEach(function(element) {
                total = parseFloat($("#total_price_" + element).val()) + total;
            });

            $("#grandTotal").val(total);

        }
    }

    function deleteRow_invoice(t, count) {
        var a = $("#normalinvoice > tbody > tr").length;
        if (1 == a)
            alert("There only one row you can't delete.");
        else {
            var e = t.parentNode.parentNode;
            e.parentNode.removeChild(e);
            let index = arr.indexOf(count);
            if (index !== -1) {
                arr.splice(index, 1);
            }


            var total = 0;
            arr.forEach(function(element) {
                total = parseFloat($("#total_price_" + element).val()) + total;
            });

            $("#grandTotal").val(total);



        }
    }
    $('#add_item_m').keydown(function(e) {

        if (e.keyCode == 13) {
            var product_id = $(this).val();
            var invoice_edit_page = $("#invoice_edit_page").val();


            $.ajax({
                type: "post",
                async: false,
                url: $('#base_url').val() + 'invoice/invoice/invoice_setup',
                data: {
                    product_id: product_id,
                    csrf_test_name: invoice_edit_page
                },
                success: function(data) {
                    if (data != "") {
                        addinvoice('addinvoiceItem', JSON.parse(data));
                    }


                },
                error: function() {
                    alert('Request Failed, Please check your code and try again!');
                }
            });

        }
    });


    function printRawHtml(view) {
        printJS({
            printable: view,
            type: 'raw-html',

        });

    }




    function bdtask_invoice_quantitycalculate(item, e) {
        if (e.keyCode == 27) {
            document.getElementById("searchInput").focus();

        } else
        if (e.keyCode == 13) {


        } else {
            var quantity = $("#total_qntt_" + item).val();
            var price_item = $("#price_item_" + item).val();
            var invoice_discount = $("#invoice_discount").val();
            var discount = $("#discount_" + item).val();
            var total_discount = $("#total_discount_" + item).val();
            var dis_type = $("#discount_type_" + item).val();


            if (e.keyCode == 9) {
                if (dis_type === "p")
                    $("#discount_type_" + item).val("Percentage");
                else if (dis_type === "a")
                    $("#discount_type_" + item).val("Amount");

            }


            if (quantity > 0 || discount > 0) {
                if (dis_type === "Percentage") {
                    var price = quantity * price_item;
                    var dis = +(price * discount / 100);
                    $("#discount_value_" + item).val(dis);
                    $("#all_discount_" + item).val(dis);
                    var temp = price - dis;
                    $("#total_price_" + item).val(temp);
                    $("#discount_type_" + item).val("Percentage");



                } else if (dis_type === "Amount") {
                    var price = quantity * price_item;
                    var dis = discount;
                    $("#discount_value_" + item).val(dis);
                    $("#all_discount_" + item).val(dis);
                    var temp = price - dis;
                    $("#total_price_" + item).val(temp);
                    $("#discount_type_" + item).val("Amount");

                } else {
                    var total_price = quantity * price_item;
                    $("#total_price_" + item).val(total_price);
                }
            } else {
                var n = quantity * price_item;
                $("#total_price_" + item).val(n)
            }




            var total = 0;
            arr.forEach(function(element) {
                total = parseFloat($("#total_price_" + element).val()) + total;
            });

            $("#grandTotal").val(total);

            var invoice_edit_page = $("#invoice_edit_page").val();
            var preload_pay_view = $("#preload_pay_view").val();

            $("#add_new_payment").empty();

            $("#pay-amount").text('0');
            $("#dueAmmount").val(0);
        }




    }
</script>

<script>
    // Sample data to search through
    let employees = [

    ];

    let currentIndex = -1;

    $(document).ready(function() {
        getAllEmployees();
    });

    function getAllEmployees() {
        $.ajax({
            type: "post",
            url: $('#base_url').val() + 'invoice/invoice/getAllEmployees',
            data: {
                chequeno: $('#chequeno').val(),
                effectivedate: $('#effectivedate').val(),
                chequereceiveddate: $('#chequereceiveddate').val(),
                amount: $('#amount').val()
            },
            success: function(data1) {
                employees = JSON.parse(data1);


            }
        });
    }

    function handleEmployeeKeyPress(event, count) {
        console.log(event.code)

        const query = document.getElementById('searchInput_' + count).value.toLowerCase();
        const results = employees.filter(employee => employee.first_name.toLowerCase().includes(query));


        if (event.key === 'ArrowDown') {
            // Move down in the list
            if (currentIndex < results.length - 1) {
                currentIndex++;
                highlightItem(currentIndex);
            }
        } else if (event.key === 'ArrowUp') {
            // Move up in the list
            if (currentIndex > 0) {
                currentIndex--;
                highlightItem(currentIndex);
            }
        } else if (event.key === 'Enter') {
            // Select the highlighted item
            if (currentIndex >= 0 && currentIndex < results.length) {
                // Place the selected item in the input box
                document.getElementById('searchInput_' + count).value = results[currentIndex].first_name + " " + results[currentIndex].last_name;
                document.getElementById('searchInput_' + count).select()
                document.getElementById('employeeId_' + count).value = results[currentIndex].id;
                // Clear the search results
                clearResults(count);
            }
        } else if (event.key === "ArrowRight") {

        } else {
            // For other keys, just filter and show results
            currentIndex = -1;
            displayResults(results, count);

        }



    }

    function displayResults(results, count) {
        const searchResultsDiv = document.getElementById('searchResults_' + count);
        searchResultsDiv.innerHTML = ''; // Clear previous results
        if (results.length === 0) {
            searchResultsDiv.innerHTML = '<p>No results found</p>';
        } else {
            results.forEach((item, index) => {
                const resultItem = document.createElement('div');
                resultItem.classList.add('resultItem');
                resultItem.textContent = item.first_name + " " + item.last_name;
                resultItem.setAttribute('data-index', index);
                searchResultsDiv.appendChild(resultItem);
            });
        }
        currentIndex = 0
        highlightItem(0);

    }

    function highlightItem(index) {
        const items = document.querySelectorAll('.resultItem');
        items.forEach((item, idx) => {
            if (idx === index) {
                item.classList.add('highlight');
            } else {
                item.classList.remove('highlight');
            }
        });
    }

    function printRawHtml(view) {
        printJS({
            printable: view,
            type: 'raw-html',
            onPrintDialogClose: function() {
                printJobComplete(); // Call the function you need to execute after the print dialog closes
                location.reload(); // Reload the page
            }
        });



    }

    function clearResults(count) {
        // Clear the results div
        document.getElementById('searchResults_' + count).innerHTML = '';
    }

    // function viewResult() {
        $(document).ready(function() {
            "use strict";
            
            var invoicedatatable = dataTable();
           

        });

        $('#btn-filter').click(function() {
            var invoicedatatable = dataTable();

            });

        function dataTable(){
            $('#InvList2').DataTable().destroy();
            var csrf_test_name = $('[name="csrf_test_name"]').val();
            var base_url = $('#base_url').val();
            var total_invoice = $("#total_invoice").val();
            var currency = $("#currency").val();
            return $('#InvList2').DataTable({
                responsive: true,

                "aaSorting": [
                    [1, "desc"]
                ],
                "columnDefs": [{
                        "bSortable": false,
                        "aTargets": [0, 2, 3, 4, 5]
                    },

                ],
                'processing': true,
                'serverSide': true,


                'lengthMenu': [
                    [10, 25, 50, 100, 250, 500, 1000],
                    [10, 25, 50, 100, 250, 500, 1000]
                ],
                'serverMethod': 'post',
                'ajax': {
                    'url': base_url + 'invoice/invoice/CheckInvoiceList',
                    "data": function(data) {
                        data.fromdate = $('#from_date').val();
                        data.todate = $('#to_date').val();
                        data.empid = $('#empid').val();
                        data.csrf_test_name = csrf_test_name;
                    }
                },
                'columns': [{
                        data: 'sl'
                    },
                    {
                        data: 'invoice'
                    },
                    {
                        data: 'salesman'
                    },
                    {
                        data: 'final_date'
                    },
                    {
                        data: 'total_amount',
                        class: "total_sale text-right",
                        render: $.fn.dataTable.render.number(',', '.', 2, currency)
                    },
                    {
                        data: 'button'
                    },
                ],


            });


        }
    // }
</script>