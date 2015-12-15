<div class="container-fluid" style="margin-top: 70px !important;">
    <?php echo validation_errors('<p class="alert alert-dismissable alert-danger">', '</p>');?>
    
    <form method="post" action="<?php echo base_url();?>admin/videos/edit/<?php echo $video->id;?>">
        <div class="row">
            <div class="col-md-6">
                <h1>Edit Video</h1>
            </div>
            <div class="col-md-6">
                <div class="btn-group pull-right">
                    <input type="submit" name="submit" class="btn btn-primary" value="Save" />
                    <a href="<?php echo base_url();?>admin/videos" class="btn btn-default">Close</a>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>admin/dashboard"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
                    <li><a href="<?php echo base_url();?>admin/videos"><span class="glyphicon glyphicon-facetime-video"></span> Videos</a></li>
                    <li class="active"><span class="glyphicon glyphicon-pencil"></span> Edit Video</li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="<?php echo $video->title;?>" placeholder="Enter video title" />
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description" id="description"><?php echo $video->description;?></textarea>
                </div>
                <div class="form-group">
                    <label>Video</label>
                    <textarea class="form-control" name="video" id="video"><?php echo $video->video;?></textarea>
                </div>
            </div>
        </div>
        
    </form>
</div>