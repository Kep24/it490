<?php
    // $path = " Desktop\Fall '23\IT490 tings\it490\Api";
    // exec("cd".$path. " && node test.js", $out, $err);
    exec("node genSearch.js", $output);
    var_dump($output);
    echo"$output[0]";
?>

