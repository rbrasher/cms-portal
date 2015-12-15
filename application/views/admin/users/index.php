
<div class="container-fluid" style="margin-top: 70px !important;">
    <!-- Display messages -->
    <?php if($this->session->flashdata('user_saved')) : ?>
    <p class="alert alert-dismissable alert-success"><?php echo $this->session->flashdata('user_saved');?></p>
    <?php endif;?>
    
    <?php if($this->session->flashdata('user_deleted')) : ?>
    <p class="alert alert-dismissable alert-success"><?php echo $this->session->flashdata('user_deleted');?></p>
    <?php endif;?>
    
    <h1 class="page-header">Users</h1>
    <a href="<?php echo base_url();?>admin/users/add" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Add User</a>
    
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th width="70">#</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user) : ?>
                <tr>
                    <td><?php echo $user->id;?></td>
                    <td><?php echo $user->first_name . ' ' . $user->last_name;?></td>
                    <td><?php echo $user->username;?></td>
                    <td><?php echo $user->email;?></td>
                    <td>
                        <!--
                        <a href="<?php //echo base_url(); ?>admin/users/edit/<?php //echo $user->id; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Edit</a> 
                        -->
                        <a href="<?php echo base_url(); ?>admin/users/delete/<?php echo $user->id; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>