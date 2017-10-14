<?php

function va_testimonials_display_testimonial() {

    $post_id = get_the_ID();
    $client_name = get_post_meta( $post_id, 'client_name', true );
    $client_job = get_post_meta( $post_id, 'client_job', true );
    $company = get_post_meta( $post_id, 'company', true );
    $company_url = esc_url( get_post_meta( $post_id, 'company_url', true ) );
    $image = get_the_post_thumbnail_url( $post_id, 'thumbnail' );

    $output = '<div class="col testimonial">';
    $output .= '<div class="bubble">' . get_the_content() . '</div>';
    $output .= '<div class="person">';
    if ( $image ) {
        $output .= '<img class="small" src="' . $image . '" />';
    }
    $output .= '<div>' . $client_name . '<br />';
    $output .= '<small>' . $client_job . '</small>';
    if ( $client_job && $company ) {
        $output .= ' - ';
    }
    $output .= '<small><a href="' . $company_url . '" target="_blank">' . $company . '</a></small></div>';
    $output .= '</div>';
    $output .= '</div>';
    echo $output;

}
