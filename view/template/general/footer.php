  <!--Page Wrapper-->

<!-- Page JavaScript Files-->
<script src="./assets/general/js/jquery.min.js"></script>
<script src="./assets/general/js/jquery-1.12.4.min.js"></script>
<!--Popper JS-->
<script src="./assets/general/js/popper.min.js"></script>
<!--Bootstrap-->
<script src="./assets/general/js/bootstrap.min.js"></script>
<!--Sweet alert JS-->
<script src="./assets/general/js/sweetalert.js"></script>
<!--Progressbar JS-->
<script src="./assets/general/js/progressbar.min.js"></script>
<!--Charts-->
<!--Canvas JS-->
<script src="./assets/general/js/charts/canvas.min.js"></script>
<!--Bootstrap Calendar JS-->
<script src="./assets/general/js/calendar/bootstrap_calendar.js"></script>
<script src="./assets/general/js/calendar/demo.js"></script>
<!--Bootstrap Calendar-->

<!--Custom Js Script-->
<script src="./assets/general/js/custom.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<!--Custom Js Script-->
<script>
  CKEDITOR.replace('editor1');
  $(document).ready( function () {
    $('#myTable').DataTable();
  } );
</script>
<script>
  function toggle_sidebar() {
    document.getElementById("form_element").style.display = "none";
    $('#sidebar-toggle-btn').toggleClass('slide-in');
    $('.sidebar').toggleClass('shrink-sidebar');
    $('.content').toggleClass('expand-content');
    
    //Resize inline dashboard charts
    $('#incomeBar canvas').css("width","100%");
    $('#expensesBar canvas').css("width","100%");
    $('#profitBar canvas').css("width","100%");
}
</script>
</body>

</html>