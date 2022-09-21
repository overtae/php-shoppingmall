<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
  include "common.php";
  $uid = $_REQUEST['uid'];
?>
<html>
<head>
<title>중복ID 조회</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">

<script language = "javascript">
	function Close_me(v) {
		opener.form2.check_id.value = v;
		self.close();
	}

	function check_id() {
		if (!form2.uid.value) {
			alert("ID를 입력하세요.");
			form2.uid.focus();
			return;
		}

	window.open("member_idcheck.php?uid=" + form2.uid.value,
					"", "scrollbars = no, width = 300, height = 200")
	}
</script>

<body bgcolor="#FFFFFF" text="#000000"  marginwidth="0" marginheight="0">

<table border="0" width="300" cellspacing="0" cellpadding="0">
	<tr>
		<td  height="30" bgcolor="blue"><font color="white" size="3"><b>&nbsp;중복 ID 조사</b></font></td>
	</tr>
	<tr><td  height="40"></td></tr>

	<?
		$query = "select * from member where uid41 = '$uid'";

		$result = mysqli_query($db, $query); // sql 실행
    	if (!$result) exit("ERROR: $query"); // error 조사

		$count = mysqli_num_rows($result); // 전체 레코드 개수

		// 중복 ID 검사

		// 중복 아이디가 없는 경우
		if ($count == 0)
			echo("<tr>
					<td height='50' valign='middle' align='center'>
						<font color='#666666'><b>$uid</b>는 사용 가능한 아이디입니다.</font>  
					</td>
				</tr>
				<tr>
					<td height='50' align='center'>
						<a href='javascript:Close_me(\"yes\")'><img src='images/b_ok1.gif' border='0'></a>
					</td>
				</tr>");
		// 중복 아이디가 있는 경우
		else
			echo("<tr>
					<td height='50' valign='middle' align='center'>
						<font color='#666666'><b>$uid</b>는 사용할 수 없습니다.</font>  
					</td>
				</tr>
				<tr>
					<td height='50' align='center'>
						<a href='javascript:Close_me(\"\")'><img src='images/b_ok1.gif' border='0'></a>
					</td>
				</tr>");
	?>

</table>
	 
</body>
</html>