$(document).ready(function () {
  $("#submit").click(function () {
    var form_data = new FormData();

    // Read selected files
    var totalfiles = document.getElementById("files").files.length;
    for (var index = 0; index < totalfiles; index++) {
      form_data.append(
        "files[]",
        document.getElementById("files").files[index]
      );
    }

    // AJAX request
    $.ajax({
      url: "http://localhost/php_2/php-mvc/admin/galleries/postUpload",
      type: "post",
      data: form_data,
      dataType: "json",
      contentType: false,
      processData: false,
      success: function (response) {
        for (var index = 0; index < response.length; index++) {
          var src = response[index];

          // Add img element in <div id='preview'>
          $("#galleries").append('<img src="' + src + '" alt="">');

          console.log(src);
        }
        console.log(response);
      },
    });
  });
});
