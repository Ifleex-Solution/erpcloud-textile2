<div class="sidebar">
    <!-- Sidebar user panel -->

    <div class="user-panel text-center">
        <div class="image">
            <?php $image = $this->session->userdata('image') ?>
            <img src="<?php echo base_url((!empty($image) ? $image : 'assets/img/icons/default.jpg')) ?>" class="img-circle" alt="User Image">
        </div>
        <div class="info">
            <p><?php echo $this->session->userdata('fullname') ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i>
                <?php echo $this->session->userdata('user_level') ?></a>
        </div>
    </div>




    <!-- sidebar menu -->
    <ul class="sidebar-menu">

        <!-- Invoice menu start -->
        <?php if ($this->permission1->method('new_invoice', 'create')->access() || $this->permission1->method('manage_invoice', 'read')->access() || $this->permission1->method('pos_invoice', 'create')->access() || $this->permission1->method('gui_pos', 'create')->access() || $this->permission1->method('terms_list', 'read')->access()  || $this->permission1->method('terms_add', 'read')->access()) { ?>
            <li class="treeview <?php
                                if ($this->uri->segment('1') == ("add_invoice") || $this->uri->segment('1') == ("invoice_list") || $this->uri->segment('1') == ("pos_invoice") || $this->uri->segment('1') == ("gui_pos") || $this->uri->segment('1') == ("invoice_details") || $this->uri->segment('1') == ("invoice_pad_print") || $this->uri->segment('1') == ("pos_print") || $this->uri->segment('1') == ("invoice_edit") || $this->uri->segment('1') == ("terms_list")  || $this->uri->segment('1') == ("terms_add")) {
                                    echo "active";
                                } else {
                                    echo " ";
                                }
                                ?>">
                <a href="#">
                    <i class="fa fa-balance-scale"></i><span><?php echo display('invoice') ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <?php if ($this->permission1->method('new_invoice', 'create')->access()) { ?>
                        <li class="treeview <?php
                                            if ($this->uri->segment('1') == ("add_invoice")) {
                                                echo "active";
                                            } else {
                                                echo " ";
                                            }
                                            ?>"><a href="<?php echo base_url('add_invoice') ?>"><?php echo display('new_invoice') ?></a></li>
                    <?php } ?>
                   
                 
                </ul>
            </li>
        <?php } ?>

       

        <!-- product menu part -->
        <?php if ($this->permission1->method('create_product', 'create')->access() || $this->permission1->method('add_product_csv', 'create')->access() || $this->permission1->method('manage_product', 'read')->access() || $this->permission1->method('create_category', 'create')->access() || $this->permission1->method('manage_category', 'read')->access() || $this->permission1->method('add_unit', 'create')->access() || $this->permission1->method('manage_unit', 'read')->access()||$this->permission1->method('add_brancode', 'create')->access() || $this->permission1->method('add_floorwisecounter', 'create')->access()||$this->permission1->method('manage_floorwisecounter', 'read')->access() ||  $this->permission1->method('manage_brandcode', 'read')->access()||$this->permission1->method('add_countercode', 'create')->access() || $this->permission1->method('manage_countercode', 'read')->access()||$this->permission1->method('labelprint', 'read')->access()) { ?>
            <li class="treeview <?php echo (($this->uri->segment(1) == "category_form" || $this->uri->segment(1) == "category_list" || $this->uri->segment(1) == "brandcode_form" || $this->uri->segment(1) == "brandcode_list"||$this->uri->segment(1) == "countercode_form"||$this->uri->segment(1) == "floorwisecounter_form"||$this->uri->segment(1) == "labelprint" || $this->uri->segment(1) == "countercode_list"|| $this->uri->segment(1) == "floorwisecounter_list"  ||$this->uri->segment(1) == "unit_form" || $this->uri->segment(1) == "unit_list"  || $this->uri->segment(1) == "product_form" || $this->uri->segment(1) == "product_list" || $this->uri->segment(1) == "barcode" || $this->uri->segment(1) == "qrcode" || $this->uri->segment(1) == "bulk_products" || $this->uri->segment(1) == "product_details") ? "active" : '') ?>">

                <a href="javascript:void(0)">

                    <i class="metismenu-icon fa fa-cubes"></i> <span><?php echo display('product') ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">

                    <?php if ($this->permission1->method('category', 'create')->access()) { ?>
                        <li class="<?php echo (($this->uri->segment(1) == "category_form") ? "active" : '') ?>">
                            <a href="<?php echo base_url('category_form') ?>"> <?php echo display('add_category') ?>

                            </a>

                        </li>
                    <?php } ?>
                    <?php if ($this->permission1->method('manage_category', 'read')->access() || $this->permission1->method('manage_category', 'update')->access() || $this->permission1->method('manage_category', 'delete')->access()) { ?>
                        <li class="<?php echo (($this->uri->segment(1) == "category_list") ? "active" : '') ?>">
                            <a href="<?php echo base_url('category_list') ?>">

                                <?php echo display('category_list') ?>

                            </a>

                        </li>
                    <?php } ?>
                    <?php if ($this->permission1->method('countercode', 'create')->access() || $this->permission1->method('countercode', 'update')->access()) { ?>
                        <li class="<?php echo (($this->uri->segment(1) == "countercode_form") ? "active" : '') ?>">
                            <a href="<?php echo base_url('countercode_form') ?>">Add Countercode

                            </a>

                        </li>
                    <?php } ?>
                    <?php if ($this->permission1->method('manage_countercode', 'create')->access() || $this->permission1->method('manage_countercode', 'read')->access() || $this->permission1->method('manage_countercode', 'delete')->access() || $this->permission1->method('manage_countercode', 'update')->access()) { ?>
                        <li class="<?php echo (($this->uri->segment(1) == "countercode_list") ? "active" : '') ?>">
                            <a href="<?php echo base_url('countercode_list') ?>">

                                Countercode List

                            </a>

                        </li>
                    <?php } ?>
                    <?php if ($this->permission1->method('brandcode', 'create')->access() || $this->permission1->method('brandcode', 'update')->access()) { ?>
                        <li class="<?php echo (($this->uri->segment(1) == "brandcode_form") ? "active" : '') ?>">
                            <a href="<?php echo base_url('brandcode_form') ?>">Add Brandcode

                            </a>

                        </li>
                    <?php } ?>
                    <?php if ($this->permission1->method('manage_brandcode', 'create')->access() || $this->permission1->method('manage_brandcode', 'read')->access() || $this->permission1->method('manage_brandcode', 'delete')->access() || $this->permission1->method('manage_brandcode', 'update')->access()) { ?>
                        <li class="<?php echo (($this->uri->segment(1) == "brandcode_list") ? "active" : '') ?>">
                            <a href="<?php echo base_url('brandcode_list') ?>">

                                Brandcode List

                            </a>

                        </li>
                    <?php } ?>
                    <?php if ($this->permission1->method('floorwisecounter', 'create')->access() || $this->permission1->method('floorwisecounter', 'update')->access()) { ?>
                        <li class="<?php echo (($this->uri->segment(1) == "floorwisecounter_form") ? "active" : '') ?>">
                            <a href="<?php echo base_url('floorwisecounter_form') ?>">Add Floorwisecounter

                            </a>

                        </li>
                    <?php } ?>
                    <?php if ($this->permission1->method('manage_floorwisecounter', 'create')->access() || $this->permission1->method('manage_floorwisecounter', 'read')->access() || $this->permission1->method('manage_floorwisecounter', 'delete')->access() || $this->permission1->method('manage_floorwisecounter', 'update')->access()) { ?>
                        <li class="<?php echo (($this->uri->segment(1) == "floorwisecounter_list") ? "active" : '') ?>">
                            <a href="<?php echo base_url('floorwisecounter_list') ?>">

                            Floorwisecounter List

                            </a>

                        </li>
                    <?php } ?>
                    <?php if ($this->permission1->method('unit', 'create')->access() || $this->permission1->method('unit', 'update')->access()) { ?>
                        <li class="<?php echo (($this->uri->segment(1) == "unit_form") ? "active" : '') ?>">
                            <a href="<?php echo base_url('unit_form') ?>"> <?php echo display('add_unit') ?>

                            </a>

                        </li>
                    <?php } ?>
                    <?php if ($this->permission1->method('manage_unit', 'create')->access() || $this->permission1->method('manage_unit', 'read')->access() || $this->permission1->method('manage_unit', 'delete')->access() || $this->permission1->method('manage_unit', 'update')->access()) { ?>
                        <li class="<?php echo (($this->uri->segment(1) == "unit_list") ? "active" : '') ?>">
                            <a href="<?php echo base_url('unit_list') ?>">

                                <?php echo display('unit_list') ?>

                            </a>

                        </li>
                    <?php } ?>
                    <?php if ($this->permission1->method('create_product', 'create')->access()) { ?>
                        <li class="<?php echo (($this->uri->segment(1) == "product_form") ? "active" : '') ?>">
                            <a href="<?php echo base_url('product_form') ?>">

                                <?php echo display('add_product') ?>

                            </a>

                        </li>
                    <?php } ?>
                    <?php if ($this->permission1->method('add_product_csv', 'create')->access()) { ?>
                        <li class="<?php echo (($this->uri->segment(1) == "bulk_products") ? "active" : '') ?>">
                            <a href="<?php echo base_url('bulk_products') ?>">

                                <?php echo display('add_product_csv') ?>

                            </a>

                        </li>
                    <?php } ?>
                    <?php if ($this->permission1->method('manage_product', 'read')->access()) { ?>
                        <li class="<?php echo (($this->uri->segment(1) == "product_list") ? "active" : '') ?>">
                            <a href="<?php echo base_url('product_list') ?>">

                                <?php echo display('manage_product') ?>

                            </a>

                        </li>
                    <?php } ?>
                    <?php if ($this->permission1->method('labelprint', 'read')->access()) { ?>
                        <li class="<?php echo (($this->uri->segment(1) == "labelprint") ? "active" : '') ?>">
                            <a href="<?php echo base_url('labelprint') ?>">

                                <?php echo display('labelprint') ?>

                            </a>

                        </li>
                    <?php } ?>

                </ul>

            </li>
        <?php } ?>


     








        <!-- Report menu start -->
        <?php if ($this->permission1->method('add_closing', 'create')->access() || $this->permission1->method('closing_report', 'read')->access() || $this->permission1->method('todays_report', 'read')->access() || $this->permission1->method('todays_customer_receipt', 'read')->access() || $this->permission1->method('todays_sales_report', 'read')->access() || $this->permission1->method('cash_balance_report', 'read')->access() || $this->permission1->method('due_report', 'read')->access() || $this->permission1->method('todays_purchase_report', 'read')->access() || $this->permission1->method('purchase_report_category_wise', 'read')->access() || $this->permission1->method('product_sales_reports_date_wise', 'read')->access() || $this->permission1->method('sales_report_category_wise', 'read')->access() || $this->permission1->method('shipping_cost_report', 'read')->access()) { ?>
            <li class="treeview <?php
                                if ($this->uri->segment('1') == ("closing_form") || $this->uri->segment('1') == ("closing_report") || $this->uri->segment('1') == ("closing_report_search") || $this->uri->segment('1') == ("todays_report") || $this->uri->segment('1') == ("todays_customer_received") || $this->uri->segment('1') == ("cash_balance_report")  || $this->uri->segment('1') == ("todays_customerwise_received") || $this->uri->segment('1') == ("sales_report") || $this->uri->segment('1') == ("datewise_sales_report") || $this->uri->segment('1') == ("userwise_sales_report") || $this->uri->segment('1') == ("invoice_wise_due_report") || $this->uri->segment('1') == ("shipping_cost_report") || $this->uri->segment('1') == ("purchase_report") || $this->uri->segment('1') == ("purchase_report_categorywise") || $this->uri->segment('1') == ("product_wise_sales_report") || $this->uri->segment('1') == ("category_sales_report") || $this->uri->segment('1') == ("sales_return") || $this->uri->segment('1') == ("supplier_returns") || $this->uri->segment('1') == ("tax_report") || $this->uri->segment('1') == ("profit_report")||$this->uri->segment('1') == ("employee_wise_report")) {
                                    echo "active";
                                } else {
                                    echo " ";
                                }
                                ?>">
                <a href="#">
                    <i class="ti-book"></i><span><?php echo display('report') ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                  
                    <?php if ($this->permission1->method('todays_sales_report', 'read')->access()) { ?>
                        <li class="treeview <?php if ($this->uri->segment('1') == ("sales_report")) {
                                                echo "active";
                                            } else {
                                                echo " ";
                                            } ?>"><a href="<?php echo base_url('sales_report') ?>"><?php echo display('sales_report') ?></a>
                        </li>
                    <?php } ?>
                   
                    <?php if ($this->permission1->method('sales_report_category_wise', 'read')->access()) { ?>
                        <li class="treeview <?php if ($this->uri->segment('1') == ("category_sales_report")) {
                                                echo "active";
                                            } else {
                                                echo " ";
                                            } ?>"><a href="<?php echo base_url('category_sales_report') ?>"><?php echo display('sales_report_category_wise') ?></a>
                        </li>
                    <?php } ?>
                    <?php if ($this->permission1->method('sales_report_employee_wise', 'read')->access()) { ?>
                        <li class="treeview <?php if ($this->uri->segment('1') == ("employee_wise_report")) {
                                                echo "active";
                                            } else {
                                                echo " ";
                                            } ?>"><a href="<?php echo base_url('employee_wise_report') ?>"><?php echo display('sales_report_employee_wise') ?></a>
                        </li>
                    <?php } ?>

                    <?php if ($this->permission1->method('cash_balance_report', 'read')->access()) { ?>
                        <li class="treeview <?php if ($this->uri->segment('1') == ("cash_balance_report")) {
                                                echo "active";
                                            } else {
                                                echo " ";
                                            } ?>"><a href="<?php echo base_url('cash_balance_report') ?>"><?php echo display('cash_balance_report') ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </li>
        <?php } ?>
        <!-- Report menu end -->
        <!-- human resource management menu start -->
        <?php if ($this->permission1->method('add_designation', 'create')->access() || $this->permission1->method('manage_designation', 'read')->access() || $this->permission1->method('employee_salary_generate', 'read')->access() || $this->permission1->method('salary_advance_view', 'read')->access() || $this->permission1->method('add_employee', 'create')->access() || $this->permission1->method('manage_employee', 'read')->access() || $this->permission1->method('add_person', 'create')->access() || $this->permission1->method('add_loan', 'create')->access() || $this->permission1->method('add_payment', 'create')->access() || $this->permission1->method('manage_person', 'read')->access() || $this->permission1->method('add_attendance', 'create')->access() || $this->permission1->method('manage_attendance', 'read')->access() || $this->permission1->method('attendance_report', 'read')->access() || $this->permission1->method('add_benefits', 'create')->access() || $this->permission1->method('manage_benefits', 'read')->access() || $this->permission1->method('add_salary_setup', 'create')->access() || $this->permission1->method('manage_salary_setup', 'read')->access() || $this->permission1->method('salary_generate', 'create')->access() || $this->permission1->method('manage_salary_generate', 'read')->access() || $this->permission1->method('salary_payment', 'create')->access() || $this->permission1->method('add_expense_item', 'create')->access() || $this->permission1->method('manage_expense_item', 'read')->access() || $this->permission1->method('add_expense', 'create')->access() || $this->permission1->method('manage_expense', 'read')->access() || $this->permission1->method('add_ofloan_person', 'create')->access() || $this->permission1->method('add_office_loan', 'create')->access() || $this->permission1->method('add_loan_payment', 'create')->access() || $this->permission1->method('manage_ofln_person', 'read')->access()) { ?>
            <!-- Supplier menu start -->
            <li class="treeview <?php
                                if ($this->uri->segment('1') == ("designation_form") || $this->uri->segment('1') == ("designation_list") || $this->uri->segment('1') == ("salary_advance_view") || $this->uri->segment('1') == ("salary_pay_slip") || $this->uri->segment('1') == ("employee_salary_chart") || $this->uri->segment('1') == ("manage_salary_advance") || $this->uri->segment('1') == ("employee_salary_approval") || $this->uri->segment('1') == ("employee_form") || $this->uri->segment('1') == ("employee_salary_generate") || $this->uri->segment('1') == ("employee_list") || $this->uri->segment('1') == ("add_attendance") || $this->uri->segment('1') == ("attendance_list") || $this->uri->segment('1') == ("attendance_report") || $this->uri->segment('1') == ("add_beneficials") || $this->uri->segment('1') == ("manage_benefits") || $this->uri->segment('1') == ("salary_setup") || $this->uri->segment('1') == ("manage_salary_setup") || $this->uri->segment('1') == ("salary_generate") || $this->uri->segment('1') == ("manage_salary_generate") || $this->uri->segment('1') == ("salary_payment") || $this->uri->segment('1') == ("employee_salary_payment_view") || $this->uri->segment('1') == ("add_expense_item") || $this->uri->segment('1') == ("manage_expense_item") || $this->uri->segment('1') == ("add_expense") || $this->uri->segment('1') == ("manage_expense") || $this->uri->segment('1') == ("expense_statement") || $this->uri->segment('1') == ("add_officeloan_person") || $this->uri->segment('1') == ("add_office_loan") || $this->uri->segment('1') == ("add_office_loan_payment") || $this->uri->segment('1') == ("manage_office_loan_person") || $this->uri->segment('1') == ("office_loan_person_ledger") || $this->uri->segment('1') == ("office_loan_person_ledgerdata") || $this->uri->segment('1') == ("edit_office_loan_person") || $this->uri->segment('1') == ("add_person") || $this->uri->segment('1') == ("add_loan") || $this->uri->segment('1') == ("add_payment") || $this->uri->segment('1') == ("manage_person") || $this->uri->segment('1') == ("personal_loan_edit") || $this->uri->segment('1') == ("person_ledger") || $this->uri->segment('1') == ("personal_loan_summary") || $this->uri->segment('1') == ("payslip") || $this->uri->segment('1') == ("edit_attendance")) {
                                    echo "active";
                                } else {
                                    echo " ";
                                }
                                ?>">
                <a href="#">
                    <i class="fa fa-users"></i><span><?php echo display('hrm_management') ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <?php if ($this->permission1->method('add_designation', 'create')->access() || $this->permission1->method('manage_designation', 'read')->access()  || $this->permission1->method('add_employee', 'create')->access() || $this->permission1->method('manage_employee', 'read')->access()) { ?>
                        <!-- Supplier menu start -->
                        <li class="treeview <?php
                                            if ($this->uri->segment('1') == ("designation_form") || $this->uri->segment('1') == ("designation_list") ||  $this->uri->segment('1') == ("employee_form") || $this->uri->segment('1') == ("employee_list")) {
                                                echo "active";
                                            } else {
                                                echo " ";
                                            }
                                            ?>">
                            <a href="#">
                                <i class="fa fa-users"></i><span><?php echo display('hrm') ?></span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <?php if ($this->permission1->method('add_designation', 'create')->access()) { ?>
                                    <li class="treeview <?php if ($this->uri->segment('1') == ("designation_form")) {
                                                            echo "active";
                                                        } else {
                                                            echo " ";
                                                        } ?>"><a href="<?php echo base_url('designation_form') ?>"><?php echo display('add_designation') ?></a>
                                    </li>
                                <?php } ?>
                                <?php if ($this->permission1->method('manage_designation', 'read')->access()) { ?>
                                    <li class="treeview <?php if ($this->uri->segment('1') == ("designation_list")) {
                                                            echo "active";
                                                        } else {
                                                            echo " ";
                                                        } ?>"><a href="<?php echo base_url('designation_list') ?>"><?php echo display('manage_designation') ?></a>
                                    </li>
                                <?php } ?>
                                <?php if ($this->permission1->method('add_employee', 'create')->access()) { ?>
                                    <li class="treeview <?php if ($this->uri->segment('1') == ("employee_form")) {
                                                            echo "active";
                                                        } else {
                                                            echo " ";
                                                        } ?>"><a href="<?php echo base_url('employee_form') ?>"><?php echo display('add_employee') ?></a>
                                    </li>
                                <?php } ?>
                                <?php if ($this->permission1->method('manage_employee', 'read')->access()) { ?>
                                    <li class="treeview <?php if ($this->uri->segment('1') == ("employee_list")) {
                                                            echo "active";
                                                        } else {
                                                            echo " ";
                                                        } ?>"><a href="<?php echo base_url('employee_list') ?>"><?php echo display('manage_employee') ?></a>
                                    </li>
                                <?php } ?>

                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            </li>
        <?php } ?>
        <!-- Human resource management menu end -->

       


        <!-- Software Settings menu start -->
        <?php if ($this->permission1->method('manage_company', 'read')->access() || $this->permission1->method('manage_company', 'create')->access() || $this->permission1->method('add_user', 'create')->access() || $this->permission1->method('add_user', 'read')->access() || $this->permission1->method('add_language', 'create')->access() || $this->permission1->method('add_currency', 'create')->access() || $this->permission1->method('soft_setting', 'create')->access() || $this->permission1->method('add_role', 'create')->access() || $this->permission1->method('role_list', 'read')->access() || $this->permission1->method('user_assign', 'create')->access() || $this->permission1->method('sms_configure', 'create')->access()) { ?>
            <li class="treeview <?php
                                if ($this->uri->segment('1') == ("company_list") || $this->uri->segment('1') == ("edit_company") || $this->uri->segment('1') == ("add_user") || $this->uri->segment('1') == ("user_list") || $this->uri->segment('1') == ("language") || $this->uri->segment('1') == ("currency_form") || $this->uri->segment('1') == ("currency_list") || $this->uri->segment('1') == ("settings") || $this->uri->segment('1') == ("mail_setting") || $this->uri->segment('1') == ("app_setting") || $this->uri->segment('1') == ("add_role") || $this->uri->segment('1') == ("role_list") || $this->uri->segment('1') == ("edit_role") || $this->uri->segment('1') == ("assign_role") || $this->uri->segment('1') == ("sms_setting") || $this->uri->segment('1') == ("restore") || $this->uri->segment('1') == ("db_import") || $this->uri->segment('1') == ("editPhrase") || $this->uri->segment('1') == ("phrases")) {
                                    echo "active";
                                } else {
                                    echo " ";
                                }
                                ?>">
                <a href="#">
                    <i class="ti-settings"></i><span><?php echo display('settings') ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <!-- Software Settings menu start -->
                    <?php if ($this->permission1->method('manage_company', 'read')->access() || $this->permission1->method('manage_company', 'create')->access() || $this->permission1->method('add_user', 'create')->access() || $this->permission1->method('manage_user', 'read')->access() || $this->permission1->method('add_language', 'create')->access() || $this->permission1->method('add_currency', 'create')->access() || $this->permission1->method('soft_setting', 'create')->access() || $this->permission1->method('back_up', 'create')->access() || $this->permission1->method('back_up', 'read')->access() || $this->permission1->method('restore', 'create')->access() || $this->permission1->method('sql_import', 'create')->access()) { ?>
                        <li class="treeview <?php
                                            if ($this->uri->segment('1') == ("company_list") || $this->uri->segment('1') == ("edit_company") || $this->uri->segment('1') == ("add_user") || $this->uri->segment('1') == ("user_list") || $this->uri->segment('1') == ("language") || $this->uri->segment('1') == ("currency_form") || $this->uri->segment('1') == ("currency_list") || $this->uri->segment('1') == ("settings") || $this->uri->segment('1') == ("mail_setting") || $this->uri->segment('1') == ("app_setting") || $this->uri->segment('1') == ("editPhrase") || $this->uri->segment('1') == ("phrases")) {
                                                echo "active";
                                            } else {
                                                echo " ";
                                            }
                                            ?>">
                            <a href="#">
                                <i class="ti-settings"></i> <span><?php echo display('web_settings') ?></span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <?php if ($this->permission1->method('manage_company', 'read')->access() || $this->permission1->method('manage_company', 'update')->access()) { ?>
                                    <li class="treeview <?php if ($this->uri->segment('1') == ("company_list")) {
                                                            echo "active";
                                                        } else {
                                                            echo " ";
                                                        } ?>"><a href="<?php echo base_url('company_list') ?>"><?php echo display('manage_company') ?></a>
                                    </li>
                                <?php } ?>
                                <?php if ($this->permission1->method('add_user', 'create')->access()) { ?>
                                    <li class="treeview <?php if ($this->uri->segment('1') == ("add_user")) {
                                                            echo "active";
                                                        } else {
                                                            echo " ";
                                                        } ?>"><a href="<?php echo base_url('add_user') ?>"><?php echo display('add_user') ?></a></li>
                                <?php } ?>
                                <?php if ($this->permission1->method('manage_user', 'read')->access()) { ?>
                                    <li class="treeview <?php if ($this->uri->segment('1') == ("user_list")) {
                                                            echo "active";
                                                        } else {
                                                            echo " ";
                                                        } ?>"><a href="<?php echo base_url('user_list') ?>"><?php echo display('manage_users') ?> </a></li>
                                <?php } ?>
                                <?php if ($this->permission1->method('add_language', 'create')->access() || $this->permission1->method('add_language', 'update')->access()) { ?>
                                    <li class="<?php echo (($this->uri->segment(1) == "language" || $this->uri->segment('1') == ("editPhrase") || $this->uri->segment('1') == ("phrases")) ? "active" : '') ?>">
                                        <a href="<?php echo base_url('language') ?>">

                                            <?php echo display('language') ?>

                                        </a>

                                    </li>
                                <?php } ?>
                                <?php if ($this->permission1->method('add_currency', 'create')->access()) { ?>
                                    <li class="treeview <?php if ($this->uri->segment('1') == ("currency_form")) {
                                                            echo "active";
                                                        } else {
                                                            echo " ";
                                                        } ?>"><a href="<?php echo base_url('currency_form') ?>"><?php echo display('currency') ?> </a></li>
                                <?php } ?>
                                <?php if ($this->permission1->method('soft_setting', 'create')->access() || $this->permission1->method('soft_setting', 'update')->access()) { ?>
                                    <li class="treeview <?php if ($this->uri->segment('1') == ("settings")) {
                                                            echo "active";
                                                        } else {
                                                            echo " ";
                                                        } ?>">
                                        <a href="<?php echo base_url('settings') ?>" class="<?php echo (($this->uri->segment(1) == "settings") ? "active" : null) ?>">

                                            <?php echo display('settings') ?>

                                        </a>

                                    </li>
                                <?php } ?>
                                <?php if ($this->permission1->method('print_setting', 'create')->access()) { ?>
                                    <li class="treeview <?php if ($this->uri->segment('1') == ("print_setting")) {
                                                            echo "active";
                                                        } else {
                                                            echo " ";
                                                        } ?>"><a href="<?php echo base_url('print_setting') ?>"><?php echo display('print_setting') ?> </a>
                                    </li>
                                <?php } ?>
                                <?php if ($this->permission1->method('mail_setting', 'create')->access()) { ?>
                                    <li class="treeview <?php if ($this->uri->segment('1') == ("mail_setting")) {
                                                            echo "active";
                                                        } else {
                                                            echo " ";
                                                        } ?>"><a href="<?php echo base_url('mail_setting') ?>"><?php echo display('mail_setting') ?> </a>
                                    </li>
                                <?php } ?>
                                <li class="treeview <?php if ($this->uri->segment('1') == "app_setting") {
                                                        echo "active";
                                                    } else {
                                                        echo " ";
                                                    } ?>"><a href="<?php echo base_url('app_setting') ?>"><?php echo display('app_setting') ?> </a></li>
                            </ul>
                        </li>
                    <?php } ?>
                    <!-- Role permission start -->
                    <?php if ($this->permission1->method('add_role', 'create')->access() || $this->permission1->method('role_list', 'read')->access() || $this->permission1->method('edit_role', 'create')->access() || $this->permission1->method('assign_role', 'create')->access()) { ?>
                        <li class="treeview <?php
                                            if ($this->uri->segment('1') == ("add_role") || $this->uri->segment('1') == ("role_list") || $this->uri->segment('1') == ("edit_role") || $this->uri->segment('1') == ("assign_role")) {
                                                echo "active";
                                            } else {
                                                echo " ";
                                            }
                                            ?>">
                            <a href="#">
                                <i class="ti-key"></i> <span><?php echo display('role_permission') ?></span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">

                                <?php if ($this->permission1->method('add_role', 'create')->access()) { ?>
                                    <li class="treeview <?php if ($this->uri->segment('1') == ("add_role")) {
                                                            echo "active";
                                                        } else {
                                                            echo " ";
                                                        } ?>"><a href="<?php echo base_url('add_role') ?>"><?php echo display('add_role') ?></a></li>
                                <?php } ?>
                                <?php if ($this->permission1->method('role_list', 'read')->access()) { ?>
                                    <li class="treeview <?php if ($this->uri->segment('1') == ("role_list")) {
                                                            echo "active";
                                                        } else {
                                                            echo " ";
                                                        } ?>"><a href="<?php echo base_url('role_list') ?>"><?php echo display('role_list') ?></a></li>
                                <?php } ?>
                                <?php if ($this->permission1->method('user_assign', 'create')->access()) { ?>
                                    <li class="treeview <?php if ($this->uri->segment('1') == ("assign_role")) {
                                                            echo "active";
                                                        } else {
                                                            echo " ";
                                                        } ?>"><a href="<?php echo base_url('assign_role') ?>"><?php echo display('user_assign_role') ?></a>
                                    </li>
                                <?php } ?>


                            </ul>
                        </li>
                    <?php } ?>
                    <!-- Role permission End -->

                    <!-- sms menu end -->
                    <!-- Synchronizer setting start -->
                    <?php if ($this->permission1->method('restore', 'create')->access() || $this->permission1->method('sql_import', 'create')->access() || $this->permission1->method('sql_import', 'create')->access()) { ?>
                        <li class="treeview <?php
                                            if ($this->uri->segment('1') == ("restore") || $this->uri->segment('1') == ("db_import")) {
                                                echo "active";
                                            } else {
                                                echo " ";
                                            }
                                            ?>">
                            <a href="#">
                                <i class="ti-reload"></i> <span><?php echo display('data_synchronizer') ?></span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">

                                <?php if ($this->permission1->method('restore', 'create')->access()) { ?>
                                    <li class="treeview <?php if ($this->uri->segment('1') == ("restore")) {
                                                            echo "active";
                                                        } else {
                                                            echo " ";
                                                        } ?>"><a href="<?php echo base_url('restore') ?>"><?php echo display('restore') ?></a></li>
                                <?php } ?>
                                <?php if ($this->permission1->method('sql_import', 'create')->access()) { ?>
                                    <li class="treeview <?php if ($this->uri->segment('1') == ("db_import")) {
                                                            echo "active";
                                                        } else {
                                                            echo " ";
                                                        } ?>"><a href="<?php echo base_url('db_import') ?>"><?php echo display('import') ?></a></li>
                                <?php } ?>

                                <li class="treeview <?php if ($this->uri->segment('2') == ("backup_create")) {
                                                        echo "active";
                                                    } else {
                                                        echo " ";
                                                    } ?>"><a href="<?php echo base_url('dashboard/backup_restore/download_backup') ?>"><?php echo display('backup') ?></a>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>
                    <!-- Synchronizer setting end -->

                </ul>
            </li>
        <?php } ?>
        <!-- Software Settings menu end -->
        <!-- custom menu start-->

        



    </ul>
</div> <!-- /.sidebar -->