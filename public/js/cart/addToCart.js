function checkLS(name) {
  if (localStorage.getItem(name) === null) {
    return [];
  } else {
    return JSON.parse(localStorage.getItem(name));
  }
}

function getProductInfo() {
  // get product infor
  var id = document.querySelector("#secret #id").innerHTML;
  var name = document.querySelector("#secret #name").innerHTML;
  var sku = document.querySelector("#secret #sku").innerHTML;
  var fImg = document.querySelector("#secret #feature_img").innerHTML;
  var price = document.querySelector("#secret #price").innerHTML;

  var product = {
    id: id,
    name: name,
    sku: sku,
    fImg: fImg,
    price: price,
  };

  return product;
}

function addToLS() {
  var cart = checkLS("cart");

  // check size and quatity
  var size = document.getElementById("sizes");
  var selectedSize = size.options[size.selectedIndex].value;
  if (selectedSize == "") {
    return alert("Mời chọn sizes");
  }

  var quatity = document.getElementById("amount").value;
  if (quatity == "") {
    return alert("Bạn muốn mua bao nhiêu đôi?");
  }

  // check cart localStorage
  if (cart == "") {
    var product = getProductInfo();
    product.amount = quatity;
    product.selectedSize = selectedSize;

    cart.push(product);

    // localStorage.setItem("cart", JSON.stringify(cart));

    console.log("add first product successfully");
    // return;
  } else {
    var id = document.querySelector("#secret #id").innerHTML;
    cart.forEach((item) => {
      if (id == item.id) {
        amount = parseInt(item.amount) + parseInt(quatity);
        item.amount = amount;

        console.log("Update successfully");

        // return;
      } else {
        var product = getProductInfo();
        product.amount = quatity;
        product.selectedSize = selectedSize;

        cart.push(product);

        // localStorage.setItem("cart", JSON.stringify(cart));

        console.log("add new product successfully");

        // return;
      }
    });
  }

  localStorage.setItem("cart", JSON.stringify(cart));

  console.log("success");

  console.log(localStorage.getItem("cart"));

  return;
}

