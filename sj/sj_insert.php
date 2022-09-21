<?
    include "common.php";

    $name = $_REQUEST['name']; // OR $name = $_POST[name];
    $kor = $_REQUEST['kor'];
    $eng = $_REQUEST['eng'];
    $mat = $_REQUEST['mat'];
    $hap = $_REQUEST['hap'];
    $avg = $_REQUEST['avg'];

    $query = "insert into sj (name41, kor41, eng41, mat41, hap41, avg41)
                values ('$name', $kor, $eng, $mat, $hap, $avg);";
    $result = mysqli_query($db, $query);
    if (!$result) exit("ERROR: $query");

    echo("<script>location.href='sj_list.php'</script>");
?>