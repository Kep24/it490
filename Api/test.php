<?php
    // $path = " Desktop\Fall '23\IT490 tings\it490\Api";
    // exec("cd".$path. " && node test.js", $out, $err);
    exec("cd \Api  && node genSearch.js", $output);
    $str = "";
    // foreach ($output as $x){
    //     echo"$x ";
    // }
    foreach ($output as $x){
        $str .="$x ";
    }
    echo $str;
    return $str;
    
?>