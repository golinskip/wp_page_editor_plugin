<?php
if (!defined('WPINC')) {
    die;
}
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <article role="main" class="primary-content" id="post-<?php the_ID(); ?>">
        <?php if($cnf['show_title'] == 1): ?>
        <?php if ( is_front_page() ) { ?>
            <h1><?php the_title(); ?></h1>
        <?php } else { ?>
            <h1><?php the_title(); ?></h1>
        <?php } ?>
        <?php endif; ?>
    
        <?php the_content(); ?>
        
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages', 'wtst' ), 'after' => '</div>' ) ); ?>
       
        <?php edit_post_link( __( 'Edit', 'wtst' ), '<span class="edit-link">', '</span>' ); ?>
    </article>
    
        <?php endwhile; ?>