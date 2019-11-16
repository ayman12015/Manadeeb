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
  {literal}
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
  {/literal}

  <script type="text/javascript" src="../../Design/lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script src="../../Design/lib/advanced-form-components.js"></script>
  
  {literal}
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
  {/literal}
</body>

</html>
