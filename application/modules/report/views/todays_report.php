<!-- Todays sales report -->
<style>
    input[type="password"]::-ms-reveal,
    input[type="password"]::-ms-clear {
        display: none;
    }
</style>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <span><?php echo display('todays_sales_report') ?> </span>
                    <span class="padding-lefttitle">
                        <?php if ($this->permission1->method('todays_sales_report', 'read')->access()) { ?>
                            <a href="<?php echo base_url('sales_report') ?>" class="btn btn-info m-b-5 m-r-2"><i
                                    class="ti-align-justify"> </i> <?php echo display('sales_report') ?> </a>
                        <?php } ?>

                        <?php if ($this->permission1->method('product_sales_reports_date_wise', 'read')->access()) { ?>
                            <a href="<?php echo base_url('product_wise_sales_report') ?>"
                                class="btn btn-primary m-b-5 m-r-2"><i class="ti-align-justify"> </i>
                                <?php echo display('sales_report_product_wise') ?> </a>

                        <?php } ?>



                        <a class="btn btn-success m-b-5 m-r-2" href="#"
                            onclick="printDiv('printableArea')"><?php echo display('print') ?></a>
                    </span>
                </div>
            </div>
            <?php if ($this->permission1->method('manage_invoice', 'view')->access()) { ?>

                <div class="form-inline">
                    EmpId
                    <input type="password" tabindex="4" class="form-control" name="empid" id="empid" autocomplete="new-password" width="200">
                    <button type="button" id="btn-filter" class="btn btn-success ml-2"><?php echo display('find') ?></button>
                </div>
            <?php } ?>

            <?php if (!$this->permission1->method('manage_invoice', 'view')->access()) { ?>
                <input type="hidden" tabindex="4" class="form-control" name="empid" id="empid" value="123">
            <?php } ?>

            <div class="panel-body">
                <div id="printableArea">
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
                                    <strong><?php echo display('todays_sales_report') ?></strong>

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
                        <table class="table  table-striped table-bordered" cellspacing="0" width="100%" id="reportlist">
                            <thead>
                                <tr>
                                    <th><?php echo display('sales_date') ?></th>
                                    <th><?php echo display('invoice_no') ?></th>
                                    <th class="text-right"><?php echo display('total_amount') ?></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <th colspan="2" class="text-right"><?php echo display('total_sales') ?>:</th>
                                <th></th>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<input type="hidden" id="today" value="<?php echo date("Y-m-d"); ?>">

<script src="<?php echo base_url('my-assets/js/admin_js/today_report.js') ?>" type="text/javascript"></script>