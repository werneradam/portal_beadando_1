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

  switch (result.type) {
    case 'item':
      loadGroup(result.data);
      break;
    case 'list':
      loadGroupList(result.data);
      break;
  }

  //click event definition
  document.getElementById('create_grop_btn').addEventListener('click', createGroup);
}

/** Frame */
function loadGroup(data) {
  let result = `
      <div class="col-12 create-goup">
        <div class="col-3">
          <input id="groupe_event" type="date">
        </div>
        <div class="col-6">
          <input id="groupe_name" type="text">
        </div>
        <div class="col-3">
          <button id="create_grop_btn">Csoport létrehozása</button>
        </div>
      </div>`;

  document.getElementById('content_body').innerHTML = result;
}

function loadGroupList(data) {
  let result = `
  <div class="col-12 create-goup">
    <div class="col-3">
      <input id="groupe_event" type="date">
    </div>
    <div class="col-6">
      <input id="groupe_name" type="text">
    </div>
    <div class="col-3">
      <button id="create_grop_btn">Csoport létrehozása</button>
    </div>
  </div>`;

  for (const group of data) {
    result += `
      <div class="col-12 card-shell">
        <div class="list-card">
          <div class="col-3 group-event-date">${group.event_date}</div>
          <div class="col-6 group-name">${group.group_name}</div>
          <div class="col-3 group-join-btn">
            <button class="join-btn" group-id="${group.group_id}">Csatlakozás</button>
          </div>
        </div>
      </div>`;
  }

  document.getElementById('content_body').innerHTML = result;

  $('.join-btn').click(function () {
    let groupId = $(this).attr('group-id');

    $.ajax({
      type: "POST",
      url: "php/JoinToGroup.php",
      data: { group_id: groupId},
      success: function (result) {
        console.log(JSON.stringify(result));

        alert();
      },
      dataType: 'json'
    });
  });
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