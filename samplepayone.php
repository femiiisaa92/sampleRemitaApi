<?php
    include("config.php");
    $_id= $_REQUEST["_id"];
    $productData= new productsData();
    $productData->getDataValues($_id);
?>


<html>

<head>
<title>
Payment Mode
</title>
</head>
      <body>
      
      <center><h1><u> Sample Remita Api Consume</u> </h1></center>
    
    <br/>
    <br/>
  
    <center>
        <div>
            <p> Your Order is: <b> <?php echo $productData->GetProductName(); ?> </b> </p>
        </div>
                <br/>
                <br/>
            <center>
                <div>
                    <img src="<?php echo $productData->GetProductImage(); ?>" width="150px" />
                        <h2> <?php echo $productData->GetProductName(); ?> </h2>
                <p><h4><font color=red>Price:</font><?php echo number_format($productData->GetProductAmount(),2); ?> </h4> <p>
            
                </div>
                <div id="error_msg"> </div>
            <form action="http://www.remitademo.net/remita/ecomm/init.reg" name="SubmitRemitaForm" method="POST">
                  <input name="merchantId" value="<?php echo merchantId; ?>" type="hidden">
                  <input name="serviceTypeId" value="<?php echo Service_type_id ; ?>" type="hidden">
                  <input name="orderId" value="<?php echo $ordid = $productData->genOrderId(); ?>" type="hidden">
                  <input name="hash" value="<?php echo $productData->getHashValueOne($ordid,$productData->GetProductAmount()); ?>" type="hidden">
                  <input name="payerName" value="" type="type" placeholder="Supply your Fullname">
                  <input name="payerEmail" value="" type="text" placeholder="Supply your email">
                  <input name="payerPhone" value="" type="text" placeholder="Supply your Phone Number">
                  <select class="required-entry" title="Credit Card Type" name="paymenttype" id="paymenttype" autocomplete="off">
					   <option>-- Select Payment Type --</option>
						<option value="VERVE"> Verve Card</option>
						<option value="VISA"> Visa</option>
						<option value="MASTERCARD"> MasterCard</option>
						<option value="POCKETMONI"> PocketMoni</option>
						<option value="POS"> POS</option>
						<option value="ATM"> ATM</option>
						<option value="BANK_BRANCH">BANK BRANCH</option>
						<option value="BANK_INTERNET">BANK INTERNET</option>
						<option value="REMITA_PAY"> Remita Account Transfer</option>
					</select>
                  <input name="amt" value="<?php echo $productData->GetProductAmount(); ?>" type="hidden">
                  <input name="responseurl" value="<?php echo responseurl; ?>" type="hidden">
                  <input type ="submit" name="submit_btn" value="Continue to Payment Page"  >
           </form>
           
           
           </center>
           
      </body>
      
      <script >
            
      </script>
      
</html> 