<?php
$connect = @pg_connect("host=localhost port=5432 dbname=myapp user=postgres password=qwerty")
or die("not connet");
?>