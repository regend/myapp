<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>接口url生成工具</title>
</head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="css/messenger.css" rel="stylesheet">
<link href="css/messenger-theme-future.css" rel="stylesheet">
<link href="css/gototop.css" rel="stylesheet">

<body>


<form id = "postform" class="form-horizontal" action="" method="post">
    <fieldset>
        <div id="legend" class="">
            <legend class="">表单名</legend>
        </div>
        <div class="control-group">

            <!-- Text input-->
            <label class="control-label" for="input01">Text input</label>
            <div class="controls">
                <input id="fieldname1" type="text" placeholder="placeholder" class="input-xlarge"><input  id="fieldval1" name="fieldval1" type="text" placeholder="placeholder" class="input-xlarge">
                <p class="help-block">Supporting help text</p>
            </div>
        </div><div class="control-group">

            <!-- Text input-->
            <label class="control-label" for="input01">Text input</label>
            <div class="controls">
                <input id="fieldname2" type="text" placeholder="placeholder" class="input-xlarge"><input id="fieldval2" name="fieldval2" type="text" placeholder="placeholder" class="input-xlarge">
                <p class="help-block">Supporting help text</p>
            </div>
        </div>

        <div class="control-group">

            <!-- Text input-->
            <label class="control-label" for="input01">Text input</label>
            <div class="controls">
                <input id="fieldname3" type="text" placeholder="placeholder" class="input-xlarge"><input id="fieldval3" name="fieldval3" type="text" placeholder="placeholder" class="input-xlarge">
                <p class="help-block">Supporting help text</p>
            </div>
        </div>

        <div class="control-group">

            <!-- Text input-->
            <label class="control-label" for="input01">Text input</label>
            <div class="controls">
                <input id="fieldname4" type="text" placeholder="placeholder" class="input-xlarge"><input id="fieldval4" name="fieldval4" type="text" placeholder="placeholder" class="input-xlarge">
                <p class="help-block">Supporting help text</p>
            </div>
        </div>

        <div class="control-group">

            <!-- Text input-->
            <label class="control-label" for="input01">Text input</label>
            <div class="controls">
                <input id="fieldname5" type="text" placeholder="placeholder" class="input-xlarge"><input id="fieldval5" name="fieldval5" type="text" placeholder="placeholder" class="input-xlarge">
                <p class="help-block">Supporting help text</p>
            </div>
        </div>
        <div class="controls">
            <button id = "ini" class="btn btn-success">初始化</button>  <button id="comfirm" class="btn btn-success">提交</button>
        </div>
    </fieldset>
</form>

<script src="js/jQuery/jquery-1.9.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/messenger.min.js"></script>
<script src="js/gototop.js"></script>
<script>
    $(document).ready(function () {

        //初始化弹窗
        $._messengerDefaults = {
            extraClasses: 'messenger-fixed messenger-theme-future messenger-on-bottom'
        }

        //初始化提交方法
        $("#ini").click(function(){
            $("#fieldname1").attr("disabled","true");
            $("#fieldname2").attr("disabled","true");
            $("#fieldname3").attr("disabled","true");
            $("#fieldname4").attr("disabled","true");
            $("#fieldname5").attr("disabled","true");
            $("#fieldval1").attr("id",$("#fieldname1").val());
            $("#fieldval2").attr("id",$("#fieldname2").val());
            $("#fieldval3").attr("id",$("#fieldname3").val());
            $("#fieldval4").attr("id",$("#fieldname4").val());
            $("#fieldval5").attr("id",$("#fieldname5").val());
            $("input[name^='fieldval']").each(function(){
                alert($(this).attr("id"))
            });
            return false;
        })

        //post
        $("#comfirm").click(function(){
            $.post("http://127.0.0.1/myapp/haha.php",
                {
                    name:"test"
                },
                function(data){
                    window.open()
                    alert(data);
                }
            )
            return false;
        })

        //处理url


        $(function(){
            document.onkeydown = function(e){
                var ev = document.all ? window.event : e;
                if(ev.keyCode==13) {
                    window.open(makeURL());
                    return false;
                }
            }
        });

        $.scrollUp({
            scrollName: 'scrollUp', // Element ID
            topDistance: '300', // Distance from top before showing element (px)
            topSpeed: 300, // Speed back to top (ms)
            animation: 'fade', // Fade, slide, none
            animationInSpeed: 200, // Animation in speed (ms)
            animationOutSpeed: 200, // Animation out speed (ms)
            scrollText: '', // Text for element
            activeOverlay: true  // Set CSS color to display scrollUp active point, e.g '#00FFFF'
        });


    })
</script>

</body>

</html>