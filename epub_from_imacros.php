<?php
$content = $_GET['send_content'];
$fp = fopen('tmp/temporario.txt', 'w');
fwrite($fp, $content);