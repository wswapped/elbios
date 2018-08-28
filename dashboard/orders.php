<?php
    $products = $Product->list();
    $purchasingOrders = $POrder->list();
?>
<div class="uk-grid uk-grid-width-medium-1-2">
    <div class="uk-first-row">
        <h4 class="heading_a uk-margin-bottom">Orders</h4>
        <div class="md-card uk-margin-medium-bottom">
            <div class="md-card-content">
                <h4 class="heading_a uk-margin-bottom">Purchase Orders</h4>
                <div class="dt_colVis_buttons"></div>
                <table id="dt_individual_search" class="uk-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Order Number</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Total amount</th>
                            <!-- <th>Vendor</th> -->
                            <!-- <th>Delivery date</th> -->
                            <!-- <th>Shipping method</th> -->
                            <th>Issued</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        for($n=0; $n<count($purchasingOrders); $n++){
                            $order = $purchasingOrders[$n];
                            $productDetails = $Product->details($order['productId']);
                            ?>
                                <tr>
                                    <td><?php echo $n+1; ?></td>
                                    <td>ORD<?php echo $order['id']; ?></td>
                                    <td><?php echo $productDetails['productName']; ?></td>
                                    <td><?php echo $order['productQuantity']; ?></td>
                                    <td><?php echo number_format($order['productQuantity']*$order['productUnitPrice'])." ".$order['priceCurrency']; ?></td>
                                    <td><?php echo date("d M Y m:i", strtotime($order['createdDate']))??"-"; ?></td>
                                    <!-- <td><button class="md-btn"><span class="menu_icon"><i class="material-icons md-color-light-green-800">edit</i></span></button></td> -->
                                </tr>
                            <?php
                        }
                    ?>
                    </tbody>
                </table>
                <div class="md-fab-wrapper" style="position: relative;bottom: initial;right: initial;">
                    <button class="md-fab md-fab-primary d_inline" id="launch_purchasing_order" href="javascript:void(0)" data-uk-modal="{target:'#purchasing_order'}"><i class="material-icons">add</i></button>
                </div>
            </div>
        </div>
    </div>
     <div class="uk-first-row">
        <h4 class="heading_a uk-margin-bottom">Sale orders</h4>
        <div class="md-card uk-margin-medium-bottom">
            <div class="md-card-content">
                <p>
                    Customers sale orders
                </p>
            </div>
        </div>
    </div>
</div>


<!-- <div class="md-fab-wrapper ">
    <button class="md-fab md-fab-primary d_inline" id="launch_church_create" href="javascript:void(0)" data-uk-modal="{target:'#church_create'}"><i class="material-icons">add</i></button>
</div> -->

