<?php
require "tinder.php";

$h = new tinder( "TINDER-API-TOKEN-HERE");
print_r($h->get_matches());
?>
