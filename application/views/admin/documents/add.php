<div class="container-fluid" style="margin-top: 70px !important;">
    <?php echo validation_errors();?>
    
    <!--
    <?php //if ($this->session->flashdata('upload_success')) : ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php //echo $this->session->flashdata('upload_success');?></p>
    </div>
    <?php //endif;?>
    -->
    
    <?php if($this->session->flashdata('upload_error')) : ?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('upload_error');?></p>
    </div>
    <?php endif;?>
    
    
    <?php //echo form_open_multipart('admin/documents/add');?>
    <form method="post" action="<?php echo base_url();?>admin/documents/add" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <h1>Add Document</h1>
            </div>
            <div class="col-md-6">
                <div class="btn-group pull-right">
                    <input type="submit" name="submit" class="btn btn-primary" value="Save" />
                    <a href="<?php echo base_url();?>admin/documents" class="btn btn-default">Close</a>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>admin/dashboard"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
                    <li><a href="<?php echo base_url();?>admin/documents"><span class="glyphicon glyphicon-file"></span> Documents</a></li>
                    <li class="active"><span class="glyphicon glyphicon-plus"></span> Add Document</li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Title</label>
                    <input class="form-control" type="text" name="title" value="<?php echo set_value('title');?>" placeholder="Enter Document's Title" />
                </div>

                <div class="form-group">
                    <label>Upload Document</label>
                    <input type="file" name="userfile" size="20" />
                </div>
            </div>
        </div>
        
    </form>
</div>