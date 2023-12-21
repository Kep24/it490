<?php
    // $path = " Desktop\Fall '23\IT490 tings\it490\Api";
    // exec("cd".$path. " && node test.js", $out, $err);
    //when testing on desktop add in a "." before the \Api
    exec("cd \Api  && node pokeInfo.js ditto", $output);
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