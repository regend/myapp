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
    $userUrl =  $_POST["userUrl"];
    $urlary = explode("\n",$urltext);
    $content = "";
    $fp = "";
    $docname = "";
    for($i=0;$i<=sizeof($urlary);$i++){
        $contentadd = "<a href = ".$urlary[$i].">".$urlary[$i]."</a></br>"."\n";
        $content = $content.$contentadd;
    }
    if(!empty($userUrl)){
        $docname = $userUrl;
        $fp = fopen ("urlist/".$userUrl . '.html',"w");
    }
    else{
        $date = date('YmdHis');
        $docname = $date;
        $fp = fopen ("urlist/".$date . '.html',"w");
    }
    if (fwrite ($fp,$content)){
        fclose ($fp);
    }
    else {
            fclose ($fp);
        }
    header("Location:"."urlist/".$docname.".html");
//    确保重定向后，后续代码不会被执行
    exit;
    ?>
</table>

</body>

<script type="text/javascript">

</script>
</html>