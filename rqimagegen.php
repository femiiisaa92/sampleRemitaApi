<?php
include('lib/phpqrcode/qrlib.php');
ob_start();
$debugLog = ob_get_contents();

QRcode::png($_rrr,"rqcodelog/rq". $_orderid . ".png",QR_ECLEVEL_L,5,1,false);
ob_end_clean(); 
?>