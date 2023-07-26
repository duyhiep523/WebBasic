<?php
function user_check($user)
{
    $regex = "^(?![0-9])[a-zA-Z1-9]{6,}$";
    if (!preg_match($regex, $user) || trim($user) == "")
        return false;
    return true;
}
function pass_check($pass)
{
    $regex = "^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9]{8,}$";
    if (!preg_match($regex, $pass)||$pass=="")
        return false;
    return true;
}