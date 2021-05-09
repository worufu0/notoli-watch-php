//********* Bắt đầu đoạn code viết chức năng cho miniCart
// == Hàm load số sản phẩm (icon giỏ hàng ở header)
function loadQuantityCart() {
  $.ajax({
    url: "./cart/LoadCart",
    method: "POST",
    async: false,
    success: function (res) {
      if (res != "null") {
        if ($("#mini-cart-count")) {
          if (res > 0) {
            $("#mini-cart-count").css("display", "block");
            $("#mini-cart-count").html(res);
          } else {
            $("#mini-cart-count").css("display", "none");
          }
        }
      }
    },
  });
}
// == Hàm load sản phẩm cho vào miniCart
function loadMiniCart() {
  $.ajax({
    url: "./cart/LoadMiniCart",
    method: "POST",
    async: false,
    success: function (res) {
      if (res != "null") {
        $("#mini-cart-content").last().html(res);
      }
    },
  });
}
// == Khi thêm 1 sản phẩm vào trong giỏ hàng (Button thêm giỏ hàng)
function InsertCart(id, quantity) {
  $.ajax({
    url: "./cart/InsertCart",
    method: "POST",
    data: {
      product_id: id,
      cart_quantity: quantity,
    },
    async: false,
    success: function (res) {
      if (res == "noLogin") {
        $(".popup_box--h1").html("Vui lòng đăng nhập để tiếp tục mua hàng");
        $(".popup_box").css("display", "block");
        disableScreen();
        $("#btn-close").click(function () {
          $(".popup_box").css("display", "none");
          enableScreen();
        });
        //alert("Vui lòng đăng nhập trước khi thêm vào giỏ hàng");
      }
    },
  });
}

//== Xóa sản phẩm khỏi MiniCart
function RemoveCart(id) {
  $.ajax({
    url: "./cart/RemoveCart",
    method: "POST",
    data: {
      cart_id: id,
    },
    async: false,
    success: function (res) {},
  });
}
//== Bắt sự kiện click khi thêm vào giỏ hàng
$(document).ready(function () {
  $(".addCart").click(function () {
    let id = $(this).attr("id");
    let quantity = 1; // Số lượng sản phẩm cần thêm
    InsertCart(id, quantity);
    loadQuantityCart();
    loadMiniCart();
    return false;
  });
});
//== Bắt sự kiện click khi thêm vào giỏ hàng (Số lượng nhiều) // trang chi tiết sản phẩm
$(document).ready(function () {
  $(".addMultiCart").click(function () {
    let id = $(this).attr("id");
    let quantity = $('#qty').val();
    console.log(quantity);
    InsertCart(id, quantity);
    // loadQuantityCart();
    // loadMiniCart();
    return false;
  });
});
//== Bắt sự kiện click khi xóa giỏ hàng khỏi miniCart
$(document).ready(function () {
  $(document).on("click", ".remove", function () {
    let id = $(this).attr("id");
    RemoveCart(id);
    loadQuantityCart();
    loadMiniCart();
    return false;
  });
});
//********* Kết thúc đoạn code viết chức năng cho miniCart

