

      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo ASSETS; ?>js/jquery-3.4.1.min.js" ></script>
    <script src="<?php echo ASSETS; ?>js/popper.min.js" ></script>
    <script src="<?php echo ASSETS; ?>js/bootstrap.min.js" ></script>


      <script>
          $(".delete").click(function () {

              var item_id = $(this).data("id");
              var table   = $(this).data("table");
              var field   = $(this).data("field");

              $.ajax({
                  type: "GET",
                  url: "<?php echo BUA.'inc/delete.php'; ?>",
                  data: { item_id: item_id, table: table, field: field },
                  dataType: "JSON",
                  success: function (data) {

                      if (data.status === "success") {
                          alert("Deleted Successfully");

                          // حذف الصف من الصفحة مباشرة
                          // مثال:
                          // $("#row_" + item_id).remove();

                      } else {
                          alert(data.message);
                      }
                  }
              });
          });
      </script>


      </body>
</html>