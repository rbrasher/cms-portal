<div class="container-fluid" style="margin-top: 70px !important;">
    <?php echo validation_errors('<p class="alert alert-dismissable alert-danger">', '</p>');?>
    
    <form method="post" action="<?php echo base_url();?>admin/locations/add">
        <div class="row">
            <div class="col-md-6">
                <h1>Add Location</h1>
            </div>
            <div class="col-md-6">
                <div class="btn-group pull-right">
                    <input type="submit" name="submit" id="page_submit" class="btn btn-primary" value="Save" />
                    <a href="<?php echo base_url();?>admin/locations" class="btn btn-default">Close</a>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>admin/dashboard"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
                    <li><a href="<?php echo base_url();?>admin/locations"><span class="glyphicon glyphicon-list-alt"></span> Locations</a></li>
                    <li class="active"><span class="glyphicon glyphicon-plus"></span> Add Location</li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?php echo set_value('name');?>" placeholder="Enter Location Name" />
                </div>
                <div class="form-group">
                    <label>Type</label>
                    <input type="text" name="type" id="type" class="form-control" value="<?php echo set_value('type');?>" placeholder="Enter Location Type" />
                </div>
                
                <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="address" id="address"><?php echo set_value('address');?></textarea>
                </div>
                
                <div class="form-group">
                    <label>Latitude & Longitude</label>
                    <input type="text" class="form-control" name="lat_lng" id="lat_lng" value="<?php echo set_value('lat_lng');?>" />
                </div>
                
                <div class="form-group">
                    <label>State</label>
                    <select name="state" id="state" class="form-control">
                        <option value="0">Select a State</option>
                        <option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select id="status" name="status" class="form-control">
                        <option value="0">Select a Status</option>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Target Open Date</label>
                    <input class="datepicker form-control" data-date-format="mm/dd/yyy" name="target_open_date" id="target_open_date" />
                </div>

                <div class="form-group">
                    <label>Manager</label>
                    <input type="text" name="manager" id="manager" class="form-control" value="<?php echo set_value('manager');?>" placeholder="Enter Manager" />
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label>District</label>
                    <input type="text" name="district" id="district" class="form-control" value="<?php echo set_value('district');?>" placeholder="Enter District" />
                </div>

                <div class="form-group">
                    <label>Pricing Strategy</label>
                    <input type="text" name="pricing_strategy" id="pricing_strategy" class="form-control" value="<?php echo set_value('pricing_strategy');?>" placeholder="Enter Pricing Strategy" />
                </div>

                <div class="form-group">
                    <label>Accepts Cash</label>
                    <select name="accepts_cash" id="accepts_cash" class="form-control">
                        <option value="0">Does store accept cash?</option>
                        <option value="TRUE">TRUE</option>
                        <option value="FALSE">FALSE</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Accepts Manual Credit</label>
                    <select name="accepts_manual_credit" id="accepts_cash" class="form-control">
                        <option value="0">Accepts Manual Credit?</option>
                        <option value="TRUE">TRUE</option>
                        <option value="FALSE">FALSE</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Require Picture Verification</label>
                    <select name="require_picture_verification" id="require_picture_verification" class="form-control">
                        <option value="Does store accept cash?">Required Picture Verification?</option>
                        <option value="TRUE">TRUE</option>
                        <option value="FALSE">FALSE</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Cash Pricing Strategy</label>
                    <input type="text" name="cash_pricing_strategy" id="cash_pricing_strategy" class="form-control" value="<?php echo set_value('cash_pricing_strategy');?>" placeholder="Enter Cash Pricing Strategy" />
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    
    //$('.datepicker').datepicker();
    
</script>