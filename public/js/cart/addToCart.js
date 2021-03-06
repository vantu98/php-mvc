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

  var amount = document.getElementById("amount").value;
  if (amount == "") {
    return alert("Bạn muốn mua bao nhiêu đôi?");
  }

  // check cart localStorage
  if (cart == "") {
    var product = getProductInfo();
    product.amount = amount;
    product.size = selectedSize;

    cart.push(product);

    localStorage.setItem("cart", JSON.stringify(cart));

    console.log("add first product successfully");
    return;
  } else {
    var id = document.querySelector("#secret #id").innerHTML;

    var pos = -1;

    for (let index = 0; index < cart.length; index++) {
      const item = cart[index];

      if (item.id == id) {
        pos = index;
        break;
      }
    }

    if (pos > -1) {
      cart[pos].amount = parseInt(cart[pos].amount) + parseInt(amount);

      console.log(cart);

      localStorage.setItem("cart", JSON.stringify(cart));

      return;
    } else {
      var product = getProductInfo();
      product.amount = amount;
      product.size = selectedSize;

      cart.push(product);
      localStorage.setItem("cart", JSON.stringify(cart));
      console.log("add new product successfully");
    }
  }
  console.log(localStorage.getItem("cart"));

  return;
}
