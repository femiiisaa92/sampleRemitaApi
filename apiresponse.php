<?php
include("config.php");
    $productData= new productsData();
    $_id = $_SESSION["productID"];
    $productData->getDataValues($_id);
    $_redirecturl = $_REQUEST["redirecturl"];
    $_rrr = $_REQUEST["RRR"];
    $_orderid = $_REQUEST["orderID"];
    $successful=false;
    $msg=" Not Successful";
if($_redirecturl==$_redirecturl && $_orderid!=""){
    $successful=true;
    $msg=" Successful";
    include("rqimagegen.php");
}
?>


<html>

<head>
<title>
Payment Response
</title>
</head>
<body>
      
<center>
    <h1><u> Sample Remita Api Consume</u> </h1>
</center>
    
    <br/>
    <br/>
  
<center>
    
    <div>
            <p> Your Payment for order : <b> <?php echo $productData->GetProductName()." is ".$msg; ?> </b> </p>
    </div>
                <br/>
                <br/>
            
            <div>
                        <img src="<?php echo $productData->GetProductImage(); ?>" width="150px" />
                        <h2> <?php echo $productData->GetProductName(); ?> </h2>
                        <p><h4><font color=red>Price:</font><?php echo number_format($productData->GetProductAmount(),2); ?> </h4> <p>
            
            </div>
           <form action="<?php echo ($successful==true)?reciept:home; ?>" name="reciept" method="POST">
                  <input type="hidden" name="trans_id" value="<?php echo $_orderid ?>" >
                  <input type="hidden" name="rrrr" value="<?php echo $_rrr ?>" >
                  <input type ="submit" name="submit_btn" value="<?php echo ($successful==true)?"Print Receipt From Here":"<< Home Page"; ?>"  >
           </form>
           
           
</center>
           
</body>
     
    
      
</html> 