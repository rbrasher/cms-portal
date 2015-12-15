<div class="page-wrapper">
    <div class="col-md-3">
        <!-- Videos -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-facetime-video"></span> Videos</h3>
            </div>
            <div class="panel-body">
                <ul>
                    <?php if($videos) : ?>
                    <?php foreach($videos as $video) : ?>
                    <li><a href="<?php echo base_url();?>main/watch/<?php echo $video->id;?>"><span class="glyphicon glyphicon-play"></span> <?php echo $video->title;?></a></li>
                    <?php endforeach; ?>
                    <?php else : ?>
                    <li>No Videos available at this time.</li>
                    <?php endif;?>
                </ul>
            </div>
        </div>
        
        <!-- Documents -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-inbox"></span> Documents</h3>
            </div>
            <div class="panel-body">
                <ul>
                    <?php if($documents) : ?>
                    <?php foreach($documents as $document) : ?>
                    
                    <li><a href="<?php echo base_url();?>documents/<?php echo $document->file_name;?>" target="_blank"><span class="glyphicon glyphicon-file"></span> <?php echo $document->title;?></a></li>
                    
                    <?php endforeach;?>
                    <?php else : ?>
                    <li>No Documents Available at this time.</li>
                    <?php endif;?>
                </ul>
            </div>
        </div>
        
        <!-- FAQs -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-question-sign"></span> FAQs</h3>
            </div>
            <div class="panel-body">
                <?php if($faqs) : ?>
                <ul class="faq">
                    <?php foreach($faqs as $faq) : ?>
                    <li class="q"><img src="<?php echo base_url();?>img/arrow.png" /> <?php echo $faq->question;?></li>
                    <li class="a"><?php echo $faq->answer;?></li>
                    <?php endforeach;?>
                </ul>
                <?php else : ?>
                <p>No FAQs available</p>
                <?php endif;?>
            </div>
        </div>
        
    </div>
    <!-- / col-md-3 -->
    
    <div class="col-md-9">
        <div class="list-group">
            <?php foreach($bulletins as $bulletin) : ?>
            <a href="<?php echo base_url();?>main/view/<?php echo $bulletin->id;?>" class="list-group-item">
                <h4 class="list-group-item-heading"><?php echo $bulletin->title;?></h4>
                <p class="list-group-item-text">
                    <?php echo $bulletin->body;?>
                </p>
            </a>
            <?php endforeach; ?>
            
        </div>
    </div>
    
</div>