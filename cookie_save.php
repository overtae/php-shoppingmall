<?
    $irum = $_REQUEST['irum'];

    setcookie("irum", $irum);

    echo("<script>location.href='cookie_view.php'</script>");
?>