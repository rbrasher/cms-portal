<div class="container-fluid" style="margin-top: 70px !important;">
    <?php if($this->session->flashdata('faq_saved')) : ?>
    <p class="alert alert-dismissable alert-success"><?php echo $this->session->flashdata('faq_saved');?></p>
    <?php endif;?>
    
    <?php if($this->session->flashdata('faq_deleted')) : ?>
    <p class="alert alert-dismissable alert-success"><?php echo $this->session->flashdata('faq_deleted');?></p>
    <?php endif;?>
    
    <h1 class="page-header">FAQs</h1>
    <a href="<?php echo base_url();?>admin/faq/add" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Add FAQ</a>
    
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th width="70">#</th>
                    <th>Question</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($faqs as $faq) : ?>
                <tr>
                    <td><?php echo $faq->id;?></td>
                    <td><?php echo $faq->question;?></td>
                    <td>
                        <a class="btn btn-primary" href="<?php echo base_url();?>admin/faq/edit/<?php echo $faq->id;?>"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                        <a class="btn btn-danger" href="<?php echo base_url();?>admin/faq/delete/<?php echo $faq->id;?>"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>