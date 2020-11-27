/** group.js */
ini();

function ini() {
  //events
  $(document).ready(function () {
    $.ajax({
      type: "POST",
      url: "php/GroupIni.php",
      data: {},
      success: success,
      dataType: 'json'
    });
  });
}

/**
 * Success query
 * @param {JSON} result 
 */
function success(result) {
  console.log(JSON.stringify(result));

  //click event definition
  document.getElementById('create_grop_btn').addEventListener('click', createGroup);
}


/** Click events */
function createGroup() {
  let contentElement = document.getElementById('content_body');
  let headerElement = document.getElementById('content_header_text');
  let nameElement = document.getElementById('groupe_name');
  let dateElement = document.getElementById('groupe_event');
  let name = nameElement.value;
  let date = dateElement.value;

  $.ajax({
    type: "POST",
    url: "php/InsertGroup.php",
    data: { name: name, date: date },
    success: function (result) {
      console.log(JSON.stringify(result));

      contentElement.innerHTML = '';
      headerElement.innerHTML = name;
      alert(result);
    },
    dataType: 'html'
  });
}

function joinClick() {

}