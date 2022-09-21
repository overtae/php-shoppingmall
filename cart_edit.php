<?
    include "common.php";

    $cart = $_COOKIE['cart'];
    $n_cart = $_COOKIE['n_cart'];
    $kind = $_REQUEST['kind'];
    
    $no = $_REQUEST['no'];
    $num = $_REQUEST['num'];
    $opts1 = $_REQUEST['opts1'];
    $opts2 = $_REQUEST['opts2'];
    $pos = $_REQUEST['pos'];

    if (!$n_cart) $n_cart = 0; // 장바구니 제품개수($n_cart) 초기화

    switch ($kind) {
        case "insert": // 장바구니 담기
        case "order": // 바로 구매하기
            $n_cart++;
            $cart[$n_cart] = implode("^", array($no, $num, $opts1, $opts2));
            setcookie("cart[$n_cart]", $cart[$n_cart]);
            setcookie("n_cart", $n_cart);
            break;
        case "delete": // 장바구니 삭제
            setcookie("cart[$pos]");
            break;
        case "update": // 장바구니 수량 수정 ${'num'.$pos}
            $new_num = $_REQUEST['num'];
            list($no, $num, $opts1, $opts2) = explode("^", $cart[$pos]);
            $cart[$pos] = implode("^", array($no, $new_num, $opts1, $opts2));
            setcookie("cart[$pos]", $cart[$pos]);
            break;
        case "deleteall": // 장바구니 전체 비우기
            for ($i=0; $i<=$n_cart; $i++) {
                if($cart[$i])
                    setcookie($cart[$i]);
            }
            $n_cart = 0;
            setcookie("n_cart", $n_cart);
            break;
    }

    if ($kind == "order")
        echo("<script>location.href='order.php'</script>");
        // 주문 / 배송지 입력 화면으로 이동
    else
        echo("<script>location.href='cart.php'</script>");
        // 장바구니 화면으로 이동
?>