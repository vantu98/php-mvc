var rmBtn = document.querySelectorAll(".rmItem");

rmBtn.forEach(function (btn) {
    btn.addEventListener("click", function () {
        console.log(btn.getAttribute("data-sku"))
    })
});
