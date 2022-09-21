<?
    // $newfname = "taeyoung.txt";

    if ($_FILES["filename"]["error"] == 0) { // 선택한 파일이 있는지 조사
        $fname = $_FILES["filename"]["name"]; // 파일 이름
        $fsize = $_FILES["filename"]["size"]; // 파일 크기

        if (file_exists("product/".$fname)) exit("동일한 파일이 있음");
        if (!move_uploaded_file($_FILES["filename"]["tmp_name"],
            "product/".$fname)) exit("업로드 실패");

        echo("파일 이름 : $fname<br> 파일 크기 : $fsize");
    }
?>