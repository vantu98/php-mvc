function checkLS(name) {
  if (localStorage.getItem(name) === null) {
    return [];
  } else {
    return JSON.parse(localStorage.getItem(name));
  }
}

function addToLS() {
  var cart = checkLS("cart");

  //check size
  var size = document.getElementById("sizes");
  var choose = size.options[size.selectedIndex].value;
  var id = document.getElementById("id").innerHTML;

  if (choose == "") {
    return alert("Xin chọn size");
  }

  // Check amount
  var amount = document.getElementById("amount").value;

  if (amount == "") {
    return alert("Mời chọn số lượng");
  }

  var product = {
    name: document.getElementById("name").innerHTML,
    sku: document.getElementById("sku").innerHTML,
    fImg: document.getElementById("feature_img").innerHTML,
    price: document.getElementById("price").innerHTML,
    id: id,
    size: choose,
    amount: amount,
  };

  if (cart != []) {
    cart.forEach((item) => {
      if (item.id == id) {
        var a = parseInt(item.amount);
        item.amount = a += parseInt(amount);
        break;
      }else{
          
      }
    });
  } else {
    cart.push(product);
  }

  localStorage.setItem("cart", JSON.stringify(cart));

  console.log();
}
