<?php

echo "Error: $message\r\n";
echo "File: $file\r\n";
echo "Line: $line\r\n";
echo 'Memory = ' . memory_get_usage() . "\r\n";
echo 'Processtime = ' . number_format(microtime(1) - $_SERVER['starttime'], 4) . "\r\n";
echo "\r\nCode:\r\n";
foreach (self::get_code($file, $line) as $_line => $code) {
    echo $_line + 1;
    echo "  : ";
    echo rtrim($code);
    if ($_line + 1 == $line) echo "<--";
    echo "\r\n";
}
echo "\r\nInclude Files:\r\n";
foreach (get_included_files() as $file) {
    echo "  " . $file . "\r\n";
}


?>