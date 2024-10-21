<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
        
            </div>
            <?php echo form_open_multipart('Cproduct/insert_product') ?>
            <div class="panel-body">


                <div class="table-responsive">
                    <?php
                    $cqty =  (int)$_SESSION['cqty'];
                    ?>
                    <div id="printableArea">
                        <div class="paddin5ps">
                            <table id="" class="table-bordered">
                                <?php
                                $counter = 0;
                                foreach ($_SESSION['barcodelabels'] as $label) {
                                    $noOfLabel = (int)$label['noOfLabel'];

                                    for ($i = 0; $i < $noOfLabel; $i++) {
                                ?>
                                        <?php if ($counter ==  $cqty) { ?>
                                            <tr>
                                                <?php $counter = 0; ?>
                                            <?php } ?>
                                            <td class="barcode-toptd">

                                                <div class="barcode-inner barcode-innerdiv">
                                                    <div class="product-name barcode-productname">
                                                        Ram Bros (PVT) Ltd.
                                                    </div>
                                                    <span class="model-name barcode-modelname"><?php echo $product_model ?></span>
                                                    <img class="img-responsive center-block barcode-image" alt="" src="<?= base_url('vendor/barcode.php?size=30&text=' . $label['productId'] . '&print=true') ?>">
                                                    <div class="product-name-details barcode-productdetails"><?php echo $label['productName']; ?></div>
                                                    <div class="price barcode-price">
                                                        <b> <?php echo "Rs. " . number_format((float)$label['price'], 2); ?></b>
                                                    </div>
                                                </div>

                                            </td>
                                            <?php if ($counter == 5) { ?>
                                            </tr>
                                            <?php $counter = 0; ?>
                                        <?php } ?>
                                        <?php $counter++; ?>
                                <?php
                                    }
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                    <?php
                    ?>
                </div>

            </div>
            <?php
           
            ?>
                <div class="text-center">
                    <a class="btn btn-info" href="#" onclick="printDiv('printableArea')"><?php echo display('print') ?></a>
                    <a class="btn btn-danger" href="<?php echo base_url('labelprint'); ?>"><?php echo display('cancel') ?></a>
                </div>
            <?php
            
            ?>
            <?php echo form_close() ?>
        </div>
    </div>
</div>