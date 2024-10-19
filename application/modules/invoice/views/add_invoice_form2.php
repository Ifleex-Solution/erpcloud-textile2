<!-- Invoice js -->
<script src="<?php echo base_url() ?>my-assets/js/admin_js/invoice.js" type="text/javascript"></script>
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->


<style>
    .highlight {
        background-color: #007BFF;
        color: white;
    }

    .modal-dialog {
        position: absolute;
        left: 0;
        margin-left: 250px;
    }

    .modal-dialog1 {
        position: absolute;
        left: 0;
        margin-left: 500px;
    }
</style>


<!--Add Invoice -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">

            <div class="panel-body" style="background-color:#B2BEB5">
                <?php echo form_open_multipart('invoice/invoice/bdtask_manual_sales_insert', array('class' => 'form-vertical', 'id' => 'insert_sale', 'name' => 'insert_sale', 'onsubmit' => 'return validateFormWrapper()')) ?>

                <div class="row">
                    <form class="form-inline" style="display: flex; align-items: center; width: 100%;">
                        <div class="col-sm-1">

                            <label for="date" class="col-sm-3 col-form-label"><?php echo display('date') ?> <i class="text-danger">*</i></label>
                        </div>
                        <div class="col-sm-2">

                            <?php
                            date_default_timezone_set('Asia/Colombo');

                            $date = date('Y-m-d');
                            ?>
                            <input class="datepicker form-control" type="text" size="50" name="invoice_date" id="date" required value="<?php echo html_escape($date); ?>" tabindex="4" />
                        </div>
                        <!-- <div class="col-sm-2">
                            <input type="text" id="add_item" class="form-control" placeholder="Barcode or QR-code scan here">
                        </div> -->
                        <!-- <div class="col-sm-2">
                            <label class="mr-3 ml-3">OR</label>
                        </div> -->
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="barcodeInput" placeholder="Scan barcode here..." autofocus>
                        </div>
                        <p id="result"></p>

                        <!-- <div class="col-sm-3">
                            <input type="text" class="form-control" id="add_item_m" placeholder="Manual Input barcode" autofocus>
                        </div> -->
                    </form>
                </div>

                <div class="table-responsive">
                    <div class="row">
                        <div class="col-sm-10">
                            <table class="table-bordered" id="normalinvoice">
                                <thead>
                                    <tr>
                                        <th class="text-center product_field"><?php echo display('item_information') ?> <i class="text-danger">*</i></th>
                                        <th class="text-center invoice_fields"><?php echo display('unit') ?></th>
                                        <th class="text-center product_field">Sold By</th>

                                        <th class="text-center invoice_fields"><?php echo display('quantity') ?> <i class="text-danger">*</i>
                                        </th>
                                        <th class="text-center product_field"><?php echo display('rate') ?> <i class="text-danger">*</i></th>
                                        <th class="text-center product_field">Discount type </th>

                                        <th class="text-center product_field">Dis LKR / Percentage </th>


                                        <th class="text-center product_field"><?php echo display('dis_val') ?> </th>
                                        <th class="text-center product_field"><?php echo display('total') ?>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody id="addinvoiceItem">

                                </tbody>

                            </table>
                            <br />
                            <table class="table-bordered" id="invoiceTable">
                                <thead>
                                    <tr>
                                        <th>Item No</th>
                                        <th>Description</th>
                                        <th>S/B</th>
                                        <th>Qty</th>
                                        <th>Rate</th>
                                        <th>Dis T</th>
                                        <th>Dis L/ P</th>
                                        <th>Dis. Value</th>
                                        <th>Total</th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Rows will be inserted here -->
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="8" class="text-right"><b><?php echo display('grand_total') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="grandTotal" class="form-control text-right grandTotalamnt" name="grand_total_price" value="0.00" />
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
                        <div class="col-sm-2">
                            <P><b>SPACE-PAYMENTS</P>
                            <P>F2-SALES SUMMARY</P>
                            <P>F4-MANAGE SALES</P>
                            <P>F5-REFRESH</P>
                            <P>F8-EXCHANGE ITEMMODE</P>
                            <P>F9-COMMISION MODE</P>

                        </div>
                    </div>
                    <br />



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
                                        <input type="text" name="from_date" class="form-control datepicker" id="from_date" value="<?php echo html_escape($today); ?>"
                                            placeholder="<?php echo display('start_date') ?>">
                                    </div>

                                    <div class="form-group">
                                        <label class="" for="to_date"><?php echo display('end_date') ?></label>
                                        <input type="text" name="to_date" class="form-control datepicker" id="to_date"
                                            placeholder="<?php echo display('end_date') ?>" value="<?php echo html_escape($today); ?>" autocomplete="off">
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





