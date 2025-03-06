//Add Product


document.getElementById('add_Product').addEventListener('submit', function(event) {
    event.preventDefault();

    const serial_Number = document.getElementById('serial_Number').value;
    const product_Name = document.getElementById('product_Name').value;
    const price = document.getElementById('price').value;
    const warranty = document.getElementById('warranty').value;

    const data = {
        serial_Number: serial_Number,
        product_Name: product_Name,
        price : price,
        warranty : warranty,
    };

    // Send POST request to the backend
    fetch('http://localhost:8000/com/icemalta/kahuna/api/Endpoints/admin.php', {
        method: 'POST',
        headers: {
            "Content-Type": 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        if (data.message === 'Administrator Registered Product') {
            // Redirect back
            window.location.href = '../HTML/add_Product(Admin).html';
        } else {
            // Show error message
            document.getElementById('error-message').textContent = data.message;
            document.getElementById('error-message').style.display = 'block';
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});