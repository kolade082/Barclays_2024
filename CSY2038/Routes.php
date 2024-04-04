<?php

namespace CSY2038;

use CSY\DatabaseTable;
use CSY\MyPDO;
use CSY2038\Controllers\PageController;

class Routes implements \CSY\Routes
{
    public function getPage()
    {
        $myDb = new MyPDO();
        $pdo = $myDb->db();

        $databaseUsers = new DatabaseTable($pdo, 'users', 'id');
        $databaseAddresses = new DatabaseTable($pdo, 'addresses', 'id');
        $dbWorkAndIncome = new DatabaseTable($pdo, 'work_and_income', 'id');
        $dbApplications = new DatabaseTable($pdo, 'applications', 'id');

        $pageController = new PageController($databaseUsers, $databaseAddresses, $dbWorkAndIncome, $dbApplications, $_GET, $_POST);
        $page = $pageController->home();
        if ($_SERVER['REQUEST_URI'] !== '/') {
            $functionName = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');
            if (str_contains($functionName, "/")) {
                //                $page = $pageController->$functionName();
                $r = explode("/", $functionName);

                $pageController = "CSY2038\Controllers\\" . ucfirst($r[0]) . "Controller";
                $functionName = $r[1];
                $pageController = new $pageController($databaseUsers, $databaseAddresses, $dbWorkAndIncome, $dbApplications, $_GET, $_POST);
                $page = $pageController->$functionName();
            } else {
                $page = $pageController->$functionName();
            }
        }
        return $page;
    }
}
