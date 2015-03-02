<!DOCTYPE html>
<html>
<head>
    <title>url生成</title>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/grumble.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
</head>
<body>

<form class="form-horizontal" action="reuslt.php" method="post">
    <fieldset>
        <div id="legend" class="">
            <legend class=""><a href = "" id = "test">请输入url</a></legend><span class="ex" id = "grumble1" ></span>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="input-prepend">
              <span class="add-on">
                <label class="checkbox">
                    <input id="userBox" type="checkbox" class="" checked="">
                </label>
              </span>
                    <input id="userUrl" name="userUrl" class="span2" placeholder="勾选自定义url" type="text" disabled="" value="">
                </div>
                <p class="help-block"></p>
            </div>
            <!-- Textarea -->
            <div class="controls">
                <div class="textarea">
                    <textarea id="urltext" name="urltext" placeholder="说明：在输入框中输入待测的url，点击确定生成临时的html页面，在appscan中起始url设置为生成的临时html地址，注意要在其他服务器和域中添加应用所在服务器的域名。" class="" style="margin: 0px; width: 979px; height: 517px;"></textarea>
                </div>
            </div>
        </div>

        <div class="control-group">
            <!-- Button -->
            <div class="controls">
                <button class="btn btn-success" type="submit"  >小冯是土豪</button>
            </div>
        </div>

    </fieldset>
</form>

</body>
<script src="js/jQuery/jquery-1.9.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--<script src="js/jquery.grumble.min.js"></script>-->
<script>
    //    function getreslut(){
    //        var url = document.getElementById('comfirm').value.split("\n");
    //        for(i = 0;i<url.length;i++){
    //            document.write("<a href = "+url[i]+">"+url[i]+"</a></br>");
    //        }
    //
    //    }
    $(document).ready(function () {

        $("#userBox").removeAttr("checked");

        $("#userBox").click(function(){
            $("#userBox").each(function(){
                if ("checked" == $(this).attr("checked")) {
                    $(this).removeAttr("checked");
                    $("#userUrl").attr("disabled","disabled");
                    $("#userUrl").val("");
                }
                else{
                    $(this).attr("checked","checked");
                    $("#userUrl").removeAttr("disabled");

                }
            })
        })
//
//    $('#test').click(function(e){
//
//        $('#grumble1').grumble(
//            {
//                text: 'Click me!',
//                angle: 150,
//                distance: 3,
//                showAfter: 3000,
//                hideAfter: false,
//                hasHideButton: true,
//                buttonHideText: 'Pop!'
//            }
//    );
//})
    })

</script>
</html>