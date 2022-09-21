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

			<table border="0" cellpadding="0" cellspacing="0" width="747">
				<tr><td height="13"></td></tr>
				<tr>
					<td height="30" align="center"><img src="images/jumun_title.gif" width="746" height="30" border="0"></td>
				</tr>
				<tr><td height="13"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="690">
				<tr>
					<td><img src="images/jumun_title2.gif" border="0" align="absmiddle"></td>
				</tr>
				<tr><td height="5"></td></tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="685" class="cmfont">
				<tr><td colspan="6" height="2" bgcolor="8B9CBF"></td></tr>
				<tr>
					<td width="60"  bgcolor="F2F2F2" align="center" height="30"></td>
					<td width="395" bgcolor="F2F2F2" align="center">상품명</td>
					<td width="50"  bgcolor="F2F2F2" align="center">수량</td>
					<td width="90"  bgcolor="F2F2F2" align="center">금액</td>
					<td width="90"  bgcolor="F2F2F2" align="center">합계</td>
				</tr>
				<tr><td colspan="6" bgcolor="DEDCDD"></td></tr>

				<tr>
					<td width="60">
						<a href="product_detail.html?no=0000"><img src="product/0000_s.jpg" width="50" height="50" border="0"></a>
					</td>
					<td height="52">
						<a href="jumun_read.html?no=200701010001&page=1"><font color="686868">상품명3</font><br><font color="#0066CC">[옵션]</font> 옵션3</a>
					</td>
					<td align="center"><font color="686868">1</font></td>
					<td align="right"><font color="686868">120,000 원</font></td>
					<td align="right"><font color="686868">120,000 원</font></td>
				</tr>
				<tr><td colspan="6" background="images/line_dot.gif"></td></tr>

				<tr>
					<td width="60">
						<a href="product_detail.html?no=0000"><img src="product/0000_s.jpg" width="50" height="50" border="0"></a>
					</td>
					<td height="52">
						<a href="jumun_read.html?no=200701010001&page=1"><font color="686868">상품명1</font><br><font color="#0066CC">[옵션]</font> 옵션1</a>
					</td>
					<td align="center"><font color="686868">1</font></td>
					<td align="right"><font color="686868">120,000 원</font></td>
					<td align="right"><font color="686868">120,000 원</font></td>
				</tr>
				<tr><td colspan="6" background="images/line_dot.gif"></td></tr>

				<tr>
					<td width="60">
						<a href="product_detail.html?no=0000"><img src="product/0000_s.jpg" width="50" height="50" border="0"></a>
					</td>
					<td height="30">
						<a href="jumun_read.html?no=200701010001&page=1"><font color="686868">상품명2</font><br><font color="#0066CC">[옵션]</font> 옵션1</a>
					</td>
					<td align="center"><font color="686868">1</font></td>
					<td align="right"><font color="686868">20,000 원</font></td>
					<td align="right"><font color="686868">20,000 원</font></td>
				</tr>
				<tr><td colspan="6" height="2" bgcolor="8B9CBF"></td></tr>
			</table>

			<br><br><br>

			<table border="0" cellpadding="0" cellspacing="0" width="690">
				<tr>
					<td><img src="images/jumun_title3.gif" border="0" align="absmiddle"></td>
				</tr>
				<tr><td height="5"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="685" class="cmfont">
				<tr><td height="2" bgcolor="8B9CBF"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="1" width="685" bgcolor="#EEEEEE" class="cmfont">
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;주문번호</td>
					<td width="242" bgcolor="#FFFFFF">&nbsp;<font color="#686868">200701020001<font></td>
					<td width="100" bgcolor="#F2F2F2">&nbsp;결제금액</td>
					<td width="243" bgcolor="#FFFFFF">&nbsp;<font color="#D06404"><b>137,400 원</b></font></td>
				</tr>
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;결제방식</td>
					<td width="242" bgcolor="#FFFFFF">&nbsp;<font color="#686868">카드</font></td>
					<td width="100" bgcolor="#F2F2F2">&nbsp;승인번호</td>
					<td width="243" bgcolor="#FFFFFF">&nbsp;<font color="#686868">12341234</font></td>
				</tr>
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;카드종류</td>
					<td width="242" bgcolor="#FFFFFF">&nbsp;<font color="#686868">국민카드</font></td>
					<td width="100" bgcolor="#F2F2F2">&nbsp;할부</td>
					<td width="243" bgcolor="#FFFFFF">&nbsp;<font color="#686868">일시불</font></td>
				</tr>
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;결제방식</td>
					<td width="242" bgcolor="#FFFFFF">&nbsp;<font color="#686868">온라인 (국민:000-00-0000-0000)</font></td>
					<td width="100" bgcolor="#F2F2F2">&nbsp;보낸사람</td>
					<td width="243" bgcolor="#FFFFFF">&nbsp;<font color="#686868">홍길동</font></td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="685" class="cmfont">
				<tr><td height="2" bgcolor="8B9CBF"></td></tr>
			</table>

			<br><br><br>

			<table border="0" cellpadding="0" cellspacing="0" width="690">
				<tr>
					<td><img src="images/jumun_title4.gif" border="0" align="absmiddle"></td>
				</tr>
				<tr><td height="5"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="685" class="cmfont">
				<tr><td height="2" bgcolor="8B9CBF"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="1" width="685" bgcolor="#EEEEEE" class="cmfont">
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;주문자명</td>
					<td bgcolor="#FFFFFF" colspan="3">&nbsp;<font color="#686868">홍길동</font></td>
				</tr>
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;전화번호</td>
					<td width="242" bgcolor="#FFFFFF">&nbsp;<font color="#686868">02-111-1234</font></td>
					<td width="100" bgcolor="#F2F2F2">&nbsp;휴대폰</td>
					<td width="243" bgcolor="#FFFFFF">&nbsp;<font color="#686868">011-111-1111</font></td>
				</tr>
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;이메일</td>
					<td bgcolor="#FFFFFF" colspan="3">&nbsp;<font color="#686868">aaa@aaa.aa.aa</font></td>
				</tr>
				<tr><td height="1" bgcolor="8B9CBF" colspan="4"></td></tr>
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;수취인명</td>
					<td bgcolor="#FFFFFF" colspan="3">&nbsp;<font color="#686868">홍길동</font></td>
				</tr>
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;전화번호</td>
					<td width="242" bgcolor="#FFFFFF">&nbsp;<font color="#686868">02-111-1234</font></td>
					<td width="100" bgcolor="#F2F2F2">&nbsp;휴대폰</td>
					<td width="243" bgcolor="#FFFFFF">&nbsp;<font color="#686868">010-111-1234</font></td>
				</tr>
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;배달주소</td>
					<td bgcolor="#FFFFFF" colspan="3">&nbsp;<font color="#686868">[139-911] &nbsp; 서울 노원구 월계4동 인덕대학 산76</font></td>
				</tr>
				<tr height="25">
					<td width="100" bgcolor="#F2F2F2">&nbsp;메모</td>
					<td bgcolor="#FFFFFF" colspan="3">&nbsp;<font color="#686868"></font></td>
				</tr>
				
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="685" class="cmfont">
				<tr><td height="2" bgcolor="8B9CBF"></td></tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="690">
				<tr>
					<td height="40" class="cmfont" align="right">
						<img src="images/b_list.gif" border="0" OnClick="location.href='jumun.html?page=1'" style="cursor:hand">&nbsp;&nbsp;&nbsp
					</td>
				</tr>
			</table>

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	

<? include "main_bottom.php"; ?>

</body>
</html>