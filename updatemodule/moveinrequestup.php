<?php if ($mod == 'ownermoveinrequest') {


$details = mysqli_query($con, "SELECT * FROM ownermoveinrequest WHERE `id`='$id_incoming' ");
$details_row = mysqli_fetch_assoc($details);

?>
<div class="new-container">
    <div class="boxed">
        <div id="content-container">
            <div class="pageheader">
                <h3>
                    <i class="fa fa-home"></i>
                    Update Page
                </h3>
            </div>
            <div id="page-content">
                <div class="row intro-block">
                    <div class="col-lg-12 col-md-6">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    Update </h3>
                            </div>
                            <div class="panel-body">
                                <span>
                                    <div class="media">
                                        <div class="media-body">
                                            <div id="update" class="tab-pane" role="tabpanel" aria-labelledby="update">
                                                <div class="panel-body np">
                                                    <span>
                                                        <div action="#" class="form-horizontal form-bordered form-wizard clearfix" role="application">
                                                            <div class="content clearfix">
                                                                <p style="color:red;"></p>
                                                                <div class="wizard-title title current" tabindex="-1">
                                                                    Introduction
                                                                </div>
                                                                <div class="wizard-container body current" id="" role="tabpanel" aria-labelledby="" aria-hidden="false" style="display: block;">
                                                                    <span>
                                                                        <h3> Request Information</h3>
                                                                        <div class="form-group">
                                                                            <label class="col-sm-2 control-label"> Account Name </label>
                                                                            <div class="col-sm-4">
                                                                                <p class="info-form">
                                                                                    <?php if (isset($_SESSION['username'])) : ?>
                                                                                        <b><?php echo $_SESSION['username']; ?></b>
                                                                                    <?php endif ?>
                                                                                </p>
                                                                            </div>
                                                                            <label class="col-sm-2 control-label"> Request Type </label>
                                                                            <div class="col-sm-4">
                                                                                <p class="info-form">
                                                                                    <b>Owner Move In Request</b>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <h3> Request Details</h3>



                                                                        <form method="POST">
                                                                            <div class="form-group">
                                                                                <label class="col-sm-2 control-label "> Application Type
                                                                                    <span class="red">*</span>
                                                                                </label>
                                                                                <div class="col-sm-4">
                                                                                    <select class="form-control" alt="" id="applicationtype" maxlength="" name="applicationtype">

                                                                                        <option value="<?php echo $details_row['applicationtype']; ?>"><?php echo $details_row['applicationtype']; ?></option>



                                                                                    </select>
                                                                                </div>
                                                                                <label class="col-sm-2 control-label "> Property Name
                                                                                    <span class="red">*</span>
                                                                                </label>

                                                                                <div class="col-sm-4">
                                                                                    <select class="form-control" alt="" id="<?php echo $details_row['propertyname']; ?>" maxlength="" name="propertyname">
                                                                                        <?php
                                                                                        // $propertydata = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM propertydata where id=$qqID"), MYSQLI_BOTH);
                                                                                        $propertydata = mysqli_query($con, 'SELECT * FROM `propertydata`');

                                                                                        while ($row = mysqli_fetch_array($propertydata)) {
                                                                                            $propertyname = array($row['propertyname']);
                                                                                            foreach ($propertyname as $values); {
                                                                                        ?>

                                                                                                <option <?php if (isset($_SESSION['nameamendment']['propertyname'])) {
                                                                                                            echo ($_SESSION['nameamendment']['propertyname'] == $values) ? 'selected=true' : '';
                                                                                                        } ?> value="<?= $values; ?>"><?= $values ?>


                                                                                                </option>
                                                                                        <?php }
                                                                                        } ?>
                                                                                    </select>


                                                                                </div>

                                                                                <label class="col-sm-2 control-label "> Move In Date
                                                                                            <span class="red">*</span>
                                                                                        </label>
                                                                                        <div class="col-sm-4">
                                                                                            <input class="form-control" type="datetime-local" name="moveindate" id="moveindate" value="<?php echo $details_row['moveindate'] ?>">
                                                                                            </input>
                                                                                        </div>
                                                                                        <label class="col-sm-2 control-label "> No of occupants
                                                                                            <span class="red">*</span>
                                                                                        </label>
                                                                                        <div class="col-sm-4">
                                                                                            <input class="form-control" id="occupants" name="occupants" value="<?php echo $details_row['occupants'] ?>">
                                                                                            </input>
                                                                                        </div>
                                                                                        <label class="col-sm-2 control-label "> Do You have house hold helper ?
                                                                                            <span class="red">*</span>
                                                                                        </label>
                                                                                        <div class="col-sm-4">
                                                                                            <select class="form-control" alt="" id="householdhelper" maxlength="" name="householdhelper">
                                                                                            <option value="<?php $details_row['householdhelper']; ?>"><?php echo $details_row['householdhelper']; ?></option>
                                                                                                <option value="Yes">Yes</option>
                                                                                                <option value="No">No</option>
                                                                                            </select>
                                                                                        </div>

                                                                                        <label class="col-sm-2 control-label "> Application Type
                                                                                            <span class="red">*</span>
                                                                                        </label>
                                                                                        <div class="col-sm-4">
                                                                                            <select class="form-control" alt="" id="applicationtype" maxlength="" name="applicationtype">
                                                                                                <option value="Owner Move In Reuqest">Owner Move In Request</option>
                                                                                             
                                                                                            </select>
                                                                                        </div>
                                                                                        <h3> Access Card Details</h3>
                                                                                        <label class="col-sm-2 control-label">
                                                                                            Access Card 1
                                                                                        </label>
                                                                                        <div class="col-sm-4">
                                                                                            <input class="form-control" type="" id="accesscard1" name="accesscard1" value="<?php echo $details_row['accesscard1'] ?>">
                                                                                            </input>
                                                                                        </div>
                                                                                        <label class="col-sm-2 control-label">
                                                                                            Access Card 2
                                                                                        </label>
                                                                                        <div class="col-sm-4">
                                                                                            <input class="form-control" type="" id="accesscard2" name="accesscard2" value="<?php echo $details_row['accesscard2'] ?>">
                                                                                            </input>
                                                                                        </div>
                                                                                        <label class="col-sm-2 control-label">
                                                                                            Access Card 3
                                                                                        </label>
                                                                                        <div class="col-sm-4">
                                                                                            <input class="form-control" type="" id="accesscard3" name="accesscard3" value="<?php echo $details_row['accesscard3'] ?>">
                                                                                            </input>
                                                                                        </div>
                                                                                        <label class="col-sm-2 control-label">
                                                                                            Access Card 4
                                                                                        </label>
                                                                                        <div class="col-sm-4">
                                                                                            <input class="form-control" type="" id="accesscard4" name="accesscard4" value="<?php echo $details_row['accesscard4'] ?>">
                                                                                            </input>
                                                                                        </div>
                                                                                        <label class="col-sm-2 control-label">
                                                                                            Parking Card 1
                                                                                        </label>
                                                                                        <div class="col-sm-4">
                                                                                            <input class="form-control" type="" id="parkingcard1" name="parkingcard1" value="<?php echo $details_row['parkingcard1'] ?>">
                                                                                            </input>
                                                                                        </div>
                                                                                        <label class="col-sm-2 control-label">
                                                                                            Parking Card 2
                                                                                        </label>
                                                                                        <div class="col-sm-4">
                                                                                            <input class="form-control" type="" id="parkingcard2" name="parkingcard2" value="<?php echo $details_row['parkingcard2'] ?>">
                                                                                            </input>
                                                                                        </div>
                                                                                        <label class="col-sm-2 control-label">
                                                                                            Parking Card 3
                                                                                        </label>
                                                                                        <div class="col-sm-4">
                                                                                            <input class="form-control" type="" id="parkingcard3" name="parkingcard3" value="<?php echo $details_row['parkingcard3'] ?>">
                                                                                            </input>
                                                                                        </div>
                                                                                        <label class="col-sm-2 control-label">
                                                                                            Parking Card 4
                                                                                        </label>
                                                                                        <div class="col-sm-4">
                                                                                            <input class="form-control" type="" id="parkingcard4" name="parkingcard4" value="<?php echo $details_row['parkingcard4'] ?>">
                                                                                            </input>
                                                                                        </div>
                                                                                        <h3>Vehicle Details</h3>
                                                                                        <label class="col-sm-2 control-label">
                                                                                            Vehicle Plate Number 1
                                                                                        </label>
                                                                                        <div class="col-sm-4">
                                                                                            <input class="form-control" type="" id="vehicleplatenumber1" name="vehicleplatenumber1" value="<?php echo $details_row['vehicleplatenumber1'] ?>">
                                                                                            </input>
                                                                                        </div>
                                                                                        <label class="col-sm-2 control-label">
                                                                                            Vehicle Plate Number 2
                                                                                        </label>
                                                                                        <div class="col-sm-4">
                                                                                            <input class="form-control" type="" id="vehichleplatenumber2" name="vehicleplatenumber2" value="<?php echo $details_row['vehicleplatenumber2'] ?>">
                                                                                            </input>
                                                                                        </div>
                                                                                        <label class="col-sm-2 control-label">
                                                                                            Vehicle Plate Number 3
                                                                                        </label>
                                                                                        <div class="col-sm-4">
                                                                                            <input class="form-control" type="" id="vehicleplatenumber3" name="vehicleplatenumber3" value="<?php echo $details_row['vehicleplatenumber3'] ?>">
                                                                                            </input>
                                                                                        </div>
                                                                                        <label class="col-sm-2 control-label">
                                                                                            Vehicle Plate Number 4
                                                                                        </label>
                                                                                        <div class="col-sm-4">
                                                                                            <input class="form-control" type="" id="vehicleplatenumber4" name="vehicleplatenumber4" value="<?php echo $details_row['vehicleplatenumber4'] ?>">
                                                                                            </input>
                                                                                        </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <div class="containertab1 .d-md-none .d-lg-block ">
                                                                                    <button type="submit" class="btn btn-primary" name="update10">Update</button>
                                                                                </div>
                                                                            </div>

                                                                        </form>


                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>