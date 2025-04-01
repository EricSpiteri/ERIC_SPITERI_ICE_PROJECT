document.addEventListener("DOMContentLoaded", function () {
document.getElementById('logout').addEventListener('click', function (event) {
    event.preventDefault();

    let data = {};

    
    fetch("http://localhost:8000/com/icemalta/kahuna/api/Endpoints/logout.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(data),
    })
    .then(response => response.json())
    .then(data => {
        if (data.message === "User Successfully Logged-Out") {
            errorBox.innerText = data.message;
            errorBox.style.display = "block";
            
        } else if(data.message === "You Must be Logged In First!") {
            errorBox.innerText = data.message;
            errorBox.style.display = "block";
        } else {console.error("Logout failed: ", data.message)}
        })
            
    .catch(error => {
        console.error("Logout Attempt Failed", error);
});
});
});