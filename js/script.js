document.getElementById('payButton').addEventListener('click', function () {
    const price = this.getAttribute('data-price');

    fetch('api.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `amount=${price}`
    })
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                alert('Terjadi kesalahan: ' + data.error);
            } else {
                window.location.href = data.payment_url; // URL QRIS
            }
        })
        .catch(error => {
            alert('Terjadi kesalahan: ' + error.message);
        });
});