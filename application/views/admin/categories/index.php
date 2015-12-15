<div class="container-fluid" style="margin-top: 70px !important;">
    <?php if($this->session->flashdata('category_saved')) : ?>
    <p class="alert alert-dismissable alert-success"><?php echo $this->session->flashdata('category_saved');?></p>
    <?php endif;?>
    
    <?php if($this->session->flashdata('category_deleted')) : ?>
    <p class="alert alert-dismissable alert-success"><?php echo $this->session->flashdata('category_deleted');?></p>
    <?php endif;?>
    
    <h1 class="page-header">Categories</h1>
    <a href="<?php echo base_url();?>admin/categories/add" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Add Category</a>
    
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th width="70">#</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category) : ?>
                <tr>
                    <td><?php echo $category->id;?></td>
                    <td><?php echo $category->name;?></td>
                    <td>
                        <a href="<?php echo base_url();?>admin/categories/edit/<?php echo $category->id;?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                        <a href="<?php echo base_url();?>admin/categories/delete/<?php echo $category->id;?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>