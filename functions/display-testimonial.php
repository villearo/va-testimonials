<?php

function va_testimonials_display_testimonial() {

    $post_id = get_the_ID();
    $client_name = get_post_meta( $post_id, 'client_name', true );
    $client_job = get_post_meta( $post_id, 'client_job', true );
    $company = get_post_meta( $post_id, 'company', true );
    $company_url = esc_url( get_post_meta( $post_id, 'company_url', true ) );
    $image = get_the_post_thumbnail_url( $post_id, 'thumbnail' );

    echo '<div class="col testimonial">';
        echo '<div class="bubble">' . get_the_content() . '</div>';
        echo '<div class="person">';
            echo '<img class="small" src="' . $image . '" />';
            echo '<div>' . $client_name . '<br />';
            echo '<small>' . $client_job . '</small>';
            if ( $client_job && $company ) {
                echo ' - ';
            }
            echo '<small><a href="' . $company_url . '" target="_blank">' . $company . '</a></small></div>';
        echo '</div>';
    echo '</div>';

}
