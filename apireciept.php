<?php
include("config.php");
$_trans_id = $_POST["trans_id"];
$codeText = $_rrrr = $_POST["rrrr"];
$productData= new productsData();
$_id = $_SESSION["productID"];
$productData->getDataValues($_id);
?>
<html>
<head>
<title></title>
</head>
<body>
<a href="index.php"><input type="button" value="HOME" >  </a>
	<div style="text-align: center;">
        <h2>Transaction Successful</h2>
		<p><b>Remita Retrieval Reference (RRR): </b><?php echo $_rrrr; ?><p>
        <br/>
        <p><b>Order ID: </b><?php echo $_trans_id; ?><p>
        
        <br>
        <br>
        <div>
               <img src="<?php echo "rqcodelog/rq".$_trans_id.".png"; ?>" width=140 />
        </div>
        
        <br/>
        <br/>
        
		 <p><b>Thanks for shopping with us  </b><p>			
         <p><b>Date:  </b><?php echo date("d M, Y @ H:i:s"); ?><p>			
	</div>
</body>

<script>
//Print wait of 1seconds
setTimeout(function(){window.print()},1000)
</script>
</html>