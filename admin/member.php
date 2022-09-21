<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
    include "../common.php";
    $text1 = $_REQUEST['text1'];
    $sel1 = $_REQUEST['sel1'];
?>
<html>
<head>
<title>쇼핑몰 관리자 홈페이지</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">
<script language="JavaScript" src="include/common.js?ver=1"></script>
</head>

<body style="margin:0">

<center>

<br>
<script> document.write(menu()); </script>

<?
    if (!$text1) // 조건 없음
        $query = "select * from member order by name41;";
    else
        if ($sel1 == 1) // 이름으로 검색
            $query = "select * from member where name41 like '%$text1%' order by name41;";
        else // 아이디로 검색
            $query = "select * from member where uid41 like '%$text1%' order by uid41;";

    $result = mysqli_query($db, $query);
    if (!$result) exit("ERROR: $query");

    $count = mysqli_num_rows($result);
?>

<table width="800" border="0">
	<form name="form1" method="post" action="member.php">
	<tr height="40">
		<td width="200" valign="bottom">&nbsp 회원수 : <font color="#FF0000"><?=$count; ?></font></td>
		<td width="540" align="right" valign="bottom">
			<select name="sel1" class="font9">
				<option value="1" >이름</option>
				<option value="2" >아이디</option>
			</select>
			<input type="text" name="text1" size="15" value="" class="font9">&nbsp
		</td>
		<td width="60" valign="bottom">
			<input type="button" value="검색" onclick="javascript:form1.submit();">&nbsp
		</td>
	</tr>
	</form>
</table>

<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr bgcolor="#CCCCCC" height="23"> 
		<td width="100" align="center">ID</td>
		<td width="100" align="center">이름</td>
		<td width="100" align="center">전화</td>
		<td width="100" align="center">핸드폰</td>
		<td width="200" align="center">E-Mail</td>
		<td width="100" align="center">회원구분</td>
		<td width="100" align="center">수정/삭제</td>
	</tr>

    <?
        if (!$text1) // 조건 없음
            $query = "select * from member order by name41;";
        else
            if ($sel1 == 1) // 이름으로 검색
                $query = "select * from member where name41 like '%$text1%' order by name41;";
            else // 아이디로 검색
                $query = "select * from member where uid41 like '%$text1%' order by uid41;";

        
        $result = mysqli_query($db, $query);
        if (!$result) exit("ERROR: $query");

        $count = mysqli_num_rows($result);

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

            $tel1 = trim(substr($row['tel41'], 0, 3));
            $tel2 = trim(substr($row['tel41'], 3, 4));
            $tel3 = trim(substr($row['tel41'], 7, 4));

            $phone1 = trim(substr($row['phone41'], 0, 3));
            $phone2 = trim(substr($row['phone41'], 3, 4));
            $phone3 = trim(substr($row['phone41'], 7, 4));

            $tel = $tel1 . "-" . $tel2 . "-" . $tel3;
            $phone = $phone1 . "-" . $phone2 . "-" . $phone3;
            $gubun = $row['gubun41'] == 0? "회원" : "탈퇴";

            echo("<tr bgcolor='#F2F2F2' height='23'>
                    <td width='100'>&nbsp $row[uid41]</td>
                    <td width='100'>&nbsp $row[name41]</td>
                    <td width='100'>&nbsp $tel</td>
                    <td width='100'>&nbsp $phone</td>
                    <td width='200'>&nbsp $row[email41]</td>
                    <td width='100' align='center'>&nbsp $gubun</td>
                    <td width='100' align='center'>
                        <a href='member_edit.php?no=$row[no41]&page=$page&sel1=$sel1&text1=$text1'>수정</a>/
                        <a href='member_delete.php?no=$row[no41]&page=$page&sel1=$sel1&text1=$text1' onclick='javascript:return confirm(\"삭제하시겠습니까 ?\");'>삭제</a>
                    </td>
                </tr>");
        }
    ?>
</table>

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
    echo("<a href='member.php?page=$tmp&sel1=$sel1&text1=$text1'>
            <img src='images/i_prev.gif' align='absmiddle' border='0'>
          </a>&nbsp;");
  }

  for($i=$page_s+1; $i<=$page_e; $i++) {
    if ($page == $i)
      echo("<font color='#FC0504'><b>$i</b></font>&nbsp;");
    else
      echo("<a href='member.php?page=$i&sel1=$sel1&text1=$text1'><font color='#7C7A77'>[$i]</font></a>&nbsp;");

  }

  if ($block < $blocks) {
    $tmp = $page_e + 1;
    echo("&nbsp<a href='member.php?page=$tmp&sel1=$sel1&text1=$text1'>
            <img src='images/i_next.gif' align='absmiddle' border='0'>
          </a>");
  }

  echo("    </td>
          </tr>
        </table>");
?>

</center>

</body>
</html>