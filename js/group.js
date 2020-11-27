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
}

/** Frame */
function loadGroup(data) {
  let headerElement = document.getElementById('content_header_text');
  headerElement.innerHTML = data.group_name;

  let diffTime = new Date(data.event_date) - new Date();
  const expired = diffTime < 0;
  diffTime = Math.abs(diffTime);
  const remainingDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

  let result = `
      <div class="col-md-5 members-shell">
        <h4>Résztvevők</h4>
        <ul class="members">
          <li>Fh1</li>
        </ul>
      </div>
      <div class="col-md-7 other-data">
        <div class="col-12 drawn-person-shell">
          ${drawnPerson()}
        </div>
        <div class="col-12 remaining-days-shell">
          ${remainingDaysText()}
          ${drawBtn()}
          ${leftORemove()}
        </div>
      </div>`;

  function remainingDaysText() {
    let daysText = 'Hátralévő idő:';
    if (expired) {
      daysText = 'Már ennyi ideje lajárt:';
    }

    if (data.is_draw == '0')
      return `
      <label for="remaining_days">${daysText}</label>
      <span id="remaining_days">${remainingDays}</span><span> nap</span>`;

    return '';
  }

  function drawnPerson() {
    if (data.is_draw == '1')
      return `<label for="drawn_person">Kihúzott személy:</label>
              <span id="drawn_person">${data.drawn_person_name}</span>`;

    return '';
  }

  function drawBtn() {
    if (data.is_creator == '1' && data.is_draw == '0')
      return '<br><button id="draw">Húzás</button>';

    return '';
  }

  function leftORemove() {
    if (data.is_creator == '1')
      return '<br><button id="remove">Csoport törlése</button>';

    return '<br><button id="left">Csoport elhagyása</button>';
  }

  document.getElementById('content_body').innerHTML = result;

  //events
  if (data.is_creator == '1' && data.is_draw == '0') {
    document.getElementById('draw').addEventListener('click', function () {
      let groupId = data.group_id;
      $.ajax({
        type: "POST",
        url: "php/Draw.php",
        data: { group_id: groupId },
        success: function (result) {
          console.log(JSON.stringify(result));

          location.reload();
        },
        dataType: 'html'
      });
    });
  }

  if (data.is_creator == '1' && data.is_draw == '0') {

  } else {

  }
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
      data: { group_id: groupId },
      success: function (result) {
        console.log(JSON.stringify(result));

        location.reload();
      },
      dataType: 'json'
    });
  });

  //click event definition
  document.getElementById('create_grop_btn').addEventListener('click', createGroup);
}

/** Click events */
function createGroup() {
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

      location.reload();
    },
    dataType: 'html'
  });
}

function joinClick() {

}