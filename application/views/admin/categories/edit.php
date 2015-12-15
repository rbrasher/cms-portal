<div class="container-fluid" style="margin-top: 70px !important;">
    <?php echo validation_errors('<p class="alert alert-dismissable alert-danger">', '</p>');?>
    
    <form method="post" action="<?php echo base_url();?>admin/categories/edit/<?php echo $category->id;?>">
        <div class="row">
            <div class="col-md-6">
                <h1>Edit Category</h1>
            </div>
            <div class="col-md-6">
                <div class="btn-group pull-right">
                    <input type="submit" name="submit" class="btn btn-default" value="Save" />
                    <a href="<?php echo base_url();?>admin/categories" class="btn btn-default">Close</a>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>admin/dashboard"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
                    <li><a href="<?php echo base_url();?>admin/categories"><span class="glyphicon glyphicon-pencil"></span> Categories</a></li>
                    <li class="active"><span class="glyphicon glyphicon-plus"></span> Edit Category</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Category Name</label>
                    <input class="form-control" type="text" name="name" placeholder="Enter Category Name" value="<?php echo $category->name;?>" />
                </div>
            </div>
        </div>
    </form>
</div>