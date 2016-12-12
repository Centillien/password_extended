

<?php

$content = myvox_view_form('register');
$params = array(
    'title' => 'Register',
    'filter' => '',
    'content' => $content
);

$body = myvox_view_layout('one_column', $params);

echo myvox_view_page('', $body);

?>

