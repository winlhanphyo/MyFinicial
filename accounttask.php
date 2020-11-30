<?php
	require 'confs/config.php';

// getdata
if(isset($_POST['getdata'])){
	$sql="SELECT * FROM finicial  ORDER BY date DESC";
	$result=$conn->query($sql);
	$data=array();
	while($row=$result->fetch_assoc()){
		array_push($data, $row);
	}
	echo json_encode($data);
}

// Add and update
elseif(isset($_POST['id'])){
	$id=$_POST['id'];
	$bank=$_POST['bank'];
	$date=$_POST['date'];
	$amount=$_POST['amount'];
	$accountdate=$_POST['accountdate'];
	$totalinterest=$_POST['totalinterest'];
	$type=$_POST['type'];
	$fixedmonth=$_POST['fixedmonth'];
	$month=date('M' ,strtotime($_POST['date']));
	$year=date('Y' ,strtotime($_POST['date']));
	// Add
	if($id==0){
		$sql="INSERT INTO finicial VALUES(NULL,'$bank','$date','$amount','$accountdate','$totalinterest','$type','$fixedmonth','$month','$year')";
		$conn->query($sql);
		$data['message']="Add student successful!";
		// cosole.log("successful");

	}
	else{
			$sql="UPDATE finicial SET bank='$bank',date='$date',amount='$amount',accountdate='$accountdate',totalinterest='$totalinterest',type='$type',fixedmonth='$fixedmonth' WHERE id='$id'";
			$conn->query($sql);

			$data['message']="UPDATE student successful!";
				
			}
	echo json_encode($data);
}
// end Add and update

//delete student
elseif (isset($_POST['deleteid'])) {
	$id=$_POST['deleteid'];
	$sql="SELECT * FROM finicial WHERE id='$id'";
	$result=$conn->query($sql);
	$data=$result->fetch_assoc();
	$sql="DELETE FROM finicial WHERE id='$id'";
	$conn->query($sql);
	$alert['message']="Delete Account Successful !";
	echo json_encode($alert);
}

//get edit
elseif (isset($_POST['getedit'])){
	$id=$_POST['getedit'];
	$sql="SELECT * FROM finicial WHERE id='$id'";
	$result=$conn->query($sql);
	$data=$result->fetch_assoc();
	echo json_encode($data);
}
