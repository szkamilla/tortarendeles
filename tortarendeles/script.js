document.getElementById('cake-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const data = new FormData(this);

    fetch('order.php', {
        method: 'POST',
        body: data
    }).then(res => res.text())
      .then(msg => alert(msg));
});
