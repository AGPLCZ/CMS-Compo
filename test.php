
<div contenteditable="true" class="editable-element" data-id="1">Edituj mě!</div>
<div contenteditable="true" class="editable-element" data-id="2">Edituj mě!</div>


<script>
  document.querySelectorAll('.editable-element').forEach(element => {
  element.addEventListener('blur', function() {
    var id = this.getAttribute('data-id');
    var column = this.getAttribute('data-column');
    var value = this.innerText;

    fetch('update.php', { // Upravte URL podle vaší potřeby
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: 'id=' + id + '&column=' + column  + '&value=' + encodeURIComponent(value)
    })
    .then(response => response.json())
    .then(data => {
      console.log('Success:', data);
    })
    .catch((error) => {
      console.error('Error:', error);
    });
  });
});
</script>
