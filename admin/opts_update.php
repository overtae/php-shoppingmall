<?
    include "../common.php";

    $no1 = $_REQUEST['no1'];
    $no2 = $_REQUEST['no2'];
    $name = $_REQUEST['name'];

    $sql = "alter table opt auto_increment = 1;";
    mysqli_query($db, $sql);

    $query = "update opts set name41 = '$name' where no41 = $no2;";

    $result = mysqli_query($db, $query);
    if (!$result) exit("ERROR: $query");

    echo("<script>location.href='opts.php?no1=$no1'</script>");
?>