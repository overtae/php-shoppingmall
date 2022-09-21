<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
    include "../common.php";
	$no = $_REQUEST['no'];
?>
<html>
<head>
<title>쇼핑몰 홈페이지</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">
<script language="JavaScript" src="include/common.js?ver=1"></script>
<script>
	function OpenWinZip(zip_kind)
	{
		window.open("zipcode.php?zip_kind="+zip_kind, "", "scrollbars=no,width=500,height=250");
	}
</script>
</head>

<body style="margin:0">

<?
	$query = "select * from member where no41 = $no;";
	$result = mysqli_query($db, $query);
	if (!$result) exit("ERROR: $query");
	$row = mysqli_fetch_array($result);
	$birthday1 = substr($row['birthday41'], 0, 4);
	$birthday2 = substr($row['birthday41'], 5, 2);
	$birthday3 = substr($row['birthday41'], 8, 2);
	$tel1 = trim(substr($row['tel41'], 0, 3));
	$tel2 = trim(substr($row['tel41'], 3, 4));
	$tel3 = trim(substr($row['tel41'], 7, 4));
	$phone1 = trim(substr($row['phone41'], 0, 3));
	$phone2 = trim(substr($row['phone41'], 3, 4));
	$phone3 = trim(substr($row['phone41'], 7, 4));
?>

<center>

<br>
<script> document.write(menu());</script>
<br>
<br>

<form name="form2" method="post" action="member_update.php">

<input type="hidden" name="no" value="<?=$no; ?>">

<table width="600" border="1" cellpadding="2"  style="border-collapse:collapse">
	<tr height="20"> 
		<td width="100" align="center" bgcolor="#CCCCCC">ID</td>
		<td width="500" bgcolor="#F2F2F2"><?=$row['uid41']; ?></td>
	</tr>
	<tr height="20"> 
		<td width="100" align="center" bgcolor="#CCCCCC">암호</td>
		<td width="500" bgcolor="#F2F2F2">
			<input type="text" name="pwd" value="<?=$row['pwd41']; ?>" size="20" maxlength="20">
		</td>
	</tr>
	<tr height="20"> 
		<td width="100" align="center" bgcolor="#CCCCCC">이름</td>
		<td width="500" bgcolor="#F2F2F2">
			<input type="text" name="name" value="<?=$row['name41']; ?>" size="20" maxlength="20">
		</td>
	</tr>
	<tr height="20"> 
		<td width="100" align="center" bgcolor="#CCCCCC">생일</td>
		<td width="500" bgcolor="#F2F2F2">
			<input type="text" name="birthday1" size="4" value="<?=$birthday1; ?>"> -
			<input type="text" name="birthday2" size="2" value="<?=$birthday2; ?>"> -
			<input type="text" name="birthday3" size="2" value="<?=$birthday3; ?>"> 
			&nbsp;&nbsp 
			<?
				if ($row['sm41'] == 0) {
					echo("<input type='radio' name='sm' value='0' checked>양력
							<input type='radio' name='sm' value='1'>음력");
				} else {
					echo("<input type='radio' name='sm' value='0'>양력
							<input type='radio' name='sm' value='1' checked>음력");
				}
      		?>
		</td>
	</tr>
	<tr height="20"> 
		<td width="100" align="center" bgcolor="#CCCCCC">전화번호</td>
		<td width="500" bgcolor="#F2F2F2">
			<input type="text" name="tel1" value="<?=$tel1; ?>"   size="3" maxlength="3"> -
			<input type="text" name="tel2" value="<?=$tel2; ?>"  size="4" maxlength="4"> -
			<input type="text" name="tel3" value="<?=$tel3; ?>" size="4" maxlength="4">
		</td>
	</tr>
	<tr height="20"> 
		<td width="100" align="center" bgcolor="#CCCCCC">핸드폰</td>
		<td width="500" bgcolor="#F2F2F2">
			<input type="text" name="phone1" value="<?=$phone1; ?>"   size="3" maxlength="3"> -
			<input type="text" name="phone2" value="<?=$phone2; ?>"  size="4" maxlength="4"> -
			<input type="text" name="phone3" value="<?=$phone3; ?>" size="4" maxlength="4">
		</td>
	</tr>
	<tr height="20"> 
		<td width="100" align="center" bgcolor="#CCCCCC">E-Mail</td>
		<td width="500" bgcolor="#F2F2F2">
			<input type="text" name="email" value="<?=$row['email41']; ?>" size="40" maxlength="40">
		</td>
	</tr>
	<tr height="20"> 
		<td width="100" align="center" bgcolor="#CCCCCC">주소</td>
		<td width="500" bgcolor="#F2F2F2">
			<input type="text" name="zip" value="<?=$row['zip41']; ?>" size="5" maxlength="5"> &nbsp 
			<input type="button" value="우편번호 찾기" onClick="javascript:OpenWinZip(0);"> <br>
			<input type="text" name="juso" value="<?=$row['juso41']; ?>" size="60" maxlength="100">
		</td>
	</tr>
	<tr height="20"> 
		<td width="100" align="center" bgcolor="#CCCCCC">회원구분</td>
		<td width="500" bgcolor="#F2F2F2">
			<?
				if ($row['gubun41'] == 0) {
					echo("<input type='radio' name='gubun' value='0' checked>회원
							<input type='radio' name='gubun' value='1'>탈퇴");
				} else {
					echo("<input type='radio' name='gubun' value='0'>회원
							<input type='radio' name='gubun' value='1' checked>탈퇴");
				}
      		?>
		</td>
	</tr>
</table>

<br>
<table width="800" border="0" cellspacing="0" cellpadding="7">
	<tr> 
		<td align="center">
			<input type="submit" value="수정하기"> &nbsp;&nbsp
			<input type="button" value="이전화면" onClick="javascript:history.back();">
		</td>
	</tr>
</table>

</form>

</center>

<br>
</body>
</html>