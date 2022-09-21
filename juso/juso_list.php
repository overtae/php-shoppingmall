<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
  include "common.php";
  $text1 = $_REQUEST['text1'];
?>
<html>
<head>
	<title>주소록 프로그램</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="font.css">
</head>
<body>

<table width="600" border="0">
	<form name="form1" method="post" action="juso_list.php">
	<tr>
		<td width="400">&nbsp
			이름 : <input type="text" name="text1" size="10" value="<?=$text1?>">
			<input type="button" value="검색" onClick="javascript:form1.submit();">
		</td>
		<td align="right"><a href="juso_new.html">입력</a>&nbsp</td>
	</tr>
	</form>
</table>

<table width="600" border="1" cellpadding="2" style="border-collapse:collapse">
  <tr bgcolor="lightblue">
    <td width="70"  align="center">이름</td>
    <td width="100"  align="center">전화</td>
    <td width="50"  align="center">음/양</td>
    <td width="80"  align="center">생일</td>
    <td width="250" align="center">주소</td>
    <td width="50"  align="center">삭제</td>
  </tr>
  <?
    if (!$text1)
      $query = "select * from juso order by name41;"; // sql 정의
    else
      $query = "select * from juso where name41 like '%$text1%' order by name41;"; // 검색
    
    $result = mysqli_query($db, $query); // sql 실행
    if (!$result) exit("ERROR: $query"); // error 조사

    $count = mysqli_num_rows($result); // 전체 레코드 개수

    $page = $_REQUEST['page'];
    if (!$page) $page = 1;
    $pages = ceil($count/$page_line); // 전체 페이지수 / page당 line 수

    // 현재 페이지가 몇 번째 자료부터 시작하는지 계산
    $first = 1;
    if ($count > 0) $first = $page_line * ($page - 1);

    // 현재 페이지에 표시할 수 있는 줄 수
    $page_last = $count - $first;
    if ($page_last > $page_line) $page_last = $page_line;

    // 현재 페이지 첫번째 자료로 이동
    if ($count > 0) mysqli_data_seek($result, $first);

    // 남은 줄 만큼만 표시
    for ($i=0; $i<$page_last; $i++) {
      $row = mysqli_fetch_array($result); // 1 레코드 읽기
      $sm = $row['sm41'] == 0? "양력" : "음력"; // 음력 / 양력 표시
      $tel1 = trim(substr($row['tel41'], 0, 3)); // 0번 위치에서 3자리 문자열 추출
      $tel2 = trim(substr($row['tel41'], 3, 4)); // 3번 위치에서 4자리 문자열 추출
      $tel3 = trim(substr($row['tel41'], 7, 4)); // 7번 위치에서 4자리 문자열 추출
      $tel = $tel1 . "-" . $tel2 . "-" . $tel3;
      // OR, sprintf("%-3s%-4s%-4s", $tel1, $tel2, $tel3);

      echo("<tr bgcolor='lightyellow'>
              <td align='center'>
                <a href='juso_edit.php?no=$row[no41]'>$row[name41]</a>
              </td>
              <td align='center'>$tel</td>
              <td align='center'>$sm</td>
              <td align='center'>$row[birthday41]</td>
              <td align='left'>$row[juso41]</td>
              <td align='center'>
                <a href='juso_delete.php?no=$row[no41]' onClick='javascript:return confirm(\"삭제하시겠습니까?\");'>
                  삭제
                </a>
              </td>
            </tr>");
    }
  ?>
</table>

<!-- 페이지 기능 -->

<?
  // 블록 표시
  $blocks = ceil($pages/$page_block); // 전체 블록 수
  $block = ceil($page/$page_block); // 현재 블록
  $page_s = $page_block * ($block - 1); // 표시해야 할 시작 페이지 번호
  $page_e = $page_block * $block; // 표시해야 할 마지막 페이지 번호
  if ($blocks <= $block) $page_e = $pages;

  echo("<table  width='600' border='0' cellpadding='0' cellspacing='0'>
          <tr>
            <td height='30' align='center'>");
  
  // 이전 블록으로
  if ($block > 1) {
    $tmp = $page_s;
    echo("<a href='juso_list.php?page=$tmp&text1=$text1'>
            <img src='images/i_prev.gif' align='absmiddle' border='0'>
          </a>&nbsp");
  }

  // 현재 블록의 페이지
  for($i=$page_s+1; $i<=$page_e; $i++) {
    if ($page == $i)
      echo("<font color='red'><b>$i</b></font>&nbsp");
    else
      echo("<a href='juso_list.php?page=$i&text1=$text1'><font color='#7C7A77'>[$i]</font></a>&nbsp");

  }

  // 다음 블록으로
  if ($block < $blocks) {
    $tmp = $page_e + 1;
    echo("&nbsp<a href='juso_list.php?page=$tmp&text1=$text1'>
            <img src='images/i_next.gif' align='absmiddle' border='0'>
          </a>");
  }

  echo("    </td>
          </tr>
        </table>");
?>

</body>
</html>
