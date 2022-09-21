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
<script language="JavaScript" src="include/common.js"></script>
</head>

<body style="margin:0">

<center>

<br>
<script> document.write(menu());</script>
<br>
<br>

<?
	$query = "select * from jumun where no41 = '$no'";
	$result = mysqli_query($db, $query);
	if (!$result) exit("ERROR: $query");
	$row = mysqli_fetch_array($result);

	// 주문상태 글자색
	$color = "black";
	$state = $a_state[$row['state41']];
	if ($row['state41'] == 5) $color = "blue"; // 주문완료
	if ($row['state41'] == 6) $color = "red"; // 주문취소

	// 회원 / 비회원
	if ($row['member_no41'] == 0) $is_member = "비회원";
	else $is_member = "회원번호 : ".$row['member_no41'];

	// 주문자 tel, phone
	$o_tel1 = trim(substr($row['o_tel41'], 0, 3));
	$o_tel2 = trim(substr($row['o_tel41'], 3, 4));
	$o_tel3 = trim(substr($row['o_tel41'], 7, 4));
	$o_tel = $o_tel1 . "-" . $o_tel2 . "-" . $o_tel3;
	$o_phone1 = trim(substr($row['o_phone41'], 0, 3));
	$o_phone2 = trim(substr($row['o_phone41'], 3, 4));
	$o_phone3 = trim(substr($row['o_phone41'], 7, 4));
	$o_phone = $o_phone1 . "-" . $o_phone2 . "-" . $o_phone3;

	// 수신자 tel, phone
	$r_tel1 = trim(substr($row['r_tel41'], 0, 3));
	$r_tel2 = trim(substr($row['r_tel41'], 3, 4));
	$r_tel3 = trim(substr($row['r_tel41'], 7, 4));
	$r_tel = $r_tel1 . "-" . $r_tel2 . "-" . $r_tel3;
	$r_phone1 = trim(substr($row['r_phone41'], 0, 3));
	$r_phone2 = trim(substr($row['r_phone41'], 3, 4));
	$r_phone3 = trim(substr($row['r_phone41'], 7, 4));
	$r_phone = $r_phone1 . "-" . $r_phone2 . "-" . $r_phone3;

	// memo
	$memo = stripslashes($row['memo41']);

	// 결재 방식
	if ($row['pay_method41'] == 0) $pay_method = "카드";
	else $pay_method = "무통장";

	// 카드 할부
	if ($row['card_halbu41'] == 12) $card_halbu = "12개월";
	elseif ($row['card_halbu41'] == 9) $card_halbu = "9개월";
	elseif ($row['card_halbu41'] == 6) $card_halbu = "6개월";
	elseif ($row['card_halbu41'] == 3) $card_halbu = "3개월";
	else $card_halbu = "일시불";

	// 카드 종류
	if ($row['card_kind41'] == 1) $card_kind = "국민";
	elseif ($row['card_kind41'] == 2) $card_kind = "신한";
	elseif ($row['card_kind41'] == 3) $card_kind = "우리";
	else $card_kind = "하나";

	// 무통장 입금 은행
	if ($row['bank_kind41'] == 1) $bank_kind = "국민은행: 000-00000-0000";
	else $bank_kind = "신한은행: 000-00000-0000";
?>

<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문번호</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE">&nbsp;<font size="3"><b><?=$no?> (<font color="<?=$color?>"><?=$state?></font>)</b></font></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문일</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row['jumunday41']?></td>
	</tr>
</table>
<br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><? echo("$row[o_name41] ($is_member)"); ?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자전화</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$o_tel?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자 E-Mail</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row['o_email41']?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자핸드폰</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$o_phone?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자주소</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE" colspan="3"><? echo("($row[o_zip41]) $row[o_juso41]"); ?></td>
	</tr>
	</tr>
