<?php

function va_testimonials_shortcode( $atts ) {

    ob_start();
 
    // define attributes and their defaults
    extract( shortcode_atts( array (
        'order' => 'desc',
        'orderby' => 'date',
        'posts' => -1,
        'columns' => 3,
        'ids' => array(),
    ), $atts ) );

    if ( $ids ) {
        $id_array = explode(',', $ids);
    } else {
        $id_array = '';
    }

    if ( $columns < 3 ) {
        $columns_mobile = 1;
    } else {
        $columns_mobile = 2;
    }

    // define query parameters based on attributes
    $options = array(
        'post_type' => 'va-testimonials',
        'order' => $order,
        'orderby' => $orderby,
        'posts_per_page' => $posts,
        'columns' => $columns,
        'post__in' => $id_array,
    );
    $query = new WP_Query( $options );


    if ( $query->have_posts() ) : ?>
        <div class="nested grid-<?php echo $columns ?>_md-<?php echo $columns_mobile ?>_sm-1">

            <?php while ( $query->have_posts() ) :
                $query->the_post();

                va_testimonials_display_testimonial();

            endwhile;

            wp_reset_postdata(); ?>

        </div>
    <?php endif;

    $output = ob_get_clean();
    return $output;

}
add_shortcode( 'testimonials', 'va_testimonials_shortcode' );
