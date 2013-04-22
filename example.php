<?php
require("Filterss.php");

$f = new Filterss();
$f->loadFromUrl("http://thomasmuguet.info/index.php?feed/atom");
$f->filter(array("k’ą́sagi", "kasagi"));
echo $f->out();