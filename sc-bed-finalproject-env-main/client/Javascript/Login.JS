document.addEventListener("DOMContentLoaded", function () {
    document.getElementById('login-form').addEventListener('submit', function (event) {
        event.preventDefault();

        const emailInput = document.getElementById("email");
        const passwordInput = document.getElementById("password");
        const errorBox = document.getElementById("error");

        if (!emailInput || !passwordInput || !errorBox) {
            console.error("Missing form elements in DOM");
            return;
        }

        const email = emailInput.value.trim();
        const password = passwordInput.value.trim();

        if (email === "" || password === "") {
            errorBox.innerText = "Please enter both email and password.";
            errorBox.style.display = "block";
            return;
        }

        const data = { email, password };

        fetch("http://localhost:8000/com/icemalta/kahuna/api/Endpoints/login.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(data),
        })
        .then(response => response.json())
        .then(data => {
            errorBox.style.display = "none"; // Hide error initially

            if (data.message === "User Logged-In") {
                errorBox.innerText = data.message;
                errorBox.style.display = "block";
                
            } else if (data.message === "Admin Logged-In") {
                window.location.href = "../HTML/add_Product(Admin).html"; // Redirect admin
            } else {
                errorBox.innerText = data.message;
                errorBox.style.display = "block";
            }
        })
        .catch(error => {
            console.error("Login Attempt Failed", error);
            errorBox.innerText = "An error occurred. Please try again later.";
            errorBox.style.display = "block";
        });
    });
});

