<div class="container-fluid" style="margin-top: 70px !important;">
    <?php echo validation_errors('<p class="alert alert-dismissable alert-danger">', '</p>');?>
    
    <form method="post" action="<?php echo base_url();?>admin/faq/edit/<?php echo $faq->id;?>">
        <div class="row">
            <div class="col-md-6">
                <h1>Edit FAQ</h1>
            </div>
            <div class="col-md-6">
                <div class="btn-group pull-right">
                    <input type="submit" name="submit" id="page_submit" class="btn btn-primary" value="Save" />
                    <a href="<?php echo base_url();?>admin/faq" class="btn btn-default">Close</a>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>admin/dashboard"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
                    <li><a href="<?php echo base_url();?>admin/faq"><span class="glyphicon glyphicon-list-alt"></span> FAQs</a></li>
                    <li class="active"><span class="glyphicon glyphicon-pencil"></span> Edit FAQ</li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Question</label>
                    <input class="form-control" type="text" name="question" value="<?php echo $faq->question;?>" placeholder="Enter FAQ question" />
                </div>

                <div class="form-group">
                    <label>Answer</label>
                    <textarea id="answer" name="answer" class="form-control" placeholder="Enter the answer to your Question" rows="10"><?php echo $faq->answer;?>k</textarea>
                </div>
            </div>
        </div>
        
    </form>
</div>