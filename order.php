<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
  	include "common.php";

  	$cart = $_COOKIE['cart'];
	$n_cart = $_COOKIE['n_cart'];

	$cookie_no = $_COOKIE['cookie_no'];
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
			<script language="javascript">

			function Check_Value() {
				if (!form2.o_name.value) {
					alert("주문자 이름이 잘 못 되었습니다.");	form2.o_name.focus();	return;
				}
				if (!form2.o_tel1.value || !form2.o_tel2.value || !form2.o_tel3.value) {
					alert("전화번호가 잘 못 되었습니다.");	form2.o_tel1.focus();	return;
				}
				if (!form2.o_phone1.value || !form2.o_phone2.value || !form2.o_phone3.value) {
					alert("핸드폰이 잘 못 되었습니다.");	form2.o_phone1.focus();	return;
				}
				if (!form2.o_email.value) {
					alert("이메일이 잘 못 되었습니다.");	form2.o_email.focus();	return;
				}
				if (!form2.o_zip.value) {
					alert("우편번호가 잘 못 되었습니다.");	form2.o_zip.focus();	return;
				}
				if (!form2.o_juso.value) {
					alert("주소가 잘 못 되었습니다.");	form2.o_juso.focus();	return;
				}

				if (!form2.r_name.value) {
					alert("받으실 분의 이름이 잘 못 되었습니다.");	form2.r_name.focus();	return;
				}
				if (!form2.r_tel1.value || !form2.r_tel2.value || !form2.r_tel3.value) {
					alert("전화번호가 잘 못 되었습니다.");	form2.r_tel1.focus();	return;
				}
				if (!form2.r_phone1.value || !form2.r_phone2.value || !form2.r_phone3.value) {
					alert("핸드폰이 잘 못 되었습니다.");	form2.r_phone1.focus();	return;
				}
				if (!form2.r_email.value) {
					alert("이메일이 잘 못 되었습니다.");	form2.r_email.focus();	return;
				}
				if (!form2.r_zip.value) {
					alert("우편번호가 잘 못 되었습니다.");	form2.r_zip.focus();	return;
				}
				if (!form2.r_juso.value) {
					alert("주소가 잘 못 되었습니다.");	form2.r_juso.focus();	return;
				}

				form2.submit();
			}

			function FindZip(zip_kind) 
			{
				window.open("zipcode.php?zip_kind="+zip_kind, "", "scrollbars=no,width=500,height=250");
			}

			function SameCopy(str) {
				if (str == "Y") {
					form2.r_name.value = form2.o_name.value;
					form2.r_zip.value = form2.o_zip.value;
					form2.r_juso.value = form2.o_juso.value;
					form2.r_tel1.value = form2.o_tel1.value;
					form2.r_tel2.value = form2.o_tel2.value;
					form2.r_tel3.value = form2.o_tel3.value;
					form2.r_phone1.value = form2.o_phone1.value;
					form2.r_phone2.value = form2.o_phone2.value;
					form2.r_phone3.value = form2.o_phone3.value;
					form2.r_email.value = form2.o_email.value;
				}
				else {
					form2.r_name.value = "";
					form2.r_zip.value = "";
					form2.r_juso.value = "";
					form2.r_tel1.value = "";
					form2.r_tel2.value = "";
					form2.r_tel3.value = "";
					form2.r_phone1.value = "";
					form2.r_phone2.value = "";
					form2.r_phone3.value = "";
					form2.r_email.value = "";
				}
			}

			</script>

			<table border="0" cellpadding="0" cellspacing="0" width="747">
				<tr><td height="13"></td></tr>
				<tr>
					<td height="30" align="center"><img src="images/jumun_title.gif" width="746" height="30" border="0"></td>
				</tr>
				<tr><td height="13"></td></tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="710">
				<tr>
					<td><img src="images/order_title1.gif" width="65" height="15" border="0"></td>
				</tr>
				<tr><td height="10"></td></tr>
			</table>

			<table border="0" cellpadding="5" cellspacing="1" width="710" class="cmfont" bgcolor="#CCCCCC">
				<tr bgcolor="F0F0F0" height="23" class="cmfont">
					<td width="440" align="center">상품</td>
					<td width="70"  align="center">수량</td>
					<td width="100" align="center">가격</td>
					<td width="100" align="center">합계</td>
				</tr>

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
			<br><br>

			<!-- 주문자 정보 -->
			<table width="710" border="0" cellpadding="0" cellspacing="0" class="cmfont">
				<tr height="3" bgcolor="#CCCCCC"><td></td></tr>
			</table>

			<?
				$o_no = "0"; $o_name = ""; $o_tel = ""; $o_phone = ""; $o_email = ""; $o_juso = "";
				if ($cookie_no) {
					$query = "select * from member where no41 = $cookie_no";
					$result = mysqli_query($db, $query);
					if (!$result) exit("ERROR: $query");
					$row = mysqli_fetch_array($result);

					$o_no = $row['no41']; 
					$o_name = $row['name41'];
					$o_tel = $row['tel41'];
					$o_phone = $row['phone41'];
					$o_email = $row['email41'];
					$o_zip = $row['zip41'];
					$o_juso = $row['juso41'];

					$o_tel1 = trim(substr($o_tel, 0, 3));
					$o_tel2 = trim(substr($o_tel, 3, 4));
					$o_tel3 = trim(substr($o_tel, 7, 4));
					$o_phone1 = trim(substr($o_phone, 0, 3));
					$o_phone2 = trim(substr($o_phone, 3, 4));
					$o_phone3 = trim(substr($o_phone, 7, 4));
				}
			?>

			<!-- form2 시작  -->
			<form name="form2" method="post" action="order_pay.php">
			<table width="710" border="0" cellpadding="0" cellspacing="0" class="cmfont">
				<tr>
					<td align="left" valign="top" width="150" STYLE="padding-left:45;padding-top:5">
						<font size="2" color="#B90319"><b>주문자 정보</b></font>
					</td>
					<td align="center" width="560">

						<table width="560" border="0" cellpadding="0" cellspacing="0" class="cmfont">
							<tr height="25">
								<td width="150"><b>주문자 성명</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="hidden" name="o_no" value="<?=$o_no?>">
									<input type="text"   name="o_name" size="20" maxlength="10" value="<?=$o_name?>" class="cmfont1">
								</td>
							</tr>
							<tr height="25">
								<td width="150"><b>전화번호</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="text" name="o_tel1" size="4" maxlength="4" value="<?=$o_tel1?>" class="cmfont1"> -
									<input type="text" name="o_tel2" size="4" maxlength="4" value="<?=$o_tel2?>" class="cmfont1"> -
									<input type="text" name="o_tel3" size="4" maxlength="4" value="<?=$o_tel3?>" class="cmfont1">
								</td>
							</tr>
							<tr height="25">
								<td width="150"><b>휴대폰번호</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="text" name="o_phone1" size="4" maxlength="4" value="<?=$o_phone1?>" class="cmfont1"> -
									<input type="text" name="o_phone2" size="4" maxlength="4" value="<?=$o_phone2?>" class="cmfont1"> -
									<input type="text" name="o_phone3" size="4" maxlength="4" value="<?=$o_phone3?>" class="cmfont1">
								</td>
							</tr>
							<tr height="25">
								<td width="150"><b>E-Mail</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="text" name="o_email" size="50" maxlength="50" value="<?=$o_email?>" class="cmfont1">
								</td>
							</tr>
							<tr height="50">
								<td width="150"><b>주소</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="text" name="o_zip" size="5" maxlength="5" value="<?=$o_zip?>" class="cmfont1"> 
									<a href="javascript:FindZip(1)"><img src="images/b_zip.gif" align="absmiddle" border="0"></a> <br>
									<input type="text" name="o_juso" size="55" maxlength="200" value="<?=$o_juso?>" class="cmfont1"><br>
								</td>
							</tr>
						</table>

					</td>
				</tr>
				<tr height="10"><td></td></tr>
			</table>

			<!-- 배송지 정보 -->
			<table width="710" border="0" cellpadding="0" cellspacing="0" class="cmfont">
				<tr height="3" bgcolor="#CCCCCC"><td></td></tr>
				<tr height="10"><td></td></tr>
			</table>

			<table width="710" border="0" cellpadding="0" cellspacing="0" class="cmfont">
				<tr>
					<td align="left" valign="top" width="150" STYLE="padding-left:45;padding-top:5"><font size=2 color="#B90319"><b>배송지 정보</b></font></td>
					<td align="center" width="560">

						<table width="560" border="0" cellpadding="0" cellspacing="0" class="cmfont">
							<tr height="25">
								<td width="150"><b>주문자정보와 동일</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="radio" name="same" onclick="SameCopy('Y')">예 &nbsp;
									<input type="radio" name="same" onclick="SameCopy('N')">아니오
								</td>
							</tr>
							<tr height="25">
								<td width="150"><b>받으실 분 성명</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="text" name="r_name" size="20" maxlength="10" value="" class="cmfont1">
								</td>
							</tr>
							<tr height="25">
								<td width="150"><b>전화번호</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="text" name="r_tel1" size="4" maxlength="4" value="" class="cmfont1"> -
									<input type="text" name="r_tel2" size="4" maxlength="4" value="" class="cmfont1"> -
									<input type="text" name="r_tel3" size="4" maxlength="4" value="" class="cmfont1">
								</td>
							</tr>
							<tr height="25">
								<td width="150"><b>휴대폰번호</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="text" name="r_phone1" size="4" maxlength="4" value="" class="cmfont1"> -
									<input type="text" name="r_phone2" size="4" maxlength="4" value="" class="cmfont1"> -
									<input type="text" name="r_phone3" size="4" maxlength="4" value="" class="cmfont1">
								</td>
							</tr>
							<tr height="25">
								<td width="150"><b>E-Mail</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="text" name="r_email" size="50" maxlength="50" value="" class="cmfont1">
								</td>
							</tr>
							<tr height="50">
								<td width="150"><b>주소</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="text" name="r_zip" size="5" maxlength="5" value="" class="cmfont1"> 
									<a href="javascript:FindZip(2)"><img src="images/b_zip.gif" align="absmiddle" border="0"></a> <br>
									<input type="text" name="r_juso" size="55" maxlength="200" value="" class="cmfont1"><br>
								</td>
							</tr>
							<tr height="50">
								<td width="150"><b>배송시요구사항</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<textarea name="memo" cols="60" rows="3" class="cmfont1"></textarea>
								</td>
							</tr>
						</table>

					</td>
				</tr>
				<tr height="10"><td></td></tr>
			</table>

			<table width="710" border="0" cellpadding="0" cellspacing="0" class="cmfont">
				<tr height="3" bgcolor="#CCCCCC"><td></td></tr>
				<tr height="10"><td></td></tr>
			</table>

			</form>

			<table width="710" border="0" cellpadding="0" cellspacing="0" class="cmfont">
				<tr>
					<td align="center">
						<img src="images/b_order4.gif" onclick="Check_Value()" style="cursor:hand">

						<!-- 이 바튼은 단지 다음문서로 가는 테스트용 버튼임. 삭제할 것  -->
						&nbsp;&nbsp <input type="button" value="다음 문서로(테스트용)" onclick="form2.submit();">

					</td>
				</tr>
				<tr height="20"><td></td></tr>
			</table>

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	

<? include "main_bottom.php"; ?>

</body>
</html>