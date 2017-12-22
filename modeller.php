<?php
require 'potato.model.php';
$table = @$_GET['tbl'];
$m = new PotatoModel($table);

?>