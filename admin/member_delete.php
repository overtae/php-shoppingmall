<?
    include "../common.php";

    $no = $_REQUEST['no'];

    $query = "delete from member where no41 = $no;";
    $result = mysqli_query($db, $query);
    if (!$result) exit("ERROR: $query");

    echo("<script>location.href='member.php'</script>");
?>