<!-- Purchasing order creation modal -->
<div class="uk-modal" id="purchasing_order" aria-hidden="true" style="display: none; overflow-y: auto;">
    <div class="uk-modal-dialog" style="max-width:1200px;">
        <div class="act-dialog" data-role="init">
            <div class="uk-modal-header uk-tile uk-tile-default">
                <h3 class="d_inline">Create purchasing order</h3>
            </div>
            <form method="POST" enctype="multipart/form-data" id="add_purch_form" autocomplete="off">
                <div class="md-card1">
                    <div class="md-card-content1">
                        <div class="md-input-wrapper md-input-filled">
                            <label></label>
                            <select class="md-input label-fixed" id="productselect" name="state">
                                <option value=null>Product</option>
                                <?php                                    
                                    foreach ($products as $key => $product) {
                                        echo '<option value="'.$product['productId'].'">'.$product['productName'].'</option>';
                                    }
                                ?>
                            </select>
                            <span class="md-input-bar "></span>
                        </div>
                        <div class="md-input-wrapper md-input-filled">
                            <!-- <label>Ubwoko - bumwe gusa</label> -->     
                            <select class="md-input label-fixed" id="productMeasurement" name="state">
                                <option value=null>Measurement unit</option>
                            </select>
                        </div>
                        <div class="md-input-wrapper">
                            <label>Quantity</label>
                            <input type="text" id="productQuantity" class="md-input" required="required">
                            <span class="md-input-bar "></span>
                        </div>
                        <div class="uk-grid uk-margin-bottom">
                            <div class="uk-first-row">
                                <div class="md-input-wrapper">
                                    <label>Unit price</label>
                                    <input type="text" id="productUnitPrice" class="md-input" required="required">
                                    <span class="md-input-bar "></span>
                                </div>
                            </div>
                            <div class="uk-row">
                                <div class="md-input-wrapper md-input-filled">
                                    <label>Currency</label>
                                    <select name="priceCurrency" id="priceCurrency" class="md-input">
                                        <option value="FRW" selected="selected">Rwandan Francs</option>
                                        <option value="USD">United States Dollars</option>
                                        <option value="EUR">Euro</option>
                                        <option value="GBP">United Kingdom Pounds</option>
                                        <option value="DZD">Algeria Dinars</option>
                                        <option value="ARP">Argentina Pesos</option>
                                        <option value="AUD">Australia Dollars</option>
                                        <option value="ATS">Austria Schillings</option>
                                        <option value="BSD">Bahamas Dollars</option>
                                        <option value="BBD">Barbados Dollars</option>
                                        <option value="BEF">Belgium Francs</option>
                                        <option value="BMD">Bermuda Dollars</option>
                                        <option value="BRR">Brazil Real</option>
                                        <option value="BGL">Bulgaria Lev</option>
                                        <option value="CAD">Canada Dollars</option>
                                        <option value="CLP">Chile Pesos</option>
                                        <option value="CNY">China Yuan Renmimbi</option>
                                        <option value="CYP">Cyprus Pounds</option>
                                        <option value="CSK">Czech Republic Koruna</option>
                                        <option value="DKK">Denmark Kroner</option>
                                        <option value="NLG">Dutch Guilders</option>
                                        <option value="XCD">Eastern Caribbean Dollars</option>
                                        <option value="EGP">Egypt Pounds</option>
                                        <option value="FJD">Fiji Dollars</option>
                                        <option value="FIM">Finland Markka</option>
                                        <option value="FRF">France Francs</option>
                                        <option value="DEM">Germany Deutsche Marks</option>
                                        <option value="XAU">Gold Ounces</option>
                                        <option value="GRD">Greece Drachmas</option>
                                        <option value="HKD">Hong Kong Dollars</option>
                                        <option value="HUF">Hungary Forint</option>
                                        <option value="ISK">Iceland Krona</option>
                                        <option value="INR">India Rupees</option>
                                        <option value="IDR">Indonesia Rupiah</option>
                                        <option value="IEP">Ireland Punt</option>
                                        <option value="ILS">Israel New Shekels</option>
                                        <option value="ITL">Italy Lira</option>
                                        <option value="JMD">Jamaica Dollars</option>
                                        <option value="JPY">Japan Yen</option>
                                        <option value="JOD">Jordan Dinar</option>
                                        <option value="KRW">Korea (South) Won</option>
                                        <option value="LBP">Lebanon Pounds</option>
                                        <option value="LUF">Luxembourg Francs</option>
                                        <option value="MYR">Malaysia Ringgit</option>
                                        <option value="MXP">Mexico Pesos</option>
                                        <option value="NLG">Netherlands Guilders</option>
                                        <option value="NZD">New Zealand Dollars</option>
                                        <option value="NOK">Norway Kroner</option>
                                        <option value="PKR">Pakistan Rupees</option>
                                        <option value="XPD">Palladium Ounces</option>
                                        <option value="PHP">Philippines Pesos</option>
                                        <option value="XPT">Platinum Ounces</option>
                                        <option value="PLZ">Poland Zloty</option>
                                        <option value="PTE">Portugal Escudo</option>
                                        <option value="ROL">Romania Leu</option>
                                        <option value="RUR">Russia Rubles</option>
                                        <option value="SAR">Saudi Arabia Riyal</option>
                                        <option value="XAG">Silver Ounces</option>
                                        <option value="SGD">Singapore Dollars</option>
                                        <option value="SKK">Slovakia Koruna</option>
                                        <option value="ZAR">South Africa Rand</option>
                                        <option value="KRW">South Korea Won</option>
                                        <option value="ESP">Spain Pesetas</option>
                                        <option value="XDR">Special Drawing Right (IMF)</option>
                                        <option value="SDD">Sudan Dinar</option>
                                        <option value="SEK">Sweden Krona</option>
                                        <option value="CHF">Switzerland Francs</option>
                                        <option value="TWD">Taiwan Dollars</option>
                                        <option value="THB">Thailand Baht</option>
                                        <option value="TTD">Trinidad and Tobago Dollars</option>
                                        <option value="TRL">Turkey Lira</option>
                                        <option value="VEB">Venezuela Bolivar</option>
                                        <option value="ZMK">Zambia Kwacha</option>
                                        <option value="EUR">Euro</option>
                                        <option value="XCD">Eastern Caribbean Dollars</option>
                                        <option value="XDR">Special Drawing Right (IMF)</option>
                                        <option value="XAG">Silver Ounces</option>
                                        <option value="XAU">Gold Ounces</option>
                                        <option value="XPD">Palladium Ounces</option>
                                        <option value="XPT">Platinum Ounces</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="md-input-wrapper md-input-filled">
                            <label>Total amount</label>
                            <input type="text" id="orderAmount" class="md-input" required="required" disabled="disabled">
                        </div>
                    </div>                        
                </div>
                <div class="uk-modal-footer uk-text-right">
                    <button class="md-btn md-btn-danger pull-left uk-modal-close">CANCEL</button>
                    <button class="md-btn md-btn-success pull-right" id="create-branch-btn">ORDER</button>
                </div>
            </form>
        </div>
        <div class="act-dialog display-none" style="max-width:400px;" data-role="done">
            <div class="uk-modal-header uk-tile uk-tile-default">
                <h3 class="d_inline">Purchase order</h3>
                <p class="uk-text-success">The purchase order has been successfully issued</p>
            </div>
        </div>
        </div>
    </div>
