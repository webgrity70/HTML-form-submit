<?php



session_start();

$response['msg'] = "Invalid submission.";

$response['status'] = '';



if(isset($_POST['enter1']) && $_POST['enter1']==1){

if(!empty($_POST['centerEvent'])) {
	$centerEventCheckList;
	foreach($_POST['centerEvent'] as $check) {
		$centerEventCheckList .= $check.', '; //
	}
}


	if($_SESSION['pass']!=$_POST['captcha_input'] || $_POST['captcha_input']==""){



		$_SESSION['msg']="Please insert the same letters and numbers you see in the image.";



		header('Location: contact-us.html');		

		$response['status'] = FALSE;



		exit();



	}else{

$response['status'] = true;

$to="tpcdc1111@yahoo.com, lara.tpcdc@gmail.com, info@emerge-solutions.com";
//$to="testing.web017@gmail.com";



$subject='Contact Us :: Takoma Park CDC';



$message="<style>



			.textstyle{



			font-family:Tahoma;



			font-size:11px;



			color:#000000;



			text-align:left;



			margin-left:10px;



			text-decoration:none;



			}



			</style>";



$message.="<table width=500 border=0>



					<tr><td width='150' class=textstyle>Parents Name:  </td> <td width='350' class=textstyle>".$_POST['parentsname']."</td></tr>



					<tr><td class=textstyle>Parents Phone:  </td> <td class=textstyle>".$_POST['parentsphone']."</td></tr>



					<tr><td class=textstyle>Parents E-mail:  </td> <td class=textstyle>".$_POST['email']."</td></tr>



					<tr><td class=textstyle>Childs Name:  </td> <td class=textstyle>".$_POST['childname']."</td></tr>



					<tr><td class=textstyle>Childs Birthday:  </td> <td class=textstyle>".$_POST['childbirthdate']."</td></tr>

					<tr><td class=textstyle>Start Date:  </td> <td class=textstyle>".$_POST['start_date']."</td></tr>
					<tr><td class=textstyle>Events:  </td> <td class=textstyle>".$centerEventCheckList."</td></tr>



					<tr><td class=textstyle>Comments:  </td> <td class=textstyle>".$_POST['comments']."</td></tr>



					</table>";


		$mail_from = "From: lara.tpcdc@gmail.com";

		$mail_from .="\r\nContent-type: text/html";

		@mail($to,$subject,$message,$mail_from);

		header("location: thankyou.html"); 	


		exit();



	}



}



?>



