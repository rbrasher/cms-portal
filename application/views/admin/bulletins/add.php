<div class="container-fluid" style="margin-top: 70px !important;">
    <?php echo validation_errors('<p class="alert alert-dismissable alert-danger">', '</p>');?>
    
    <form method="post" action="<?php echo base_url();?>admin/bulletins/add">
        <div class="row">
            <div class="col-md-6">
                <h1>Add Bulletin</h1>
            </div>
            <div class="col-md-6">
                <div class="btn-group pull-right">
                    <input type="submit" name="submit" class="btn btn-primary" value="Save" />
                    <a href="<?php echo base_url();?>admin/bulletins" class="btn btn-default">Close</a>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>admin/dashboard"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
                    <li><a href="<?php echo base_url();?>admin/bulletins"><span class="glyphicon glyphicon-list-alt"></span> Bulletins</a></li>
                    <li class="active"><span class="glyphicon glyphicon-plus"></span> Add Bulletin</li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Title</label>
                    <input class="form-control" type="text" name="title" value="<?php echo set_value('title');?>" placeholder="Enter Bulletin Title" />
                </div>
                
                <div class="form-group">
                    <label>Category</label>
                    <select name="category_id" class="form-control">
                        <option value="0">Select Category</option>
                        <?php foreach($categories as $category): ?>
                        <option value="<?php echo $category->id;?>"><?php echo $category->name;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Bulletin Body</label>
                    <textarea class="form-control" name="body" rows="10"><?php echo set_value('body');?></textarea>
                </div>
                
                <div class="form-group">
                    <label>Access</label>
                    <select name="access" class="form-control">
                        <option value="0">Everyone</option>
                        <?php foreach($groups as $group) : ?>
                        <option value="<?php echo $group->id;?>"><?php echo $group->name;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <?php $current_user = $this->session->userdata('user_id');?>
                <div class="form-group">
                    <label>Author</label>
                    <select name="user_id" class="form-control">
                        <option value="0">Select Author</option>
                        <?php foreach($users as $user) : ?>
                        <option value="<?php echo $user->id;?>" <?php if($user->id == $current_user->id){echo 'selected';};?>><?php echo $user->first_name . ' ' . $user->last_name;?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Published</label><br />
                    <label for="is_published" class="radio-inline">
                        <input type="radio" name="is_published" value="1" /> Yes
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="is_published" value="0" checked /> No
                    </label>
                </div>
                
                <div class="form-group">
                    <label>Add To Menu</label><br />
                    <label for="in_menu" class="radio-inline">
                        <input type="radio" name="in_menu" value="1" /> Yes
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="in_menu" value="0" checked /> No
                    </label>
                </div>
                
                <div class="form-group">
                    <label>Order</label>
                    <input class="form-control" style="width: 40px;" type="text" name="order" value="0" />
                </div>
            </div>
        </div>
    </form>
</div>