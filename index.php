<?php 
include("config.php");
$productData= new productsData();
$data = $productData->dataArray();

?>
<!doctype>
<html>
<head>
<title>
Remita Api Consume
</title>
</head>


<body>
<center><h1><u> Sample Remita Api Consume</u> </h1></center>
    
    <br/>
    <br/>
  
    <center>
        <div>
            <p> Order for your Product or Service below </p>
        </div>
   
    
    <?php
        foreach($data as $key=>$value)  {  
    ?>
    <a href="samplepayone.php?_id=<?php echo  $key  ?>" title="<?php echo "Buy ". $value["Name"]; ?>" >
        <div class="product">
            <img src="<?php echo $value["Image"]; ?>" width="130px" />
            <h3> <?php echo $value["Name"]; ?> </h3>
            <p><font color=red>Price:</font> <?php echo number_format($value["Amount"],2); ?> 
            <sup><strike><?php echo number_format(($value["Amount"] + $value["Amount"]*0.21),2); ?></strike> </sup>
            </p>
        </div>
     </a>   
        
    <?php
        }
    ?>
   </center>  
</body>

<footer>
(C)  <?php echo date("Y"); ?> by Femi Isaac
</footer>
</html>


