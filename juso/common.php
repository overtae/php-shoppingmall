<?
    // 에러 메시지 설정 프로그램
    error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
    ini_set("display_errors", 1);

    // DB 연결 프로그램
    $db = mysqli_connect("localhost", "shop41", "1234", "shop41");
    if (!$db) exit("DB 연결 에러");

    $page_line = 5; // page당 line 수
    $page_block = 5; // block당 page 수
?>

