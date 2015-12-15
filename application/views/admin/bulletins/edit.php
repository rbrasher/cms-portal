<div class="container-fluid" style="margin-top: 70px !important;">
    <?php echo validation_errors('<p class="alert alert-dismissable alert-danger">', '</p>');?>
    
    <form method="post" action="<?php echo base_url();?>admin/bulletins/edit/<?php echo $bulletin->id;?>">
        <div class="row">
            <div class="col-md-6">
                <h1>Edit Bulletin</h1>
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
                    <li><a href="<?php echo base_url();?>admin/bulletins"></a><span class="glyphicon glyphicon-list-alt"></span> Bulletins</a></li>
                    <li class="active"><span class="glyphicon glyphicon-pencil"></span> Edit Bulletin</li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Bulletin Title</label>
                    <input class="form-control" type="text" name="title" value="<?php echo $bulletin->title;?>" placeholder="Enter Bulletin Title" />
                </div>
                
                <div class="form-group">
                    <label>Category</label>
                    <select name="category_id" class="form-control">
                        <option value="0">Select a Category</option>
                        <?php foreach($categories as $category) : ?>
                        <?php if($category->id == $bulletin->category_id) : ?>
                        <?php $selected = 'selected';?>
                        <?php else : ?>
                        <?php $seleted = '';?>
                        <?php endif; ?>
                        <option value="<?php echo $category->id;?>" <?php echo $selected;?>><?php echo $category->name;?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Bulletin Body</label>
                    <textarea class="form-control" name="body" id="body" rows="10"><?php echo $bulletin->body;?></textarea>
                </div>
                
                <div class="form-group">
                    <label>Access</label>
                    <select name="access" class="form-control">
                        <option value="0">Everyone</option>
                        <?php foreach($groups as $group) : ?>
                        <?php //think this line is incorrect   if($category->id == $bulletin->category_id) : ?>
                        <?php if($group->id == $bulletin->access) : ?>
                        <?php $selected = 'selected';?>
                        <?php else : ?>
                        <?php $selected = '';?>
                        <?php endif; ?>
                        <option value="<?php echo $group->id;?>" <?php echo $selected;?>><?php echo $group->name;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Author</label>
                    <select name="user_id" class="form-control">
                        <option value="0">Select Author</option>
                        <?php foreach($users as $user) : ?>
                        <?php if($user->id == $bulletin->user_id) : ?>
                        <?php $selected = 'selected';?>
                        <?php else : ?>
                        <?php $selected = '';?>
                        <?php endif;?>
                        <option value="<?php echo $user->id;?>" <?php echo $selected;?>><?php echo $user->first_name . ' ' . $user->last_name;?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Published</label>
                    <label for="is_published" class="radio-inline">
                        <input type="radio" name="is_published" value="1" <?php echo ($bulletin->is_published == 1) ? 'checked' : '';?> /> Yes
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="is_published" value="0" <?php echo ($bulletin->is_published == 0) ? 'checked' : '';?> /> No
                    </label>
                </div>
                
                <div class="form-group">
                    <label>Add To Menu</label>
                    <label for="in_menu" class="radio-inline">
                        <input type="radio" name="in_menu" value="1" <?php echo ($bulletin->in_menu == 1) ? 'checked' : '';?>/> Yes
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="in_menu" value="0" <?php echo ($bulletin->in_menu == 0) ? 'checked' : '';?>/> No
                    </label>
                </div>
                
                <div class="form-group">
                    <label>Order</label>
                    <input class="form-control" style="width: 40px;" type="text" name="order" value="<?php echo $bulletin->order;?>" />
                </div>
            </div>
            
        </div><!-- /row -->
        
    </form>
</div>