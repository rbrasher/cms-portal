<div class="container-fluid" style="margin-top: 70px !important;">
    <!-- Display form validation errors -->
    <?php echo validation_errors('<p class="alert alert-danger">', '</p>');?>
    
    <form method="post" action="<?php echo base_url();?>admin/users/add">
        <div class="row">
            <div class="col-md-6">
                <h1>Add User</h1>
            </div>
            <div class="col-md-6">
                <div class="btn-group pull-right">
                    <input type="submit" name="submit" id="page_submit" class="btn btn-default" value="Save" />
                    <a href="<?php echo base_url();?>admin/users" class="btn btn-default">Close</a>
                </div>
            </div>
        </div><!-- /row -->
        
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>admin/dashboard"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
                    <li><a href="<?php echo base_url(); ?>admin/users"><span class="glyphicon glyphicon-user"></span> Users</a></li>
                    <li class="active"><span class="glyphicon glyphicon-plus"></span> Add User</li>
                </ol>
            </div>  
        </div><!-- /.row -->
        
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label>First Name</label>
                    <input class="form-control" type="text" name="first_name" value="<?php echo set_value('first_name');?>" placeholder="First Name" />
                </div>
                
                <div class="form-group">
                    <label>Last Name</label>
                    <input class="form-control" type="text" name="last_name" value="<?php echo set_value('last_name');?>" placeholder="Last Name" />
                </div>
                
                <div class="form-group">
                    <label>Email Address</label>
                    <input class="form-control" type="email" name="email" value="<?php echo set_value('email');?>" placeholder="Email Address" />
                </div>
                
                <div class="form-group">
                    <label>Username</label>
                    <input class="form-control" type="text" name="username" value="<?php echo set_value('username');?>" placeholder="Username" />
                </div>
                
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password" value="<?php echo set_value('password');?>" placeholder="Password" />
                </div>
                
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input class="form-control" type="password" name="confirm_password" value="<?php echo set_value('confirm_password');?>" placeholder="Confirm Password" />
                </div>
                
                <div class="form-group">
                    <label>Phone</label>
                    <input class="form-control" type="text" name="phone" value="<?php echo set_value('phone');?>" placeholder="Phone" />
                </div>
                
                <div class="form-group">
                    <label>User Group</label>
                    <select name="group" class="form-control">
                        <option value="0">Select a group</option>
                        <?php foreach($groups as $group) : ?>
                        <option value="<?php echo $group->id;?>"><?php echo $group->name;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Location</label>
                    <select name="location_id" class="form-control">
                        <option value="0">Select a Location</option>
                        <?php foreach($locations as $location) : ?>
                        <option value="<?php echo $location->id;?>"><?php echo $location->name;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
        </div><!-- /row -->
    </form>
</div>