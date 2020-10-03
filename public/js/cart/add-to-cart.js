$(document).ready(function () {
  $("#add-to-cart-btn").on("click", function () {
    var cart = [];
    // save to localStorage
    if (typeof Storage !== "undefined") {
      if ($("#sizes option:selected").val() == "") {
        alert("Mời chọn size");
      } else {
        console.log($("#sizes option:selected").val());
      }
    } else {
      console.log("Your browser doesn't support local storage");
    }
  });

  function getLS(name) {
    if (typeof Storage !== "undefined") {
        // Check if exist localstorage 

    } else {
      console.log("No web local storage support");
      return [];
    }
  }

  console.log(document.getElementById("name").innerHTML);
});
