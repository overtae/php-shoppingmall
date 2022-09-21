<?
  include "common.php";
  $menu = $_REQUEST['menu'];
  $sort = $_REQUEST['sort'];
?>
<html>
<head>
<title>인덕닷컴 쇼핑몰</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link href="include/font.css" rel="stylesheet" type="text/css">
<link href="include/base.css" rel="stylesheet" type="text/css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700&family=Noto+Sans+KR:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script language="Javascript" src="include/common.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
</head>

<body style="margin:0">

<? include "main_top.php"; ?>

<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	

      <!-- 하위 상품목록 -->

	<?
		if ($sort == "up") // 고가격순
			$query = "select * from product where menu = $menu and status = 1 order by price desc;";
		else if ($sort == "down") // 저가격순
			$query = "select * from product where menu = $menu and status = 1 order by price;";
		else if ($sort == "name") // 이름순
			$query = "select * from product where menu = $menu and status = 1 order by name;";
		else // 신상품순
			$query = "select * from product where menu = $menu and status = 1 order by no desc;";

		$result = mysqli_query($db, $query);
		if (!$result) exit("ERROR: $query");
		$count = mysqli_num_rows($result);
	?>

			<!-- form2 시작 -->
			<form name="form2" method="post" action="product.php">
			<input type="hidden" name="menu" value="<?=$menu?>">

			<table border="0" cellpadding="0" cellspacing="5" width="767" class="cmfont" bgcolor="#efefef">
				<tr>
					<td bgcolor="white" align="center">
						<table border="0" cellpadding="0" cellspacing="0" width="751" class="cmfont">
							<tr>
								<td align="center" valign="middle">
									<table border="0" cellpadding="0" cellspacing="0" width="730" height="40" class="cmfont">
										<tr>
											<td width="500" class="cmfont">
												<font color="#C83762" class="cmfont"><b><?=$row['menu']?> &nbsp</b></font>&nbsp
											</td>
											<td align="right" width="274">
												<table width="100%" border="0" cellpadding="0" cellspacing="0" class="cmfont">
													<tr>
														<td align="right"><font color="EF3F25"><b><?=$count?></b></font> 개의 상품.&nbsp;&nbsp;&nbsp</td>
														<td width="100">
															<select name="sort" size="1" class="cmfont" onChange="form2.submit()">
																<option value="new" selected>신상품순 정렬</option>
																<option value="up">고가격순 정렬</option>
																<option value="down">저가격순 정렬</option>
																<option value="name">상품명 정렬</option>
															</select>
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			</form>
			<!-- form2 -->

			<table border="0" cellpadding="0" cellspacing="0">

			<?
				$num_col = 5;
				$num_row = 3;
				$page_line = $num_col * $num_row; // 한 페이지에 출력할 제품 수
				$icount = 0;

				$page = $_REQUEST['page'];
				if (!$page) $page = 1;
				$pages = ceil($count/$page_line);

				$first = 1;
				if ($count > 0) $first = $page_line * ($page - 1);

				$page_last = $count - $first;
				if ($page_last > $page_line) $page_last = $page_line;

				if ($count > 0) mysqli_data_seek($result, $first);

				echo("<table>");

				for ($ir=0; $ir<$num_row; $ir++) {
					echo("<tr>");
					for ($ic=0; $ic<$num_col; $ic++) {
						if ($icount < $page_last) {
							$row = mysqli_fetch_array($result);
							$price = number_format($row['price'], 0);
							
							echo("<td width='150' height='205' align='center' valign='top'>
									<table border='0' cellpadding='0' cellspacing='0' width='100' class='cmfont'>
										<tr> 
											<td align='center'> 
												<a href='product_detail.php?no=$row[no]'><img src='product/$row[image1]' width='120' height='140' border='0'></a>
											</td>
										</tr>
										<tr><td height='5'></td></tr>
										<tr> 
											<td height='20' align='center'>
												<a href='product_detail.php?no=$row[no]'><font color='444444'>$row[name]</font></a>&nbsp;");
												if ($row['icon_hit'] == 1)
													echo("<img src='images/i_hit.gif' align='absmiddle' vspace='1'>");
												if ($row['icon_new'] == 1)
													echo("<img src='images/i_new.gif' align='absmiddle' vspace='1'>");
												if ($row['icon_sale'] == 1) {
													$dis_price = number_format(round($row['price'] * (100 - $row['discount']) / 100, -3));
													echo("<img src='images/i_sale.gif' align='absmiddle' vspace='1'> <font color='red'>$row[discount]%</font>
											</td>
										</tr>
										<tr><td height='20' align='center'><strike>$price 원</strike><br><b>$dis_price 원</b></td></tr>");
												} else
													echo("
											</td>
										</tr>
										<tr><td height='20' align='center'><b>$price 원</b></td></tr>");
							echo("
									</table>
								</td>");
						} else
							echo("<td></td>");
						$icount++;
					}
					echo("</tr>");
				}
				echo("</table>");
			?>

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
					echo("<a href='product.php?menu=$menu&sort=$sort&page=$tmp'>
							<img src='images/i_prev.gif' align='absmiddle' border='0'>
						</a>&nbsp");
				}

				// 현재 블록의 페이지
				for($i=$page_s+1; $i<=$page_e; $i++) {
					if ($page == $i)
					echo("<font color='red'><b>$i</b></font>&nbsp");
					else
					echo("<a href='product.php?menu=$menu&sort=$sort&page=$i'><font color='#7C7A77'>[$i]</font></a>&nbsp");

				}

				// 다음 블록으로
				if ($block < $blocks) {
					$tmp = $page_e + 1;
					echo("&nbsp<a href='product.php?menu=$menu&sort=$sort&page=$tmp'>
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
<script language="Javascript" src="include/menustyle.js"></script>
</body>
</html>