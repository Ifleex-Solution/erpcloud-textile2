<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo html_escape($title) ?> </h4>
                </div>
            </div>

            <div class="panel-body">

                <?php echo form_open_multipart('employee_form/' . $employee->id, 'id="validate"') ?>
                <input type="hidden" name="id" id="id" value="<?php echo $employee->id ?>">
                <div class="form-group row">
                    <label for="first_name" class="col-sm-2 col-form-div">Employee Id <i class="text-danger">*</i></label>
                    <div class="col-sm-4">
                        <input name="first_name" class="form-control" type="text" placeholder="Employee Id" required id="first_name" value="<?php echo $employee->first_name ?>">
                        <input type="hidden" name="old_first_name" value="<?php echo $employee->first_name ?>">
                    </div>
                    <label for="last_name" class="col-sm-2 col-form-div">Employee Name</label>
                    <div class="col-sm-4">
                        <input name="last_name" class="form-control" type="text" placeholder="Employee Name" id="last_name" value="<?php echo $employee->last_name ?>">
                        <input type="hidden" name="old_last_name" value="<?php echo $employee->last_name ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="designation" class="col-sm-2 col-form-div"><?php echo display('designation') ?></label>
                    <div class="col-sm-4">
                        <?php echo form_dropdown('designation', $desig, $employee->designation, 'class="form-control" ') ?>
                    </div>
                    <label for="phone" class="col-sm-2 col-form-div"><?php echo display('phone') ?> </label>
                    <div class="col-sm-4">
                        <input name="phone" class="form-control" type="number" placeholder="<?php echo display('phone') ?>" id="phone"  value="<?php echo $employee->phone ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address_line_1" class="col-sm-2 col-form-div"><?php echo display('address_line_1') ?></label>
                    <div class="col-sm-4">
                        <textarea name="address_line_1" class="form-control" placeholder="<?php echo display('address_line_1') ?>" id="address_line_1"><?php echo $employee->address_line_1 ?></textarea>
                    </div>
                    <label for="blood_group" class="col-sm-2 col-form-div"><?php echo display('blood_group') ?> </label>
                    <div class="col-sm-4">
                        <input name="blood_group" class="form-control" type="text" placeholder="<?php echo display('blood_group') ?>" id="blood_group" value="<?php echo $employee->blood_group ?>">
                    </div>

                </div>
                <div class="form-group row">
                    <label for="picture" class="col-sm-2 col-form-div"><?php echo display('picture') ?></label>
                    <div class="col-sm-4">
                        <input type="file" name="image" class="form-control" placeholder="<?php echo display('picture') ?>" id="image">
                        <input type="hidden" name="old_image" value="<?php echo $employee->image ?>">
                    </div>
                    <label for="address_line_2" class="col-sm-2 col-form-div"><?php echo display('address_line_2') ?></label>
                    <div class="col-sm-4">
                        <textarea name="address_line_2" class="form-control" placeholder="<?php echo display('address_line_2') ?>" id="address_line_2"><?php echo $employee->address_line_2 ?></textarea>
                    </div>

                </div>

                <div class="form-group row">
                    <label for="city" class="col-sm-2 col-form-div"><?php echo display('city') ?></label>
                    <div class="col-sm-4">
                        <input name="city" class="form-control" type="text" placeholder="<?php echo display('city') ?>" id="city" value="<?php echo $employee->city ?>">

                    </div>
                </div>


                <div class="form-group text-right">
                    <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                    <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('save') ?></button>
                </div>
                <?php echo form_close() ?>
            </div>

        </div>
    </div>
</div>