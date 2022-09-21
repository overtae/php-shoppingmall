<?
    include "common.php";

    $uid = $_REQUEST['uid'];
    $pwd = $_REQUEST['pwd'];
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];

    if ($uid) {
        $query = "select no41 from member where uid41 = '$uid' and pwd41 = '$pwd'";
        $result = mysqli_query($db, $query);
        if (!$result) exit("ERROR: $query");
        $row = mysqli_fetch_array($result);
        $query = "select no41 from jumun where member_no41 = $row[no41]";
    }
    else
        $query = "select no41 from jumun where o_name41 = '$name' and o_email41 = '$email'";
    
    $result = mysqli_query($db, $query);
    if (!$result) exit("ERROR: $query");

    $count = mysqli_num_rows($result);

    if ($count > 0) {
        for ($i=0; $i<$count; $i++) {
        $row = mysqli_fetch_array($result);

        setcookie("jumun_no", $row['no41']);
        }

        echo("<script>location.href='jumun.php'</script>");
    } else
        echo("<script>location.href='jumun_login.php'</script>");
?>