<?php
    // $path = " Desktop\Fall '23\IT490 tings\it490\Api";
    // exec("cd".$path. " && node test.js", $out, $err);
    exec("cd .\Api");
    exec("cd .\Api  && node genSearch.js", $output);
    foreach ($output as $x){
        echo"$x \n";
    }
    
?>

