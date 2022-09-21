<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
  include "common.php";
?>
<html>
<head>
<title>인덕닷컴 쇼핑몰</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link href="include/font.css" rel="stylesheet" type="text/css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700&family=Noto+Sans+KR:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script language="Javascript" src="include/common.js"></script>
</head>

<body style="margin:0">

<? include "main_top.php"; ?>

<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	

			<!--  현재 페이지 자바스크립  -------------------------------------------->
			<script language = "javascript">
			function Login_Check() 
			{
				if (!form2.uid.value) {
					alert("아이디를 입력해 주십시오.");
					form2.uid.focus();
					return;
				}
				if (!form2.pwd.value) {
					alert("비밀번호를 입력해 주십시오.");
					form2.pwd.focus();
					return;
				}
				form2.submit();
			}
			function NoMember_Check() 
			{
				if (!form3.name.value) {
					alert("이름을 입력해 주십시오.");
					form3.name.focus();
					return;
				}
				if (!form3.email.value) {
					alert("E-Mail을 입력해 주십시오.");
					form3.email.focus();
					return;
				}
				form3.submit();
			}
			</script>

			<!---- 화면 우측(로그인) S -------------------------------------------------->	
			<table border="0" cellpadding="0" cellspacing="0" width="747">
				<tr><td height="13"></td></tr>
				<tr>
					<td height="30" align="center">
						<img src="images/login_title.gif" width="747" height="30" border="0">
					</td>
				</tr>
				<tr><td height="15"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="690">
				<tr>
					<td><img src="images/jumun_title1.gif" border="0" align="absmiddle"></td>
				</tr>
				<tr><td height="40"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="720">
				<tr>
					<td width="747" align="center" valign="top">
						<table border="0" cellpadding="0" cellspacing="8" width="523" bgcolor="E9E9E9">
							<tr>
								<td height="237" align="center" bgcolor="white">
									<table border="0" cellpadding="0" cellspacing="0" width="440">
										<tr>
											<td width="120" align="center"><img src="images/login_image1.gif" width="110" height="90" border="0"></td>
											<td width="320">
												<table border="0" cellpadding="0" cellspacing="0" width="320">
													<!-- form2 시작 ------>
													<form name="form2" method="post" action="jmlogin_check.php">
													<tr>
														<td width="50" height="25" class="smfont">
															<p style="padding-left:10px;">아이디</p>
														</td>
														<td>
															<input type="text" name="uid" size="20" maxlength="12" class="cmfont1">
														</td>
														<td width="100" rowspan="2">
															<a href="javascript:Login_Check()" onfocus="this.blur()"><img align="absmiddle" src="images/b_login.gif" width="50" height="39" border="0"></a>
														</td>
													</tr>
													<tr>
														<td width="50" height="25" class="smfont">
															<p style="padding-left:10px;">암호</p>
														</td>
														<td>
															<input type="password" name="pwd" size="20" maxlength="12" class="cmfont1">
														</td>
													</tr>
													</form>
													<!--form2 끝 ------>
												</table>
											</td>
										</tr>
									</table>
									<table border="0" cellpadding="0" cellspacing="0" width="512">
										<tr><td height="15"></td></tr>
										<tr><td height="2" bgcolor="E9E9E9"></td></tr>
										<tr><td height="15"></td></tr>
									</table>
									<table border="0" cellpadding="0" cellspacing="0" width="440">
										<tr>
											<td width="120" align="center"><img src="images/login_image5.gif" width="110" height="90" border="0"></td>
											<td width="320">
												<table border="0" cellpadding="0" cellspacing="0" width="320">
													<!-- form3 시작 ------>
													<form name="form3" method="post" action="jmlogin_check.php">
													<tr>
														<td width="50" height="25" class="smfont">
															<p style="padding-left:10px;">이름</p>
														</td>
														<td>
															<input type="text" name="name" size="20" maxlength="20" class="cmfont1">
														</td>
														<td width="100" rowspan="2">
															<a href="javascript:NoMember_Check()" onfocus="this.blur()"><img align="absmiddle" src="images/b_ok.gif" width="50" height="39" border="0"></a>
														</td>
													</tr>
													<tr>
														<td width="50" height="25" class="smfont">
															<p style="padding-left:10px;">E-Mail</p>
														</td>
														<td>
															<input type="text" name="email" size="20" maxlength="50" class="cmfont1">
														</td>
													</tr>
													</form>
													<!--form3 끝 ------>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	

<? include "main_bottom.php"; ?>

</body>
</html>