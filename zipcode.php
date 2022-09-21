<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
  $db = mysqli_connect("localhost", "zip", "zips", "zip");
  if (!$db) exit("DB 연결 에러");
//   include "common.php";

  $sel = $_REQUEST['sel'];
  $text1 = $_REQUEST['text1'];
  $zip_kind = $_REQUEST['zip_kind'];
?>
<html>
<head>
<title>우편번호 및 주소 찾기</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">

<script language="javascript">
function SearchZip() 
{
	if (form.sel.value==0) 
	{
		alert("시,도를 먼저 선택하세요.");
		form.sel.focus();
		return;
	}
	if (!form.text1.value) 
	{
		alert("검색하실 도로명이나 건물명을 입력해 주십시오.");
		form.text1.focus();
		return;
	}
	form.submit();
}
function SendZip(zip_kind) 
{
	if (form1.jusor.value == "") {
		alert("나머지 주소를 입력하여 주십시오.");
		form1.jusor.focus();
		return;
	}
	var str, zip, juso;
	str = form1.post_no.value;
	str = str.split("^^");
	zip = str[0];
	juso = str[1] + " " + form1.jusor.value;

	if (zip_kind==1)			
	{
		opener.form2.o_zip.value = zip;
		opener.form2.o_juso.value = juso;
	} else if (zip_kind==2)	{
		opener.form2.r_zip.value = zip;
		opener.form2.r_juso.value = juso;
	} else {
		opener.form2.zip.value = zip;
		opener.form2.juso.value = juso;
	}

	self.close();
}
</script>
</head>
<body bgcolor="#FFFFFF" style="margin:0">

<script language="javascript">
	window.resizeTo(500, 360);
</script>

<table width="500" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td>
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td><p><img src="images/zipcode_title.gif" border="0"></p></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td><br>
			<form  name="form" method="post" action="zipcode.php">
			<input type="hidden" name="zip_kind" value="<?=$zip_kind?>">
			<table width="495" border="0" cellspacing="0" cellpadding="0" align="center">
				<tr>
					<td width="14">&nbsp;</td>
					<td width="465" align="center">
						<table width="86%" border="0" cellspacing="5" cellpadding="0">
							<tr height="20">
								<td colspan="3" valign="middle" width="305">
									<span style="font-size:9pt;"><font color="#666666"><b>검색할 도로명이나 건물명 일부를 입력해 주세요</b></font></span>
								</td>
							</tr>
							<tr> 
								<td>
								<select border="0" id="sel" name="sel" class="cmfont">
										<option value="0" selected> 시,도 선택 </option>
										<option value="1">서울</option>
										<option value="2">경기</option>
										<option value="3">인천</option>
										<option value="4">강원</option>
										<option value="5">충북</option>
										<option value="6">세종</option>
										<option value="7">충남</option>
										<option value="8">대전</option>
										<option value="9">경북</option>
										<option value="10">대구</option>
										<option value="11">울산</option>
										<option value="12">부산</option>
										<option value="13">경남</option>
										<option value="14">전북</option>
										<option value="15">전남</option>
										<option value="16">광주</option>
										<option value="17">제주</option>
									</select>
									
								</td>
								<td ><input name="text1" type="text" size="20" maxlength="20" value = "<?=$text1?>" style = "border:1 solid #E5E5E5;font-size:9pt"></td>
								<td width="134"><a href = "javascript:SearchZip()"><img src="images/b_search.gif" border="0"></a></td>
							</tr>
						</table>
					</td>
					<td width="16">&nbsp;</td>
				</tr>
			</table>
			</form>
		</td>
	</tr>
</table>

<table width="500" border="0" cellpadding="0" cellspacing="0">
	<form name="form1">
	<tr height="30"> 
		<td align="center">
			<!-- 도로명 우편번호 인 경우 -->
			<select border="0" name="post_no" style="BACKGROUND-COLOR: #E3E7EB; width:440px;" class="cmfont">
				<?
					// 검색어와 시, 도 선택이 있는 경우
					if ($text1 && $sel != 0) {
						$query = "select * from zip$sel where juso4 like '%$text1%' or juso7 like '%$text1%'";

						$result = mysqli_query($db, $query); // sql 실행
						if (!$result) exit("ERROR: $query"); // error 조사

						$count = mysqli_num_rows($result); // 전체 레코드 개수

						for ($i=0; $i<$count; $i++) {
							$row = mysqli_fetch_array($result);

							$zip = $row['zip'];
							$A = $row['juso1'] . " " . $row['juso2'] . " " . $row['juso3'] . " " . $row['juso4'];
							if ($row['juso5']) $A = $A . " $row[juso5]";
							if ($row['juso6']) $A = $A . "-$row[juso6]";
							if ($row['juso7']) $A = $A . " $row[juso7]";

							echo("<option value='$zip^^$A'>[$zip]$A</option>");
						}
					} else {
						echo("<option></option>");
					}
				?>
			</select>
		</td>
	</tr>
	<tr height="30"> 
		<td align="center">
			<input type="text" name="jusor" size="44" maxlength="50" STYLE="width:440;border:1 solid #E5E5E5" class="cmfont"><br><br>
			<b><font color="#666666"><span style="font-size:9pt;">나머지 주소를 입력해 주세요</span></font></b>
		</td>
	</tr>
	<!-- 회원가입인 경우 : SendZip(0), 주문지인 경우 : SendZip(1), 배송지인 경우 : SendZip(2) -->
	<tr height="55"> 
		<td align="center">
			<a href="javascript:SendZip(<?=$zip_kind?>)"><img src="images/b_ok1.gif" border="0"></a>
		</td>
	</tr>
</form>
</table>

</body>
</html>



