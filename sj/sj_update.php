<?
    include "common.php";

    $no = $_REQUEST['no'];
    $name = $_REQUEST['name'];
    $kor = $_REQUEST['kor'];
    $eng = $_REQUEST['eng'];
    $mat = $_REQUEST['mat'];
    $hap = $_REQUEST['hap'];
    $avg = $_REQUEST['avg'];

    $query = "update sj set name41 = '$name', kor41 = $kor, eng41 = $eng,
                mat41 = $mat, hap41 = $hap, avg41 = $avg where no41 = $no;";
    $result = mysqli_query($db, $query);
    if (!$result) exit("ERROR: $query");

    echo("<script>location.href='sj_list.php'</script>");
?>