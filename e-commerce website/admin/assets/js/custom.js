$(document).ready(function() {
    $('.delete_product_btn').click(function(e) {
        e.preventDefault();
        var id = $(this).val();
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Delete"
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                method: "POST",
                url: "code.php",
                data: {
                    'product_id': id,
                    'delete_product_btn': true
                },
                success: function (response) {
                    if(response == 200) {
                        Swal.fire({
                            title: "Success",
                            text: "Product deleted successfully",
                            icon: "success"
                          });
                          window.location.reload();
                    }
                    else if(response == 500) {
                        Swal.fire({
                            title: "Error",
                            text: "Something went wrong",
                            icon: "error"
                          });
                          window.location.reload();
                    }
                }
              });
            }
          });
    });

    $('.delete_category_btn').click(function(e) {
      e.preventDefault();
      var id = $(this).val();
      Swal.fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#d33",
          cancelButtonColor: "#3085d6",
          confirmButtonText: "Delete"
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              method: "POST",
              url: "code.php",
              data: {
                  'category_id': id,
                  'delete_category_btn': true
              },
              success: function (response) {
                  if(response == 200) {
                      Swal.fire({
                          title: "Success",
                          text: "Category deleted successfully",
                          icon: "success"
                        });
                        window.location.reload();
                  }
                  else if(response == 500) {
                      Swal.fire({
                          title: "Error",
                          text: "Something went wrong",
                          icon: "error"
                        });
                        window.location.reload();
                  }
              }
            });
          }
        });
  });
});