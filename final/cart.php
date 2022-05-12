<div id="Result"></div>
<div class="cart-overlay">
    <aside class="cart">
        <button class="cart-close">
            <i class="fas fa-times"></i>
        </button>
        <header>
            <h3 class="text-slanted">Giỏ hàng</h3>
        </header>
        <!-- cart items -->
        <div class="cart-items">
            <!-- single cart item -->
            <!-- <article class=\"cart-item\">
                <img src=\"./imgEC/".$_SESSION['cart'][$i][5]."\" class=\"cart-item-img\" alt=\"product\" />
                <div class=\"cart-item-info\">
                    <h5 class=\"cart-item-name\">".$_SESSION['cart'][$i][3]."</h5>
                    <span class=\"cart-item-price\">$price3</span>
                    <span style=\"float:none\" class=\"cart-item-price\">$price1</span>
                    <button class=\"cart-item-remove-btn\">remove</button>
                </div>
                <div> <button class=\"cart-item-increase-btn\">
                        <i class=\"fas fa-chevron-up\"></i> </button> <span class=\"cart-item-amount\">".$_SESSION['cart'][$i][1]."</span>
                    <button class=\"cart-item-decrease-btn\"> <i class=\"fas fa-chevron-down\"></i>
                    </button>
                </div>
            </article> -->

            <?php
            if (isset($_SESSION['cart'])) {
                for ($i = 0; $i < count($_SESSION['cart']); $i++) {
                    $price1 =  number_format(intval($_SESSION['cart'][$i][2]), 0, '', '.');
                    $price3 =  number_format(intval($_SESSION['cart'][$i][4]), 0, '', '.');
                    echo "
                    <article class=\"cart-item\"> 
                    <img src=\"./imgEC/" . $_SESSION['cart'][$i][5] . "\" class=\"cart-item-img\" alt=\"product\" /> 
                    <div class=\"cart-item-info\"> 
                    <h5 class=\"cart-item-name\">" . $_SESSION['cart'][$i][3] . "</h5> 
                    <span class=\"cart-item-price\">Giá : $price3 VND</span>
                    <span style=\"float:none\"  class=\"cart-item-price\">Số lượng : " . $_SESSION['cart'][$i][1] . "</span> 
                    </div> 
                    <div> 
                    <span class=\"cart-item-amount\">Tổng giá</span>  
                    <span style=\"margin-top:5px\" class=\"cart-item-amount\">$price1 VND</span>  
                    </div> 
                    </article>";
                }
            }
            ?>
            <!-- end of single cart item -->
        </div>
        <!-- footer -->
        <footer style="background: rgb(241 245 249);">
        <?php
                            $AllPrice =0;
                            $Temp = 0;
                            if(isset($_SESSION['cart'])){
                                for($i=0;$i<count($_SESSION['cart']);$i++) {
                                    $Temp += $_SESSION['cart'][$i][2];
                                }
                                $AllPrice =  number_format(intval($Temp), 0, '', '.');    
                            }
                            if($AllPrice != 0){
                                echo"<h3  class=\"cart-total text-slanted\">Tổng : $AllPrice VND</h3>";
                            }
                            else{
                                echo"<h3  class=\"cart-total text-slanted\">Hãy cho gì đó vào giỏ của bạn :')</h3>";
                            }
                            ?>
            <!-- <h3  class="cart-total text-slanted">total : $12.99</h3> -->
            <!-- <button class="cart-checkout btn">checkout</button> -->
            <?php
                            $AllPrice =0;
                            $Temp = 0;
                            if(isset($_SESSION['cart'])){
                                for($i=0;$i<count($_SESSION['cart']);$i++) {
                                    $Temp += $_SESSION['cart'][$i][2];
                                }
                                $AllPrice =  number_format(intval($Temp), 0, '', '.');    
                            }
                            if($AllPrice != 0){
                                echo"<button  onclick=\"order()\" class=\"cart-checkout btn\">Thanh toán</button>";
                            }
                            else{
                                echo"<button class=\"cart-checkout btn\">giỏ hàng trống</button>";
                            }
                            ?>
        </footer>
    </aside>
</div>
<form id="FOrder" method="POST" action="">
            <?php if(isset($_SESSION['CusID'])){
                echo "<input type=\"hidden\" id=\"IDCus\" name=\"IDCus\" value=\"".$_SESSION['CusID']."\">";
            } else {
                echo "<input type=\"hidden\" id=\"IDCus\" name=\"IDCus\" value=\"\">";
            } ?>
      <button type="submit" id="BtnOrder" style="display:none;"></button>
</form>

<script>
    $("#FOrder").submit(function(event) {
        event.preventDefault(); //prevent default action 
        var post_url = $(this).attr("action"); //get form action url
        $.post("control/saveOrder.php", {
            IDCus: $("#IDCus").val()
        }, function(data) {
            $("#Result").html(data);
        });
    });
    function order(){
        $("#BtnOrder").click();
    }
</script>