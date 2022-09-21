<?
    include "common.php";

    $uid = $_REQUEST['uid'];
    $pwd = $_REQUEST['pwd'];

    $query = "select no41, name41 from member where uid41 = '$uid' and pwd41 = '$pwd'";
    
    $result = mysqli_query($db, $query);
    if (!$result) exit("ERROR: $query");

    $count = mysqli_num_rows($result);

    if ($count > 0) {
        $row = mysqli_fetch_array($result);

        setcookie("cookie_no", $row['no41']);
        setcookie("cookie_name", $row['name41']);

        echo("<script>location.href='index.html'</script>");
    } else
        echo("<script>location.href='member_login.php'</script>");
?>