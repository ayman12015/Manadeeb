<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="refresh" content="30" charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Manadeeb - We Serve your Business</title>

  {literal}
  <script type="text/JavaScript" src="../../mView/includes/js/sha512.js"></script>
  <script type="text/JavaScript" src="../../mView/includes/js/forms.js"></script>
  <script type="text/JavaScript" src="../../mView/includes/js/md5.js"></script>
  {/literal}
  <!-- Favicons -->
  <link href="../../Design/img/favicon.png" rel="icon">
  <link href="../../Design/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="../../Design/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../../Design/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="../../Design/css/style.css" rel="stylesheet">
  <link href="../../Design/css/style-responsive.css" rel="stylesheet">
  <script src="../../Design/lib/chart-master/Chart.js"></script>
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
  {literal}
  <script type="text/javascript">
  function GetProductPackagePrice(priceId){
	  document.getElementById('TotalPrice').value = 0.00
	  document.getElementById('qty').value = 0.00
		if (priceId==0)
		  {
		  showList("0.00"); 
		  return;
		  }
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				//document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
				//alert(xmlhttp.responseText);
				
				showList(xmlhttp.responseText); 
				//alert (xmlhttp.responseText);
			}
		  }
		 //alert(kind);  
		xmlhttp.open("GET","ajax_info.php?priceId="+priceId+"&op=GetPrice",true);
		xmlhttp.send();	  	  
  }
  
  
function showList(ReturnVal){	
	document.getElementById("ProductPackagePrice").value = ReturnVal;
}


function GetTotalPrice(qty){
	var Price = document.getElementById('ProductPackagePrice').value;	
	var rtn = parseFloat(qty) * parseFloat(Price) ;
 
	document.getElementById('TotalPrice').value = rtn;
	return;
}

  </script>
  {/literal}
  
</head>