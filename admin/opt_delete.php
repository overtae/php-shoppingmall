<?
    include "../common.php";

    $no1 = $_REQUEST['no1'];

    $query = "delete from opt where no41 = $no1;";
    $result = mysqli_query($db, $query);
    if (!$result) exit("ERROR: $query");

    $query = "delete from opts where opt_no41 = $no1;";
    $result = mysqli_query($db, $query);
    if (!$result) exit("ERROR: $query");

    echo("<script>location.href='opt.php'</script>");
?>