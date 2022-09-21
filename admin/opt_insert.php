<?
    include "../common.php";

    $name = $_REQUEST['name'];

    $sql = "alter table opt auto_increment = 1;";
    mysqli_query($db, $sql);

    $query = "insert into opt (name41) values ('$name');";

    $result = mysqli_query($db, $query);
    if (!$result) exit("ERROR: $query");

    echo("<script>location.href='opt.php'</script>");
?>