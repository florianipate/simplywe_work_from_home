<div class="list-group">
    <div class="list-group-item list-group-item-dark">
        <span>Use the form below to add a new package detail</span>
    </div>
    <div class="list-group-item ">
        <form action="" method="post">
            <div class="form-group col-12">
                <h4><?php echo $package_title; ?></h4>
            </div>
            <div class="form-group col-12">
            <?php require_once '../cms/inc/additional-details.inc.php'?>
            </div>
            <div class="form-group col-xs-12 col-sm-8 col-md-8 col-lg-6 pt-3">
                <label for="venue_name">Add new detail </label><span class="required">*</span>
                <input type="text" class="form-control" name="new_detail" id="new_detail" aria-describedBy="new_detauil Help" value="" />
                <small id="new_detailHelp" class="form-text text-muted">Enter a new detail for this package.</small>
            </div>
            <div class="form-group  d-flex justify-content-between col-6 pb-3">
                <a href="package-info-page.php?id=<?php echo $package_id?>" class="btn btn-info text-white">Go Back</a>
                <button type="submit" class="btn btn-info text-white">Add</button>
            </div>
        </form>
    </div>
    
</div>

