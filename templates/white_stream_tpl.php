<div id="facebook-stream-container-<?php echo $unique_hash;?>" class="facebook-stream-container">
    <?php if($GetAvailablePosts):?>
    <?php foreach($GetAvailablePosts as $OnePost):?>
    
    
    <?php
    // show more link
    $img_description = "<br><a href='https://facebook.com/".$OnePost['id']."'>Show more</a>";
    
    if(isset($OnePost['source'])){
        $box_class = "video";
        $box_src = $OnePost['source'];
    } else {
        $box_class = "sliboxes";
        $box_src = $OnePost['picture'];
    }
    
    ?>
    
    
        <?php if(!$OnePost['picture'] && !$OnePost['video'] && strlen($OnePost['message']) < 50 && $hide_no_media==="1") {continue;} // hide items without media (picture or video)?>
        
        <div class="facebook-stream-white-panel">
            <?php if($OnePost['picture']):?>
            

            <a class="<?php echo $box_class;?>" href="<?php echo $box_src;?>" title="<?php echo $img_description;?>">
                <img class="facebook-stream-container-img-dark" src="<?php echo $OnePost['picture'];?>" />
            </a>



            <?php endif;?>
            <?php if($OnePost['name']):?><h1><a href="https://facebook.com/<?php echo $OnePost['id'];?>" target="_blank"><?php echo $OnePost['name'];?></a></h1><?php endif;?>
            <?php if($OnePost['message']):?><p><?php echo $SocialStream->trimText($OnePost['message'],250);?></p><?php endif;?>
            <div class="facebook-stream-footer">
                <a href="https://facebook.com/<?php echo $OnePost['id'];?>" target="_blank">
                    <img class="facebook-stream-small-icon" src="<?php echo plugins_url('/img/facebook-icon.png', __FILE__)?>">
                    <img class="facebook-stream-small-icon" src="<?php echo plugins_url('/img/icon_likes.png', __FILE__)?>"> <?php echo $OnePost['likes_count'];?>
                    <img class="facebook-stream-small-icon" src="<?php echo plugins_url('/img/icon_comments.png', __FILE__)?>"> <?php echo $OnePost['comments_count'];?>
                </a>
                <br>
                <a href="https://facebook.com/<?php echo $OnePost['from_id'];?>"><?php echo $OnePost['from'];?></a> @ <?php echo date("Y-m-d",strtotime($OnePost['created_time']));?>
            </div>
        </div> 
    
    
    <?php endforeach;?>
    <?php endif;?>
</div>
<script>
    jQuery(document).ready(function() {
        
        jQuery(".sliboxes").colorbox({rel:'group1',photo:true});
        jQuery(".video").colorbox({iframe:true, innerWidth:640, innerHeight:390});
        
        jQuery('#facebook-stream-container-<?php echo $unique_hash;?>').pinterest_grid({
            no_columns: <?php echo $cols; ?>,
            padding_x: <?php echo $padding; ?>,
            padding_y: <?php echo $padding; ?>,
            margin_bottom: <?php echo $bottom_margin;?>,
            single_column_breakpoint: 500
        });
        
    });
</script>
