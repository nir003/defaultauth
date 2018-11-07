<?php
/**
 * Created by PhpStorm.
 * User: Nirjhor
 * Date: 11/6/2018
 * Time: 4:53 AM
 */

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>

        .warningDisplay {
            display: none;
        }

        #warningDisplay_for_desktop {
            display: none;
        }

       /* @media only screen and (min-width: 768px) {
            .warningDisplay_for_desktop {
                display: inline-block;
            }
        }*/

        @media screen and (orientation: portrait) {

            .warningDisplay {
                display: inline-block;
            }
        }

        @media screen and (orientation: landscape) {
            .warningDisplay {
                display: none;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Alerts</h2>

    <div class="alert alert-success alert-dismissible fade in warningDisplay">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Please !</strong> Go back to <strong>Landscape Mood.</strong>
    </div>

    <div class="alert alert-success alert-dismissible fade in " id="warningDisplay_for_desktop">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Please !</strong> Go to <strong>Mobile Mood.</strong>
    </div>
</div>


<script type="text/javascript">


    var test = function () {

        var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);

        var element = document.getElementById('warningDisplay_for_desktop');
        if (isMobile) {
            //element.innerHTML = "You are using Mobile";
            element.style.display = "none";
            //alert('Mobile');
        } else {
            //element.innerHTML = "You are using Desktop";
            //alert('desktop');

            element.style.display = "inline-block";
        }
    }

    window.onload = test;
    window.onresize = test;


</script>


</body>
</html>
