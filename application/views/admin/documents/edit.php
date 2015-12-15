<div class="container-fluid" style="margin-top: 70px !important;">
    <?php echo validation_errors();?>
    
    <form method="post" action="<?php echo base_url();?>admin/documents/edit/<?php echo $document->id;?>">
        <div class="row">
            <div class="col-md-6">
                <h1>Edit Document</h1>
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
                    <li class="active"><span class="glyphicon glyphicon-pencil"></span> Edit Document</li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Title</label>
                    <input class="form-control" type="text" name="title" value="<?php echo $document->title;?>" placeholder="Enter Document Title" />
                </div>
                
                <div class="form-group">
                    <label>File Name</label>
                    <input type="text" name="file_name" value="<?php echo $document->file_name;?>" readonly />
                </div>
                
                <div class="form-group">
                    <label>Author</label>
                    <input type="text" name="author" value="<?php echo $document->author;?>" readonly />
                </div>
                
                <div class="form-group">
                    <label>Created</label>
                    <input type="text" name="created" value="<?php echo $document->created;?>" readonly />
                </div>
            </div>
        </div>
        
    </form>
</div>