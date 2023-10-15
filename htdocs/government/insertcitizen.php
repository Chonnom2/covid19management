<HTML>
<HEAD>
<META http-equiv="content-type" content="text/html; charset=utf-8">
    <title>국민등록</title>
    <style>
      body {
        font-family: Consolas, monospace;
        font-family: 12px;
      }
    </style>
</HEAD>
<BODY>

<h1> 국민 등록 </h1>
<FORM METHOD = "post" ACTION="insertcitizen_result.php">
  이름 : <INPUT TYPE = "text" NAME = "name"> <br>
  주민등록번호 : <INPUT TYPE = "text" NAME = "RRN"> <br>
  주소 : <INPUT TYPE = "text" NAME = "address"> <br>
  휴대폰 : <INPUT TYPE = "text" NAME = "phone"> <br>
  <BR><BR>
  <INPUT TYPE= "submit" VALUE = "국민 등록">
  <INPUT TYPE= "button" onclick='window.close()' VALUE = "취소">
</FORM>
</BODY>
</HTML>