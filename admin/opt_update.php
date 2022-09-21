<?
    include "../common.php";

    $no1 = $_REQUEST['no1'];
    $name = $_REQUEST['name'];

    $sql = "alter table opt auto_increment = 1;";
    mysqli_query($db, $sql);

    $query = "update opt set name41 = '$name' where no41 = $no1;";

    $result = mysqli_query($db, $query);
    if (!$result) exit("ERROR: $query");

    echo("<script>location.href='opt.php'</script>");
?>