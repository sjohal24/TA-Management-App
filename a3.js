/*
  This script initializes event listeners on window load. It primarily handles dynamic updates 
  to a dropdown list based on user interactions. The functions include:
  - prepareEventListener: Sets up the event listener for changes in the "ta-list" dropdown.
  - selectTA: Submits the form when a TA is selected.
  - updateDropdown: Fetches and updates the options in the "ta-list" dropdown based on the selected order type.
  - submitForm: Prevents form submission, determines the order type, and triggers dropdown updates.
*/
window.onload = () => {
  prepareEventListener();
};

function prepareEventListener() {
  let checker;
  checker = document.getElementById('ta-list');
  checker.addEventListener('change', selectTA);
}

function selectTA() {
  this.form.submit();
}

function updateDropdown(orderType) {
  let selectElement = document.getElementById('ta-list');

  // Remove existing options
  while (selectElement.firstChild) {
    selectElement.removeChild(selectElement.firstChild);
  }

  // Fetch new options based on the selected order
  fetch('getinfo.php', {
    method: 'POST',
    body: new URLSearchParams({ 'order-type': orderType }),
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded',
    },
  })
    .then((response) => response.text())
    .then((data) => {
      // Append new options to the dropdown
      selectElement.innerHTML = data;
    })
    .catch((error) => console.error('Error updating dropdown:', error));
}

function submitForm(event) {
  event.preventDefault();
  let orderType = document.querySelector(
    'input[name="order-type"]:checked'
  ).value;
  updateDropdown(orderType);
}
