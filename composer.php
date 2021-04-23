<?php
$output = shell_exec('php ./composer.phar install');
//$output = shell_exec('ls -al');

echo "<pre>$output</pre>";
