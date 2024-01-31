$(document).ready(function () {

  $(".increment-btn").click(function (e) {
    e.preventDefault();
    var qty = $(this).closest(".product_data").find(".qty-input").val();
    var value = parseInt(qty, 10);
    value = isNaN(value) ? 0 : value;
    if (value < 10) {
      value++;
      qty = $(this).closest(".product_data").find(".qty-input").val(value);
    }
  });

  $(".decrement-btn").click(function (e) {
    e.preventDefault();
    var qty = $(this).closest(".product_data").find(".qty-input").val();
    var value = parseInt(qty, 10);
    value = isNaN(value) ? 0 : value;
    if (value > 1) {
      value--;
      qty = $(this).closest(".product_data").find(".qty-input").val(value);
    }
  });

  $(".addtocartBtn").click(function (e) {
    e.preventDefault();
    var qty = $(this).closest(".product_data").find(".qty-input").val();
    var product_id = $(this).val();
    $.ajax({
      method: "POST",
      url: "functions/handlecart.php",
      data: {
        "product_id": product_id,
        "product_qty": qty,
        "scope": "add"
      },
      success: function (response) {
        if (response == 201) {
          alertify.success("Product added to cart");
        }
        else if (response == 401) {
          alertify.success("Login to continue");
        }
        else if (response == 500) {
          alertify.success("Something went wrong");
        }
      }

    });

  });

  $(document).on("click", ".updateQty", function () {
    var qty = $(this).closest(".product_data").find(".qty-input").val();
    var product_id = $(this).closest(".product_data").find(".prodId").val();
    $.ajax({
      method: "POST",
      url: "functions/handlecart.php",
      data: {
        "product_id": product_id,
        "product_qty": qty,
        "scope": "update"
      },
      success: function (response) {

      }
    });
  });

  $(document).on('click', '.deleteItem', function () {
    var cart_id = $(this).val();
    $.ajax({
      method: "POST",
      url: "functions/handlecart.php",
      data: {
        "cart_id": cart_id,
        "scope": "delete"
      },
      success: function (response) {
        if(response == 200) {
          alertify.success("Item from cart was successfully deleted");
        }
        else if(response == 500) {
          alertify.error("Something went wrong");
        }
      }
    });
  });
});

let loader = document.getElementById("loader");
async function hideLoader() {
  await new Promise(resolve => setTimeout(resolve, 1500));
  loader.style.display = "none";
}
window.onload = hideLoader;

