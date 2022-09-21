<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
  include "common.php";
  $findtext = $_REQUEST['findtext'];
?>
<html>
<head>
<title>인덕닷컴 쇼핑몰</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link href="include/font.css" rel="stylesheet" type="text/css">
<link href="include/design.css" rel="stylesheet" type="text/css">
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
			<script language="javascript">
				function SearchProduct() {
					form2.submit();
				}
			</script>

			<table border="0" cellpadding="0" cellspacing="0" width="747">
			  <tr><td height="13"></td></tr>
			  <tr>
			    <td height="30" align="center"><p><img src="images/search_title.gif" width="746" height="30" border="0" /></p></td>
			  </tr>
			  <tr><td height="13"></td></tr>
			</table>

			<table width="730" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td align="center" valign="middle" colspan="3" height="5">
						<table border="0" cellpadding="0" cellspacing="0" width="690">
							<tr><td class="cmfont"><img src="images/search_title1.gif" border="0"></td></tr>
      			  <tr><td height="10"></td></tr>
			      </table>
					</td>
				</tr>
				<tr>
					<td width="730" align="center" valign="top" bgcolor="#FFFFFF"> 

        
						<table width="686" border="0" cellpadding=0 cellspacing=0 class="cmfont">
							<tr bgcolor="8B9CBF"><td height="3" colspan="5"></td></tr>
							<tr height="29" bgcolor="EEEEEE"> 
								<td width="80"  align="center">그림</td>
								<td align="center">상품명</td>
								<td width="150" align="right">가격</td>
								<td width="20"></td>
							</tr>
							<tr bgcolor="8B9CBF"><td height="1" colspan="5"  bgcolor="AAAAAA"></td></tr>

							<?
								$query = "select * from product where name like '%$findtext%' order by name";
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
									$price = number_format($row['price'], 0);

									echo("<tr height='70'>
											<td width='80' align='center' valign='middle'>
												<a href='product_detail.php?no=$row[no]'><img src='product/$row[image1]' width='60' height='60' border='0'></a>
											</td>
											<td align='left' valign='middle'>
												<a href='product_detail.php?no=$row[no]'><font color='#4186C7'><b>$row[name]</b></font></a><br>");
									
									if ($row['icon_hit'] == 1)
										echo("<img src='images/i_hit.gif' align='absmiddle' vspace='1'>");
									if ($row['icon_new'] == 1)
										echo("<img src='images/i_new.gif' align='absmiddle' vspace='1'>");
									if ($row['icon_sale'] == 1) {
										$dis_price = number_format(round($row['price'] * (100 - $row['discount']) / 100, -3));
										echo("<img src='images/i_sale.gif' align='absmiddle' vspace='1'> <font color='red'>$row[discount]%</font>");
									}

									echo("</td>");

									if ($row['icon_sale'] == 1)
										echo("<td width='150' align='right' valign='middle'><strike>$price 원</strike><br>$dis_price 원</td>");
									else
										echo("<td width='150' align='right' valign='middle'>$price 원</td>");

									echo("	<td width='20'></td>
										</tr>");
									
									if ($i != $page_last-1)
										echo("<tr><td align='center' valign='middle' colspan='5' height='1' background='images/ln1.gif'></td></tr>");
								}
							?>

							<tr bgcolor="8B9CBF"><td height="3" colspan="5"></td></tr>
						</table>
					</td>
				</tr>
			</table>

			<!-- 페이지 기능 -->

			<?
				$blocks = ceil($pages/$page_block);
				$block = ceil($page/$page_block);
				$page_s = $page_block * ($block - 1);
				$page_e = $page_block * $block;
				if ($blocks <= $block) $page_e = $pages;

				echo("<table border='0' cellpadding='0' cellspacing='0' width='690'>
						<tr>
							<td height='40' class='cmfont' align='center'>");
				
				// 이전 블록으로
				if ($block > 1) {
					$tmp = $page_s;
					echo("<a href='product_search.php?findtext=$findtext&page=$tmp'>
							<img src='images/i_prev.gif' align='absmiddle' border='0'>
						</a>&nbsp");
				}

				// 현재 블록의 페이지
				for($i=$page_s+1; $i<=$page_e; $i++) {
					if ($page == $i)
					echo("<font color='red'><b>$i</b></font>&nbsp");
					else
					echo("<a href='product_search.php?findtext=$findtext&page=$i'><font color='#7C7A77'>[$i]</font></a>&nbsp");

				}

				// 다음 블록으로
				if ($block < $blocks) {
					$tmp = $page_e + 1;
					echo("&nbsp<a href='product_search.php?findtext=$findtext&page=$tmp'>
							<img src='images/i_next.gif' align='absmiddle' border='0'>
						</a>");
				}

				echo("    </td>
						</tr>
					</table>");
			?>

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	

<? include "main_bottom.php"; ?>

</body>
</html>