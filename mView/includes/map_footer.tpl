  <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Manadeeb.sd</strong>. All Rights Reserved
        </p>
        <div class="credits">
          Created with Sudaserve.com<a href="http://Sudaserve.com/"> IT-Serve</a>
        </div>
        <a href="#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="../../Design/lib/jquery/jquery.min.js"></script>
  <script src="../../Design/lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="../../Design/lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="../../Design/lib/jquery.scrollTo.min.js"></script>
  <script src="../../Design/lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="../../Design/lib/common-scripts.js"></script>
  <!--script for this page-->
  <!--Google Map-->
  <script src="http://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.7"></script>
  <script src="../../Design/lib/google-maps/maplace.js"></script>
  <script src="../../Design/lib/google-maps/data/points.js"></script>
  <script>
  function LoadMap(user_id){
	  			//alert(user_id);
				
		if (window.XMLHttpRequest)
		  {
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				//document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
				//alert(xmlhttp.responseText);
				//alert (xmlhttp.responseText);
				showMap(xmlhttp.responseText); 
				
			}
		  }
		 //alert(kind);  
		xmlhttp.open("GET","ajax_info.php?user_id="+user_id+"&op=showMap",true);
		xmlhttp.send();	  			   	  
	}
	
	function showMap(res){
		



var new_response = res.substring(0, res.length - 1);
				
		var arr = new_response.split(',');
		//alert(xmlhttp.responseText);
	var i=0;					
	do {
		var mItem=arr[i].split(':');
			//alert(mItem[0]);
			//select.options[i] = new Option(mItem[1], mItem[0], false, false);					 
						LocsA.push(
						  {
							  lat: mItem[4], 
							  lon: mItem[5],
							  title: mItem[1],
							  html: [
									'<h3>' + mItem[3] + '</h3>',
									'<p>' + mItem[2] + '</p>'
								].join(''),
								 zoom: 20,
								icon: 'http://maps.google.com/mapfiles/markerC.png'	  
							}
						  );
				  i++;
	}
	while (i < arr.length - 1);	
			
 
var parm = {  locations : LocsA , map_div: '#gmap-list', controls_type: 'list',controls_title: 'Customers List:'}	
	var  map = new Maplace(parm);	
	map.Load();  		
	}
    //ul list example
     
  </script>
  
</body>

</html>
