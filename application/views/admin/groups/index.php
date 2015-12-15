<div class="container-fluid" style="margin-top: 70px !important;">
    <?php if($this->session->flashdata('group_saved')) : ?>
    <p class="alert alert-dismissable alert-success"><?php echo $this->session->flashdata('group_saved');?></p>
    <?php endif;?>
    
    <?php if($this->session->flashdata('group_deleted')) : ?>
    <p class="alert alert-dismissable alert-success"><?php echo $this->session->flashdata('group_deleted');?></p>
    <?php endif;?>
    
    <h1 class="page-header">Groups</h1>
    <a href="<?php echo base_url();?>admin/groups/add" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Add Group</a>
    
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
                <?php foreach ($groups as $group) : ?>
                <tr>
                    <th><?php echo $group->id;?></th>
                    <th><?php echo $group->name;?></th>
                    <td>
                        <a class="btn btn-primary" href="<?php echo base_url();?>admin/groups/edit/<?php echo $group->id;?>"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                        <a class="btn btn-danger" href="<?php echo base_url();?>admin/groups/delete/<?php echo $group->id;?>"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
