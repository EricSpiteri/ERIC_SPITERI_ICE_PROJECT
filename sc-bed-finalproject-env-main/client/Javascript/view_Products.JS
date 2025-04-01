fetch("http://localhost:8000/com/icemalta/kahuna/api/Endpoints/view_Products.php", {
    method: "GET",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(data),
})
.then(response => response.json())
.then(data => {
    if (data.message === "Data Successfully Fetched") {
        errorBox.innerText = data.message;
        errorBox.style.display = "block";
        
    } else if(data.message === "No Registered Products") {
        errorBox.innerText = data.message;
        errorBox.style.display = "block";
    } else {console.error("Logout failed: ", data.message)}
    })
        
.catch(error => {
    console.error("API ERROR", error);
});