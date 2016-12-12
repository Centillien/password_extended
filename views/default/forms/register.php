<?php
/**
 * MyVox register form
 *
 * @package MyVox
 * @subpackage Core
 */

if (myvox_is_sticky_form('register')) {
    $values = myvox_get_sticky_values('register');

    // Add the sticky values to $vars so views extending
    // register/extend also get access to them.
    $vars = array_merge($vars, $values);

    myvox_clear_sticky_form('register');
} else {
    $values = array();
}

$password = $password2 = '';
$username = myvox_extract('username', $values, get_input('u'));
$email = myvox_extract('email', $values, get_input('e'));
$name = myvox_extract('name', $values, get_input('n'));

?>
    <div class="mtm">
        <label><?php echo myvox_echo('name'); ?></label><br />
        <?php
        echo myvox_view('input/text', array(
            'name' => 'name',
            'value' => $name,
            'autofocus' => true,
            'required' => true
        ));
        ?>
    </div>
    <div>
        <label><?php echo myvox_echo('email'); ?></label><br />
        <?php
        echo myvox_view('input/text', array(
            'name' => 'email',
            'value' => $email,
            'required' => true
        ));
        ?>
    </div>
    <div>
        <label><?php echo myvox_echo('username'); ?></label><br />
        <?php
        echo myvox_view('input/text', array(
            'name' => 'username',
            'value' => $username,
            'required' => true
        ));
        ?>
    </div>


<?php
// view to extend to add more fields to the registration form
echo myvox_view('register/extend', $vars);

// Add captcha hook
echo myvox_view('input/captcha', $vars);

echo '<div class="myvox-foot">';
echo myvox_view('input/hidden', array('name' => 'friend_guid', 'value' => $vars['friend_guid']));
echo myvox_view('input/hidden', array('name' => 'invitecode', 'value' => $vars['invitecode']));
echo myvox_view('input/submit', array('name' => 'submit', 'value' => myvox_echo('register')));
echo '</div>';
