//LOGIN


document.getElementById('login-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    const data = {
        email: email,
        password: password,
    };

    // Send POST request to the backend
    fetch('http://localhost:8000/com/icemalta/kahuna/api/Endpoints/login.php', {
        method: 'POST',
        headers: {
            "Content-Type": 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        if (data.message === 'User Logged-In') {
            // Redirect to the Home Page
            window.location.href = '../index.html';
        } else {
            // Show error message
            console.log(data);
            document.getElementById('error').innerText = data.message;
            document.getElementById('error').style.display = 'block';
        }
    })
    .catch(error => {
        console.error('Login Attempt Failed', error);
    });
});