<?php if ($mod == 'nameamendment') {


$details = mysqli_query($con, "SELECT * FROM nameamendment WHERE `id`='$id_incoming' ");
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
                                                                                    <b>Make a Payment</b>
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
                                                                                        <option value="Address Amendment">Address Amendment</option>
                                                                                        <option value="Name Amendment">Name Amendment</option>
                                                                                        <option value="Lost">Lost</option>
                                                                                        

                                                                                    </select>
                                                                                </div>
                                                                                <label class="col-sm-2 control-label "> Property Data
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

                                                                                <label class="col-sm-2 control-label "> Delivery Method
                                                                                    <span class="red">*</span>
                                                                                </label>
                                                                                <div class="col-sm-4">
                                                                                    <select class="form-control" alt="" id="deliverymethod" maxlength="" name="deliverymethod">

                                                                                        <option value="<?php echo $details_row['deliverymethod']; ?>"><?php echo $details_row['deliverymethod']; ?></option>
                                                                                        <option value="Self Pickup">Self Pickup</option>
                                                                                        <option value="Courier">Courier</option>
                                                                                        

                                                                                    </select>
                                                                                </div>

                                                                            </div>

                                                                            <div class="form-group">
                                                                                <div class="containertab1 .d-md-none .d-lg-block ">
                                                                                    <button type="submit" class="btn btn-primary" name="update3">Update</button>
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