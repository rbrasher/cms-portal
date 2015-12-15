<div class="container-fluid" style="margin-top: 70px !important;">
    <!-- Display form validation errors -->
    <?php echo validation_errors('<p class="alert alert-dismissable alert-danger">', '</p>');?>
    
    <form method="post" action="<?php echo base_url();?>admin/users/edit/<?php echo $user->id;?>">
        <div class="row">
            <div class="col-md-6">
                <h1>Edit User</h1>
            </div>
            <div class="col-md-6">
                <div class="btn-group pull-right">
                    <input type="submit" id="page_submit" class="btn btn-default" value="Save" />
                    <a href="<?php echo base_url();?>admin/users" class="btn btn-default">Close</a>
                </div>
            </div>
        </div><!-- /row -->
        
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>admin/dashboard"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
                    <li><a href="<?php echo base_url();?>admin/users"><span class="glyphicon glyphicon-user"></span> Users</a></li>
                    <li class="active"><span class="glyphicon glyphicon-pencil"></span> Edit User</li>
                </ol>
            </div>
        </div><!-- /row -->
        
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label>First Name</label>
                    <input class="form-control" type="text" name="first_name" value="<?php echo $user->first_name;?>" placeholder="Enter First Name" />
                </div>
                
                <div class="form-group">
                    <label>Last Name</label>
                    <input class="form-control" type="text" name="last_name" value="<?php echo $user->last_name;?>" placeholder="Enter Last Name" />
                </div>
                
                <div class="form-group">
                    <label>Email Address</label>
                    <input class="form-control" type="email" name="email" value="<?php echo $user->email;?>" placeholder="Enter Email" />
                </div>
                
                <div class="form-group">
                    <label>Username</label>
                    <input class="form-control" type="text" name="username" value="<?php echo $user->username;?>" placeholder="Enter Username" />
                </div>
                
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password" value="<?php echo $user->password;?>" placeholder="Enter Password" readonly />
                </div>
                
                <div class="form-group">
                    <label>Phone</label>
                    <input class="form-control" type="text" name="phone" value="<?php echo $user->phone;?>" placeholder="Enter Phone" />
                </div>
                
                <div class="form-group">
                    <label>User Group</label>
                    <select name="group" class="form-control">
                        <?php foreach($groups as $group) : ?>
                        <?php if($user->group_id == $group->id): ?>
                        <?php $selected = 'selected';?>
                        <?php else : ?>
                        <?php $selected = '';?>
                        <?php endif; ?>
                        <option value="<?php echo $group->id;?>" <?php echo $selected;?>><?php echo $group->name;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Location</label>
                    <select name="location_id" class="form-control">
                        <?php foreach($locations as $location) : ?>
                        <?php if($user->location_id == $location->id): ?>
                        <?php $selected = 'selected';?>
                        <?php else : ?>
                        <?php $selected = '';?>
                        <?php endif; ?>
                        <option value="<?php echo $location->id;?>" <?php echo $selected;?>><?php echo $location->name;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
        </div><!-- /row -->
    </form>
</div>