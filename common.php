<?
    // 에러 메시지 설정 프로그램
    error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
    ini_set("display_errors", 1);

    // DB 연결 프로그램
    $db = mysqli_connect("localhost", "shop41", "1234", "shop41");
    if (!$db) exit("DB 연결 에러");

    $page_line = 5;
    $page_block = 5;

    // 관리자 ID, 암호
    $admin_id = "admin";
    $admin_pw = "1234";

    // 분류 관리
    $a_menu = array("분류선택", "아우터", "상의", "하의", "모자");
    $n_menu = count($a_menu);

    // 상품상태, 아이콘
    $a_status = array("상품상태", "판매중", "판매중지", "품절");
    $n_status = count($a_status);

    $a_icon = array("아이콘선택", "New", "Hit", "Sale");
    $n_icon = count($a_icon);

    $a_text1 = array("", " 제품이름", " 제품번호"); // for문의 $i는 1부터 시작
    $n_text1 = count($a_text1);

    // 배송료
    $baesongbi = 2500;
    $max_baesongbi = 100000;

    // 주문상태
    $a_state = array("전체", "주문신청", "주문확인", "입금확인", "배송중", "주문완료", "주문취소");
    $n_state = count($a_state);
?>

