<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
    include "../common.php";
    $day1_y = $_REQUEST['day1_y'];
    $day1_m = $_REQUEST['day1_m'];
    $day1_d = $_REQUEST['day1_d'];
    $day2_y = $_REQUEST['day2_y'];
    $day2_m = $_REQUEST['day2_m'];
    $day2_d = $_REQUEST['day2_d'];
    $sel1 = $_REQUEST['sel1'];
    $sel2 = $_REQUEST['sel2'];
	$text1 = $_REQUEST['text1'];
	$page = $_REQUEST['page'];
	$state = $_REQUEST['state'];
?>
<html>
<head>
<title>쇼핑몰 홈페이지</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">
<script language="JavaScript" src="include/common.js"></script>
<script>
	function go_update(no,pos)
	{
		state=form1.state[pos].value;
		location.href="jumun_update.php?no="+no+"&state="+state+"&page="+form1.page.value+
			"&sel1="+form1.sel1.value+"&sel2="+form1.sel2.value+"&text1="+form1.text1.value+
			"&day1_y="+form1.day1_y.value+"&day1_m="+form1.day1_m.value+"&day1_d="+form1.day1_d.value+
			"&day2_y="+form1.day2_y.value+"&day2_m="+form1.day2_m.value+"&day2_d="+form1.day2_d.value;
	}
</script>
</head>

<body style="margin:0">

<center>

<br>
<script> document.write(menu());</script>

<?
	$day1 = $day1_y . "-" . $day1_m . "-" . $day1_d;
	$day2 = $day2_y . "-" . $day2_m . "-" . $day2_d;
	if (!$day1_y) $day1_y = "2015";
	if (!$day1_m) $day1_m = "01";
	if (!$day1_d) $day1_d = "01";
	if (!$day2_y) $day2_y = "2022";
	if (!$day2_m) $day2_m = "12";
	if (!$day2_d) $day2_d = "31";
	if (!$sel1) $sel1 = 0;
	if (!$sel2) $sel2 = 1;
	if (!$text1) $text1 = "";
	$day1 = $day1_y . "-" . $day1_m . "-" . $day1_d;
	$day2 = $day2_y . "-" . $day2_m . "-" . $day2_d;

	$k = 0;
	$s[$k] = "jumunday41 >= " . $day1 . " and " . "jumunday41 <= " . $day2; $k++;
	if ($sel1 != 0) { $s[$k] = "state41=" . $sel1; $k++; } 
	if ($text1) {
		if ($sel2 == 1) { $s[$k] = "no41 like '%" . $text1 . "%'"; $k++; } // 주문번호
		elseif ($sel2 == 2) { $s[$k] = "o_name41 like '%" . $text1 . "%'"; $k++; } // 고객명
		else { $s[$k] = "product_names41 like '%" . $text1 . "%'"; $k++; } // 상품명
	}

	if ($k > 1) {
		$tmp = implode(" and ", $s);
		$tmp = " where " . $tmp;
	}

	$query = "select * from jumun " . $tmp . " order by no41 desc";
	$result = mysqli_query($db, $query);
	if (!$result) exit("ERROR: $query");
	$count = mysqli_num_rows($result);
?>

<form name="form1" method="post" action="jumun.php">
<input type="hidden" name="page" value="0">

<table width="800" border="0" cellspacing="0" cellpadding="0">
	<tr height="40">
		<td align="left"  width="70" valign="bottom">&nbsp 주문수 : <font color="#FF0000"><?=$count?></font></td>
		<td align="right" width="730" valign="bottom">
			기간 : 
			<input type="text" name="day1_y" size="4" value="2015">
			<select name="day1_m">
				<option value="01" selected>1</option>
				<option value="02">2</option>
				<option value="03">3</option>
				<option value="04">4</option>
				<option value="05">5</option>
				<option value="06">6</option>
				<option value="07">7</option>
				<option value="08">8</option>
				<option value="09">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
			</select>
			<select name="day1_d">
				<option value="01" selected>1</option>
				<option value="02">2</option>
				<option value="03">3</option>
				<option value="04">4</option>
				<option value="05">5</option>
				<option value="06">6</option>
				<option value="07">7</option>
				<option value="08">8</option>
				<option value="09">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>
				<option value="21">21</option>
				<option value="22">22</option>
				<option value="23">23</option>
				<option value="24">24</option>
				<option value="25">25</option>
				<option value="26">26</option>
				<option value="27">27</option>
				<option value="28">28</option>
				<option value="29">29</option>
				<option value="30">30</option>
				<option value="31">31</option>
			</select> - 
			<input type="text" name="day2_y" size="4" value="2022">
			<select name="day2_m">
				<option value="01">1</option>
				<option value="02">2</option>
				<option value="03">3</option>
				<option value="04">4</option>
				<option value="05">5</option>
				<option value="06">6</option>
				<option value="07">7</option>
				<option value="08">8</option>
				<option value="09">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12" selected>12</option>
			</select>
			<select name="day2_d">
				<option value="01">1</option>
				<option value="02">2</option>
				<option value="03">3</option>
				<option value="04">4</option>
				<option value="05">5</option>
				<option value="06">6</option>
				<option value="07">7</option>
				<option value="08">8</option>
				<option value="09">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>
				<option value="21">21</option>
				<option value="22">22</option>
				<option value="23">23</option>
				<option value="24">24</option>
				<option value="25">25</option>
				<option value="26">26</option>
				<option value="27">27</option>
				<option value="28">28</option>
				<option value="29">29</option>
				<option value="30">30</option>
				<option value="31" selected>31</option>
			</select> &nbsp
			<select name="sel1">
				<option value="0" selected>전체</option>
				<option value="1">주문신청</option>
				<option value="2">주문확인</option>
				<option value="3">입금확인</option>
				<option value="4">배달중</option>
				<option value="5">주문완료</option>
				<option value="6">주문취소</option>
			</select> &nbsp 
			<select name="sel2">
				<option value="1">주문번호</option>
				<option value="2">고객명</option>
				<option value="3">상품명</option>
			</select>
			<input type="text" name="text1" size="10" value="">&nbsp
			<input type="button" value="검색" onclick="javascript:form1.submit();"> &nbsp;
		</td>
	</tr>
	</tr><td height="5" colspan="2"></td></tr>
