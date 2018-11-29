<div class="col-md-3">
 <div class="post-img">
  <?php echo get_the_post_thumbnail($post->ID,'post-thumba', array('class' => 'card-img-top')) ?>
 </div>
 <div class="time">
  <i class="far fa-calendar"></i>  <?php echo get_the_date('j F, Y'); ?> 
  <i class="fas fa-comment-alt"></i> <?php comments_number( 'No comments yet', '1 Comment', 'Comments' ); ?> 
 </div>
 <div class="post-title">
  <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
 </div>
 <div class="post-content">
  <?php the_excerpt(); ?>
 </div>
</div>


