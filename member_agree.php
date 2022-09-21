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
				function CheckAgree() 
				{
					if (form2.agree.checked == false) 
					{
						alert("이용약관 내용에 동의를 체크해 주십시오.");
						return;
					}
					location.href = "member_join.php";
				}
			</script>

			<table border="0" cellpadding="0" cellspacing="0" width="747">
				<tr><td height="13"></td></tr>
				<tr>
					<td height="30" align="center">
						<p><img src="images/login_title.gif" width="747" height="30" border="0"></p>
					</td>
				</tr>
				<tr><td height="13"></td></tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="685" class="cmfont">
				<tr>
					<td><img src="images/login_title1.gif" width="85" height="15" border="0"></td>
				</tr>
				<tr><td height="10"></td></tr>
			</table>

			<table border="0" cellpadding="5" cellspacing="1" width="685" bgcolor="cccccc">
				<tr>
					<td align="center" bgcolor="efefef">
						<table border="0" cellpadding="0" cellspacing="30" width="100%" bgcolor="white">
							<tr>
								<td align="center">
									<table border="0" cellpadding="0" cellspacing="0" width="100%" class="cmfont">
										<tr>
											<td>
												<p><textarea style="font-size:9pt; letter-spacing:-1px; line-height:18px; border-style:solid;border-width:1px;border-color:DCDCDC; color:464646; background:F6F6F6; width:605px; height:383px;padding:20px;">제1장. 총칙

[인덕닷컴] 쇼핑몰은 공정거래위원회에서 심의한 표준약관을 사용하고 있습니다

제1조(목적)
이 약관은 인덕닷컴 회사(전자상거래 사업자)가 운영하는 인덕닷컴 사이버 몰
(이하 “몰”이라 한다)에서 제공하는 인터넷 관련 서비스(이하 “서비스”라 한다)를
이용함에 있어 사이버 몰과 이용자의 권리/의무 및 책임사항을 규정함을 목적으로 합니다.

※「PC통신, 무선 등을 이용하는 전자상거래에 대해서도 그 성질에 반하지 않는 한 
이 약관을 준용합니다」

제2조(정의)
①“몰” 이란 인덕닷컴 회사가 재화 또는 용역(이하 “재화등”이라 함)을 이용자에게
제공하기 위하여 컴퓨터등 정보통신설비를 이용하여 재화등을 거래할 수 있도록 설정한 
가상의 영업장을 말하며, 아울러 사이버몰을 운영하는 사업자의 의미로도 사용합니다.

. . .


제24조(재판권 및 준거법)
①“몰”과 이용자간에 발생한 전자상거래 분쟁에 관한 소송은 제소 당시의 이용자의
주소에 의하고, 주소가 없는 경우에는 거소를 관할하는 지방법원의 전속관할로 합니다. 
다만, 제소 당시 이용자의 주소 또는 거소가 분명하지 않거나 외국 거주자의 경우에는
민사소송법상의 관할법원에 제기합니다.

②“몰”과 이용자간에 제기된 전자상거래 소송에는 한국법을 적용합니다.
</textarea></p>
											</td>
										</tr>
										<tr>
											<td height="30">
												<!-- form2  시작 --->
												<form name = "form2">
												<input type="checkbox" name="agree" value="ok">
												이용약관 내용에 동의하시면 선택해 주십시오.
												</form>
												<!-- form2 끝 --->
											</td>
										</tr>
									</table>
									
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="685" class="cmfont">
				<tr>
					<td height="45" align="right">
						<a href="javascript:CheckAgree()"><img src="images/b_agreeok.gif" border="0"></a> 
						<a href="index.html"><img src="images/b_agreeno.gif" border="0"></a>
					</td>
				</tr>
			</table>

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	

<? include "main_bottom.php"; ?>

</body>
</html>