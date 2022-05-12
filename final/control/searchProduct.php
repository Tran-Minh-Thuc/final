<?php
 session_start();  
 
?>
<?php
    $inputSearch = $_POST['txtSearch'];
    $IdType = $_POST['IdType'];
    $IdCostMin = $_POST['IdCostMin'];
    $IdCostMax = $_POST['IdCostMax'];
    // $typeSearch = $_POST['typeId'];
    require_once('../connect.php');
    ['SearchProducts' => $array] = require '../model/product.php';
    $data = $array($conn,$inputSearch,$IdType,$IdCostMin,$IdCostMax);
    require_once('../close.php');
    $res = "";
    // print_r($data);
    for ($i=0; $i <count($data) ; $i++) { 
        $price1 =  number_format(intval($data[$i]['productcost']), 0, '', '.');
        $temp = "<article class=\"product\">
                <div class=\"product-container\"> 
                <img src=\"imgEC/" . $data[$i]['productimage'] . "\" class=\"product-img img\" alt=\"\" /> 
                <div class=\"product-icons\"> 
                <a href=\"single-product.php?id=" . $data[$i]['productid'] . "\" class=\"product-icon\"> 
                <i class=\"fas fa-search\"></i> </a> 
                <button class=\"product-cart-btn product-icon\" onclick=\"buyProduct(" . $data[$i]['productid'] . ")\" data-id=\"1\"> <i class=\"fas fa-shopping-cart\"></i> 
                </button> 
                </div> 
                </div> 
                <footer> 
                <h5 class=\"product-name\">" . $data[$i]['productname'] . "</h5> 
                <span class=\"product-price\">$price1   VND</span> 
                </footer> 
                </article>
        ";

        if($i % 3 ==0 && $i != 0){
        $temp = "<div class=\"row1\">".$temp."</div>";
        }
        $res = $res . $temp;
    }
    echo $res;
?>