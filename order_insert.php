<?
    include "common.php";

    $today = date("Y-m-d");
    $query = "select no41 from jumun where jumunday41 = '$today' order by no41 desc;";
    $result = mysqli_query($db, $query);
    if (!$result) exit("ERROR: $query");
    $row = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);

    // 새 주문 번호 (형식 : YYMMDD0000)
    if ($count > 0) { // 주문 번호가 있는 경우
        $jumun_no = intval($row[0]) + 1;
    }
    else
        $jumun_no = date("ymd") . "0001";
    
    $cookie_no = $_COOKIE['cookie_no'];

    $cart = $_COOKIE['cart'];
    $n_cart = $_COOKIE['n_cart'];

    $product_total = 0;
    $product_nums = 0; // 주문한 제품 개수
    $product_names = "";

    for ($i=1;  $i<=$n_cart;  $i++) {
        if ($cart[$i]) { // 제품정보가 있는 경우만
            // 장바구니 cookie에서 제품번호, 수량, 소옵션번호1, 2 알아내기
            list($product_no, $num, $opts1, $opts2) = explode("^", $cart[$i]);

            // 제품정보(제품번호, 단가, 할인여부, 할인율) 알아내기
            $query = "select * from product where no = $product_no";
            $result = mysqli_query($db, $query);
            if (!$result) exit("ERROR: $query");
            $product_row = mysqli_fetch_array($result);

            // 소옵션이름 (opts1, opts2 이름) 알아내기
            $query = "select * from opts where no41 = $opts1";
            $result = mysqli_query($db, $query);
            if (!$result) exit("ERROR: $query");
            $row1 = mysqli_fetch_array($result);

            $query = "select * from opts where no41 = $opts2";
            $result = mysqli_query($db, $query);
            if (!$result) exit("ERROR: $query");
            $row2 = mysqli_fetch_array($result);

            if ($product_row['discount'] != 0) $real_price = round($product_row['price'] * (100 - $product_row['discount']) / 100, -3);
            else $real_price = $product_row['price'];

            $cash = $num * $real_price;

            // insert SQL문을 이용하여 jumuns 테이블에 저장.
            // (주문번호, 제품번호, 수량, 단가, 금액, 할인율, 소옵션번호1, 2)
            $query = "insert into jumuns (jumun_no, product_no, num, price, cash, discount, opts_no1, opts_no2)
                        values ('$jumun_no', $product_no, $num, $product_row[price], $cash, 
                                    $product_row[discount], $opts1, $opts2);";
            $result = mysqli_query($db, $query);
            if (!$result) exit("ERROR: $query");

            // 장바구니 cookie에서 제품 정보 삭제.
            setcookie("cart[$i]");

            // 총금액 = 총금액 + 금액;
            $product_total += $cash;

            // 주문한 제품 개수
            $product_nums = $product_nums + 1;

            if ($product_nums == 1)
                $product_names = $product_row['name'];
            }
    }

    if ($product_nums > 1) { // 제품수가 2개 이상인 경우만 "외 ?" 추가
        $tmp = $product_nums;
        $product_names = $product_names . " 외 " . $tmp;
    }

    if ($product_total < $max_baesongbi) {
        // (주문_번호, 0, 1, 배송비, 배송비, 0, 0, 0,)
        $query = "insert into jumuns (jumun_no, product_no, num, price, cash, discount, opts_no1, opts_no2)
                        values ('$jumun_no', 0, 1, $baesongbi, $baesongbi, 0, 0, 0);";
        $result = mysqli_query($db, $query);
        if (!$result) exit("ERROR: $query");
        
        // 총금액 = 총금액 + 배송비;
        $product_total += $baesongbi;
    }

    if ($cookie_no)
        $member_no = $cookie_no;
    else
        $member_no = 0;

    $o_name = $_REQUEST['o_name'];
    $o_tel = $_REQUEST['o_tel'];
    $o_phone = $_REQUEST['o_phone'];
    $o_email = $_REQUEST['o_email'];
    $o_zip = $_REQUEST['o_zip'];
    $o_juso = $_REQUEST['o_juso'];

    $r_name = $_REQUEST['r_name'];
    $r_tel = $_REQUEST['r_tel'];
    $r_phone = $_REQUEST['r_phone'];
    $r_email = $_REQUEST['r_email'];
    $r_zip = $_REQUEST['r_zip'];
    $r_juso = $_REQUEST['r_juso'];
    $memo = $_REQUEST['memo'];

    $memo = addslashes($memo);

    $pay_method = $_REQUEST['pay_method'];
    $card_kind = $_REQUEST['card_kind'];
    $card_halbu = $_REQUEST['card_halbu'];

    $bank_kind = $_REQUEST['bank_kind'];
    $bank_sender = $_REQUEST['bank_sender'];

    $jumunday = date("Y-m-d");
    
    $query = "insert into jumun (no41, member_no41, jumunday41, product_names41, product_nums41, 
                                    o_name41, o_tel41, o_phone41, o_email41, o_zip41, o_juso41, 
                                    r_name41, r_tel41, r_phone41, r_email41, r_zip41, r_juso41, memo41,
                                    pay_method41, card_okno41, card_halbu41, card_kind41, 
                                    bank_kind41, bank_sender41, total_cash41, state41)
                            values ('$jumun_no', $member_no, '$jumunday', '$product_names', $product_nums,
                                    '$o_name', '$o_tel', '$o_phone', '$o_email', '$o_zip', '$o_juso', 
                                    '$r_name', '$r_tel', '$r_phone', '$r_email', '$r_zip', '$r_juso', '$memo', 
                                    $pay_method, '$jumun_no', $card_halbu, $card_kind, 
                                    $bank_kind, '$bank_sender', $product_total, 1);";
    $result = mysqli_query($db, $query);
    if (!$result) exit("ERROR: $query");

    echo("<script>location.href='order_ok.php'</script>");
?>