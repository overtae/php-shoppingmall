<?
	$cookie_no = $_COOKIE['cookie_no'];
	$cookie_name = $_COOKIE['cookie_name'];
    $findtext = $_REQUEST['findtext'];
	$menu = $_REQUEST['menu'];
?>
<center>
<table width="959" border="0" cellspacing="0" cellpadding="0" align="center" class="top">
	<tr> 
		<td>
			<!--  상단 왼쪽 로고  -------------------------------------------->
			<table border="0" cellspacing="0" cellpadding="0" width="182" class="top_logo">
				<tr>
					<td><a href="index.html"><img src="product/top_logo.png" width="120" border="0" style="padding:10px 0;"></a></td>
				</tr>
			</table>
		</td>
		<td align="right" valign="middle">
			<!--  상단메뉴 Home/로그인/회원가입/장바구니/주문배송조회/즐겨찾기추가  ---->	
			<table border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td class="search">
						<form name="form1" method="post" action="product_search.php" style="display:inline;">
							<input type="text" name="findtext" maxlength="40" size="17" value="<?=$findtext?>" class="cmfont1" style="border:0;">
						</form>
						<div width="20" align="right" style="display:inline;"><a href="javascript:Search()"><ion-icon name="search-outline"></ion-icon></a></div>
					</td>
					<td class="top-menu"><a href="cart.php">장바구니</a></td>
					<?
						if (!$cookie_no) {
							echo("<td class='top-menu'><a href='member_login.php'>로그인</a></td>
									<td class='top-menu'><a href='member_agree.php'>회원가입</a></td>");
						}
						else {
							echo("<td class='top-menu'><a href='member_logout.php'>로그아웃</a></td>
									<td class='top-menu'><a href='member_edit.php'>회원정보수정</a></td>");
						}
					?>
					
					<!-- <td><a href="jumun_login.php"><img src="images/top_menu06.gif" border="0"></a></td> -->
					<!-- <td><img src="images/top_menu08.gif" onclick="javascript:Add_Site();" style="cursor:hand"></td> -->
				</tr>
			</table>
		</td>
	</tr>
</table>

<table width="959" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr><td height="10" colspan="2"></td></tr>
	<tr>
		<td height="100%" valign="top">
			<!--  화면 좌측메뉴 시작 (main_left) ------------------------------->
			<table width="181" border="0" cellspacing="0" cellpadding="0">
				<tr> 
					<td valign="top"> 
						<!--  Category 메뉴 : 가로형인 경우  -------------------------------------->
						<table width="959" height="40" border="0" cellspacing="0" cellpadding="0" align="center">
							<tr>
								<td align="center" bgcolor="#F7F7F7">
									<table border="0" cellspacing="0" cellpadding="0" class="main-menu">
										<tr>
											<td><a href="index.html">HOME</a></td>
											<td><a class="o" href="product.php?menu=1">아우터</a></td>
											<td><a class="t" href="product.php?menu=2">상의</a></td>
											<td><a class="b" href="product.php?menu=3">하의</a></td>
											<td><a class="h" href="product.php?menu=4">모자</a></td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			
			<!--  화면 상단메뉴 끝 (main_left) --------------------------------->
		</td>
		<td width="10"></td>
		<td valign="top"></td>
	</tr>
	<tr><td align="center">