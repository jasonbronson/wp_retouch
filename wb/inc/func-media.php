<?php

function wobootstrap_get_media($args = array())
{
    $entry_video = hybrid_media_grabber(array('type' => 'video', 'split_media' => true, 'before' => '<div class="entry-media embed-responsive embed-responsive-16by9">', 'after' => '</div>'));
    $entry_gallery = wobootstrap_get_gallery(array('split_gallery' => true, 'before' => '<div class="entry-media">', 'after' => '</div>'));
    $entry_thumbnail = get_the_image(array('size' => 'wb-16by9-large', 'split_content' => true, 'order' => array('featured'), 'before' => '<div class="entry-media">', 'after' => '</div>', 'echo' => false));

    if ($entry_video) {
        $entry_media = $entry_video;
    } elseif ($entry_gallery) {
        $entry_media = $entry_gallery;
    } elseif ($entry_thumbnail) {
        $entry_media = $entry_thumbnail;
    } else {
        $entry_media = '';
    }

    return $entry_media;
}

function wobootstrap_get_thumbnail($args = array())
{
    $get_the_thumbnail = get_the_image(array('size' => 'full', 'format' => 'array'));

    if ($get_the_thumbnail) {
        $entry_thumbnail = '<div class="entry-media">
            <div class="entry-media__inner has-action-buttons">
                <a class="entry-thumbnail has-overlay" href="'.get_permalink().'">
                    <img src="'.$get_the_thumbnail['src'].'" class="'.$get_the_thumbnail['class'].'" alt="'.$get_the_thumbnail['alt'].'">
                </a>
                <div class="action-buttons action-buttons_top-right">
                    <a href="'.$get_the_thumbnail['src'].'" class="btn btn-link image-popup"><i class="fa fa-expand"></i></a>
                </div>
            </div>
        </div>';
    } else {
        $entry_thumbnail = false;
    }

    return $entry_thumbnail;
}
