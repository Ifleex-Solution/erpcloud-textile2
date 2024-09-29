
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd">
            <div id="printableArea" onload="printDiv('printableArea')">
                <div class="panel-body print-font-size">
                    <div class="row print_header">

                        <div class="col-xs-4">
                            <?php foreach($company_info as $company){?>
                            <img style="width: 210px; height:79px;" src="<?php
                                    if (isset($setting->invoice_logo)) {
                                        echo base_url().$setting->invoice_logo;
                                    }
                                    ?>" class="img-bottom-m print-logo invoice-img-position" alt=""
                                >
                            <br>
                            <span
                                class="label label-success-outline m-r-15 p-10"><?php echo "Delivery From" ?></span>
                            <address class="margin-top10">
                                <strong class=""><?php echo $company['company_name']?></strong><br>
                                <span class="comp-web"><?php echo $company['address']?></span><br>
                                <abbr class="font-bold"><?php echo display('mobile') ?>: </abbr>
                                <?php echo $company['mobile']?><br>
                                <abbr><b><?php echo display('email') ?>:</b></abbr>
                                <?php echo $company['email']?><br>
                                <abbr><b><?php echo display('website') ?>:</b></abbr>
                                <span class="comp-web"><?php echo $company['website']?></span><br>
                                <?php if (!empty($company['vat_no'])) {?>
                                <abbr class="font-bold"><?php echo display('vat_no') ?>: </abbr>
                                <?php echo $company['vat_no']?><br>
                                <?php }?>
                                <?php if (!empty($company['cr_no'])) {?>
                                <abbr class="font-bold"><?php echo display('cr_no') ?>: </abbr>
                                <?php echo $company['cr_no']?><br>
                                <?php }?>
                                <?php }?>
                                <abbr><?php echo $tax_regno?></abbr>
                            </address>



                        </div>
                        <div class="col-xs-4">
                            <?php $web_setting = $this->db->select("*")->from("web_setting")->get()->row();
                            if ($web_setting->is_qr == 1) { ?>
                            <div class="print-qr">
                              
                                <img src="http://chart.apis.google.com/chart?cht=qr&chs=250x250&chld=L|4&chl=<?php echo $text?>"
                                    alt="">
                            </div>
                            <?php }?>
                        </div>

                        <div class="col-xs-4 text-left ">
                            <h2 class="m-t-0"><?php echo display('delivery_note') ?></h2>
                            <?php if ($invoice_all_data[0]['delivery_note']) { ?>
                                <?php echo $invoice_all_data[0]['delivery_note'];?>
                                
                                <?php } ?>
                            <div>
                                <abbr class="font-bold">
                                    <?php echo display('invoice_no') ?>: <span dir="ltr"></span>
                                </abbr>
                                <?php echo $invoice_no?>
                            </div>
                            <div class="m-b-15">
                                <abbr class="font-bold"><?php echo display('billing_date') ?></abbr>
                                <?php echo date("d-M-Y",strtotime($final_date));?>
                                <br>

                                <?php $create_at = $this->db->select('CreateDate')->from('acc_transaction')->where('VNo',$invoice_id)->get()->row();?>
                                <abbr class="font-bold"><?php echo display('invoice_time') ?>:</abbr>
                                <?php echo date("H:i:s",strtotime($create_at->CreateDate));?>
                            </div>

                            <span class="label label-success-outline m-r-15"><?php echo  "Delivery To" ?></span>

                            
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped print-font-size">
                            <thead>
                                <tr>
                                    <th width="8%" class="text-center"><?php echo display('sl') ?></th>
                                    <th width="50%" class="text-center"><?php echo display('product_name') ?></th>
                                    <th class="text-center">
                                        <?php if($is_unit !=0){ echo display('unit');
                                              }?></th>
                                    
                                    <th class="text-right"><?php echo display('quantity') ?></th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                 $itemprice = 0;
                                foreach($invoice_all_data as $details){?>
                                <tr>
                                    <td class="text-center"><?php echo $details['sl']?></td>
                                    <td class="text-center">
                                        <div><span class="comp-web"><?php echo $details['product_name']?> -
                                                (<?php echo $details['product_model']?>)</span></div>
                                    </td>
                                    <td class="text-center comp-web">
                                        <div><?php echo $details['unit']?></div>
                                    </td>
                                    
                                    <td align="right" class="comp-web"><?php echo $details['quantity']?></td>

                                    
                                    
                                </tr>
                                <?php }?>
                                
                            </tbody>

                        </table>
                    </div>
                    <div class="row">

                        <div class="col-xs-6">

                            <p></p>
                            

                        </div>
                        <div class="col-xs-6 inline-block">

                            <table class="table print-font-size">
                                
                            </table>

                        </div>
                    </div>
                    <div class="row margin-top50">
                        <div class="col-sm-4">
                            <div class="inv-footer-left">
                                <?php echo display('received_by') ?>
                            </div>
                        </div>
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <div class="inv-footer-right">
                                <?php echo display('authorised_by') ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="panel-footer text-left">
                        <button class="btn btn-info" onclick="printDivnew('printableArea')"><span
                        class="fa fa-print"></span></button>

            </div>
        </div>
    </div>
</div>

