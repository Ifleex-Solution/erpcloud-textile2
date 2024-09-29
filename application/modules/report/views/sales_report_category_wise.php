
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <?php echo form_open('category_sales_report', array('class' => 'form-inline', 'method' => 'get')) ?>
                <div class="form-group ml-3">
                    <label for="product"><?php echo display('category') ?></label>
                    <select name="category" class="form-control" id="category">
                        <option value="">--select one -- </option>
                        <?php
                        foreach ($category_list as $category) {
                        ?>
                            <option value="<?php echo $category['category_id']; ?>" <?php if ($category['category_id'] == $category_id) {
                                                                                        echo 'selected';
                                                                                    } ?>><?php echo $category['category_name']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group ml-3">
                    <label for="from_date"><?php echo display('start_date') ?></label>
                    <input type="text" name="from_date" class="form-control datepicker ml-2" id="from_date"
                        placeholder="<?php echo display('start_date') ?>" value="<?php echo $from ?>">
                </div>

                <div class="form-group ml-3">
                    <label for="to_date"><?php echo display('end_date') ?></label>
                    <input type="text" name="to_date" class="form-control datepicker ml-2" id="to_date"
                        placeholder="<?php echo display('end_date') ?>" value="<?php echo $to ?>">
                </div>

                <div class="form-group ml-3">
                    <?php if ($this->permission1->method('sales_report_product_wise', 'view')->access()) { ?>
                        <label for="empid">Emp Id</label>
                        <input type="password" tabindex="4" class="form-control ml-2" name="empid" id="empid" autocomplete="new-password">
                    <?php } else { ?>
                        <input type="hidden" tabindex="4" class="form-control" name="empid" id="empid" value="123">
                    <?php } ?>
                </div>

                <div class="form-group ml-3">
                    <button type="submit" class="btn btn-success"><?php echo display('search') ?></button>
                    <a class="btn btn-warning ml-2" href="#"
                        onclick="printDiv('purchase_div')"><?php echo display('print') ?></a>
                </div>

                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <span><?php echo display('category_wise_sales_report') ?> </span>
                    <span class="padding-lefttitle">
                        <?php if ($this->permission1->method('all_report', 'read')->access()) { ?>
                            <a class="btn btn-success m-b-5 m-r-2" href="<?php echo base_url('Admin_dashboard/all_report') ?>"><?php echo display('todays_report') ?></a>
                        <?php } ?>
                        <?php if ($this->permission1->method('product_sales_reports_date_wise', 'read')->access()) { ?>
                            <a href="<?php echo base_url('product_wise_sales_report') ?>" class="btn btn-primary m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo display('sales_report_product_wise') ?> </a>
                        <?php } ?>

                    </span>
                </div>
            </div>
            <div class="panel-body">
                <div id="purchase_div">
                    <div class="paddin5ps">
                        <table class="print-table" width="100%">

                            <tr>
                                <td align="left" class="print-table-tr">
                                    <img style="width: 210px; height:79px;" src="<?php echo base_url() . $setting->invoice_logo; ?>" alt="logo">
                                </td>
                                <td align="center" class="print-cominfo">
                                    <span class="company-txt">
                                        <?php echo $company_info[0]['company_name']; ?>

                                    </span><br>
                                    <?php echo $company_info[0]['address']; ?>
                                    <br>
                                    <?php echo $company_info[0]['email']; ?>
                                    <br>
                                    <?php echo $company_info[0]['mobile']; ?>
                                    <br>
                                    <strong><?php echo display('category_wise_sales_report') ?></strong>
                                </td>

                                <td align="right" class="print-table-tr">
                                    <date>
                                        <?php echo display('date') ?>: <?php
                                                                        echo date('d-M-Y');
                                                                        ?>
                                    </date>

                                </td>
                            </tr>

                        </table>
                    </div>
                    <div class="table-responsive paddin5ps">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th><?php echo display('category_name') ?></th>
                                    <th><?php echo display('product_name') ?></th>
                                    <th><?php echo display('model') ?></th>
                                    <th><?php echo display('date') ?></th>
                                    <th>Invoice Type</th>

                                    <th><?php echo display('quantity') ?></th>
                                    <th><?php echo display('amount') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total = 0;
                                if ($sales_report_category_wise) {
                                    foreach ($sales_report_category_wise as $single) {
                                ?>
                                        <tr>
                                            <td><?php echo html_escape($single->category_name); ?></td>
                                            <td><?php echo html_escape($single->product_name); ?></td>
                                            <td><?php echo html_escape($single->product_model); ?></td>
                                            <td><?php echo html_escape($single->date); ?></td>

                                            <td><?php echo html_escape($single->invoiceType); ?></td>

                                            <td><?php echo html_escape($single->quantity); ?></td>
                                            <td class="text-right">
                                                <?php echo (($position == 0) ? $currency . ' ' . number_format($single->total_price, 2) : number_format($single->total_price, 2) . ' ' . $currency);
                                                $total += $single->total_price;
                                                ?>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <th class="text-center" colspan="7"><?php echo display('not_found'); ?></th>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6" class="text-right"><b><?php echo display('total') ?></b></td>
                                    <td class="text-right"><b>
                                            <?php echo (($position == 0) ? $currency . ' ' . number_format($total, 2) : number_format($total, 2) . ' ' . $currency) ?>
                                        </b></td>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    if (window.history && window.history.pushState) {
        window.history.pushState({}, document.title, '/erpcloud-textile/sales_report_category_wise');
    }
</script>