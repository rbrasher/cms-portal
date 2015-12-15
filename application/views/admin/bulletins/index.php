<div class="container-fluid" style="margin-top: 70px !important;">
    <!-- Display messages -->
    <?php if($this->session->flashdata('bulletin_saved')) : ?>
    <p class="alert alert-dismissable alert-success"><?php echo $this->session->flashdata('bulletin_saved');?></p>
    <?php endif;?>
    
    <?php if($this->session->flashdata('bulletin_deleted')) : ?>
    <p class="alert alert-dismissable alert-success"><?php echo $this->session->flashdata('bulletin_deleted');?></p>
    <?php endif; ?>
    
    <?php if($this->session->flashdata('bulletin_published')) : ?>
    <p class="alert alert-dismissable alert-success"><?php echo $this->session->flashdata('bulletin_published');?></p>
    <?php endif; ?>
    
    <?php if($this->session->flashdata('bulletin_unpublished')) : ?>
    <p class="alert alert-dismissable alert-success"><?php echo $this->session->flashdata('bulletin_unpublished');?></p>
    <?php endif; ?>
    
    <h1 class="page-header">Bulletins</h1>
    <a href="<?php echo base_url();?>admin/bulletins/add" class="btn btn-success pull-right">Add Bulletin</a>
    
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th width="70">#</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($bulletins as $bulletin) : ?>
                <tr>
                    <td><?php echo $bulletin->id;?></td>
                    <td><?php echo $bulletin->title;?></td>
                    <td><?php echo $bulletin->category_name;?></td>
                    <td><?php echo $bulletin->first_name . ' ' . $bulletin->last_name;?></td>
                    <td><?php echo $bulletin->created;?></td>
                    <td>
                        <a href="<?php echo base_url();?>admin/bulletins/edit/<?php echo $bulletin->id;?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                        <?php if($bulletin->is_published == 1) : ?>
                        <a href="<?php echo base_url();?>admin/bulletins/unpublish/<?php echo $bulletin->id;?>" class="btn btn-warning"><span class="glyphicon glyphicon-log-out"></span> Un-publish</a>
                        <?php elseif($bulletin->is_published == 0) : ?>
                        <a href="<?php echo base_url();?>admin/bulletins/publish/<?php echo $bulletin->id;?>" class="btn btn-success"><span class="glyphicon glyphicon-log-in"></span> Publish</a>
                        <?php endif;?>
                        <a href="<?php echo base_url();?>admin/bulletins/delete/<?php echo $bulletin->id;?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>