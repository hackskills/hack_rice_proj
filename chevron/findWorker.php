<?php
    include_once 'header.php';
    if(!isset($_SESSION['u_id']))
    {
        header("Location: index.php");
    }
    include 'includes/dbh.php';
?>

<div class="central-container">
        <div class="row">
            <div class="col">
                <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-semilight">
					<div class="col-md-12 p-lg-5 mx-auto my-5">
                        <?php
                            if(isset($_POST['submit']))
                            {
                                echo '<h1 class="display-4 font-weight-normal">
                                Worker Search Results
                                </h1>';
                                $W_type = $_POST['type'];
                                $W_string = $_POST['string'];

                                if(empty($W_type) || empty($W_string))
                                {
                                    header("Location: findWorker.php?find=error1");
                                }
                                else
                                {
                                    $sql = "SELECT * FROM workers WHERE ".$W_type."='$W_string'";
                                    $result = mysqli_query($connection, $sql);
                                    $resultCheck = mysqli_num_rows($result);
                                    if($resultCheck == 0)
                                    {
                                        header("Location: findWorker.php?find=none");
                                    }
                                    echo '<table class="center" cellspacing="5" cellpadding="5" ><h4></h4>
	                                    <col width = "200">
	                                    <col width = "200">
	                                    <col width = "200">
	                                    <col width = "200">
	                                    <col width = "200">
	                                    <col width = "200">
	                                    <tr><td align="left"><b>Product ID</b></td>
	                                    <td align="left"><b>Product Name</b></td>
	                                    <td align="left"><b>Quantity</b></td>
	                                    <td align="left"><b>Price</b></td>
	                                    <td align="left"><b>Location</b></td>
	                                    <td align="left"><b>Recieved</b></td>
	                                    <td align="left"><b>Expire</b></td>
		
	                                    </tr>';
	                                    while($row = mysqli_fetch_array($response)){
		                                    echo '<tr><td align="left">'.
		                                    $row['szProductID'] . '</td><td align="left">'.
		                                    $row['szProductName'] . '</td><td align="left">'.
		                                    $row['iQuantity'] . '</td><td align="left">' .
		                                    $row['dbPrice'] . '</td><td align="left">' .
		                                    $row['szLocation'] . '</td><td align="left">' .
		                                    $row['szRecievedDt'] . '</td><td align="left">' .
		                                    $row['szExpirationDt'] . '</td><td align="left">' ;
		                                    echo '</tr>';
	                                    }
	                                    echo '</table>';
                                }

                            }
                            else
                            {
                            }?>
</div>
</div>
</div>
</div>
</div>


<?php
    include_once 'footer.php';
?>