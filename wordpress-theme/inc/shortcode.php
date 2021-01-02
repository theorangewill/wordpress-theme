<?php

add_shortcode('tooltip', 'ttw_post_tooltip');

function ttw_post_tooltip($args, $content){
    $atts = shortcode_atts(
        array(
            'placement' => 'top',
            'info' => ''
        ),
        $args,
        'tooltip'
    );
    $info = ($atts['info'] == '' ? $content : $atts['info']);
    return '<span style="display: inline; font-weight: 700" data-toggle="tooltip" data-placement="'.$atts['placement'].'"title="'.$info.'">'.$content.'</span>';
}


add_shortcode('item', 'ttw_post_content_item');

function ttw_post_content_item($args, $content){
    $atts = shortcode_atts(
        array(
            'id'
        ),
        $args,
        'item'
    );
    return '<h3 id="'.$atts[0].'" >'.$content.'</h3>';
}

add_shortcode('subitem', 'ttw_post_content_subitem');

function ttw_post_content_subitem($args, $content){
    $atts = shortcode_atts(
        array(
            'id'
        ),
        $args,
        'subitem'
    );
    return '<h4 id="'.$atts[0].'" >'.$content.'</h4>';
}

?>