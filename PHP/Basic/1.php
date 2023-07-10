<?php

class user
{
    public $name;
    public $age;
    public function __construct()
    {
        echo "da chay construct";
    }
    function getAge()
    {
        return 12;
    }

}
$Hiep = new user;
echo $Hiep->getAge();
?>