<?php

    $cn =pg_connect("host=locahost port=5432 dbname=Unrealchats user=postgres password= P@rth12@12");
    if($cn){

        echo "connected";
    }



?>