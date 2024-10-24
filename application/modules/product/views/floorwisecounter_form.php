<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo $title ?> </h4>
                </div>
            </div>

            <div class="panel-body">
                <?php echo form_open('floorwisecounter_form/' . $floorwisecounter->floorwisecounter_id, 'class="" id="floorwisecounter_form"') ?>

                <input type="hidden" name="floorwisecounter_id" id="floorwisecounter_id" value="<?php echo $floorwisecounter->floorwisecounter_id ?>">

                <div class="form-group row">
                    <label for="floorwise_name" class="col-sm-2 text-right col-form-label">Counter Name <i class="text-danger"> * </i>:</label>
                    <div class="col-sm-4">


                        <input type="text" name="floorwise_name" class="form-control" id="floorwise_name" placeholder="Floorwise counter" value="<?php echo $floorwisecounter->floorwise_name ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status" class="col-sm-2 text-right col-form-label"><?php echo display('status') ?> <i class="text-danger"> * </i>:</label>
                    <div class="col-sm-4">

                        <select name="status" id="status" class="form-control" required>
                            <?php if (!empty($floorwisecounter->floorwise_name)) { ?>
                                <option value="1" <?php if ($floorwisecounter->status == 1) {
                                                        echo 'selected';
                                                    } ?>><?php echo display('active') ?></option>
                                <option value="0" <?php if ($floorwisecounter->status == 0) {
                                                        echo 'selected';
                                                    } ?>><?php echo display('inactive') ?></option>
                            <?php } else { ?>
                                <option value="1"><?php echo display('active') ?></option>
                                <option value="0"><?php echo display('inactive') ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">

                    <div class="col-sm-6 text-right">


                        <button type="submit" class="btn btn-success ">
                            <?php echo (empty($floorwisecounter->floorwisecounter_id) ? display('save') : display('update')) ?></button>

                        <?php if (empty($floorwisecounter->floorwisecounter_id)) { ?>
                            <button type="submit" class="btn btn-success" name="add-another"><?php echo display('save_and_add_another') ?></button>
                        <?php } ?>

                    </div>
                </div>


                <?php echo form_close(); ?>
            </div>

        </div>
    </div>
</div>