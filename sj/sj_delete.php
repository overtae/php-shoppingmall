<?
    include "common.php";

    $no = $_REQUEST['no'];

    $query = "delete from sj where no41 = $no;";
    $result = mysqli_query($db, $query);
    if (!$result) exit("ERROR: $query");

    echo("<script>location.href='sj_list.php'</script>");
?>