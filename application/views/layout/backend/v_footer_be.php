 </div>
 <!-- /.row -->
 </div><!-- /.container-fluid -->
 </div>
 <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
 <!-- Main Footer -->
 <footer class="main-footer">
     <!-- To the right -->
     <!-- Default to the left -->
     <strong>Copyright &copy;2021 <a href="<?= base_url() ?>">PT MySpace Tbk</a>.</strong> All rights reserved.
 </footer>
 </div>
 <!-- ./wrapper -->

 <!-- REQUIRED SCRIPTS -->

 </body>
 <script>
     $(document).ready(function() {
         $('#dtBasicExample').DataTable();
         $('.dataTables_length').addClass('bs-select');
     });
     
     window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000)
 </script>
 </html>