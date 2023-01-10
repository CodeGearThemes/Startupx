<?php
/**
 * Template part for related post
 *
 * @package startupx
 */

$startupx_related_posts_args = array(
    'no_found_rows'       => true,
    'ignore_sticky_posts' => true,
    'posts_per_page'    => 2
);

$startupx_current_object = get_queried_object();

if ( $startupx_current_object instanceof WP_Post ) {
    $startupx_current_id = $startupx_current_object->ID;
    if ( absint( $startupx_current_id ) > 0 ) {
        // Exclude current post.
        $startupx_related_posts_args['post__not_in'] = array( absint( $startupx_current_id ) );
        // Include current posts categories.
        $startupx_categories = wp_get_post_categories( $startupx_current_id );
        if ( ! empty( $startupx_categories ) ) {
            $startupx_related_posts_args['tax_query'] = array(
                array(
                    'taxonomy' => 'category',
                    'field'    => 'term_id',
                    'terms'    => $startupx_categories,
                    'operator' => 'IN',
                )
            );
        }
    }
}

$startupx_related_posts_query = new WP_Query( $startupx_related_posts_args );
if( $startupx_related_posts_query->have_posts() ): ?>
    <div class="section--related-posts">
        <div class="content--related-inner">
            <div class="section-title">
                <h3><?php echo esc_html__( 'Related Posts', 'startupx' ); ?></h3>
            </div><!-- Section Title  -->
            <div class="related--single-entry">
                <div class="grid">
                    <?php
                    while( $startupx_related_posts_query->have_posts() ) :

                        $startupx_related_posts_query->the_post();
                        ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('article post-card grid__item large--one-half medium--one-half small--one-whole'); ?>>
                            <div class="content-inner">
                                <?php startupx_post_thumbnail(); ?>
                                <div class="entry-header">
                                    <?php
                                        if ( 'post' === get_post_type() ) : 
                                            $startupx_meta_class = '';
                                            if( ! has_post_thumbnail() ){
                                                $startupx_meta_class = 'no-thumbnail-meta';
                                            }
                                        ?>
                                            <div class="entry-meta <?php echo esc_attr( $startupx_meta_class, 'startupx' ) ?>">
                                                <?php startupx_posted_on(); ?>
                                            </div><!-- .entry-meta -->
                                    <?php endif; ?>
                                    <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
                                </div>
                                <div class="entry-content">
                                    <?php the_excerpt(); ?>
                                </div><!-- .entry-content -->
                            </div>
                        </article> 
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
endif;