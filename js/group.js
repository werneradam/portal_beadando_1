/** group.js */
ini();

function ini() {
  //events
  $(document).ready(function () {
    $.ajax({
      type: "POST",
      url: "php/GroupIni.php",
      data: {},
      success: function (result) {
        console.log(JSON.stringify(result));

      },
      dataType: 'json'
    });
  });
}

/**
 * Success query
 * @param {JSON} result 
 */
function success(result) {

}


/** Click events */
function joinClick() {

}