<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog1">
        <div class="modal-content" style="height: 500px;width: 700px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Sales Summmary</h4>
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
                                        <label class="" for="from_date1"><?php echo display('start_date'); ?></label>
                                        <input class="datepicker form-control" id="from_date1" name="from_date1" type="text" name="invoice_date" id="date" required value="<?php echo html_escape($date); ?>" />


                                    </div>

                                    <div class="form-group">
                                        <label class="" for="to_date1"><?php echo display('end_date'); ?></label>
                                        <input class="datepicker form-control" id="to_date1" name="to_date1" type="text" name="invoice_date" id="date" required value="<?php echo html_escape($date); ?>" />

                                    </div>






                                    <button type="button" id="btn-gettotalsale"
                                        class="btn btn-success"><?php echo display('find') ?></button>

                                    <?php echo form_close() ?>
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

                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" cellspacing="0" width="100%" id="InvListTotalSales">
                                        <thead>
                                            <tr>
                                                <!-- <th>From Date</th>
                                                <th>To Date</th> -->
                                                <th>Total Invoice Count</th>
                                                <th>Total Amount</th>
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


<div id="editInvoiceModel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editInvoiceLabel" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInvoiceLabel">Edit Invoice</h5>
            </div>
            <div class="modal-body">
                <input class="form-control" type="text" id="searchInput_100" placeholder="Employee Id..." onkeyup="handleEmployeeEditKeyPress(event,100)" autocomplete='off' />
                <input type='text' name='employee_id[]' id='employeeId_100' hidden />
                <input type='text' name='invoiceId[]' id='invoiceId_100' hidden />

                <div id='searchResults_100' style='width: 400px; background-color: #f1f1f1; max-height: 150px; overflow-y: auto; border: 1px solid #ddd; position: absolute;'></div>

            </div>
        </div>
    </div>
