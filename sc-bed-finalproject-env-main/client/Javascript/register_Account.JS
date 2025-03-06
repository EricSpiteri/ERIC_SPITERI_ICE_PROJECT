//Register Account


document.getElementById('register_Account').addEventListener('submit', function(event) {
    event.preventDefault();

    const account_Name = document.getElementById('account_Name').value;
    const account_Surname = document.getElementById('account_Surname').value;
    const country_Code = document.getElementById('country_Code').value;
    const mobile_Number = document.getElementById('mobile_Number').value;
    const account_Email = document.getElementById('account_Email').value;
    const password = document.getElementById('password').value;
    const postcode = document.getElementById('postcode').value;
    const house_Number = document.getElementById('house_Number').value;
    const street = document.getElementById('street').value;
    const locality = document.getElementById('locality').value;

    const data = {
      account_Name : account_Name,
      account_Surname: account_Surname,
      country_Code : country_Code,
      mobile_Number : mobile_Number,
      account_Email : account_Email,
      password : password,
      postcode : postcode,
      house_Number : house_Number,
      street : street,
      locality : locality,
    };

    // Send POST request to the backend
    fetch('http://localhost:8000/com/icemalta/kahuna/api/Endpoints/create_Account.html', {
        method: 'POST',
        headers: {
            "Content-Type": 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        if (data.message === 'User Account Created Successfully') {
            // Redirect to the Home Page
            window.location.href = '../HTML/index.php';
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