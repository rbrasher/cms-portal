<div class="container-fluid" style="margin-top: 70px !important;">
    <?php if($this->session->flashdata('location_saved')) : ?>
    <p class="alert alert-dismissable alert-success"><?php echo $this->session->flashdata('location_saved');?></p>
    <?php endif;?>
    
    <?php if($this->session->flashdata('location_deleted')) : ?>
    <p class="alert alert-dismissable alert-success"><?php echo $this->session->flashdata('location_deleted');?></p>
    <?php endif;?>
    
    <h1 class="page-header">Locations</h1>
    <a href="<?php echo base_url();?>admin/locations/add" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Add Location</a>
    
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th width="70">#</th>
                    <th>Name</th>
                    <th>State</th>
                    <th>Status</th>
                    <th>Manager</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($locations as $location) : ?>
                <tr>
                    <td><?php echo $location->id;?></td>
                    <td><?php echo $location->name;?></td>
                    <td><?php echo $location->state;?></td>
                    <td><?php echo $location->status;?></td>
                    <td><?php echo $location->manager;?></td>
                    <td>
                        <a class="btn btn-primary" href="<?php echo base_url();?>admin/locations/edit/<?php echo $location->id;?>"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                        <a class="btn btn-danger" href="<?php echo base_url();?>admin/locations/delete/<?php echo $location->id;?>"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>