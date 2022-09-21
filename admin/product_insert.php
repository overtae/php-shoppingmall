<?
    include "../common.php";

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

    $name = addslashes($name);
    $contents = addslashes($contents);
    $regday = sprintf("%04d-%02d-%02d", $regday1, $regday2, $regday3);

    // image1
    $fname1 = "";
    if ($_FILES["image1"]["error"] == 0) {
        $fname1 = $_FILES["image1"]["name"];

        if (file_exists("../product/".$fname1)) exit("동일한 파일이 있음");
        if (!move_uploaded_file($_FILES["image1"]["tmp_name"],
            "../product/".$fname1)) exit("업로드 실패");
    }
    // image2
    $fname2 = "";
    if ($_FILES["image2"]["error"] == 0) {
        $fname2 = $_FILES["image2"]["name"];

        if (file_exists("../product/".$fname2)) exit("동일한 파일이 있음");
        if (!move_uploaded_file($_FILES["image2"]["tmp_name"],
            "../product/".$fname2)) exit("업로드 실패");
    }
    // image3
    $fname3 = "";
    if ($_FILES["image3"]["error"] == 0) {
        $fname3 = $_FILES["image3"]["name"];

        if (file_exists("../product/".$fname3)) exit("동일한 파일이 있음");
        if (!move_uploaded_file($_FILES["image3"]["tmp_name"],
            "../product/".$fname3)) exit("업로드 실패");
    }

    $query = "insert into product (menu, code, name, coname, price, opt1, opt2, content, status,
                regday, icon_new, icon_hit, icon_sale, discount, image1, image2, image3) 
                values ($menu, '$code', '$name', '$coname', $price, $opt1, $opt2, '$contents', $status,
                '$regday', $icon_new, $icon_hit, $icon_sale, $discount, '$fname1', '$fname2', '$fname3');";
    $result = mysqli_query($db, $query);
    if (!$result) exit("ERROR: $query");

    echo("<script>location.href='product.php'</script>");
?>