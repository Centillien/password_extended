<?php

gatekeeper();

$guid = myvox_get_logged_in_user_guid();

$entity = get_user($guid);
if (!myvox_instanceof($entity, 'user')) {
    logout();
    register_error(myvox_echo('password_extended:usernotfound'));
    forward(REFERER);
}

// Set the title appropriately
$title = myvox_echo('password_extended:finished');
$content = myvox_view_title($title);

$content .= "<br>". myvox_echo('password:finished_message',[$entity->username]);

$params = array(
    'content' => $content,
    'sidebar' => $sidebar,
);
$body = myvox_view_layout('one_sidebar', $params);

echo myvox_view_page($title, $body);