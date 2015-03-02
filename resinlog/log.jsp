<%@ page import="java.io.BufferedReader" %>
<%@ page import="java.io.File" %>
<%@ page import="java.io.FileNotFoundException" %>
<%@ page import="java.io.FileReader" %>
<%@ page import="java.io.IOException" %>
<%@ page import="java.io.InputStream" %>
<%@ page import="java.io.InputStreamReader" %>
<%@ page import="java.io.LineNumberReader" %>
<%@ page import="java.util.Calendar" %>

<html>
<head>
	<meta http-equiv="refresh" content="5">
</head>
<body>
<div id = "text">
    <%@ page language="java" contentType="text/html; charset=GBK" %>
    <%@page language="java" %>
    <%
        String type = request.getParameter("type");
		File directory = new File("");
		String path = directory.getCanonicalPath();

        Calendar cal = Calendar.getInstance();
        String month = String.valueOf(cal.get(Calendar.MONTH)+1);
        if (month.length() == 1){
           month = "0" + month; 
        }
        try {
            Process p = Runtime.getRuntime().exec("tail -n 200 " + path + "/log/"+type);  //����Linux����

            InputStreamReader ir = new InputStreamReader(p.getInputStream());
            BufferedReader buff = new BufferedReader(ir);
            //LineNumberReader input = new LineNumberReader (ir);      //����IO�ܵ���׼���������ִ�к����ʾ����

            String line;
            while ((line = buff.readLine()) != null){     //���д�ӡ�������
                out.println(line.replace("["+month, "</br>["+month));
            }
			buff.close();
			p.destroy();
        } catch (IOException e) {
            e.printStackTrace();
        }
    %>
</div>
<script>

	step=0;

	function flash_title(){
		step++;
		if (step==3) {step=1};
		if (step==1) {document.title='�鿴��־'};
		if (step==2) {document.title='������Ϣ'};
	setTimeout("flash_title()",1000);
	}

	function getCookie(name) {  
		var nameEQ = name + "=";  
		var ca = document.cookie.split(';');      
		for(var i=0;i < ca.length;i++) {  
			var c = ca[i];                        
			while (c.charAt(0)==' ') {         
			c = c.substring(1,c.length);  
		}  
		if (c.indexOf(nameEQ) == 0) {      
			return unescape(c.substring(nameEQ.length,c.length));    
		}  
	}  
		 return false;  
	}  

	function setCookie(name, value, seconds) {  
		seconds = seconds || 0;   //seconds��ֵ��ֱ�Ӹ�ֵ��û��Ϊ0�������php��һ����  
		var expires = "";  
		if (seconds != 0 ) {      //����cookie����ʱ��  
			var date = new Date();  
			date.setTime(date.getTime()+(seconds*1000));  
			expires = "; expires="+date.toGMTString();  
		}  
		document.cookie = name+"="+escape(value)+expires+"; path=/";   //ת�벢��ֵ  
	}


	function checkNew(){
		var oldlog = getCookie("resinlog");
		var newlog = document.getElementById("text").innerHTML.length;
		if(oldlog != newlog){
			flash_title();
			setCookie("resinlog",newlog);
		}
	}
checkNew();
</script>
</body>
</html>