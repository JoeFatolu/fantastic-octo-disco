
<?php
include("config.php");

if(isset($_GET['q']))
{
    if (@$_GET['q'] == "editUser")
    {
        $id=$_GET['id'];
        $url = $baseurl . 'showUsers';
        $data = array(
            'user_id' => $id
        );
        $json_data=@curl_request($data,$url);
        $json_data =$json_data['msg'];
        // get all countries 
        $url = $baseurl . 'showCountries';
        $data = array();
        $allcountrirs=@curl_request($data,$url);
        
        ?>
            <div class="main-container dataTables_wrapper" id="table_view_wrapper">
                <div style="height:auto;">
                    <div class="popup-tile">
                        <h2>Edit User</h2>
                    </div><div style="height:410px; overflow:scroll;">
                    <form action="process.php?action=editUser" method="post">
                        <input type="hidden" name="user_id" id="" value="<?php echo $json_data['User']['id'];?>">
                        <div class="full_width">
                            <label class="field_title">First Name</label>
                            <input name="first_name" type="text" required="" value="<?php echo $json_data['User']['first_name'];?>">
                        </div>
        
                        <div class="full_width">
                            <label class="field_title">Last Name</label>
                            <input name="last_name" type="text" required="" value="<?php echo $json_data['User']['last_name'];?>">
                        </div>
        
                        <div class="full_width">
                            <label class="field_title">Email</label>
                            <input name="email" type="mail" required="" value="<?php  echo $json_data['User']['email'];?>">
                        </div>
                        
                        <div class="full_width">
                            <label class="field_title">Phone</label>
                            <input name="phone" type="number" required="" value="<?php echo $json_data['User']['phone'];?>">
                        </div>
                        <div class="full_width">
                            <label class="field_title">Country</label>
                            <select name="country_id" class="form-control" required="">
                                <?php 
                                    foreach($allcountrirs['msg'] as $row):
                                ?>
                                    <option value="<?php echo $row['Country']['id'];?>" <?php if($row['Country']['id'] == $json_data['Country']['id'] ){ echo ' selected="selected"';}?>><?php $countryName= strtolower($row['Country']['name']); echo ucwords($countryName);?></option>
                                <?php 
                                    endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="full_width">
                            <button class="com-button com-submit-button com-button--large " type="submit" style="width: 100%;" align="center">
                               Submit
                            </button>
                        </div>
                    </form>
                </div>
                    
                </div>
            </div>
        <?php
    }
    else
    if (@$_GET['q'] == "addrider")
    {
        $url = $baseurl . 'showCountries';
        $data = array();
        $json_data=@curl_request($data,$url);
?>
    <div class="main-container dataTables_wrapper" id="table_view_wrapper">
        <div style="height:auto;">
            <div class="popup-tile">
                <h2>Add Rider</h2>
            </div>
            <div style="height:400px; overflow:scroll;">
                <form class="addcategory" action="process.php?action=addRider" method="post">
                    
                    <div class="full_width">
                        <label class="field_title">First Name</label>
                        <input name="first_name" type="text" required="">
                    </div>

                    <div class="full_width">
                        <label class="field_title">Last Name</label>
                        <input name="last_name" type="text" required="">
                    </div>   
                    <div class="full_width">
                        <label class="field_title">Email</label>
                        <input name="email" type="text" required="">
                    </div>

                    <div class="full_width">
                        <label class="field_title">Password</label>
                        <input name="password" type="password" required="">
                    </div>

                   

                    <div class="full_width">
                        <label class="field_title">Phone No</label>
                        <input name="phone" type="number" required="">
                    </div>
                    
                    <div class="full_width">
                        <label class="field_title">Rider Comission</label>
                        <input name="rider_comission" type="number" required="">
                    </div>
                    
                    <div class="full_width">
                        <label class="field_title">Country</label>
                        <select name="country_id" class="form-control" required="">
                            <option value="">Select Country</option>
                            <?php foreach($json_data['msg'] as $row):?>
                                <option value="<?php echo $row['Country']['id'];?>"><?php $countryName= strtolower($row['Country']['name']); echo ucwords($countryName);?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="full_width">
                        <button class="com-button com-submit-button com-button--large " type="submit" style="width: 100%;" align="center">
                        Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
    }elseif (@$_GET['q'] == "editRider")
    {
        $id=$_GET['id'];
        $url = $baseurl . 'showUsers';
        $data = array(
            'user_id' => $id
        );
        $json_data=@curl_request($data,$url);
        $json_data =$json_data['msg'];
        // get all countries 
        $url = $baseurl . 'showCountries';
        $data = array();
        $allcountrirs=@curl_request($data,$url);
?>
    <div class="main-container dataTables_wrapper" id="table_view_wrapper">
        <div style="height:auto;">
            <div class="popup-tile">
                <h2>Edit Rider</h2>
            </div>
            <div style="height:407px; overflow:scroll;">
            <form action="process.php?action=editRider" method="post">
                <input name="user_id" type="hidden" value="<?php echo $json_data['User']['id'];?>" required="">
                <div class="full_width">
                    <label class="field_title">First Name</label>
                    <input name="first_name" type="text" value="<?php echo $json_data['User']['first_name'];?>" required="">
                </div>

                <div class="full_width">
                    <label class="field_title">Last Name</label>
                    <input name="last_name" type="text" value="<?php echo $json_data['User']['last_name'];?>" required="">
                </div>

                <div class="full_width">
                    <label class="field_title">Phone #</label>
                    <input name="phone" type="text" value="<?php echo $json_data['User']['phone'];?>" required="">
                </div>

                <div class="full_width">
                    <label class="field_title">Email</label>
                    <input name="email" type="text" value="<?php echo $json_data['User']['email'];?>" required="">
                </div>

                <div class="full_width">
                    <label class="field_title">Country</label>
                    <select name="country_id" class="form-control" required="">
                        <?php 
                            foreach($allcountrirs['msg'] as $row):
                        ?>
                            <option value="<?php echo $row['Country']['id'];?>" <?php if($row['Country']['id'] == $json_data['Country']['id'] ){ echo ' selected="selected"';}?>><?php $countryName= strtolower($row['Country']['name']); echo ucwords($countryName);?></option>
                        <?php 
                            endforeach;
                        ?>
                    </select>
                </div>

                    <div class="full_width">
                        <label class="field_title">Rider Comission</label>
                        <input name="rider_comission" type="number" required="" value="<?php echo $json_data['User']['rider_comission'];?>">
                    </div>
                                        
                <div class="full_width">
                    <button class="com-button com-submit-button com-button--large " type="submit" style="width: 100%;" align="center">
                       Submit
                    </button>
                </div>
            </form>
        </div>
        </div>
    </div>
<?php
    }elseif (@$_GET['q'] == "adduser")
    {   
        $url = $baseurl . 'showCountries';
        $data = array();
        $json_data=@curl_request($data,$url);
        
?>
    <div class="main-container dataTables_wrapper" id="table_view_wrapper">
        <div style="height:auto;">
            <div class="popup-tile">
                <h2>Add User</h2>
            </div>
            <div style="height:auto;height:400px; overflow:scroll;">
                <form action="process.php?action=addUser" method="post">
                    <div class="full_width">
                        <label class="field_title">First Name</label>
                        <input name="first_name" type="text" required="">
                    </div>

                    <div class="full_width">
                        <label class="field_title">Last Name</label>
                        <input name="last_name" type="text" required="">
                    </div>

                    <div class="full_width">
                        <label class="field_title">Email</label>
                        <input name="email" type="mail" required="">
                    </div>
                    
                    <div class="full_width">
                        <label class="field_title">Phone</label>
                        <input name="phone" type="number" required="">
                    </div>

                    <div class="full_width">
                        <label class="field_title">Password</label>
                        <input name="password" type="password" required="">
                    </div>
                    <div class="full_width">
                        <label class="field_title">Country</label>
                        <select name="country_id" class="form-control" required="">
                            <option value="">Select Country</option>
                            <?php foreach($json_data['msg'] as $row):?>
                                <option value="<?php echo $row['Country']['id'];?>"><?php $countryName= strtolower($row['Country']['name']); echo ucwords($countryName);?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="full_width">
                        <button class="com-button com-submit-button com-button--large " type="submit" style="width: 100%;" align="center">
                        Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
    }
    elseif (@$_GET['q'] == "productDetail")
    {
?>
    <div class="main-container dataTables_wrapper" id="table_view_wrapper">
        <div style="height:auto;">
            <h2 style="font-weight: 300;" align="center">Order Details (#114)</h2>
            <div style="height:400px; overflow:scroll;">
            
                <h3 style="font-weight: 300;" align="left">Store Details</h3>
                <div style="line-height: 25px;margin-top: 10px;">
                    
                    <div class="full_width" style="font-size:13px;">
                        <span class="fas fa-store-alt" aria-hidden="true"></span>&nbsp;
                        Wall Mart                </div>
                    <div class="full_width" style="font-size:13px;">
                        <span class="fa fa-user" aria-hidden="true"></span>&nbsp;
                        aqeel sheikh                </div>
                    <div class="full_width" style="font-size:13px;">
                        <span class="fa fa-envelope" aria-hidden="true"></span>&nbsp;
                        store@gmail.com                </div>
                    <div class="full_width" style="font-size:13px;">
                        <span class="fa fa-phone" aria-hidden="true"></span>&nbsp;
                        3067616341                </div>
                    <div class="full_width" style="font-size:13px;">
                        <span class="fa fa-street-view" aria-hidden="true"></span>&nbsp;
                        lahore,,Afghanistan                </div>
                    
                </div>
                <br>
                <h3 style="font-weight: 300;" align="left">Item Details</h3>
                <div style="line-height: 25px;margin-top: 10px;">
                    <div class="full_width" style="border-bottom: solid 1px #edecec;margin-bottom: 10px;">
                        <div class="float_left">
                            <img src="http://apps.qboxus.com/grocery/app/webroot/uploads/3/5ee375bef0f30.png" style="width: 70px;">
                        </div>
                        <div class="half_width float_left" style="padding: 0 10px;">
                            <h4>Mountain Dew Pet Bottles 2.25 Litre </h4>
                            <p style="font-size: 13px;"><b>Price:</b> 10</p>
                            <p style="font-size: 13px;"><b>Quantity:</b>1</p>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="full_width" style="border-bottom: solid 1px #edecec;margin-bottom: 10px;">
                        <div class="float_left">
                                <img src="http://apps.qboxus.com/grocery/app/webroot/uploads/4/5ee377a91ee0c.png" style="width: 70px;">
                            </div>
                            <div class="half_width float_left" style="padding: 0 10px;">
                                <h4>Nestle Milo Flavored Milk 180 ml</h4>
                                <p style="font-size: 13px;"><b>Price:</b> 4</p>
                                <p style="font-size: 13px;"><b>Quantity:</b>1</p>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="full_width" style="border-bottom: solid 1px #edecec;margin-bottom: 10px;">
                            <div class="float_left">
                                <img src="http://apps.qboxus.com/grocery/app/webroot/uploads/4/5ee377a91ee0c.png" style="width: 70px;">
                            </div>
                            <div class="half_width float_left" style="padding: 0 10px;">
                                <h4>Nestle Milo Flavored Milk 180 ml</h4>
                                <p style="font-size: 13px;"><b>Price:</b> 4</p>
                                <p style="font-size: 13px;"><b>Quantity:</b>1</p>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="full_width" style="border-bottom: solid 1px #edecec;margin-bottom: 10px;">
                            <div class="float_left">
                                <img src="http://apps.qboxus.com/grocery/app/webroot/uploads/58/5eea07447598b.png" style="width: 70px;">
                            </div>
                            <div class="half_width float_left" style="padding: 0 10px;">
                                <h4>Mon Salwa Chicken Fries 425gm</h4>
                                <p style="font-size: 13px;"><b>Price:</b> 4</p>
                                <p style="font-size: 13px;"><b>Quantity:</b>1</p>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="full_width" style="border-bottom: solid 1px #edecec;margin-bottom: 10px;">
                            <div class="float_left">
                                <img src="http://apps.qboxus.com/grocery/app/webroot/uploads/58/5eea07447598b.png" style="width: 70px;">
                            </div>
                            <div class="half_width float_left" style="padding: 0 10px;">
                                <h4>Mon Salwa Chicken Fries 425gm</h4>
                                <p style="font-size: 13px;"><b>Price:</b> 4</p>
                                <p style="font-size: 13px;"><b>Quantity:</b>1</p>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="full_width" style="border-bottom: solid 1px #edecec;margin-bottom: 10px;">
                            <div class="float_left">
                                <img src="http://apps.qboxus.com/grocery/app/webroot/uploads/58/5eea07447598b.png" style="width: 70px;">
                            </div>
                            <div class="half_width float_left" style="padding: 0 10px;">
                                <h4>Mon Salwa Chicken Fries 425gm</h4>
                                <p style="font-size: 13px;"><b>Price:</b> 4</p>
                                <p style="font-size: 13px;"><b>Quantity:</b>1</p>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="full_width" style="border-bottom: solid 1px #edecec;margin-bottom: 10px;">
                            <div class="float_left">
                                <img src="http://apps.qboxus.com/grocery/app/webroot/uploads/58/5eea07447598b.png" style="width: 70px;">
                            </div>
                            <div class="half_width float_left" style="padding: 0 10px;">
                                <h4>Mon Salwa Chicken Fries 425gm</h4>
                                <p style="font-size: 13px;"><b>Price:</b> 4</p>
                                <p style="font-size: 13px;"><b>Quantity:</b>1</p>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <p style="background: #f8f8f8;padding: 5px 10px;">Note :</p>
                    </div>
                    <br>
                    <h3 style="font-weight: 300;" align="left">Customer Details</h3>
                    <div style="line-height: 25px;margin-top: 10px;">
                        <div class="full_width" style="font-size:13px;">
                            <span class="fa fa-user" aria-hidden="true"></span>&nbsp;
                            Aqeelakhtar4u null                
                        </div>
                        <div class="full_width" style="font-size:13px;">
                            <span class="fa fa-envelope" aria-hidden="true"></span>&nbsp;
                            aqeelakhtar4u@gmail.com                
                        </div>
                        <div class="full_width" style="font-size:13px;">
                            <span class="fa fa-phone" aria-hidden="true"></span>&nbsp;
                        </div>

                        <div class="full_width" style="font-size:13px;">
                            <span class="fa fa-street-view" aria-hidden="true"></span>&nbsp;
                            <a href="https://maps.google.com/maps?q=21.158884539981617,79.09519325941801" target="_blank">799B, Gittikhadan, Boriyapura, Nagpur, Maharashtra 440002, India India</a>
                        </div>
                    </div>
                    <br>
                    <p align="left">Price: 34</p>
                    <p align="left">Discount:0</p>
                    <p align="left">Delivery Fee: 74623</p>
                    <style>
                        .buttonRow div
                        {
                            background: #C3242E;
                            color: white;
                            padding: 12px 65px;
                            border-radius: 3px;
                            text-align:center;
                        }
                        
                        .buttonRow
                        {
                            padding: 10px 0;
                            margin-top:20px;
                        }
                    </style>
                </div>
            </div>
        </div>
    </div>


<?php
    }
    elseif (@$_GET['q'] == "editCountry")
    {
        $id=$_GET['id'];
        $url = $baseurl . 'showCountries';
        $data = array(
            'country_id' => $id
        );
        $json_data=@curl_request($data,$url);
        $json_data = $json_data['msg'];
?>
    <div class="main-container dataTables_wrapper" id="table_view_wrapper">
        <div style="height:auto; overflow:scroll; overflow-x: hidden;">
            <div class="popup-tile">
                <h2>Edit Country</h2>
            </div>
            <form action="process.php?action=editCountry" method="post">
                <input type="hidden" name="id" value="<?php echo $json_data['Country']['id'];?>">

                <div class="full_width">
                    <label class="field_title">Iso</label>
                    <input name="iso" type="text" value="<?php echo $json_data['Country']['iso'];?>" required="">
                </div>
                <div class="full_width">
                    <label class="field_title">Country</label>
                    <input name="name" type="text" value="<?php echo $json_data['Country']['name'];?>" required="">
                </div>

                <div class="full_width">
                    <label class="field_title">Currency</label>
                    <input name="currency_symbol" type="text" value="<?php echo $json_data['Country']['currency_symbol'];?>" required="">
                </div>

                <div class="full_width">
                    <label class="field_title">Country Code</label>
                    <input name="country_code" type="text" value="<?php echo $json_data['Country']['country_code'];?>" required="">
                </div>
                
                <div class="full_width">
                    <label class="field_title">Country</label>
                    <select name="country_id" class="form-control" required="">
                        <option value="">Select Default Currency</option>
                        <option value="1" <?php if($json_data['Country']['country_code'] == "1"){ echo ' selected="selected"';}?>>Default</option>
                    </select>
                </div>
                
                <div class="full_width">
                    <button class="com-button com-submit-button com-button--large " type="submit" style="width: 100%;" align="center">
                        Submit
                    </button>
                </div>
            </form>
            
        </div>
    </div>

<?php   
    }
    elseif (@$_GET['q'] == "addCountry")
    {
?>
    <div class="main-container dataTables_wrapper" id="table_view_wrapper">
        <div style="height:auto; overflow:scroll; overflow-x: hidden;">
            <div class="popup-tile">
                <h2>Add Country</h2>
            </div>
            <form action="process.php?action=addCountry" method="post">

                <div class="full_width">
                    <label class="field_title">Country</label>
                    <input name="name" type="text" value="" required="">
                </div>

                <div class="full_width">
                    <label class="field_title">Currency</label>
                    <input name="currency_symbol" type="text" value="" required="">
                </div>


                <div class="full_width">
                    <label class="field_title">Country Code</label>
                    <input name="country_code" type="text" value="" required="">
                </div>

                <div class="full_width">
                    <button class="com-button com-submit-button com-button--large " type="submit" style="width: 100%;" align="center">
                        Submit
                    </button>
                </div>
            </form>
            
        </div>
    </div>
<?php
    }
    elseif (@$_GET['q'] == "addAdminUser")
    {
?>
    <div class="main-container dataTables_wrapper" id="table_view_wrapper">
        <div style="height:auto;">
            <div class="popup-tile">
                <h2>Add Admin User</h2>
            </div><div style="height:340px; overflow:scroll;">
            <form action="process.php?action=addAdminUser" method="post">
                <div class="full_width">
                    <label class="field_title">First Name</label>
                    <input name="first_name" type="text" required="">
                </div>

                <div class="full_width">
                    <label class="field_title">Last Name</label>
                    <input name="last_name" type="text" required="">
                </div>

                <div class="full_width">
                    <label class="field_title">Email</label>
                    <input name="email" type="mail" required="">
                </div>

                <div class="full_width">
                    <label class="field_title">Password</label>
                    <input name="password" type="password" required="">
                </div>
                <div class="full_width">
                    <button class="com-button com-submit-button com-button--large " type="submit" style="width: 100%;" align="center">
                       Submit
                    </button>
                </div> 
            </form>
        </div>
            
        </div>
    </div>
<?php
    }
    elseif (@$_GET['q'] == "editAdminUser")
    {
        $id=$_GET['id'];
        $url = $baseurl . 'showAdminUsers';
        $data = array(
            'id' => $id
        );
        $json_data=@curl_request($data,$url);
        $json_data =$json_data['msg'];
?>
    <div class="main-container dataTables_wrapper" id="table_view_wrapper">
        <div style="height:auto;">
            <div class="popup-tile">
                <h2>Edit Admin User</h2>
            </div><div style="height:270px; overflow:scroll;">
            <form action="process.php?action=editAdminUser" method="post">

                <input type="hidden" name="admin_id" id="" value="<?php echo $json_data['Admin']['id'];?>">
                <div class="full_width">
                    <label class="field_title">First Name</label>
                    <input name="first_name" type="text" required="" value="<?php echo $json_data['Admin']['first_name'];?>">
                </div>

                <div class="full_width">
                    <label class="field_title">Last Name</label>
                    <input name="last_name" type="text" required="" value="<?php echo $json_data['Admin']['last_name'];?>">
                </div>

                <div class="full_width">
                    <label class="field_title">Email</label>
                    <input name="email" type="mail" required="" value="<?php echo $json_data['Admin']['email'];?>">
                </div>

                <div class="full_width">
                    <button class="com-button com-submit-button com-button--large " type="submit" style="width: 100%;" align="center">
                       Submit
                    </button>
                </div>
            </form>
        </div>
            
        </div>
    </div>
<?php
    }
    elseif (@$_GET['q'] == "addCoupon")
    {
?>
    <div class="main-container dataTables_wrapper" id="table_view_wrapper">
        <div style="height:auto;">
            <div class="popup-tile">
                <h2>Add Coupon</h2>
            </div>
            <div style="height:340px; overflow:scroll;">
                <form action="process.php?action=addCoupon" method="post">
                    <div class="full_width">
                        <label class="field_title">Coupon Code</label>
                        <input name="coupon_code" type="text" required="">
                    </div>

                    <div class="full_width">
                        <label class="field_title">Limit Users</label>
                        <input name="limit_users" type="number" required="">
                    </div>

                    <div class="full_width">
                        <label class="field_title">Discount</label>
                        <input name="discount" type="number" required="">
                    </div>

                    <div class="full_width">
                        <label class="field_title">Expiry Date</label>
                        <input name="expiry_date" type="date" required="">
                    </div>

                    <div class="full_width">
                        <button class="com-button com-submit-button com-button--large " type="submit" style="width: 100%;" align="center">
                        Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
    }
    elseif (@$_GET['q'] == "addVehicle")
    {
?>
    <div class="main-container dataTables_wrapper" id="table_view_wrapper">
        <div style="height:auto;">
            <div class="popup-tile">
                <h2>Add Vehicle</h2>
            </div>
            <div style="height:340px; overflow:scroll;">
                <form action="process.php?action=addVehicleType" method="post" enctype="multipart/form-data">
                    <div class="full_width">
                        <label class="field_title">Name</label>
                        <input  type="text" required="" name="name">
                    </div>

                    <div class="full_width">
                        <label class="field_title">Description</label>
                        <input name="description" type="text" required="" name="description">
                    </div>

                    <div class="full_width">
                        <label class="field_title">Per km Mile Charge</label>
                        <input name="per_km_mile_charge" type="number" required="" name="per_km_mile_charge">
                    </div>

                    <div class="full_width">
                        <label class="field_title">Image</label>
                        <input  type="file"  style="padding-top: 14px;" name="image">
                    </div>

                    <div class="full_width">
                        <button class="com-button com-submit-button com-button--large " type="submit" style="width: 100%;" align="center">
                        Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
    }
    elseif (@$_GET['q'] == "editVehicle")
    {
        $id=$_GET['id'];
        $url = $baseurl . 'showVehicleTypes';
        $data = array(
            'id' => $id
        );
        $json_data=@curl_request($data,$url);
        $json_data =$json_data['msg'];
?>
    <div class="main-container dataTables_wrapper" id="table_view_wrapper">
        <div style="height:auto;">
            <div class="popup-tile">
                <h2>Edit Vehicle</h2>
            </div>
            <div style="height:330px; overflow:scroll;">
                <form action="process.php?action=editVehicleType" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $json_data['VehicleType']['id'];?>">
                    <div class="full_width">
                        <label class="field_title">Name</label>
                        <input name="vehicle_name" type="text" required="" value="<?php echo $json_data['VehicleType']['name'];?>">
                    </div>

                    <div class="full_width">
                        <label class="field_title">Description</label>
                        <input name="description" type="text" required="" value="<?php echo $json_data['VehicleType']['description'];?>">
                    </div>

                    <div class="full_width">
                        <label class="field_title">Per km Mile Charge</label>
                        <input name="per_km_mile_charge" type="number" required="" value="<?php echo $json_data['VehicleType']['per_km_mile_charge'];?>">
                    </div>

                    <div class="full_width">
                        <label class="field_title">Image</label>
                        <input name="image" type="file" required="" style="padding-top: 14px;" value="">
                        <!-- <?php $Image = checkImageExist($imagebaseurl.$json_data['VehicleType']['image']);?>
                        <img src="<?php echo $Image;?>" alt="" width="50px" height="50px"> -->
                    </div>

                    <div class="full_width">
                        <button class="com-button com-submit-button com-button--large " type="submit" style="width: 100%;" align="center">
                        Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
   }
   elseif (@$_GET['q'] == "editPackageSize")
   {
       $id=$_GET['id'];
       $url = $baseurl . 'showPackageSize';
       $data = array(
           'id' => $id
       );
       $json_data=@curl_request($data,$url);
       $json_data =$json_data['msg'];
?>
    <div class="main-container dataTables_wrapper" id="table_view_wrapper">
        <div style="height:auto;">
            <div class="popup-tile">
                <h2>Edit Package Size</h2>
            </div>
            <div style="height:330px; overflow:scroll;">
                <form action="process.php?action=editPackageSize" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $json_data['PackageSize']['id'];?>">
                    <div class="full_width">
                        <label class="field_title">Name</label>
                        <input name="name" type="text" required="" value="<?php echo $json_data['PackageSize']['title'];?>">
                    </div>

                    <div class="full_width">
                        <label class="field_title">Description</label>
                        <input name="description" type="text" required="" value="<?php echo $json_data['PackageSize']['description'];?>">
                    </div>

                    <div class="full_width">
                        <label class="field_title">Price</label>
                        <input name="price" type="number" required="" value="<?php echo $json_data['PackageSize']['price'];?>">
                    </div>

                    <div class="full_width">
                        <label class="field_title">Image</label>
                        <input name="image" type="file" required="" style="padding-top: 14px;" value="">
                        <!-- <?php $Image = checkImageExist($imagebaseurl.$json_data['PackageSize']['image']);?>
                        <img src="<?php echo $Image;?>" alt="" width="50px" height="50px"> -->
                    </div>

                    <div class="full_width">
                        <button class="com-button com-submit-button com-button--large " type="submit" style="width: 100%;" align="center">
                        Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
    }
    elseif (@$_GET['q'] == "changeAdminPassword")
    {
        $id=$_GET['id'];
        $url = $baseurl . 'showAdminUsers';
        $data = array(
            'id' => $id
        );
        $json_data=@curl_request($data,$url);
        $json_data =$json_data['msg'];
?>
    <div class="main-container dataTables_wrapper" id="table_view_wrapper">
        <div style="height:auto;">
            <div class="popup-tile">
                <h2>Change Password</h2>
            </div>
            <div style="height:140px; overflow:scroll;">
                <form action="process.php?action=changeAdminPassword" method="post">
                    <input type="hidden" value="<?php echo $json_data['Admin']['id'];?>" name="user_id">
                    <div class="full_width">
                        <label class="field_title">New Password</label>
                        <input name="password" type="password" required="" value="">
                    </div>

                    <div class="full_width">
                        <button class="com-button com-submit-button com-button--large " type="submit" style="width: 100%;" align="center">
                        Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
    }
    elseif (@$_GET['q'] == "changeUserPassword")
    {
        $id=$_GET['id'];
        $url = $baseurl . 'showUsers';
        $data = array(
            'user_id' => $id
        );
        $json_data=@curl_request($data,$url);
        $json_data =$json_data['msg'];
?>
    <div class="main-container dataTables_wrapper" id="table_view_wrapper">
        <div style="height:auto;">
            <div class="popup-tile">
                <h2>Change Password</h2>
            </div>
            <div style="height:140px; overflow:scroll;">
                <form action="process.php?action=changeUserPassword" method="post">
                    <input type="hidden" value="<?php echo $json_data['User']['id'];?>" name="user_id">
                    <div class="full_width">
                        <label class="field_title">New Password</label>
                        <input name="password" type="password" required="" value="">
                    </div>

                    <div class="full_width">
                        <button class="com-button com-submit-button com-button--large " type="submit" style="width: 100%;" align="center">
                        Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
    }
    elseif (@$_GET['q'] == "changeRiderPassword")
    {
        $id=$_GET['id'];
        $url = $baseurl . 'showUsers';
        $data = array(
            'user_id' => $id
        );
        $json_data=@curl_request($data,$url);
        $json_data =$json_data['msg'];
?>
    <div class="main-container dataTables_wrapper" id="table_view_wrapper">
        <div style="height:auto;">
            <div class="popup-tile">
                <h2>Change Password</h2>
            </div>
            <div style="height:140px; overflow:scroll;">
                <form action="process.php?action=changeRiderPassword" method="post">
                    <input type="hidden" value="<?php echo $json_data['User']['id'];?>" name="user_id">
                    <div class="full_width">
                        <label class="field_title">New Password</label>
                        <input name="password" type="password" required="" value="">
                    </div>

                    <div class="full_width">
                        <button class="com-button com-submit-button com-button--large " type="submit" style="width: 100%;" align="center">
                        Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
    }

    elseif (@$_GET['q'] == "editCoupon")
    {

        $id=$_GET['id'];
        $url = $baseurl . 'showCoupons';
        $data = array(
            'coupon_id' => $id
        );
        $json_data=@curl_request($data,$url);
        $json_data =$json_data['msg'];
?>
    <div class="main-container dataTables_wrapper" id="table_view_wrapper">
        <div style="height:auto;">
            <div class="popup-tile">
                <h2>Edit Coupon</h2>
            </div>
            <div style="height:340px; overflow:scroll;">
                <form action="process.php?action=editCoupon" method="post">
                    <input type="hidden" name="coupon_id" value="<?php echo $json_data['Coupon']['id'];?>">
                    <div class="full_width">
                        <label class="field_title">Coupon Code</label>
                        <input name="coupon_code" type="text" required="" value="<?php echo $json_data['Coupon']['coupon_code'];?>">
                    </div>

                    <div class="full_width">
                        <label class="field_title">Limit Users</label>
                        <input name="limit_users" type="number" required="" value="<?php echo $json_data['Coupon']['limit_users'];?>">
                    </div>

                    <div class="full_width">
                        <label class="field_title">Discount</label>
                        <input name="discount" type="number" required="" value="<?php echo $json_data['Coupon']['discount'];?>">
                    </div>

                    <div class="full_width">
                        <label class="field_title">Expiry Date</label>
                        <input name="expiry_date" type="date" required="" value="<?php echo $json_data['Coupon']['expiry_date'];?>">
                    </div>

                    <div class="full_width">
                        <button class="com-button com-submit-button com-button--large " type="submit" style="width: 100%;" align="center">
                        Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
    } 
    elseif (@$_GET['q'] == "addGoodType")
    {
?>
    <div class="main-container dataTables_wrapper" id="table_view_wrapper">
        <div style="height:auto;">
            <div class="popup-tile">
                <h2>Add Good Type</h2>
            </div>
            <div style="height:140px; overflow:scroll;">
                <form action="process.php?action=addGoodType" method="post">
                    <div class="full_width">
                        <label class="field_title">Name</label>
                        <input  type="text" required="" name="name">
                    </div>

                    <div class="full_width">
                        <button class="com-button com-submit-button com-button--large " type="submit" style="width: 100%;" align="center">
                        Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
    }  
    elseif (@$_GET['q'] == "editGoodType")
    {

        $id=$_GET['id'];
        $url = $baseurl . 'showGoodTypes';
        $data = array(
            'id' => $id
        );
        $json_data=@curl_request($data,$url);
        $json_data =$json_data['msg'];
?>
    <div class="main-container dataTables_wrapper" id="table_view_wrapper">
        <div style="height:auto;">
            <div class="popup-tile">
                <h2>Edit Good Type</h2>
            </div>
            <div style="height:140px; overflow:scroll;">
                <form action="process.php?action=editGoodType" method="post">
                    <input type="hidden" value="<?php echo $json_data['GoodType']['id'];?>" name="id">
                    <div class="full_width">
                        <label class="field_title">Name</label>
                        <input  type="text" required="" name="name" value="<?php echo $json_data['GoodType']['name'];?>">
                    </div>

                    <div class="full_width">
                        <button class="com-button com-submit-button com-button--large " type="submit" style="width: 100%;" align="center">
                        Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
    } 
    elseif (@$_GET['q'] == "assignOrder")
    {
        $url = $baseurl . 'showUsers';
        $data = array(
            'role' => 'user'
        );
        $json_data=@curl_request($data,$url);
        $json_data =$json_data['msg'];
    
?>
    <div class="main-container dataTables_wrapper" id="table_view_wrapper">
        <div style="height:auto;">
            <div class="popup-tile">
                <h2>Show Users</h2>
            </div>
            <div style="height:300px; overflow:scroll;">
                <table id="table_view" class="display" style="width:100%; margin-top: 30px;">

                    <thead>
                        <tr>
                            <th class="user-th">ID</th>
                            <th class="user-th">Name</th>
                            <th class="user-th">Phone</th>
                            <th class="user-th">Country</th>
                            <th class="user-th">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if($json_data!="")
                            {
                                foreach ($json_data as $singleRow): 
                        ?>
                        <tr class="circleUser-td">
                            <td><?php echo $singleRow['User']['id'] ?></td>
                            <td style="width:150px; overflow:hidden;"><?php echo $singleRow['User']['first_name'].' '. $singleRow['User']['last_name']; ?></td>
                            <td><?php echo $singleRow['User']['phone'] ?></td>
                            <td><?php echo $singleRow['Country']['name']; ?></td>
                            <td>
                                <div class="more">
                                    <button id="more-btn" class="more-btn">
                                        <span class="more-dot"></span>
                                        <span class="more-dot"></span>
                                        <span class="more-dot"></span>
                                    </button>
                                    <div class="more-menu">
                                        <div class="more-menu-caret">
                                            <div class="more-menu-caret-outer"></div>
                                            <div class="more-menu-caret-inner"></div>
                                        </div>
                                        <ul class="more-menu-items" tabindex="-1" role="menu" aria-labelledby="more-btn" aria-hidden="true">
                                            <li class="more-menu-item" role="presentation" onclick="">
                                                <button type="button" class="more-menu-btn" role="menuitem">Order Assigned</button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php
                            endforeach; 
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="user-th">ID</th>
                            <th class="user-th">Name</th>
                            <th class="user-th">Phone</th>
                            <th class="user-th">Country</th>
                            <th class="user-th">Action</th>
                        </tr>
                    </tfoot>

                </table>

                
            </div>
        </div>
    </div>
<?php
    }
    elseif (@$_GET['q'] == "addPackageSize")
    {
?>
    <div class="main-container dataTables_wrapper" id="table_view_wrapper">
        <div style="height:auto;">
            <div class="popup-tile">
                <h2>Add Package Size</h2>
            </div>
            <div style="height:340px; overflow:scroll;">
                <form action="process.php?action=addPackageSize" method="post" enctype="multipart/form-data">
                    <div class="full_width">
                        <label class="field_title">Name</label>
                        <input  type="text" required="" name="name">
                    </div>

                    <div class="full_width">
                        <label class="field_title">Description</label>
                        <input  type="text" required="" name="description">
                    </div>
                    <div class="full_width">
                        <label class="field_title">Price</label>
                        <input name="price" type="number" required="" >
                    </div>

                    <div class="full_width">
                        <label class="field_title">Image</label>
                        <input  type="file"  style="padding-top: 14px;" name="image">
                    </div>

                    <div class="full_width">
                        <button class="com-button com-submit-button com-button--large " type="submit" style="width: 100%;" align="center">
                        Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
    }
    else
    if (@$_GET['q'] == "changeStatus")
    {
        
        ?>
            <div class="main-container dataTables_wrapper" id="table_view_wrapper">
                <div style="height:auto;">
                    <div class="popup-tile">
                        <h2>Change Rider Status</h2>
                    </div>
                    
                    <form action="process.php?action=changeRiderStatus" method="post">
                        <input type="hidden" name="user_id" id="" value="<?php echo @$_GET['id']; ?>">
                        <div class="full_width">
                            <label class="field_title">Country</label>
                            <select name="status" class="form-control" required="">
                                 <option value="0">Active</option>
                                 <option value="1">Blocked</option>
                                 <option value="2">Pending</option>
                            </select>
                        </div>
                        <div class="full_width">
                            <button class="com-button com-submit-button com-button--large " type="submit" style="width: 100%;" align="center">
                               Submit
                            </button>
                        </div>
                    </form>
                </div>
                    
                </div>
            </div>
        <?php
    }
    else
    if (@$_GET['q'] == "showDocuments")
    {
        $user_id=$_GET['id'];
        
        $url=$baseurl . 'showUsers'; 
        $data =array(
            'user_id' => $user_id,
        );
        
            
        $json_data=@curl_request($data,$url);
        
        
        ?>
            <div class="main-container dataTables_wrapper" id="table_view_wrapper">
                <div style="height:auto;">
                    <div class="popup-tile">
                        <h2>Rider Documents</h2>
                    </div>
                    
                    <div style="overflow:scroll;">
                        
                        <div style="height:300px; overflow:scroll;">
                        
                        <table id="table_view" class="display" style="width:100%; margin-top: 30px;">
        
                            <thead>
                                <tr>
                                    <th class="user-th">ID</th>
                                    <th class="user-th">Document Type</th>
                                    <th class="user-th">Attachment</th>
                                    <th class="user-th">Status</th>
                                    <th class="user-th">Created</th>
                                    <th class="user-th">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if(is_array($json_data['msg']['UserDocument']) || is_object($json_data['msg']['UserDocument']))
                                    {
                                        foreach ($json_data['msg']['UserDocument'] as $singleRow): 
                                            ?>
                                                <tr class="circleUser-td">
                                                    <td><?php echo $singleRow['id']; ?></td>
                                                    <td><?php echo $singleRow['type']; ?></td>
                                                    <td><a href="<?php echo imagebaseurl.$singleRow['attachment']; ?>" target="_blank">View Attachment</a></td>
                                                    <td>
                                                        <?php 
                                                        
                                                            if($singleRow['status']==0)
                                                            {
                                                                echo "Pending";
                                                            }
                                                            else
                                                            if($singleRow['status']==1)
                                                            {
                                                                echo "Accepted";
                                                            }
                                                            else
                                                            if($singleRow['status']==2)
                                                            {
                                                                ?>
                                                                    <span style="color:red;">Rejected</span>
                                                                <?php
                                                            }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $singleRow['created']; ?></td>
                                                    <td>
                                                        <div class="more">
                                                            <button id="more-btn" class="more-btn">
                                                                <span class="more-dot"></span>
                                                                <span class="more-dot"></span>
                                                                <span class="more-dot"></span>
                                                            </button>
                                                            <div class="more-menu">
                                                                <div class="more-menu-caret">
                                                                    <div class="more-menu-caret-outer"></div>
                                                                    <div class="more-menu-caret-inner"></div>
                                                                </div>
                                                                <ul class="more-menu-items" tabindex="-1" role="menu" aria-labelledby="more-btn" aria-hidden="true">
                                                                    <a href="process.php?action=changeDocumentStatus&id=<?php echo $singleRow['id']; ?>&status=1&user_id=<?php echo $singleRow['user_id']; ?>">
                                                                        <li class="more-menu-item" role="presentation">
                                                                            <button type="button" class="more-menu-btn" role="menuitem">Accept</button>
                                                                        </li>
                                                                    </a>
                                                                    <a href="process.php?action=changeDocumentStatus&id=<?php echo $singleRow['id']; ?>&status=2&user_id=<?php echo $singleRow['user_id']; ?>">
                                                                        <li class="more-menu-item" role="presentation">
                                                                            <button type="button" class="more-menu-btn" role="menuitem">Reject</button>
                                                                        </li>
                                                                    </a>
                                                                    
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php
                                        endforeach; 
                                    }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="user-th">ID</th>
                                    <th class="user-th">Document Type</th>
                                    <th class="user-th">Attachment</th>
                                    <th class="user-th">Status</th>
                                    <th class="user-th">Created</th>
                                    <th class="user-th">Action</th>
                                </tr>
                            </tfoot>
        
                        </table>
        
                        
                    </div>
                    
                </div>
            </div>
        <?php
    }
    
    
}
?>