<?php

// Add Scripts

function wpt_add_scripts(){
    // Add Main CSS

    wp_enqueue_style('wpt-main-style', plugins_url(). '/wp-tut/css/style.css');

    // Add Main JS 
    wp_enqueue_script('wpt-main-script', plugins_url(). '/wp-tut/js/main.js');
}

add_action('wp_enqueue_scripts','wpt_add_scripts');

?>