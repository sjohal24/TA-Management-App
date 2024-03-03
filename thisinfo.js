// Get the element with the ID "home"
const goHomeID = document.getElementById('home');

// Attach an event listener to the "change" event of the element
goHomeID.addEventListener('change', () => {
  // Submit the form associated with the current element when a change occurs
  this.form.submit();
});
