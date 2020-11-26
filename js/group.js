/** group.js */
ini();

function ini() {
  //events
  $(document).ready(function () {
    $.ajax({
      type: "POST",
      url: "./php/Router.php",
      data: { 'CallClass': module },
      success: function (result) {
        console.log(JSON.stringify(result));
      },
      dataType: 'json'
    });
  });
}