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
  <script src="../../Design/lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="../../Design/lib/common-scripts.js"></script>
  <script type="text/javascript" src="../../Design/lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="../../Design/lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="../../Design/lib/sparkline-chart.js"></script>
  <script src="../../Design/lib/zabuto_calendar.js"></script>
  <!--common script for all pages-->

  <!--script for this page-->
  <script type="text/javascript">
    /* Formating function for row details */
    function fnFormatDetails(oTable, nTr) {
      var aData = oTable.fnGetData(nTr);
      var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';	   
	  return sOut;
    }

    $(document).ready(function() {
      /*
       * Insert a 'details' column to the table
       */
      var nCloneTh = document.createElement('th');
      var nCloneTd = document.createElement('td');
      nCloneTd.innerHTML = '<img src="../../Design/lib/advanced-datatable/images/details_open.png">';
      nCloneTd.className = "center";

      $('#hidden-table-info thead tr').each(function() {
        this.insertBefore(nCloneTh, this.childNodes[0]);
      });

      $('#hidden-table-info tbody tr').each(function() {
        this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
      });

      /*
       * Initialse DataTables, with no sorting on the 'details' column
       */
      var oTable = $('#hidden-table-info').dataTable({
        "aoColumnDefs": [{
          "bSortable": false,
          "aTargets": [0]
        }],
        "aaSorting": [
          [1, 'asc']
        ]
      });

      /* Add event listener for opening and closing details
       * Note that the indicator for showing which row is open is not controlled by DataTables,
       * rather it is done here
       */
      $('#hidden-table-info tbody td img').live('click', function() {
        var nTr = $(this).parents('tr')[0];
        if (oTable.fnIsOpen(nTr)) {
          /* This row is already open - close it */
          this.src = "../../Design/lib/advanced-datatable/images/details_open.png";
          oTable.fnClose(nTr);
        } else {
          /* Open this row */
          this.src = "../../Design/lib/advanced-datatable/images/details_close.png";
          oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
        }
      });
    });
  </script>
  
  
  
</body>

</html>