<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
	include "common.php";

	$cart = $_COOKIE['cart'];
    $n_cart = $_COOKIE['n_cart'];
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

			<!--  현재 페이지 자바스크립  -------------------------------------------->
			<script language = "javascript">

			function cart_edit(kind,pos) {
				if (kind=="deleteall") 
				{
					location.href = "cart_edit.php?kind=deleteall";
				} 
				else if (kind=="delete")	{
					location.href = "cart_edit.php?kind=delete&pos="+pos;
				} 
				else if (kind=="insert")	{
					var num=eval("form2.num"+pos).value;
					location.href = "cart_edit.php?kind=insert&pos="+pos+"&num="+num;
				}
				else if (kind=="update")	{
					var num=eval("form2.num"+pos).value;
					location.href = "cart_edit.php?kind=update&pos="+pos+"&num="+num;
				}
			}

			</script>

			<!-- form2 시작  -->
			<table border="0" cellpadding="0" cellspacing="0" width="747">
				<tr><td height="13"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="746">
				<tr>
					<td height="30" align="left"><img src="images/cart_title.gif" width="746" height="30" border="0"></td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="747">
				<tr><td height="13"></td></tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="710" class="cmfont">
				<tr>
					<td><img src="images/cart_title1.gif" border="0"></td>
				</tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="710">
				<tr><td height="10"></td></tr>
			</table>

			<table border="0" cellpadding="5" cellspacing="1" width="710" class="cmfont" bgcolor="#CCCCCC">
				<tr bgcolor="F0F0F0" height="23" class="cmfont">
					<td width="420" align="center">상품</td>
					<td width="70"  align="center">수량</td>
					<td width="80"  align="center">가격</td>
					<td width="90"  align="center">합계</td>
					<td width="50"  align="center">삭제</td>
				</tr>

				<form name="form2" method="post">

				<?
					$total = 0;
					if (!$n_cart) $n_cart = 0;

					for ($i=0; $i<=$n_cart; $i++) {
						if ($cart[$i]) {
							list($no, $num, $opts1, $opts2) = explode("^", $cart[$i]);

							// $no제품에 대한 정보 알아내기
							$query = "select * from product where no = $no";
							$result = mysqli_query($db, $query);
							if (!$result) exit("ERROR: $query");
							$row = mysqli_fetch_array($result);

							// 금액
							$ori_price = $row['price'];
							$dis_price = round($row['price'] * (100 - $row['discount']) / 100, -3);
							$price = $row['icon_sale'] == 1? $dis_price : $ori_price;
							$tot_price = intval($num) * $price;
							$total += $tot_price;
							$price = number_format($price);
							$tot_price = number_format($tot_price);

							// $opts1에 대한 소옵션 정보 알아내기
							$query = "select * from opts where no41 = $opts1";
							$result = mysqli_query($db, $query);
							if (!$result) exit("ERROR: $query");
							$row1 = mysqli_fetch_array($result);

							// $opts2에 대한 소옵션 정보 알아내기
							if ($opts2) {
								$query = "select * from opts where no41 = $opts2";
								$result = mysqli_query($db, $query);
								if (!$result) exit("ERROR: $query");
								$row2 = mysqli_fetch_array($result);
							}

							echo("<tr>
									<td height='60' align='center' bgcolor='#FFFFFF'>
										<table cellpadding='0' cellspacing='0' width='100%'>
											<tr>
												<td width='60'>
													<a href='product_detail.php?no=$no'><img src='product/$row[image1]' width='50' height='50' border='0'></a>
												</td>
												<td class='cmfont'>
													<a href='product_detail.php?no=$no'>$row[name]</a><br>
													<font color='#0066CC'>[옵션사항]</font> $row1[name41]");
													if ($opts2) { echo(", $row2[name41]"); }
							echo("				</td>
											</tr>
										</table>
									</td>
									<td align='center' bgcolor='#FFFFFF'>
										<input type='text' name='num$i' size='3' value='$num' class='cmfont1'>&nbsp<font color='#464646'>개</font>
									</td>
									<td align='center' bgcolor='#FFFFFF'><font color='#464646'>$price</font></td>
									<td align='center' bgcolor='#FFFFFF'><font color='#464646'>$tot_price</font></td>
									<td align='center' bgcolor='#FFFFFF'>
										<a href='javascript:cart_edit(\"update\",\"$i\")'><img src='images/b_edit1.gif' border='0'></a>&nbsp<br>
										<a href='javascript:cart_edit(\"delete\",\"$i\")'><img src='images/b_delete1.gif' border='0'></a>&nbsp
									</td>
								</tr>");
						}
					}
				?>

				
				<tr>
					<td colspan="5" bgcolor="#F0F0F0">
						<table width="100%" border="0" cellpadding="0" cellspacing="0" class="cmfont">
							<tr>
								<td bgcolor="#F0F0F0"><img src="images/cart_image1.gif" border="0"></td>
								<td align="right" bgcolor="#F0F0F0">
									<font color="#0066CC"><b>총 합계금액</font></b>
									<?
										if ($total < $max_baesongbi) {
											$all_total = number_format($total + $baesongbi);
											$baesongbi = number_format($baesongbi);
											$total = number_format($total);
											echo(" : 상품대금($total 원) + 배송료($baesongbi 원) = <font color='#FF3333'><b>$all_total 원</b></font>&nbsp;&nbsp");
										} else {
											$total = number_format($total);
											echo(" : 상품대금($total 원) + 배송료 <b>무료</b> = <font color='#FF3333'><b>$total 원</b></font>&nbsp;&nbsp");
										}
									?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			</form>
			<!-- form2 끝  -->
			<table width="710" border="0" cellpadding="0" cellspacing="0" class="cmfont">
				<tr height="44">
					<td width="710" align="center" valign="middle">
						<a href="index.html"><img src="images/b_shopping.gif" border="0"></a>&nbsp;&nbsp;
						<a href="javascript:cart_edit('deleteall',0)"><img src="images/b_cartalldel.gif" width="103" height="26" border="0"></a>&nbsp;&nbsp;
						<a href="order.php"><img src="images/b_order1.gif" border="0"></a>
					</td>
				</tr>
			</table>

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	

<? include "main_bottom.php"; ?>

</body>
</html>