</div>
<script>
    const barcodeInput = document.getElementById('barcodeInput');
    const resultElement = document.getElementById('result');

    barcodeInput.addEventListener('input', function() {

        if (barcodeInput.value.length == 6) {
            getItem(barcodeInput.value)

        }

    });

    barcodeInput.addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            let num = barcodeInput.value.toString().padStart(6, '0');
            getItem(num)


            // alert(`product not found`);
        }
    });

    function getItem(product_id) {
        var tableBody = document.getElementById('normalinvoice').getElementsByTagName('tbody')[0];
        tableBody.innerHTML = '';
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
</script>



<script>
    var count = 0;
    let arr = [];
    let arrItem = [];

    var tabindex = 1;


    function updateTable(arrItem) {
        var tableBody = document.getElementById('invoiceTable').getElementsByTagName('tbody')[0];
        tableBody.innerHTML = ''; // Clear any existing rows

        // First loop: populate the table rows with data from arrItem
        let i = 1;
        let total = 0;

        arrItem.forEach(function(item) {
            var row = document.createElement('tr');
            if (item.commisionmode === "no") {
                if (item.qty > 0) {
                    row.innerHTML = `
            <td style="padding: 2px; height: 20px;width:120px;">
                <input type='text' value='${item.productid}' readonly class='form-control' style='height: 20px; font-size: 12px; padding: 2px;'>
            </td>
            <td style="padding: 2px; height: 20px;width:190px;">
                <input type='text'  name='description[]' class='form-control' value='${item.productname}' readonly style='height: 20px;  font-size: 12px;  padding: 2px;'>
            </td>
            <td style="padding: 2px; height: 20px;width:120px;">
                <input type='text' name='sb[]' class='form-control' value='${item.sb}' readonly  style='height: 20px;  font-size: 12px;  padding: 2px;'>
            </td>
            <td style="padding: 2px; height: 20px;width:50px;">
                <input type='number' name='qty[]' class="form-control" value='${item.qty}' readonly  min='0' style='height: 20px;  font-size: 12px; padding: 2px;'>
            </td>
            <td style="padding: 2px; height: 20px;width:120px;">
                <input type='number' name='rate[]' class="form-control" value='${item.rate}' readonly   min='0' style='height: 20px; font-size: 12px; text-align: right;'>
            </td>
            <td style="padding: 2px; height: 20px;width:40px;">
                <input type='text' name='discount_type[]' class='form-control' value='${item.discount_type}' readonly  style='height: 20px;  font-size: 12px;  padding: 2px; '>
            </td>
            <td style="padding: 2px; height: 20px;width:100px;">
                <input type='text' name='discount_lkr[]' class="form-control" value='${item.discount}'  readonly style='height: 20px;  font-size: 12px;  text-align: right;'>
            </td>
            <td style="padding: 2px; height: 20px;width:100px;">
                <input type='number' name='discount_value[]' class="form-control" value='${item.discount_value}' readonly style='height: 20px;  font-size: 12px;  text-align: right;'>
            </td>
            <td style="padding: 2px; height: 20px;width:120px;">
                <input type='number' name='total[]' class="form-control"  value='${item.total}'   readonly style='height: 20px;  font-size: 12px; text-align: right;  '>
            </td> `;
                    if (invoice_ID == 0) {
                        row.innerHTML = row.innerHTML + `<td></td>`
                    } else {
                        row.innerHTML = row.innerHTML + `<td style="padding: 2px; height: 20px; width: 50px;">
    <a href="#" style="margin-left: 5px;" onclick="editRow(${item.invoiceId})">
        <i class="fa fa-edit" style="font-size: 14px; color: blue;"></i>
    </a>
</td>`
                    }
                } else {

                    row.innerHTML = `
            <td style="padding: 2px; height: 20px;width:80px;background-color:#f9f9c1;">
                <input type='text' value='${item.productid}' readonly class='form-control' style='height: 20px; font-size: 12px; padding: 2px;background-color:#f9f9c1;'>
            </td>
            <td style="padding: 2px; height: 20px;width:140px;background-color:#f9f9c1;">
                <input type='text'  name='description[]' class='form-control' value='${item.productname}' readonly style='height: 20px;  font-size: 12px;  padding: 2px;background-color:#f9f9c1;'>
            </td>
            <td style="padding: 2px; height: 20px;width:100px;background-color:#f9f9c1;">
                <input type='text' name='sb[]' class='form-control' value='${item.sb}' readonly  style='height: 20px;  font-size: 12px;  padding: 2px;background-color:#f9f9c1;'>
            </td>
            <td style="padding: 2px; height: 20px;width:50px;background-color:#f9f9c1;">
                <input type='number' name='qty[]' class="form-control" value='${item.qty}' readonly  min='0' style='height: 20px;  font-size: 12px; padding: 2px;background-color:#f9f9c1;'>
            </td>
            <td style="padding: 2px; height: 20px;width:120px;background-color:#f9f9c1;">
                <input type='number' name='rate[]' class="form-control" value='${item.rate}' readonly   min='0' style='height: 20px; font-size: 12px; text-align: right;background-color:#f9f9c1;'>
            </td>
            <td style="padding: 2px; height: 20px;width:40px;background-color:#f9f9c1;">
                <input type='text' name='discount_type[]' class='form-control' value='${item.discount_type}' readonly  style='height: 20px;  font-size: 12px;  padding: 2px;background-color:#f9f9c1; '>
            </td>
            <td style="padding: 2px; height: 20px;width:100px;background-color:#f9f9c1;">
                <input type='text' name='discount_lkr[]' class="form-control" value='${item.discount}'  readonly style='height: 20px;  font-size: 12px;  text-align: right;background-color:#f9f9c1;'>
            </td>
            <td style="padding: 2px; height: 20px;width:100px;background-color:#f9f9c1;">
                <input type='number' name='discount_value[]' class="form-control" value='${item.discount_value}' readonly style='height: 20px;  font-size: 12px;  text-align: right;background-color:#f9f9c1;'>
            </td>
            <td style="padding: 2px; height: 20px;width:120px;background-color:#f9f9c1;">
                <input type='number' name='total[]' class="form-control"  value='${item.total}'   readonly style='height: 20px;  font-size: 12px; text-align: right;background-color:#f9f9c1;  '>
            </td>
                    `;

                    if (invoice_ID == 0) {
                        row.innerHTML = row.innerHTML + `<td></td>`
                    } else {
                        row.innerHTML = row.innerHTML + `<td style="padding: 2px; height: 20px; width: 50px;">
    <a href="#" style="margin-left: 5px;" onclick="editRow(${item.invoiceId})">
        <i class="fa fa-edit" style="font-size: 14px; color: blue;"></i>
    </a>
</td>`
                    }
                }
            } else {
                if (item.qty > 0) {
                    row.innerHTML = `
            <td style="padding: 2px; height: 20px;width:120px;background-color:#b2e0b2;">
                <input type='text' value='${item.productid}' readonly class='form-control' style='height: 20px; font-size: 12px; padding: 2px;background-color:#b2e0b2;'>
            </td>
            <td style="padding: 2px; height: 20px;width:190px;background-color:#b2e0b2;">
                <input type='text'  name='description[]' class='form-control' value='${item.productname}' readonly style='height: 20px;  font-size: 12px;  padding: 2px;background-color:#b2e0b2;'>
            </td>
            <td style="padding: 2px; height: 20px;width:120px;background-color:#b2e0b2;">
                <input type='text' name='sb[]' class='form-control' value='${item.sb}' readonly  style='height: 20px;  font-size: 12px;  padding: 2px;background-color:#b2e0b2;'>
            </td>
            <td style="padding: 2px; height: 20px;width:50px;background-color:#b2e0b2;">
                <input type='number' name='qty[]' class="form-control" value='${item.qty}' readonly  min='0' style='height: 20px;  font-size: 12px; padding: 2px;background-color:#b2e0b2;'>
            </td>
            <td style="padding: 2px; height: 20px;width:120px;background-color:#b2e0b2;">
                <input type='number' name='rate[]' class="form-control" value='${item.rate}' readonly   min='0' style='height: 20px; font-size: 12px; text-align: right;background-color:#b2e0b2;'>
            </td>
            <td style="padding: 2px; height: 20px;width:40px;background-color:#b2e0b2;">
                <input type='text' name='discount_type[]' class='form-control' value='${item.discount_type}' readonly  style='height: 20px;  font-size: 12px;  padding: 2px;background-color:#b2e0b2; '>
            </td>
            <td style="padding: 2px; height: 20px;width:100px;background-color:#b2e0b2;">
                <input type='text' name='discount_lkr[]' class="form-control" value='${item.discount}'  readonly style='height: 20px;  font-size: 12px;  text-align: right;background-color:#b2e0b2;'>
            </td>
            <td style="padding: 2px; height: 20px;width:100px;background-color:#b2e0b2;">
                <input type='number' name='discount_value[]' class="form-control" value='${item.discount_value}' readonly style='height: 20px;  font-size: 12px;  text-align: right;background-color:#b2e0b2;'>
            </td>
            <td style="padding: 2px; height: 20px;width:120px;background-color:#b2e0b2;">
                <input type='number' name='total[]' class="form-control"  value='${item.total}'   readonly style='height: 20px;  font-size: 12px; text-align: right;background-color:#b2e0b2;  '>
            </td> `;
                    if (invoice_ID == 0) {
                        row.innerHTML = row.innerHTML + `<td></td>`
                    } else {
                        row.innerHTML = row.innerHTML + `<td style="padding: 2px; height: 20px; width: 50px;">
    <a href="#" style="margin-left: 5px;" onclick="editRow(${item.invoiceId})">
        <i class="fa fa-edit" style="font-size: 14px; color: blue;"></i>
    </a>
</td>`
                    }
                } else {

                    row.innerHTML = `
            <td style="padding: 2px; height: 20px;width:80px;background-color:#f9c1c1;">
                <input type='text' value='${item.productid}' readonly class='form-control' style='height: 20px; font-size: 12px; padding: 2px;background-color:#f9f9c1;'>
            </td>
            <td style="padding: 2px; height: 20px;width:140px;background-color:#f9f9c1;">
                <input type='text'  name='description[]' class='form-control' value='${item.productname}' readonly style='height: 20px;  font-size: 12px;  padding: 2px;background-color:#f9f9c1;'>
            </td>
            <td style="padding: 2px; height: 20px;width:100px;background-color:#f9f9c1;">
                <input type='text' name='sb[]' class='form-control' value='${item.sb}' readonly  style='height: 20px;  font-size: 12px;  padding: 2px;background-color:#f9f9c1;'>
            </td>
            <td style="padding: 2px; height: 20px;width:50px;background-color:#f9f9c1;">
                <input type='number' name='qty[]' class="form-control" value='${item.qty}' readonly  min='0' style='height: 20px;  font-size: 12px; padding: 2px;background-color:#f9f9c1;'>
            </td>
            <td style="padding: 2px; height: 20px;width:120px;background-color:#f9f9c1;">
                <input type='number' name='rate[]' class="form-control" value='${item.rate}' readonly   min='0' style='height: 20px; font-size: 12px; text-align: right;background-color:#f9f9c1;'>
            </td>
            <td style="padding: 2px; height: 20px;width:40px;background-color:#f9f9c1;">
                <input type='text' name='discount_type[]' class='form-control' value='${item.discount_type}' readonly  style='height: 20px;  font-size: 12px;  padding: 2px;background-color:#f9f9c1; '>
            </td>
            <td style="padding: 2px; height: 20px;width:100px;background-color:#f9f9c1;">
                <input type='text' name='discount_lkr[]' class="form-control" value='${item.discount}'  readonly style='height: 20px;  font-size: 12px;  text-align: right;background-color:#f9f9c1;'>
            </td>
            <td style="padding: 2px; height: 20px;width:100px;background-color:#f9f9c1;">
                <input type='number' name='discount_value[]' class="form-control" value='${item.discount_value}' readonly style='height: 20px;  font-size: 12px;  text-align: right;background-color:#f9f9c1;'>
            </td>
            <td style="padding: 2px; height: 20px;width:120px;background-color:#f9f9c1;">
                <input type='number' name='total[]' class="form-control"  value='${item.total}'   readonly style='height: 20px;  font-size: 12px; text-align: right;background-color:#f9f9c1;  '>
            </td>
                    `;

                    if (invoice_ID == 0) {
                        row.innerHTML = row.innerHTML + `<td></td>`
                    } else {
                        row.innerHTML = row.innerHTML + `<td style="padding: 2px; height: 20px; width: 50px;">
    <a href="#" style="margin-left: 5px;" onclick="editRow(${item.invoiceId})">
        <i class="fa fa-edit" style="font-size: 14px; color: blue;"></i>
    </a>
</td>`
                    }
                }

            }


            tableBody.appendChild(row);
            total = parseFloat(item.total) + total;

            i++;
        });



        $("#grandTotal").val(parseFloat(total).toFixed(2));

        // Second loop: create empty rows to make a total of 14 rows
        for (i; i <= 14; i++) {
            var row = document.createElement('tr');
            row.innerHTML = `
    <td style="padding: 2px; height: 20px;width:120px;">
        <input type='text'   readonly class='form-control' style='height: 20px; font-size: 12px; padding: 2px;'>
    </td>
    <td style="padding: 2px; height: 20px;width:190px;">
        <input type='text' name='description[]' class='form-control' readonly style='height: 20px; font-size: 12px; padding: 2px;'>
    </td>
    <td style="padding: 2px; height: 20px;width:120px; ">
        <input type='text' name='sb[]' class='form-control' readonly style='height: 20px; font-size: 12px; padding: 2px;'>
    </td>
    <td style="padding: 2px; height: 20px; width:50px;">
        <input type='number' name='qty[]' class='form-control' readonly min='0' style='height: 20px; font-size: 12px; padding: 2px;'>
    </td>
    <td style="padding: 2px; height: 20px;width:120px;">
        <input type='number' name='rate[]' class='form-control' readonly min='0' style='height: 20px; font-size: 12px; padding: 2px;'>
    </td>
    <td style="padding: 2px; height: 20px;width:40px;">
        <input type='text' name='discount_type[]' class='form-control' readonly style='height: 20px; font-size: 12px; padding: 2px;'>
    </td>
    <td style="padding: 2px; height: 20px;width:100px;">
        <input type='text' name='discount_lkr[]' class='form-control' readonly style='height: 20px; font-size: 12px; padding: 2px;'>
    </td>
    <td style="padding: 2px; height: 20px;width:100px;">
        <input type='number' name='discount_value[]' class='form-control' readonly style='height: 20px; font-size: 12px; padding: 2px;'>
    </td>
    <td style="padding: 2px; height: 20px;width:120px;">
        <input type='number' name='total[]' class='form-control'  readonly style='height: 20px; font-size: 12px; padding: 2px;'>
    </td>
    <td></td>
`;
            tableBody.appendChild(row);
        }


    }

    function editRow(invoiceId) {
        let item = arrItem.find(item => item.invoiceId == invoiceId);
        $("#searchInput_100").val(item.sb);
        $("#editInvoiceModel").modal('show');

        $('#editInvoiceModel').on('shown.bs.modal', function() {
            let element2 = document.getElementById("searchInput_100");
            $("#invoiceId_100").val(item.invoiceId);
            document.getElementById('employeeId_100').value = "";

            element2.focus();
            element2.select();
        });


    }


    window.onload = updateTable(arrItem);



    var mode = "+"
    var commisionmode = false;

    document.addEventListener('keydown', function(event) {
        // Check if Shift is pressed and the key is '+'
        if (event.key === 'F8') {
            if (mode == "-") {
                mode = "+"
                alert("Mode Changed to +");
            } else {
                mode = "-"
                alert("Mode Changed to -");
            }

        }

        if (event.key === 'F2') {
            dataTableForSale();
            $("#exampleModal2").modal('show');

        }
        if (event.key === 'F4') {
            dataTable().ajax.reload();
            $("#exampleModal").modal('show');

        }
        if (event.key === 'F5') {
            location.reload()

        }
        if (event.key === 'F9') {
            if (commisionmode) {
                commisionmode = false;
                alert("Commission Mode Disabled ");
            } else {
                commisionmode = true;
                alert("Commission Mode Enabled");
            }

        }
        if (event.code === "Space") {
            event.preventDefault();
            let element2 = document.getElementById("grandTotal");
            element2.focus();
            element2.select();
            // $("#exampleModal").modal('show');

        }
        if (event.shiftKey && event.key === 'S') {



        }
    });

    $('#grandTotal').keydown(function(e) {
        if (invoice_ID == 0) {
            if (e.key === "Enter") {
                if (confirm("Do You Want To Proceed Further?")) {
                    if (confirm("Are you sure you want to save this record?")) {
                        saverecord()
                    }
                }
            }
        } else {
            if (confirm("Do You Want To Proceed Further?")) {
                if (confirm("Are you sure you want to update this record?")) {
                    saverecord()
                }
            }
        }

    });


    function saverecord() {
        // setTimeout(function() {
        if (invoice_ID == 0) {
            $.ajax({
                type: "post",
                url: $('#base_url').val() + 'invoice/invoice/sales_insertemp',
                data: {
                    items: arrItem,
                    grandTotal: $('#grandTotal').val(),
                    date: $('#date').val(),

                },
                success: function(data1) {

                    datas = JSON.parse(data1);
                    if (confirm("Do You Want To Print?")) {
                        dataTableForSale()

                        printRawHtml(datas.details);
                    }
                }
            });

        } else {
            $.ajax({ 
                type: "post",
                url: $('#base_url').val() + 'invoice/invoice/sales_updateemp',
                data: {
                    items: arrItem,

                },
                success: function(data1) {

                    datas = JSON.parse(data1);
                    if (confirm("Do You Want To Print?")) {
                        dataTableForSale()

                        printRawHtml(datas.details);
                    }
                }
            });
        }

        // }, 1000); //
    }



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
                    "<td><div style='position: relative; display: inline-block;'><input class='form-control' type='text' id='searchInput_" + count + "' tabindex='" + tab3 + "' placeholder='Employee Id...' onkeyup='handleEmployeeKeyPress(event," + count + ")'  autocomplete='off' /><input type='text' name='employee_id[]' id='employeeId_" + count + "' hidden /><div id='searchResults_" + count + "' style='  width: 100%;  max-height: 150px;  overflow-y: auto; border: 1px solid #ddd; position: absolute;  top: 100%;  left: 0;  z-index: 1000;  background-color: #fff;border-radius: 4px;'></div></div></td>" +
                    "<td> <input type='text' name='product_quantity[]' value='1' required='required' onkeyup='bdtask_invoice_quantitycalculate(" +
                    count + ",event);' onchange='bdtask_invoice_quantitycalculate(" + count + ",event);' id='total_qntt_" + count + "' class='common_qnt total_qntt_" +
                    count + " form-control text-right'  placeholder='0.00' min='0' tabindex='" + tab3 + "'/></td><td><input type='text' readonly='readonly' name='product_rate[]' onkeyup='bdtask_invoice_quantitycalculate(" +
                    count + ",event);' onchange='bdtask_invoice_quantitycalculate(" + count + ",event);' id='price_item_" + count + "' class='common_rate price_item" +
                    count + " form-control text-right' required placeholder='0.00' min='0' /></td><td><input type='text' name='discount_type[]' onkeyup='bdtask_invoice_quantitycalculate(" +
                    count + ",event);'  id='discount_type_" + count + "' class='form-control'  tabindex='" + tab4 +
                    "' /></td><td><input type='text' class='form-control text-right common_discount'  tabindex='" + tab5 + "' placeholder='0.00' min='0' onkeyup='bdtask_invoice_quantitycalculate(" + count + ",event);'  value='' name='discount[]' id='discount_" + count + "'  ></td><td><input type='text' name='discountvalue[]'  id='discount_value_" + count +
                    "' class='form-control text-right common_discount' placeholder='0.00' min='0' readonly /></td><td class='text-right'><input class='common_total_price total_price form-control text-right' type='text' name='total_price[]' id='total_price_" +
                    count + "' value='0.00' readonly='readonly'/></td>" + tbfild + "<input type='hidden' id='all_discount_" + count +
                    "' class='total_discount dppr' name='discount_amount[]'/><button  style='text-align: right;' class='btn btn-danger' type='button' value='Delete' onclick='deleteRow_invoice(this," + count + ")'><i class='fa fa-close'></i></button></td>",
                    document.getElementById(t).appendChild(e);

            } else {
                e.innerHTML = "<td '><input type='text' name='product_name' class='form-control' placeholder='Product Name' id='" + "product_name_" + count +
                    "' required tabindex='" + tab1 + "' readonly='readonly'><input type='hidden' class='common_product autocomplete_hidden_value  product_id_" + count +
                    "' name='product_id[]'  id='product_id_" + count + "'/></td><td><input class='form-control text-right common_name unit_" + count +
                    " valid'  id='unit_type_" + count + "' value='None' readonly='' aria-invalid='false' type='text'></td>" +
                    "<td><div style='position: relative; display: inline-block;'><input class='form-control' type='text' id='searchInput_" + count + "' tabindex='" + tab3 + "' placeholder='Employee Id...' onkeyup='handleEmployeeKeyPress(event," + count + ")'  autocomplete='off' /><input type='text' name='employee_id[]' id='employeeId_" + count + "' hidden /><div id='searchResults_" + count + "' style='width: 100%;  max-height: 150px;  overflow-y: auto; border: 1px solid #ddd; position: absolute;  top: 100%;  left: 0;  z-index: 1000;  background-color: #fff;border-radius: 4px;'></div></div></td>" +
                    "<td> <input type='text' name='product_quantity[]' value='-1' required='required' onkeyup='bdtask_invoice_quantitycalculate(" +
                    count + ",event);' onchange='bdtask_invoice_quantitycalculate(" + count + ",event);' id='total_qntt_" + count + "' class='common_qnt total_qntt_" +
                    count + " form-control text-right'  placeholder='0.00' min='0' tabindex='" + tab3 + "'/></td><td><input type='text' readonly='readonly' name='product_rate[]' onkeyup='bdtask_invoice_quantitycalculate(" +
                    count + ",event);' onchange='bdtask_invoice_quantitycalculate(" + count + ",event);' id='price_item_" + count + "' class='common_rate price_item" +
                    count + " form-control text-right' required placeholder='0.00' min='0' /></td><td><input type='text' name='discount_type[]' onkeyup='bdtask_invoice_quantitycalculate(" +
                    count + ",event);'  id='discount_type_" + count + "' class='form-control'  tabindex='" + tab4 +
                    "' /></td><td><input type='text' class='form-control text-right common_discount'  tabindex='" + tab5 + "' placeholder='0.00' min='0' onkeyup='bdtask_invoice_quantitycalculate(" + count + ",event);'  value='' name='discount[]' id='discount_" + count + "'  ></td><td><input type='text' name='discountvalue[]'  id='discount_value_" + count +
                    "' class='form-control text-right common_discount' placeholder='0.00' min='0'  readonly /></td><td class='text-right'><input class='common_total_price total_price form-control text-right' type='text' name='total_price[]' id='total_price_" +
                    count + "' value='0.00' readonly='readonly'/></td>" + tbfild + "<input type='hidden' id='all_discount_" + count +
                    "' class='total_discount dppr' name='discount_amount[]'/><button  style='text-align: right;' class='btn btn-danger' type='button' value='Delete' onclick='deleteRow_invoice(this," + count + ")'><i class='fa fa-close'></i></button></td>",
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
            $('#barcodeInput').val("");

            var total = 0;
        }
    }

    function deleteRow_invoice(t, count) {
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
    // $('#add_item_m').keydown(function(e) {

    //     if (e.key == "Enter") {
    //         var tableBody = document.getElementById('normalinvoice').getElementsByTagName('tbody')[0];
    //         tableBody.innerHTML = '';
    //         var product_id = $(this).val();
    //         var invoice_edit_page = $("#invoice_edit_page").val();

    //         $.ajax({
    //             type: "post",
    //             async: false,
    //             url: $('#base_url').val() + 'invoice/invoice/invoice_setup',
    //             data: {
    //                 product_id: product_id,
    //                 csrf_test_name: invoice_edit_page
    //             },
    //             success: function(data) {
    //                 if (data != "") {
    //                     addinvoice('addinvoiceItem', JSON.parse(data));
    //                 }


    //             },
    //             error: function() {
    //                 alert('Request Failed, Please check your code and try again!');
    //             }
    //         });

    //     }
    // });


    function bdtask_invoice_quantitycalculate(item, e) {
        if (e.keyCode === 'Escape') {
            document.getElementById("searchInput").focus();

        } else
        if (e.key === 'Enter') {
            arrItem.push({
                invoiceId: item,
                productid: $("#product_id_" + item).val(),
                productname: $("#product_name_" + item).val(),
                sb: $("#searchInput_" + item).val(),
                empId: $("#employeeId_" + item).val(),
                commisionmode: commisionmode ? "yes" : "no",
                qty: $("#total_qntt_" + item).val(),
                rate: parseFloat($("#price_item_" + item).val()).toFixed(2),
                discount_type: $("#discount_type_" + item).val() === "Percentage" ? "P" : "A",
                discount: parseFloat($("#discount_" + item).val()).toFixed(2),
                discount_value: parseFloat($("#discount_value_" + item).val()).toFixed(2),
                total: parseFloat($("#total_price_" + item).val()).toFixed(2)

            });

            let element2 = document.getElementById("barcodeInput");
            element2.focus();
            element2.select();

            var tableBody = document.getElementById('normalinvoice').getElementsByTagName('tbody')[0];
            tableBody.innerHTML = '';
            updateTable(arrItem)
        } else {
            var quantity = $("#total_qntt_" + item).val();
            var price_item = $("#price_item_" + item).val();
            var invoice_discount = $("#invoice_discount").val();
            var discount = $("#discount_" + item).val();
            var total_discount = $("#total_discount_" + item).val();
            var dis_type = $("#discount_type_" + item).val();


            if (e.key === 'Tab') {
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
                    $("#discount_type_" + item).val("Percentage");

                    if (commisionmode) {
                        var temp = price + dis;
                        $("#total_price_" + item).val(temp);
                    } else {
                        var temp = price - dis;
                        $("#total_price_" + item).val(temp);
                    }



                } else if (dis_type === "Amount") {
                    var price = quantity * price_item;
                    var dis = discount;
                    $("#discount_value_" + item).val(dis);
                    $("#all_discount_" + item).val(dis);

                    if (commisionmode) {
                        if (mode == "-") {
                            var temp = parseFloat(price) - parseFloat(dis);
                            $("#total_price_" + item).val(temp);
                            $("#discount_type_" + item).val("Amount");
                        } else {
                            var temp = parseFloat(price) + parseFloat(dis);
                            $("#total_price_" + item).val(temp);
                            $("#discount_type_" + item).val("Amount");
                        }
                    } else {
                        if (mode == "-") {
                            var temp = parseFloat(price) + parseFloat(dis);
                            $("#total_price_" + item).val(temp);
                            $("#discount_type_" + item).val("Amount");
                        } else {
                            var temp = parseFloat(price) - parseFloat(dis);
                            $("#total_price_" + item).val(temp);
                            $("#discount_type_" + item).val("Amount");
                        }
                    }




                } else {
                    var total_price = quantity * price_item;
                    $("#total_price_" + item).val(total_price);
                }
            } else {
                var n = quantity * price_item;
                $("#total_price_" + item).val(n)
            }





            var invoice_edit_page = $("#invoice_edit_page").val();
            var preload_pay_view = $("#preload_pay_view").val();

            $("#add_new_payment").empty();

            $("#pay-amount").text('0');
            $("#dueAmmount").val(0);
        }
        if (mode === "-") {
            if ($("#total_qntt_" + item).val() === "")
                $("#total_qntt_" + item).val("-")
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

            // if (document.getElementById('employeeId_' + count).value != "") {
            //     arrItem.push({
            //         invoiceId: count,
            //         productid: $("#product_id_" + count).val(),
            //         productname: $("#product_name_" + count).val(),
            //         sb: $("#employeeId_" + count).val(),
            //         empId: $("#searchInput_" + count).val(),
            //         qty: $("#total_qntt_" + count).val(),
            //         rate: parseFloat($("#price_item_" + count).val()).toFixed(2),
            //         discount_type: $("#discount_type_" + count).val() === "Percentage" ? "P" : "A",
            //         discount: parseFloat($("#discount_" + count).val()).toFixed(2),
            //         discount_value: parseFloat($("#discount_value_" + count).val()).toFixed(2),
            //         total: parseFloat($("#total_price_" + count).val()).toFixed(2)

            //     });
            //     var tableBody = document.getElementById('normalinvoice').getElementsByTagName('tbody')[0];
            //     tableBody.innerHTML = '';
            //     updateTable(arrItem)

            // }
            // Select the highlighted item
            if (currentIndex >= 0 && currentIndex < results.length) {
                // Place the selected item in the input box
                document.getElementById('searchInput_' + count).value = results[currentIndex].first_name + " " + results[currentIndex].last_name;
                document.getElementById('searchInput_' + count).select()
                document.getElementById('employeeId_' + count).value = results[currentIndex].id;
                // Clear the search results
                clearResults(count);
            }
        } else if (event.key === "Backspace") {
            document.getElementById('employeeId_' + count).value = "";

        } else {
            // For other keys, just filter and show results
            currentIndex = -1;
            displayResults(results, count);

        }



    }

    function handleEmployeeEditKeyPress(event, count) {

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
        } else if (event.code === 'Space') {

            if (currentIndex >= 0 && currentIndex < results.length) {
                // Place the selected item in the input box
                document.getElementById('searchInput_' + count).value = results[currentIndex].first_name + " " + results[currentIndex].last_name;
                document.getElementById('searchInput_' + count).select()
                document.getElementById('employeeId_' + count).value = results[currentIndex].id;
                // Clear the search results
                clearResults(count);
            }
        } else if (event.key === 'Enter') {

            if (document.getElementById('employeeId_' + count).value != "") {
                let itemIndex = arrItem.findIndex(item => item.invoiceId == $("#invoiceId_100").val());
                if (itemIndex !== -1) {
                    arrItem[itemIndex].sb = document.getElementById('searchInput_' + count).value;
                    arrItem[itemIndex].empId = document.getElementById('employeeId_' + count).value;
                }
                var tableBody = document.getElementById('normalinvoice').getElementsByTagName('tbody')[0];
                tableBody.innerHTML = '';
                updateTable(arrItem);
                $("#editInvoiceModel").modal('hide');

            }
            // Select the highlighted item
            if (currentIndex >= 0 && currentIndex < results.length) {
                // Place the selected item in the input box
                document.getElementById('searchInput_' + count).value = results[currentIndex].first_name + " " + results[currentIndex].last_name;
                document.getElementById('searchInput_' + count).select()
                document.getElementById('employeeId_' + count).value = results[currentIndex].id;
                // Clear the search results
                clearResults(count);
            }
        } else if (event.key === "Backspace") {
            document.getElementById('employeeId_' + count).value = "";

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

        dataTable();
        dataTableForSale();


    });

    $('#btn-filter').click(function() {
        dataTable();

    });

    function dataTable() {
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
                'url': base_url + 'invoice/invoice/CheckInvoiceListemp',
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

    let invoice_ID = 0;

    function editInvoice(invoiceId, type) {
        $.ajax({
            type: "post",
            url: $('#base_url').val() + 'invoice/invoice/get_salesbyinvoiceidemp',
            data: {
                invoice_id: invoiceId,

            },
            success: function(data1) {
                datas = JSON.parse(data1);
                arrItem = datas;
                invoice_ID = datas[0].invoice_id

                updateTable(datas)
                $("#exampleModal").modal('hide');

            }
        });
    }


    $('#btn-gettotalsale').click(function() {
        dataTableForSale();

    });



    function dataTableForSale() {
        $('#InvListTotalSales').DataTable().destroy();
        var csrf_test_name = $('[name="csrf_test_name"]').val();
        var base_url = $('#base_url').val();
        var total_invoice = $("#total_invoice").val();
        var currency = $("#currency").val();


        return $.ajax({
            type: "POST",
            url: base_url + 'invoice/invoice/getInvoiceSummary', // Call to get summary
            data: {
                csrf_test_name: csrf_test_name,
                fromdate: $('#from_date1').val(),
                todate: $('#to_date1').val(),
            },
            success: function(summary) {
                var decodedSummary = JSON.parse(summary);
                var invoiceCount = decodedSummary.invoice_count || 0;
                var totalAmount = parseFloat(decodedSummary.total_amount) || 0.00;
                $('#InvListTotalSales').DataTable({
                    responsive: true,
                    data: [{
                        "total_invoice_count": invoiceCount,
                        "total_amount": totalAmount
                    }],
                    columns: [{
                            data: 'total_invoice_count',
                            render: function(data) {
                                return data;
                            }
                        },
                        {
                            data: 'total_amount',
                            class: "text-right",
                            render: $.fn.dataTable.render.number(',', '.', 2, currency) // Format the amount
                        }
                    ]
                });
            },
            error: function() {
                console.error('Could not fetch summary data.');
            }
        });

    }
    // }
</script>