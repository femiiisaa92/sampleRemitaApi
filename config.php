<?php
session_start();
/**
 * DEMO TEST CARD ON REMITA
 * Verve 	- 	6280511000000095 	12/2026 	123 	0000
Visa 	VCN Test 	4999082100029373 	01/2019 	518 	1234
 * 
 * CHANGE OF THE URL(S) TO THE SYSTEM/SERVER OWN
 * 
 * */

define("responseurl","http://localhost:81/RemitaApiConsume/apiresponse.php");
define("reciept","http://localhost:81/RemitaApiConsume/apireciept.php");
define("home","http://localhost:81/RemitaApiConsume/");
define("merchantId","2547916");
define("Service_type_id","4430731");
define("api_key","1946");

class productsData extends utility{
    private $productID;
    private $productName;
    private $productImage;
    private $productAmount;
     /**
     * @param  $productID
     * @return \productsData
     */
    public function SetProductID($productID) {
        $this->productID = $productID;
        return $this;
    }
    /**
     * @return 
     */
    public function GetProductID() {
        return $this->productID;
    }
    /**
     * @param  $productName
     * @return \productsData
     */
    public function SetProductName($productName) {
        $this->productName = $productName;
        return $this;
    }
    /**
     * @return 
     */
    public function GetProductName() {
        return $this->productName;
    }
    /**
     * @param  $productImage
     * @return \productsData
     */
    public function SetProductImage($productImage) {
        $this->productImage = $productImage;
        return $this;
    }
    /**
     * @return 
     */
    public function GetProductImage() {
        return $this->productImage;
    }
    /**
     * @param  $productAmount
     * @return \productsData
     */
    public function SetProductAmount($productAmount) {
        $this->productAmount = $productAmount;
        return $this;
    }
    /**
     * @return 
     */
    public function GetProductAmount() {
        return $this->productAmount;
    }
    
          
    /**
     * @brief 
     * @return  
     */ 
    Public function dataArray(){
        $arrayProductID= array("P0001","P0002","P0003","P0004","P0005","P0006");
        $arrayproductName= array("Product 1","Product 2","Product 3","Product 4","Product 5","Product 6");
        $arrayproductImage= array("img/p1.jpg","img/p2.jpg","img/p3.jpg","img/p5.jpg","img/p6.jpg","img/p7.jpg");
        $arrayproductAmount= array("12000","40000","5200","6200","7100","8100");
        $data = array();
        $count = count($arrayProductID);
        for($i=0;$i<$count; $i++){
            $data[$arrayProductID[$i]]["Name"] =$arrayproductName[$i];
            $data[$arrayProductID[$i]]["Image"] =$arrayproductImage[$i];
            $data[$arrayProductID[$i]]["Amount"] =$arrayproductAmount[$i];
        }
        return $data;
    }
    /**
     * @brief 
     * @param <Value(s)> $productID 
     * @return  
     */
    public function getDataValues($productID){
        $data = $this->dataArray();
        foreach($data as $key=>$values){
            if($productID==$key){
                 $this->SetProductID($key);
                 $this->SetProductImage($values["Image"]);
                 $this->SetProductName($values["Name"]);
                 $this->SetProductAmount($values["Amount"]);
                 $this->setSession("productID",$key);
            }
        }
        return $data;
    }
   
}

class utility{
    
  
    public function getHashValueOne($orderID,$amount){
        $keyConcat = merchantId.Service_type_id.$orderID.$amount.responseurl.api_key;
        return hash('sha512', $keyConcat);
    }
    
    public function genOrderId(){
        $trans_id=date('YmdHis');
        $trans_id.=rand(2,99);
        return $this->paddNo($trans_id,11,1);
    }
    
    public function paddNo($id,$length,$add){
    	$data = "";
		$addVal = "";
		$rem_len = $length - strlen($id);
		if($rem_len > 0){
			for($i=0; $i<$rem_len; $i++){
				$addVal.="$add";
			}
			$data = $addVal.$id;
		}else{
			$data = $id;
		}
		return $data;
	
    }
    /**
     * @brief 
     * @param <Value(s)> $key 
     * @param <Value(s)> $value 
     * @return  
     */
    protected function setSession($key,$value){
        $_SESSION[$key]= $value;
     }
     /**
      * @brief 
      * @param <Value(s)> $key 
      * @return  
      */
     public function unsetSession($key){
        unset($_SESSION[$key]);
     }
     /**
      * @brief 
      * @return  
      */
     public function destroySssion(){
         session_destroy();
     }
     /**
      * @brief 
      * @param <Value(s)> $key 
      * @return  
      */
     public function getSessionValue($key){
         return $_SESSION[$Key];
     }
    
    
    
}


?>
