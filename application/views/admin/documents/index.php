<div class="container-fluid" style="margin-top: 70px !important;">
    <!-- Display messages -->
    <?php if($this->session->flashdata('document_saved')) : ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('document_saved');?></p>
    </div>
    <?php endif;?>
    
    <?php if($this->session->flashdata('document_deleted')) : ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('document_deleted');?></p>
    </div>
    <?php endif;?>
    
    <?php if ($this->session->flashdata('upload_success')) : ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('upload_success');?></p>
    </div>
    <?php endif;?>
    
    <?php if($this->session->flashdata('upload_error')) : ?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p><?php echo $this->session->flashdata('upload_error');?></p>
    </div>
    <?php endif;?>
    
    <h1 class="page-header">Documents</h1>
    
    <a href="<?php echo base_url();?>admin/documents/add" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus-sign"></span> Add Document</a>
    
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th width="70">#</th>
                    <th>Title</th>
                    <th>File Name</th>
                    <th>Author</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if($documents) : ?>
                <?php foreach($documents as $document) : ?>

                <tr>
                    <td><?php echo $document->id;?></td>
                    <td><?php echo $document->title;?></td>
                    <td><?php echo $document->file_name;?></td>
                    <td><?php echo $document->first_name . ' ' . $document->last_name;?></td>
                    <td><?php echo $document->created;?></td>
                    <td>
                        <a href="<?php echo base_url();?>admin/documents/edit/<?php echo $document->id;?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                        <a href="<?php echo base_url();?>admin/documents/delete/<?php echo $document->id;?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                    </td>
                </tr>
                
                <?php endforeach; ?>
                <?php else : ?>
                <tr>
                    <td colspan="6">No documents have been uploaded.</td>
                </tr>
                <?php endif;?>
            </tbody>
        </table>
    </div>
</div>