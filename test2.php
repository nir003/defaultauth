<?php
/**
 * Created by PhpStorm.
 * User: Nirjhor
 * Date: 11/6/2018
 * Time: 1:58 PM
 */
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mobile Test</title>
</head>
<body>

<p id="text"></p>

<script type="text/javascript">
    var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
    var element = document.getElementById('text');
    if (isMobile) {

        element.innerHTML = "You are using Mobile";
    } else {
        alert("desktop");
        element.innerHTML = "You are using Desktop";
    }
</script>
</body>
</html>
