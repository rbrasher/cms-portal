<div class="container-fluid" style="margin-top: 70px !important;">
    <?php echo validation_errors('<p class="alert alert-dismissable alert-danger">', '</p>');?>
    
    <form method="post" action="<?php echo base_url();?>admin/groups/edit/<?php echo $group->id;?>">
        <div class="row">
            <div class="col-md-6">
                <h1>Edit User Group</h1>
            </div>
            <div class="col-md-6">
                <div class="btn-group pull-right">
                    <input type="submit" name="submit" id="page_submit" class="btn btn-primary" value="Save" />
                    <a href="<?php echo base_url();?>admin/groups" class="btn btn-default">Close</a>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>admin/dashboard"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
                    <li><a href="<?php echo base_url();?>admin/groups"><span class="glyphicon glyphicon-list-alt"></span> User Groups</a></li>
                    <li class="active"><span class="glyphicon glyphicon-pencil"></span> Edit User Group</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Group Name</label>
                    <input class="form-control" type="text" name="name" value="<?php echo $group->name;?>" placeholder="Enter Group Name" />
                </div>
            </div>
        </div>
    </form>
</div>