<?php
wp_list_comments(
    array(
        'callback' => 'fenikso_comment',
    )
);

