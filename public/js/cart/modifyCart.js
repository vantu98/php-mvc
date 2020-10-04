var rmBtn = document.querySelectorAll(".rmItem");

console.log(rmBtn);

rmBtn.forEach(function (btn) {
    btn.addEventListener("click", function () {
        console.log(btn.getAttribute("data-sku"))
    })
});

function removeAllItem() {
    localStorage.removeItem("cart");
    alert("removed all items");
}
