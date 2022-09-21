<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
  include "common.php";
  $cookie_no = $_COOKIE['cookie_no'];
  $cookie_name = $_COOKIE['cookie_name'];
?>
<html>
<head>
<title>인덕닷컴 쇼핑몰</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link href="include/font.css" rel="stylesheet" type="text/css">
<link href="include/base.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="include\splide-3.6.12\dist\css\splide-core.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700&family=Noto+Sans+KR:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script language="Javascript" src="include/common.js"></script>
<script src="include\splide-3.6.12\dist\js\splide.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
  document.addEventListener( 'DOMContentLoaded', function () {
    Splide( '.splide' ).mount();
  } );
</script>
</head>

<body style="margin:0">

<? include "super_main.php"; ?>

<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	

			<!---- 화면 우측(신상품) 시작 -------------------------------------------------->	
			
			<table width="767" border="0" cellspacing="0" cellpadding="0" class="main-text">
				<tr>
					<td height="60">
					<?
						if (!$cookie_no)
							echo("고객님, 이 상품 어때요?");
						else
							echo("$cookie_name 님, 이 상품 어때요?");
					?>
					</td>
				</tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0">
				<!---1번째 줄-->

				<?
					$num_col = 4;
					$num_row = 3;

					$query = "select * from product where icon_new = 1 and status = 1 order by rand() limit 15";
					$result = mysqli_query($db, $query);
					if (!$result) exit("ERROR: $query");

					$count = mysqli_num_rows($result);
					$icount = 0;

					echo("<table style='main-product'>");

					for ($ir=0; $ir<$num_row; $ir++) {
						echo("<tr>");
						for ($ic=0; $ic<$num_col; $ic++) {
							if ($icount < $count) {
								$row = mysqli_fetch_array($result);
								$price = number_format($row['price'], 0);
								
								echo("<td align='center' valign='top' class='one-product'>
										<table border='0' cellpadding='0' cellspacing='0' class='cmfont'>
											<tr> 
												<td align='center' class='img-product'> 
													<a href='product_detail.php?no=$row[no]'><img src='product/$row[image1]' border='0'></a>
												</td>
											</tr>
											<tr><td height='5'></td></tr>
											<tr> 
												<td align='left' class='name-product' valign='top'>
													<a href='product_detail.php?no=$row[no]'><font color='444444'>$row[name]</font></a><br>");
													if ($row['icon_hit'] == 1)
														echo("<img src='images/i_hit.gif' align='absmiddle' vspace='1'>");
													if ($row['icon_new'] == 1)
														echo("<img src='images/i_new.gif' align='absmiddle' vspace='1'>");
													if ($row['icon_sale'] == 1) {
														$dis_price = number_format(round($row['price'] * (100 - $row['discount']) / 100, -3));
														echo("<img src='images/i_sale.gif' align='absmiddle' vspace='1'>
												</td>
											</tr>
											<tr><td align='left' class='prc-product'> <font style='color:red;'>$row[discount]%</font> <b>$dis_price 원</b> <strike>$price 원</strike></td></tr>");
													} else
														echo("
												</td>
											</tr>
											<tr><td align='left' class='prc-product'><b>$price 원</b></td></tr>");
								echo("
										</table>
									</td>");
							} else
								echo("<td></td>"); // 제품 없는 경우
							$icount++;
						}
						echo("</tr>");
					}
					echo("</table>");
				?>

			<!---- 화면 우측(신상품) 끝 -------------------------------------------------->	

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	

<? include "main_bottom.php"; ?>
<script language="Javascript" src="include/menustyle.js"></script>
</body>
</html>