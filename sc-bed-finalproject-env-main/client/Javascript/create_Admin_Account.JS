//Register Account


document.getElementById('create_Admin_Account').addEventListener('submit', function(event) {
    event.preventDefault();

    const admin_Account_Name = document.getElementById('admin_Account_Name').value;
    const admin_Account_Surname = document.getElementById('admin_Account_Surname').value;
    const admin_Account_Password = document.getElementById('admin_Account_Password').value;
    const admin_Account_Email = document.getElementById('admin_Account_Email').value;

    const data = {
      admin_Account_Name : admin_Account_Name,
      admin_Account_Surname: admin_Account_Surname,
      admin_Account_Password : admin_Account_Password,
      admin_Account_Email : admin_Account_Email,
    };

    // Send POST request to the backend
    fetch('http://localhost:8000/com/icemalta/kahuna/api/Endpoints/create_Admin_Account.php', {
        method: 'POST',
        headers: {
            "Content-Type": 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        if (data.message === 'Admin Account Created') {
            // Redirect to the Home Page
            window.location.href = '../index.html';
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