</table>

<table width="800" border="1" cellpadding="0" style="border-collapse:collapse">
	<tr bgcolor="#CCCCCC" height="23"> 
		<td width="70"  align="center">주문번호</td>
		<td width="70"  align="center">주문일</td>
		<td width="250" align="center">상품명</td>
		<td width="50"  align="center">제품수</td>	
		<td width="70"  align="center">총금액</td>
	    <td width="65"  align="center">주문자</td>
		<td width="50"  align="center">결재</td>
		<td width="135" align="center" colspan="2">주문상태</td>
	    <td width="50"  align="center">삭제</td>
	</tr>
	<?
		$page = $_REQUEST['page'];
        if (!$page) $page = 1;
        $pages = ceil($count/$page_line);

        $first = 1;
        if ($count > 0) $first = $page_line * ($page - 1);

        $page_last = $count - $first;
        if ($page_last > $page_line) $page_last = $page_line;

        if ($count > 0) mysqli_data_seek($result, $first);

		for ($i=0; $i<$page_last; $i++) {
			$row = mysqli_fetch_array($result);

			// 총금액
			$total_cash = number_format($row['total_cash41']);

			// 결재
			if ($row['pay_method41'] == 0) $pay_method = "카드";
			else $pay_method = "무통장";

			// 주문상태 글자색
			$color = "black";
			$state = $row['state41'];
			if ($state == 5) $color = "blue"; // 주문완료
			if ($state == 6) $color = "red"; // 주문취소

			echo("<tr bgcolor='#F2F2F2' height='23'> 
					<td width='70'  align='center'><a href='jumun_info.php?no=$row[no41]'>$row[no41]</a></td>
					<td width='70'  align='center'>$row[jumunday41]</td>
					<td width='250' align='left'>&nbsp;$row[product_names41]</td>	
					<td width='40' align='center'>$row[product_nums41]</td>
					<td width='70'  align='right'>$total_cash&nbsp</td>	
					<td width='65'  align='center'>$row[o_name41]</td>	
					<td width='50'  align='center'>$pay_method</td>	
					<td width='85' align='center' valign='bottom'>
						<select name='state' style='font-size:9pt; color:$color'>");
			for ($j=1; $j<$n_state; $j++) {
				if ($j == $state)
					echo("<option value='$j' selected>$a_state[$j]</option>");
				else
					echo("<option value='$j'>$a_state[$j]</option>");
			}
			echo("		</select>&nbsp;
					</td>
					<td width='50' align='center'>
						<a href='javascript:go_update(\"$row[no41]\", $i);'><img src='images/b_edit1.gif' border='0'></a>
					</td>	
					<td width='50' align='center'>
						<a href='jumun_delete.php?no=$row[no41]' onclick='javascript:return confirm(\"삭제할까요 ?\");'><img src='images/b_delete1.gif' border='0'></a>
					</td>
				</tr>
			");
		}

	?>
</table>

<input type="hidden" name="state">

<!-- 페이지 기능 -->

<?
  $blocks = ceil($pages/$page_block);
  $block = ceil($page/$page_block);
  $page_s = $page_block * ($block - 1);
  $page_e = $page_block * $block;
  if ($blocks <= $block) $page_e = $pages;

  echo("<table  width='800' border='0' cellpadding='0' cellspacing='0'>
          <tr>
            <td height='30' class='cmfont' align='center'>");

  if ($block > 1) {
    $tmp = $page_s;
    echo("<a href='jumun.php?page=$tmp&sel1=$sel1&sel2=$sel2&text1=$text1&day1_y=$day1_y&day1_m=$day1_m&day1_d=$day1_d&day2_y=$day2_y&day2_m=$day2_m&day2_d=$day2_d'>
            <img src='images/i_prev.gif' align='absmiddle' border='0'>
          </a>&nbsp;");
  }

  for($i=$page_s+1; $i<=$page_e; $i++) {
    if ($page == $i)
      echo("<font color='#FC0504'><b>$i</b></font>&nbsp;");
    else
      echo("<a href='jumun.php?page=$i&sel1=$sel1&sel2=$sel2&text1=$text1&day1_y=$day1_y&day1_m=$day1_m&day1_d=$day1_d&day2_y=$day2_y&day2_m=$day2_m&day2_d=$day2_d'><font color='#7C7A77'>[$i]</font></a>&nbsp;");

  }

  if ($block < $blocks) {
    $tmp = $page_e + 1;
    echo("&nbsp<a href='jumun.php?page=$tmp&sel1=$sel1&sel2=$sel2&text1=$text1&day1_y=$day1_y&day1_m=$day1_m&day1_d=$day1_d&day2_y=$day2_y&day2_m=$day2_m&day2_d=$day2_d'>
            <img src='images/i_next.gif' align='absmiddle' border='0'>
          </a>");
  }

  echo("    </td>
          </tr>
        </table>");
?>

</form>

</center>

</body>
</html>