//********* Bắt đầu đoạn code viết chức năng trang Cart
const formatter = new Intl.NumberFormat("vi-VN", {
  style: "currency",
  currency: "VND",
});
function updateCart(id, quantity) {
  $.ajax({
    url: "./cart/UpdateCart",
    method: "POST",
    data: {
      cart_id: id,
      cart_quantity: quantity,
    },
    success: function (res) {
      var obj = JSON.parse(res);
      let test = "#price-" + id;
      let price = formatter.format(parseInt(obj.price));
      let priceTotal = formatter.format(parseInt(obj.priceTotal));
      let lastPrice = formatter.format(parseInt(obj.priceTotal));
      $(test).html(price);
      $("#priceTotal").html(priceTotal);
      $("#lastPrice").html(lastPrice);
      loadQuantityCart();
      loadMiniCart();
    },
  });
}
//== Bắt sự kiện khi thay đổi số lượng sản phẩm
$(document).ready(function () {
  $(document).on("focusout", ".quantity-cart .quantity-load", function () {
    let id = $(this).attr("id");
    var quantity = parseInt($(this).val());
    var max = parseInt($(this).attr("max"));
    var min = parseInt($(this).attr("min"));
    if (quantity > max) {
      quantity = max;
      $(this).val(max);
    }
    if (quantity < min || isNaN(quantity)) {
      quantity = min;
      $(this).val(min);
    }
    updateCart(id, quantity);
  });
});
//== Bắt sự kiện khi giảm số lượng sản phẩm
$(document).ready(function () {
  $(document).on("click", ".quantity-cart .dec", function () {
    let id = $(this).siblings("input").attr("id");
    let quantity = parseInt($(this).siblings("input").val());
    updateCart(id, quantity);
  });
});
//== Bắt sự kiện khi tăng số lượng sản phẩm
$(document).ready(function () {
  $(document).on("click", ".quantity-cart .inc", function () {
    let id = $(this).siblings("input").attr("id");
    var quantity = parseInt($(this).siblings("input").val());
    var max = parseInt($(this).siblings("input").attr("max"));
    if (quantity > max) {
      quantity = max;
      $(this).siblings("input").val(max);
    }
    updateCart(id, quantity);
  });
});
//== Load trang giỏ hàng
function loadPageCart() {
  $.ajax({
    url: "./cart/LoadPageCart",
    method: "POST",
    success: function (res) {
      if (res != "null") {
        let obj = JSON.parse(res);
        let priceTotal = formatter.format(parseInt(obj.priceTotal));
        let lastPrice = formatter.format(parseInt(obj.priceTotal));
        $("#priceTotal").html(priceTotal);
        $("#lastPrice").html(lastPrice);
      }
    },
  });
}
//== Bắt sự kiện khi click xóa sản phẩm trong giỏ hàng
$(document).ready(function () {
  $(document).on("click", ".removeItem", function () {
    let id = $(this).attr("id");
    RemoveCart(id);
    loadMiniCart();
    loadQuantityCart();
    loadPageCart();
    $(this).closest("tr").remove();
  });
});
// Submit checkout
$(document).ready(function () {
  $(document).on("click", "#submit-checkout", function () {
    let billing_name = $("#billing_name").val();
    let billing_city = $("#billing_city").val();
    let billing_state = $("#billing_state").val();
    let billing_streetAddress = $("#billing_streetAddress").val();
    let billing_phone = $("#billing_phone").val();
    let billing_email = $("#billing_email").val();
    if (billing_name.trim() === "") {
      if (billing_city.trim() === "") {
        if (billing_state.trim() === "") {
          if (billing_streetAddress.trim() === "") {
            if (billing_phone.trim() === "") {
              if (billing_email.trim() === "") {
                $(".popup_box--h1").html(
                  "Vui lòng nhập đầy đủ thông tin giao hàng"
                );
                $(".popup_box").css("display", "block");
                disableScreen();
                $("#btn-close").click(function () {
                  $(".popup_box").css("display", "none");
                  enableScreen();
                });
              }
            }
          }
        }
      }
    } else {
      document.forms["form-checkout"].submit();
    }
  });
});

//== Load trang giỏ hàng
function loadFilter() {
  let cat = $('input[name="cat"]:checked').val();
  let brand = $('input[name="brand"]:checked').val();
  let min = $("#input-left").val();
  let max = $("#input-right").val();

  if(brand == 0) {
    brand = 'prod_brand';
  }
  if(cat == 0) {
    cat = 'prod_cat';
  }
  $.ajax({
    url: "./ajaxfilter/Action",
    method: "POST",
    data: {
      prod_brand: brand,
      prod_cat: cat,
      price_min: min,
      price_max: max,
      prod_title: '',
    },
    success: function (res) {
      if (res != "null") {
        $("#ajax_layout").html(res);
      }
    },
  });
}
//Ajax filter
$(document).ready(function () {
  $(document).on("click", ".tickCat", function () {
    loadFilter();
  });
});
$(document).ready(function () {
  $(document).on("click", ".tickBrand", function () {
    loadFilter();
  });
});
$(document).ready(function () {
  $(document).on("change", "#input-left", function () {
    let left = $("#input-left").val();
    loadFilter();
    console.log("Left", left);
  });
});
$(document).ready(function () {
  $(document).on("change", "#input-right", function () {
    let right = $("#input-right").val();
    loadFilter();
    console.log("Right", right);
  });
});

function trigerLeft() {
  let valLeft = $("#input-left").val();
  valLeft = formatter.format(parseInt(valLeft));
  $('#minPrice').html(valLeft);
}
function trigerRight() {
  let valRight = $("#input-right").val();
  valRight = formatter.format(parseInt(valRight));
  $('#maxPrice').html(valRight);
}