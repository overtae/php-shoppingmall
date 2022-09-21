<?
    include "../common.php";

    $sel1 = $_REQUEST['sel1'];
    $sel2 = $_REQUEST['sel2'];
    $sel3 = $_REQUEST['sel3'];
    $sel4 = $_REQUEST['sel4'];
	$text1 = $_REQUEST['text1'];
	$page = $_REQUEST['page'];

    $no = $_REQUEST['no'];
    $menu = $_REQUEST['menu'];
    $code = $_REQUEST['code'];
    $name = $_REQUEST['name'];
    $coname = $_REQUEST['coname'];
    $price = $_REQUEST['price'];
    $opt1 = $_REQUEST['opt1'];
    $opt2 = $_REQUEST['opt2'];
    $contents = $_REQUEST['contents'];
    $status = $_REQUEST['status'];
    $icon_new = $_REQUEST['icon_new'] == 1 ? 1 : 0;
    $icon_hit = $_REQUEST['icon_hit'] == 1 ? 1 : 0;
    $icon_sale = $_REQUEST['icon_sale'] == 1 ? 1 : 0;
    $discount = $_REQUEST['discount'];
    $regday1 = $_REQUEST['regday1'];
    $regday2 = $_REQUEST['regday2'];
    $regday3 = $_REQUEST['regday3'];
    $imagename1 = $_REQUEST['imagename1'];
    $imagename2 = $_REQUEST['imagename2'];
    $imagename3 = $_REQUEST['imagename3'];
    $checkno1 = $_REQUEST['checkno1'];
	$checkno2 = $_REQUEST['checkno2'];
	$checkno3 = $_REQUEST['checkno3'];

    $name = addslashes($name);
    $contents = addslashes($contents);
    $regday = sprintf("%04d-%02d-%02d", $regday1, $regday2, $regday3);

    // 이미지 수정 및 해제

    // image1
    $fname1 = $imagename1;
    if ($checkno1 == "1") $fname1 = ""; // 삭제 체크가 된 경우
    if ($_FILES["image1"]["error"] == 0) {
        $fname1 = $_FILES["image1"]["name"];

        // if (file_exists("../product/".$fname1)) exit("동일한 파일이 있음");
        if (!move_uploaded_file($_FILES["image1"]["tmp_name"],
            "../product/".$fname1)) exit("업로드 실패");
    }
    // image2
    $fname2 = $imagename2;
    if ($checkno2 == "1") $fname2 = ""; // 삭제 체크가 된 경우
    if ($_FILES["image2"]["error"] == 0) {
        $fname2 = $_FILES["image2"]["name"];

        // if (file_exists("../product/".$fname2)) exit("동일한 파일이 있음");
        if (!move_uploaded_file($_FILES["image2"]["tmp_name"],
            "../product/".$fname2)) exit("업로드 실패");
    }
    // image3
    $fname3 = $imagename3;
    if ($checkno3 == "1") $fname3 = ""; // 삭제 체크가 된 경우
    if ($_FILES["image3"]["error"] == 0) {
        $fname3 = $_FILES["image3"]["name"];

        // if (file_exists("../product/".$fname3)) exit("동일한 파일이 있음");
        if (!move_uploaded_file($_FILES["image3"]["tmp_name"],
            "../product/".$fname3)) exit("업로드 실패");
    }

    $query = "update product set menu = $menu, code = '$code', name = '$name', coname = '$coname', 
                    price = $price, opt1 = $opt1, opt2 = $opt2, content = '$contents', status = $status, 
                        icon_new = $icon_new, icon_hit = $icon_hit, icon_sale = $icon_sale, discount = $discount, 
                            regday = '$regday', image1 = '$fname1', image2 = '$fname2', image3 = '$fname3' 
                                where no = $no;";

    $result = mysqli_query($db, $query);
    if (!$result) exit("ERROR: $query");

    echo("<script>location.href='product.php?sel1=$sel1&sel2=$sel2&sel3=$sel3&sel4=$sel4&text1=$text1&page=$page'</script>");
?>