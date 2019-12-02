<?php
include "model.php";
$db_conf = parse_ini_file("database.conf");
ModelBase::setConnectionInfo($db_conf);
?>