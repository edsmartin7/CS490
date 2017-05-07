<?php

$backURL = "http://afsaccess3.njit.edu/~em244/CS490/";

$floc = 'pdir/taskList.txt';
$dfile = fopen($floc, 'r');
$marr = fread($dfile, filesize($floc));
$marr = json_decode($marr, 1);
fclose($dfile);

print("<pre>");
print_r($marr);
print("</pre>");
?>