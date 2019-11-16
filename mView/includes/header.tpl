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
  
   function UpdateGroupPrevileges(group_id,page_id,lbl_id){
	  //alert(group_id + ','+ page_id + ','+  status + ','+  lbl_id)
	  var cls = document.getElementById(lbl_id).className;
	  var status ='';
	  
	  if(cls == 'fa fa-square'){status ='1'}
	  else
	  {status ='0'}
	  
	  
	  
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
				
				if(xmlhttp.responseText == 0){		
					if(document.getElementById(lbl_id).className == 'fa fa-square'){
						document.getElementById(lbl_id).className = 'fa fa-check'
						}else{
							document.getElementById(lbl_id).className = 'fa fa-square'
							}					
				}								 
			  }			
		  }
		   
		xmlhttp.open("POST","ajax_info.php?op=page_previleges&group_id="+group_id+"&page_id="+page_id+"&status="+status,true);
		xmlhttp.send();					
	  }
	  
  
  function getStoreAvalableQTY(){
		  var storeId = document.getElementById('Shipping_storeId').value;
		  var priceId = document.getElementById('priceId').value;
	  
	  if(priceId > 0 && storeId > 0){
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
				 				
				document.getElementById('AvalableQTYVal').innerHTML  = xmlhttp.responseText;																		
			}
		  }
		 //alert(kind);  
		xmlhttp.open("POST","ajax_info.php?op=AvalableQTYVal&priceId="+priceId+"&storeId="+storeId,true);
		xmlhttp.send();		
	   }	  	 		 
	  return; 
	}
    function UpdateClsListValue(new_value_id,l_new_value_id,chk_id,Config_id_id,retn_id,Config_type){
	  //alert(new_value_id+chk_id+Config_id_id)
	  if(document.getElementById(chk_id).checked==false){
		  alert('Active the Class configurations to update his informations');
		  return;
		  }

		var new_value = document.getElementById(new_value_id).value;
		var l_new_value = document.getElementById(l_new_value_id).value;
		var Config_id = document.getElementById(Config_id_id).value;
		
        if(l_new_value=='0' || new_value=='0' ||  new_value=='' ){
			 alert('Please Enter Valid Information');
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
				
				if(xmlhttp.responseText == 0){				
					if(document.getElementById(id).className == 'fa fa-square'){
						document.getElementById(id).className = 'fa fa-check'
						}else{
							document.getElementById(id).className = 'fa fa-square'
							}
					
				}					
				//alert(xmlhttp.responseText);
				var response = xmlhttp.responseText;
				var new_response = response.substring(0, response.length - 1);
				
				var arr = new_response.split(',');
				//alert(xmlhttp.responseText);
			var i=0;
					var select = document.getElementById(retn_id);
    				select.options.length = 0;
			do {
				var mItem=arr[i].split(':');
					//alert(mItem[0]);
					select.options[i] = new Option(mItem[1], mItem[0], false, false);
					//document.getElementById(retn_id).options[i].value =mItem[0]; 
				  i++;
				}
				while (i < arr.length);	
				document.getElementById(new_value_id).value = "";	
			}
			
		  }
		 //alert(kind);  
		xmlhttp.open("POST","ajax_info.php?op=cls_upate_val_list&new_value="+new_value+"&l_new_value="+l_new_value+"&Config_id="+Config_id+"&Config_type="+Config_type,true);
		xmlhttp.send();					
	  }
	  
  function UpdateClsValue(new_value_id,chk_id,Config_id_id,rtn_id){
	  //alert(new_value_id+chk_id+Config_id_id)
	  if(document.getElementById(chk_id).checked==false){
		  alert('Active the Class configurations to update his informations');
		  return;
		  }
		var new_value = document.getElementById(new_value_id).value;
		var Config_id = document.getElementById(Config_id_id).value;

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
				
				if(xmlhttp.responseText == 0){				
					if(document.getElementById(id).className == 'fa fa-square'){
						document.getElementById(id).className = 'fa fa-check'
						}else{
							document.getElementById(id).className = 'fa fa-square'
							}
					
				}					
				document.getElementById(rtn_id).value=xmlhttp.responseText;												
			}
		  }
		 //alert(kind);  
		xmlhttp.open("POST","ajax_info.php?op=cls_upate_val&new_value="+new_value+"&Config_id="+Config_id,true);
		xmlhttp.send();			
	  }
	  
  	  
  function clsUpdateConfigStatus(val,config_name,cls_id){
  		var new_val;

  		if(val == true)
  			new_val='0';
  		if(val == false)
  			new_val='1';

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
				
				if(xmlhttp.responseText == 0){				
					if(document.getElementById(id).className == 'fa fa-square'){
						document.getElementById(id).className = 'fa fa-check'
						}else{
							document.getElementById(id).className = 'fa fa-square'
							}
					
				}					
				 document.getElementById(config_name + 'Config_id').value = xmlhttp.responseText;				 				
			}
		  }
		 //alert(kind);  
		xmlhttp.open("POST","ajax_info.php?op=cls_upate&new_val="+new_val+"&config_name="+config_name+"&cls_id="+cls_id,true);
		xmlhttp.send();	

  	}
	
  function UpdateFeaturedClass(op,id,prod_id,val){
	  //document.getElementById(id).className = cls;		    
		
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
				
				if(xmlhttp.responseText == 0){				
					if(document.getElementById(id).className == 'fa fa-square'){
						document.getElementById(id).className = 'fa fa-check'
						}else{
							document.getElementById(id).className = 'fa fa-square'
							}
					
				}
					
				if(xmlhttp.responseText == 1)	
					alert('Featured Products Should not be more than 7 products');
				
			}
		  }
		 //alert(kind);  
		xmlhttp.open("POST","ajax_info.php?op="+op+"&prod_id="+prod_id+"&val="+val,true);
		xmlhttp.send();	 
		
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
				 getStoreAvalableQTY();
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

function GetAction(selected,MoveTo,who){
 var list = GetSelectedList(); 
 if(list.length > 0){
 MoveCustomer(selected,MoveTo,list,who);
 }else{
	alert('you must select one customer at least'); 
 }

}

function SetAutoMove(val,cust_id){
var new_val;
	if(val=='0')
		new_val='1'
	else
		new_val='0'
		
MoveCustomer(cust_id,new_val,'','AutoMove');
}

function MoveCustomer(selected,MoveTo,list,who){

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
				if(who=='AutoMove')
					return;
				
				
				
				alert (xmlhttp.responseText);
				if(who=='usr')
				window.location.href = "CustomersManagement.php?selected=" + selected;
				
				if(who=='cls')
				window.location.href = "CustomersClassification.php?selected=" + selected;
				
				
			}
		  }
		 //alert(kind);  
		xmlhttp.open("POST","ajax_info.php?op=MoveCust&selected="+selected+"&MoveTo="+MoveTo+"&list="+list+"&who="+who,true);
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

function chkCheckedUnChaked(val){
	 	
	 if(val == 'All') {
		for (i = 1; i <= 2000; i++) {
			var id = "chk" + i;
		  document.getElementById(id).checked =true;
		}  
	}else{
		for (i = 1; i <= 2000; i++) {
			var id = "chk" + i;
		  document.getElementById(id).checked =false;
		}
	}	
}


  </script>
  {/literal}
  
</head>