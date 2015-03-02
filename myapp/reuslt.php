<!DOCTYPE html>
<html>
<head>
    <title>url转换工具</title>
    <meta charset="utf-8">
</head>

<body >
<table>
    <?php
    $urltext =  $_POST["urltext"];
    $urlary = explode("\n",$urltext);
    $content = "";
    for($i=0;$i<=sizeof($urlary);$i++){
        $contentadd =urlencode($urlary[$i])."</br>"."\n";
        $content = $content.$contentadd;
    }
    echo $content;
    ?>
</table>

</body>

<script type="text/javascript">

</script>
</html>