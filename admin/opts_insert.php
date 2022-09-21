<?
    include "../common.php";

    $no1 = $_REQUEST['no1'];
    $name = $_REQUEST['name'];

    $sql = "alter table opts auto_increment = 1;";
    mysqli_query($db, $sql);

    $query = "insert into opts (opt_no41, name41) values ($no1, '$name');";

    $result = mysqli_query($db, $query);
    if (!$result) exit("ERROR: $query");

    echo("<script>location.href='opts.php?no1=$no1'</script>");
?>