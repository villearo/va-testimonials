<?php

function va_testimonials_deactivation() {
    // our post type will be automatically removed, so no need to unregister it
 
    // clear the permalinks to remove our post type's rules
    flush_rewrite_rules();
    
}
register_deactivation_hook( __FILE__, 'va_testimonials_deactivation' );