</table>
<img src="blank.gif" width="10" height="5"><br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row['r_name41']?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자전화</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$r_tel?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자 E-Mail</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row['r_email41']?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자핸드폰</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$r_phone?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자주소</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE" colspan="3"><? echo("($row[r_zip41]) $row[r_juso41]"); ?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">메모</font></td>
        <td width="300" height="50" bgcolor="#EEEEEE" colspan="3"><?=$memo?></td>
	</tr>
</table>
<br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">지불종류</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$pay_method?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">카드승인번호 </font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><? if ($row['pay_method41'] == 0) echo("$row[card_okno41]"); else echo("&nbsp;-"); ?>&nbsp</td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">카드 할부</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><? if ($row['pay_method41'] == 0) echo("$card_halbu"); else echo("&nbsp;-"); ?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">카드종류</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><? if ($row['pay_method41'] == 0) echo("$card_kind"); else echo("&nbsp;-"); ?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">무통장</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><? if ($row['pay_method41'] == 1) echo("$bank_kind"); else echo("&nbsp;-"); ?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">입금자이름</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><? if ($row['pay_method41'] == 1) echo("$row[bank_sender41]"); else echo("&nbsp;-"); ?></td>
	</tr>
</table>
<br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr bgcolor="#CCCCCC"> 
    <td width="340" height="20" align="center"><font color="#142712">상품명</font></td>
		<td width="50"  height="20" align="center"><font color="#142712">수량</font></td>
		<td width="70"  height="20" align="center"><font color="#142712">단가</font></td>
		<td width="70"  height="20" align="center"><font color="#142712">금액</font></td>
		<td width="50"  height="20" align="center"><font color="#142712">할인</font></td>
		<td width="60"  height="20" align="center"><font color="#142712">옵션1</font></td>
		<td width="60"  height="20" align="center"><font color="#142712">옵션2</font></td>
	</tr>
	<?
		$query = "select jumuns.opts_no2 as opts_no2, jumuns.num as num, jumuns.cash as cash, jumuns.discount as discount,
			jumuns.price as price1, product.price as price2, 
			product.name as name1, opts1.name41 as name2, opts2.name41 as name3
			from jumuns, product, opts as opts1, opts as opts2
			where jumuns.product_no = product.no
			and jumuns.opts_no1 = opts1.no41
			and jumuns.opts_no2 = opts2.no41
			and jumuns.jumun_no = '$no'";
		$result = mysqli_query($db, $query);
		if (!$result) exit("ERROR: $query");
		$count = mysqli_num_rows($result);

		$total = 0;
		for ($i=0; $i<$count; $i++) {
			$row1 = mysqli_fetch_array($result);
			$total += $row1['cash'];
			$price = number_format($row1['price1']);
			$cash = number_format($row1['cash']);

			echo("<tr bgcolor='#EEEEEE' height='20'>	
					<td width='340' height='20' align='left'>$row1[name1]</td>	
					<td width='50'  height='20' align='center'>$row1[num]</td>
					<td width='70'  height='20' align='right'>$price</td>	
					<td width='70'  height='20' align='right'>$cash</td>
					<td width='50'  height='20' align='center'>$row1[discount] %</td>	
					<td width='60'  height='20' align='center'>$row1[name2]</td>");
			if ($row1['opts_no2'])
				echo("<td width='60'  height='20' align='center'>$row1[name3]</td>");
			else echo("<td width='60'  height='20' align='center'>&nbsp;-</td>");
			echo("</tr>");
		}
		$total = number_format($total);
	?>
</table>
<img src="blank.gif" width="10" height="5"><br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
	  <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">총금액</font></td>
		<td width="700" height="20" bgcolor="#EEEEEE" align="right"><font color="#142712" size="3"><b><?=$total?></b></font> 원&nbsp;&nbsp</td>
	</tr>
</table>

<table width="800" border="0" cellspacing="0" cellpadding="7">
	<tr> 
		<td align="center">
			<input type="button" value="이 전 화 면" onClick="javascript:history.back();">&nbsp
			<input type="button" value="프린트" onClick="javascript:print();">
		</td>
	</tr>
</table>

</center>

<br>
</body>
</html>
