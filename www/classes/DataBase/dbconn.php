<?php
namespace WebServer\Classes\DataBase;


class dbconn
{

    public function login_in($login, $password) {
        //$link = self::connect();
        $link = $_SESSION['dblink'];
        $query = "SELECT * FROM `users` WHERE `name` = '".$login."' and `password` = '".md5($password)."'";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));

        if ($result->num_rows != null) {
            $_SESSION['login'] = $login;
            return 'success';
        }
        else
            return 'error';
    }

    public function getList($nameList, $sortBy='id', $sortAsc='ASC') {
        $link = $_SESSION['dblink'];
        $queryList = "SELECT * FROM `".$nameList."` ORDER BY `".$sortBy."` ".$sortAsc."";
        $resultList = mysqli_query($link, $queryList) or die(mysqli_error($link));

        for ($data = []; $row = mysqli_fetch_assoc($resultList); $data[] = $row);

        return $data;
    }

    public function addTask($user_name, $user_email, $text) {
        $link = $_SESSION['dblink'];
        $query = "INSERT INTO `MySite`.`tasks` (`id`, `text`, `user_name`, `user_email`, `performed`, `edited`) VALUES (NULL, '".$text."', '".$user_name."', '".$user_email."', '0', '0')";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));

        return $result;
    }

    public function editTask($idTask, $textTask) {
        if(isset($_SESSION['login']) && $_SESSION['login'] == 'admin'){
            $link = $_SESSION['dblink'];
            $query = "UPDATE `MySite`.`tasks` SET `text` = '".$textTask."', `edited` = '1' WHERE `tasks`.`id` = ".$idTask."";
            $result = mysqli_query($link, $query) or die(mysqli_error($link));

            return $result;
        } else {
            return 'login_pls';
        }

    }

    public function performedTask($idTask, $performedBool) {
        if(isset($_SESSION['login']) && $_SESSION['login'] == 'admin'){
            $link = $_SESSION['dblink'];
            $query = "UPDATE `MySite`.`tasks` SET `performed` = '".$performedBool."' WHERE `tasks`.`id` = ".$idTask."";
            $result = mysqli_query($link, $query) or die(mysqli_error($link));

            return $result;
        } else {
            return 'login_pls';
        }
    }

    public function checkSort($sortBy='id', $sortAsc='ASC'){
        $link = $_SESSION['dblink'];
        $sort = [];
        $query = "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='MySite' AND `TABLE_NAME`='tasks'";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));

        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row["COLUMN_NAME"]);

        if($sortAsc == 'ASC') {
            $sort['sortAsc'] = $sortAsc;
        } elseif ($sortAsc == 'DESC'){
            $sort['sortAsc'] = $sortAsc;
        } else {
            $sort['sortAsc'] = 'ASC';
        }

        if (in_array($sortBy, $data))
            $sort['sortBy'] = $sortBy;
        else
            $sort['sortBy'] = 'id';

        return $sort;
    }
}
