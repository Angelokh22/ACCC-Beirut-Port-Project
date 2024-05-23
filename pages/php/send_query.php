<?php

    include "tools.php";

    if(
        isset($_POST['query']) && $_POST['query'] != ""
    )
    {

        $query = $_POST['query'];

        if(preg_match("/^(SELECT|INSERT|UPDATE|DELETE|CREATE|DROP|ALTER|TRUNCATE).*$/i", $query)){
            $result = send_query($query);
            print_r($result);
        }
        else {
            echo "NO";
        }
    }
    else {
        echo "NO";
    }

?>