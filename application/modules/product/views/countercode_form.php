<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo $title ?> </h4>
                </div>
            </div>

            <div class="panel-body">
                <?php echo form_open('countercode_form/' . $countercode->countercode_id, 'class="" id="countercode_form"') ?>

                <input type="hidden" name="countercode_id" id="countercode_id" value="<?php echo $countercode->countercode_id ?>">

                <div class="form-group row">
                    <label for="counter_code" class="col-sm-2 text-right col-form-label">Counter Code <i class="text-danger"> * </i>:</label>
                    <div class="col-sm-4">


                        <input type="text" name="counter_code" class="form-control" id="counter_code" placeholder="Counter Code" value="<?php echo $countercode->counter_code ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="countercode_name" class="col-sm-2 text-right col-form-label">Counter Name <i class="text-danger"> * </i>:</label>
                    <div class="col-sm-4">


                        <input type="text" name="countercode_name" class="form-control" id="countercode_name" placeholder="Counter Name" value="<?php echo $countercode->countercode_name ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status" class="col-sm-2 text-right col-form-label"><?php echo display('status') ?> <i class="text-danger"> * </i>:</label>
                    <div class="col-sm-4">

                        <select name="status" id="status" class="form-control" required>
                            <?php if (!empty($countercode->countercode_name)) { ?>
                                <option value="1" <?php if ($countercode->status == 1) {
                                                        echo 'selected';
                                                    } ?>><?php echo display('active') ?></option>
                                <option value="0" <?php if ($countercode->status == 0) {
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
                            <?php echo (empty($countercode->countercode_id) ? display('save') : display('update')) ?></button>

                        <?php if (empty($countercode->countercode_id)) { ?>
                            <button type="submit" class="btn btn-success" name="add-another"><?php echo display('save_and_add_another') ?></button>
                        <?php } ?>

                    </div>
                </div>


                <?php echo form_close(); ?>
            </div>

        </div>
    </div>
</div>