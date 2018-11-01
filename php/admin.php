<?php
	function checkadmin($login_email){
		if ($login_email=='admin@lumosave.tk'){
			return "1";
		}
		else{
			return "0";
		}
	}

	function displayusers(){
		//querying all users
		$sql_query = "SELECT * FROM users";
		$query_result = mysql_query($sql_query);
		$data_size=mysql_num_rows($query_result);

		//displaying record information line by line
		$k=0;
		
        echo '<div class="card bg-dark text-light mb-5"><div class="card-body">';
        echo '<h5 class="card-title">User Accounts</h5><p class="card-text text-warning">';

		while ($k<$data_size){
			$new_record=mysql_fetch_array($query_result);
            
            $record_groupPhone = $new_record['groupPhone'];
            $record_groupName = $new_record['groupName'];
            $record_groupEmail = $new_record['groupEmail'];
            $record_memberCount = $new_record['memberCount'];
            $record_groupDistrict = $new_record['groupDistrict'];
            $record_groupCountry = $new_record['groupCountry'];
            
            if($record_groupEmail == 'admin@lumosave.tk'){
                //do nothing
            }
            else{
                echo "<table class='table table-sm table-bordered table-dark'>";
                echo "<tr><td style='width:50%'><p class='text-warning'>Group Name: <span class='font-weight-light text-light'>$record_groupName</span></p></td><td style='width:50%'><p class='text-warning'># of Members: <span class='font-weight-light text-light'>$record_memberCount</span></p></td></tr>";
                echo "<tr><td style='width:50%'><p class='text-warning'>District: <span class='font-weight-light text-light'>$record_groupDistrict</span></p></td><td style='width:50%'><p class='text-warning'>Country: <span class='font-weight-light text-light'>$record_groupCountry</span></p></td></tr>";
                echo "<tr><td style='width:50%'><p class='text-warning'>Phone: <span class='font-weight-light text-light'>$record_groupPhone</span></p></td><td style='width:50%'><p class='text-warning'>Email: <span class='font-weight-light text-light'>$record_groupEmail</span></p></td></tr>";
                echo "</table>";
            }
			$k++;
		}
        
        echo '</p></div></div>';

	}
                        
    function displayContactUs(){
        //query all purchases
        $sql_query = "SELECT * FROM contactUs";
		$query_result = mysql_query($sql_query);
		$data_size=mysql_num_rows($query_result);

        //displaying record information line by line
		$i=0;
        
        echo '<div class="card bg-dark text-light mb-5"><div class="card-body">';
        echo '<h5 class="card-title">Contact Requests</h5><p class="card-text text-danger">';
        
        while ($i<$data_size){
			$new_record=mysql_fetch_array($query_result);
        
            $contact_name = $new_record['contactName'];
            $contact_groupName = $new_record['contactGroupName'];
            $contact_phone= $new_record['contactPhone'];
            $contact_email= $new_record['contactEmail'];
            $contact_message= $new_record['contactMessage'];
            
            echo "<table class='table table-sm table-bordered table-dark'>";
            echo "<tr><td style='width:50%'><p class='text-warning'>Contact Name: <span class='font-weight-light text-light'>$contact_name</span></p></td><td style='width:50%'><p class='text-warning'>Group Name: <span class='font-weight-light text-light'>$contact_groupName</span></p></td></tr>";
            echo "<tr><td style='width:50%'><p class='text-warning'>Phone: <span class='font-weight-light text-light'>$contact_phone</span></p></td><td style='width:50%'><p class='text-warning'>Email: <span class='font-weight-light text-light'>$contact_email</span></p></td></tr>";
            echo "<tr><td colspan='2'><p>$contact_message</span></p></td></tr>";
            echo "</table>";
            
            $i++;
        }
        
        echo '</p></div></div>';
        
    }

    function displayPurchases(){
        //query all purchases
        $sql_query = "SELECT * FROM purchases";
		$query_result = mysql_query($sql_query);
		$data_size=mysql_num_rows($query_result);

        //displaying record information line by line
		$p=0;
        
        echo '<div class="card bg-dark text-light mb-5"><div class="card-body">';
        echo '<h5 class="card-title">Purchase Requests</h5><p class="card-text text-danger">';
        
        while ($p<$data_size){
			$new_record=mysql_fetch_array($query_result);				

            $purchase_groupName = $new_record['groupName'];
            $purchase_groupPhone = $new_record['groupPhone'];
            $purchase_productA = $new_record['productA'];
            $purchase_productB = $new_record['productB'];
            $purchase_productC = $new_record['productC'];
            $purchase_productD = $new_record['productD'];

            echo "<table class='table table-sm table-bordered table-dark'>";
            echo "<tr><td style='width:50%'><p class='text-warning'>Group Name: <span class='font-weight-light text-light'>$purchase_groupName</span></p></td><td style='width:50%'><p class='text-warning'>Group Phone: <span class='font-weight-light text-light'>$purchase_groupPhone</span></p></td></tr>";
            echo "<tr><td style='width:50%'><p class='text-warning'>Tier 1 SHS: <span class='font-weight-light text-light'>$purchase_productA</span></p></td><td style='width:50%'><p class='text-warning'>Tier 2 SHS: <span class='font-weight-light text-light'>$purchase_productB</span></p></td></tr>";
            echo "<tr><td style='width:50%'><p class='text-warning'>Solar Fan: <span class='font-weight-light text-light'>$purchase_productC</span></p></td><td style='width:50%'><p class='text-warning'>Solar TV: <span class='font-weight-light text-light'>$purchase_productD</span></p></td></tr>";

            echo "</table>";
            
            $p++;
        }
        
        echo '</p></div></div>';
        
    }



?>