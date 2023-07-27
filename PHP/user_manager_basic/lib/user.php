<?php
function check_login($user, $password)
{
    global $list_users;
    foreach ($list_users as $value) {
        if ($value['username'] == $user && $value['password'] == md5($password)) {
            return true;
        }
    }
    return false;
}
