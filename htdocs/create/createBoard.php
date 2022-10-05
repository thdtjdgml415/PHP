<?php
    include "../connect/connect.php";

    $sql = " CREATE TABLE myBoard (";
    $sql .= " myBoardID int(10) unsigned Not NULL auto_increment,";
    $sql .= " myMemberID int(10) unsigned Not NULL,";
    $sql .= " boardTitle varchar(50) NOT NULL,";
    $sql .= " boardContents varchar(40) NOT NULL,";
    $sql .= " boardView int(10) NOT NULL,";
    $sql .= " regTime int(20) NOT NULL,";
    $sql .= " PRIMARY KEY (myBoardID)";
    $sql .= ")charset=utf8;";
   
    $connect -> query($sql);
?>