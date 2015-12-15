<div class="container-fluid" style="margin-top: 70px !important;">
    <!-- Display messages -->
    <?php if($this->session->flashdata('video_saved')) : ?>
    <p class="alert alert-dismissable alert-success"><?php echo $this->session->flashdata('video_saved');?></p>
    <?php endif; ?>
    
    <?php if($this->session->flashdata('video_deleted')) : ?>
    <p class="alert alert-dismissable alert-success"><?php echo $this->session->flashdata('video_deleted');?></p>
    <?php endif; ?>
    
    <h1 class="page-header">Videos</h1>
    <a href="<?php echo base_url();?>admin/videos/add" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus-sign"></span> Add Video</a>
    
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th width="70">#</th>
                    <th>Title</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if($videos) : ?>
                <?php foreach($videos as $video) : ?>
                <tr>
                    <td><?php echo $video->id;?></td>
                    <td><?php echo $video->title;?></td>
                    <td><?php echo $video->created;?></td>
                    <td>
                        <a href="<?php echo base_url();?>admin/videos/edit/<?php echo $video->id;?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                        <a href="<?php echo base_url();?>admin/videos/delete/<?php echo $video->id;?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php else : ?>
                <tr>
                    <td colspan="4">No videos at this time.</td>
                </tr>
                <?php endif;?>
            </tbody>
        </table>
    </div>
</div>