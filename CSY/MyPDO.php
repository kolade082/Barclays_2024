<?php

namespace CSY;

use PDO;

class MyPDO
{
    public function db($database = 'credit_card'): PDO
    {
        return new PDO('mysql:host=mysql;dbname=' . $database . ';charset=utf8', 'student', 'student');
    }
}
