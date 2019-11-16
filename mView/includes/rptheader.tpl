<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
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
  <link rel="stylesheet" type="text/css" href="../../Design/lib/bootstrap-datepicker/css/datepicker.css" />
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
  
  function rptPrint(rpt){
	  var printContents = document.getElementById(rpt).innerHTML;
	  var orginContents = document.body.innerHTML;
	  document.body.innerHTML = printContents;
	  window.print() ;
	  location.reload;
	    
	  }
	  
  function RptGoto(rpt,UserId){
	if(rpt == 'rptUserCustomers'){
	 window.location.href = "rptUserCustomers.php?selected=" + UserId;
	return;
	}
	
	if(rpt == 'rptProductsPackagesPrice'){
	 window.location.href = "rptProductsPackagesPrice.php?selected=" + UserId;
	return;
	}
	
	if(rpt == 'rptTrucksShipmentment'){
	 window.location.href = "rptTrucksShipmentment.php?selected=" + UserId;
	return;
	}
	
	if(rpt == 'rptCustomersPendingBills'){
	 window.location.href = "rptCustomersPendingBills.php?selected=" + UserId;
	return;
	}
	
	if(rpt == 'rptCustomerPerformance'){
	 window.location.href = "CrptCustomerPerformance.php?selected=" + UserId;
	return;
	}
	
	
	
  
  }
	
  function validateReturn(){
	var returnVal =document.getElementById('return').value;
	var Old_Qty =document.getElementById('old_qty').value;
	alert(returnVal);
	alert(Old_Qty);
	if( (returnVal >= 0) & (returnVal <= Old_Qty) ){
		return true;
		
	}else{
		alert('Wrong return value');
		return false;
	}
	
	
	
	}
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

function GetAction(selected,MoveTo){
 var list = GetSelectedList(); 
 if(list.length > 0){
 MoveCustomer(selected,MoveTo,list);
 }else{
	alert('you must select one customer at least'); 
 }

}

function MoveCustomer(selected,MoveTo,list){

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
				
				//showList(xmlhttp.responseText); 
				alert (xmlhttp.responseText);
				window.location.href = "CustomersManagement.php?selected=" + selected;
			}
		  }
		 //alert(kind);  
		xmlhttp.open("POST","ajax_info.php?op=MoveCust&selected="+selected+"&MoveTo="+MoveTo+"&list="+list,true);
		xmlhttp.send();	  	  
  }
  

function GetSelectedList (){
var list ='';
 for (i = 1; i <= 200; i++) {
	 var id = "chk" + i;
	 if(document.body.contains(document.getElementById(id))){
        if(document.getElementById(id).checked==true){
			if(i==1)
				list = document.getElementById(id).value;
			else
				list = list + ',' + document.getElementById(id).value;
		}
     } else{
        return list;
     }
 } 
 	
}

function SetReturneId(id,ProductName,qty){
	 
	document.getElementById('ShippingID').value =  id;
	document.getElementById('ProductName').value =  ProductName;
	document.getElementById('old_qty').value =  qty;

}

function chkCust(){
	 	
	 if(document.getElementById('checkAll').checked ==true) {
		for (i = 1; i <= 200; i++) {
			var id = "chk" + i;
		  document.getElementById(id).checked =true;
		}  
	}else{
		for (i = 1; i <= 200; i++) {
			var id = "chk" + i;
		  document.getElementById(id).checked =false;
		}
	}	
}

function chkCustCust(val){
	 	
	 if(val == 'All') {
		for (i = 1; i <= 200; i++) {
			var id = "chk" + i;
		  document.getElementById(id).checked =true;
		}  
	}else{
		for (i = 1; i <= 200; i++) {
			var id = "chk" + i;
		  document.getElementById(id).checked =false;
		}
	}	
}


  </script>
  {/literal}
  
</head>