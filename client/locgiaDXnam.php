<?php
require "../lib/config.php";

$gia = $_GET["GIASP"];
$gia1 = $_GET["GIASP1"];

$re = mysql_query("SELECT * FROM san_pham WHERE GIASP BETWEEN '$gia' AND '$gia1' AND AnHien=1 AND ID_LOAI BETWEEN 1 AND 9 ORDER BY RAND() LIMIT 0,10");
$res = array();
if(mysql_num_rows($re) > 0 ){
    $res["success"] = 1;
    $res["chitiet"] = array();
    while($rows = mysql_fetch_array($re)){
        $sp = array();
        $sp["ID_SP"] = $rows["ID_SP"];
        $sp["TENSP"] = $rows["TENSP"];
        $sp["HinhSP"] = $rows["HinhSP"];
        $sp["GIASP"] = $rows["GIASP"];
        $sp["ID_LOAI"] = $rows["ID_LOAI"];
        array_push($res["chitiet"], $sp);
    }
    echo json_encode($res);


}

?>
