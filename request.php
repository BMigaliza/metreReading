<?php
$cmd=$_REQUEST['cmd'];
switch($cmd)
{
        //add items to the database
    case 1:
        //include("metre.php");
        
        //
        
        $DB_HOST="localhost";
		$DB_NAME="csashesi_beatrice-lungahu";
		$DB_USER="csashesi_bl16";
		$DB_PWORD="db!hiJ35";
		
		$link = mysqli_connect($DB_HOST , $DB_USER, $DB_PWORD,$DB_NAME);
		if($link==false){
			echo "not succesfull";
		}
		/*
		if(mysqli_select_db($DB_NAME,$link)){
			echo "echo can not select db";
		}*/
		
		
		//$new_date = date('yy-mm-dd',strtotime($_POST['Date']));
		$reading=$_REQUEST['reading'];
		$captured = $_REQUEST['capturedd'];
		$date=$_REQUEST['datepicker'];
		$location=$_REQUEST['locationn'];
		
		$str_query="INSERT INTO phoneGapMetre (Reading,Captured,Date,Location) VALUES('$reading','$captured','$date','$location')";
		//echo $str_query;
		//mysqli_query($link,$str_query);
		//echo mysqli_error($link);
		if(mysqli_query($link,$str_query)){
				echo '{"result":1,"message": "SUCCESFULLY ADDED"}';
		}else
		{
			echo '{"result":0,"message": "unsuccessful"}';
		}
		
        break;
            
        //this displays the content added to the database
    case 2:
        $DB_HOST="localhost";
		$DB_NAME="csashesi_beatrice-lungahu";
		$DB_USER="csashesi_bl16";
		$DB_PWORD="db!hiJ35";
		
		$link = mysqli_connect($DB_HOST , $DB_USER, $DB_PWORD,$DB_NAME);
		if($link==false){
			echo "not succesfull";
		}
		/*
		if(mysqli_select_db($DB_NAME,$link)){
			echo "echo can not select db";
		}*/
		
		
		//$new_date = date('yy-mm-dd',strtotime($_POST['Date']));
		$reading=$_REQUEST['reading'];
		$captured = $_REQUEST['capturedd'];
		$date=$_REQUEST['datepicker'];
		$location=$_REQUEST['locationn'];
		
		$str_query="SELECT * FROM  phoneGapMetre";
		$result=mysqli_query($link,$str_query);
        $row=$result->fetch_assoc();
        echo '{"result":1,"values":[';	//start of json object
	   while($row){
		  echo json_encode($row);			//convert the result array to json object
		  $row=$result->fetch_assoc();
		  if($row){
			 echo ",";					//if there are more rows, add comma 
		  }
	   }
	   echo "]}";
    break;
       
	}
            
?>