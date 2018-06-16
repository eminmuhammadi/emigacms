<!-- footer -->
<?php 
if ($filename=="login.php" || $filename=="register.php") {  }
else{
   echo"
<footer class=\"footer\"> 
<!--Footer Text Here-->
Proudly powered by <b>EmiGA CMS<b>
</footer>
   ";
}   
?>   
<!-- End footer -->
</div>
<!-- End Page wrapper  -->
</div>


    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="/admin/library/js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="/admin/library/js/lib/bootstrap/js/popper.min.js"></script>
    <script src="/admin/library/js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="/admin/library/js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="/admin/library/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="/admin/library/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->


    <!-- Amchart -->
    <script src="/admin/library/js/lib/morris-chart/raphael-min.js"></script>
    <script src="/admin/library/js/lib/morris-chart/morris.js"></script>
    <script src="/admin/library/js/lib/morris-chart/dashboard1-init.js"></script>


	<script src="/admin/library/js/lib/calendar-2/moment.latest.min.js"></script>
    <!-- scripit init-->
    <!--<script src="/admin/library/calendar-2/semantic.ui.min.js"></script>-->
    <!-- scripit init-->
    <script src="/admin/library/js/lib/calendar-2/prism.min.js"></script>
    <!-- scripit init-->
    <script src="/admin/library/js/lib/calendar-2/pignose.calendar.min.js"></script>
    <!-- scripit init-->
    <script src="/admin/library/js/lib/calendar-2/pignose.init.js"></script>

    <script src="/admin/library/js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="/admin/library/js/lib/owl-carousel/owl.carousel-init.js"></script>

    <!-- scripit init-->

    <script src="/admin/library/js/scripts.js"></script>



<?php
if ($filename=="allpost.php" || $filename=="allcategory.php"){
echo"
<script src=\"/admin/library/js/lib/datatables/datatables.min.js\"></script>
<script src=\"/admin/library/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js\"></script>
<script src=\"/admin/library/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js\"></script>
<script src=\"/admin/library/js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js\"></script>
<script src=\"/admin/library/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js\"></script>
<script src=\"/admin/library/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js\"></script>
<script src=\"/admin/library/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js\"></script>
<script src=\"/admin/library/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js\"></script>
<script src=\"/admin/library/js/lib/datatables/datatables-init.js\"></script>
";
}
?>

<script type="text/javascript">
function DeleteAlert() {
return confirm('Do you want to delete?')
}  
</script>
</body>
</html>