</div>

<!-- Crop addition modal -->
<div class="uk-modal" id="church_create" aria-hidden="true" style="display: none; overflow-y: auto;">
    <div class="uk-modal-dialog" style="max-width:800px;">
        <div class="act-dialog" data-role="init">
            <div class="uk-modal-header uk-tile uk-tile-default">
                <h3 class="d_inline">Ongera Igihingwa muri cooperative</h3>
            </div>
            <form method="POST" enctype="multipart/form-data" id="add_crop_form" autocomplete="off">
                <div class="md-card1">
                    <div class="md-card-content1">
                        <div class="md-input-wrapper md-input-filled">
                            <label></label>
                            <select class="md-input label-fixed" id="cropselect" name="state">
                                <option value=null>Hitamo igihingwa</option>
                                <?php                                    
                                    foreach ($crops as $key => $crop) {
                                        echo '<option value="'.$crop['cropId'].'">'.$crop['cropName'].'</option>';
                                    }
                                ?>
                            </select>
                            <span class="md-input-bar "></span>
                        </div>
                        <div class="md-input-wrapper md-input-filled">
                            <label>Ubwoko - bumwe gusa</label>
                            <select class="md-input label-fixed" id="croptype" name="state">
                                <option value=null>Hitamo ubwoko</option>
                            </select>
                        </div>
                        <!-- <div class="md-input-wrapper">
                            <label>Ibipimo by'ubwiza bw'umusaruro bishoboka</label>
                            <input type="text" id="crop_grading" class="md-input" required="required">
                            <span class="md-input-bar "></span>
                        </div> -->
                    </div>                        
                </div>
                <div class="uk-modal-footer uk-text-right">
                    <button class="md-btn md-btn-danger pull-left uk-modal-close">Bireke</button>
                    <button class="md-btn md-btn-success pull-right" id="create-branch-btn">EMEZA</button>
                </div>
            </form>
        </div>
        <div class="act-dialog display-none" style="max-width:400px;" data-role="done">
            <div class="uk-modal-header uk-tile uk-tile-default">
                <h3 class="d_inline">Ibihingwa</h3>
                <p class="uk-text-success">Ni byiza! Igihingwa cyongewe mu byo koperative ihinga :)</p>
            </div>
        </div>
        </div>
    </div>
</div>
<?php
    //Loading the helper JS
    $js_files = array('bower_components/select2/dist/js/select2.min.js', 'js/orders.js');
?>