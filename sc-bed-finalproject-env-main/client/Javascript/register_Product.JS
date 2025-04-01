document.getElementById('product_Registration').addEventListener('submit', function(event) {
    event.preventDefault();

    const product_Name = document.getElementById("product_Name").value;
    const purchase_Date = document.getElementById("purchase_Date").value;

    const data = {
        product_Name: product_Name,
        purchase_Date: purchase_Date,
    };

    // Send POST request to the backend
    fetch('http://localhost:8000/com/icemalta/kahuna/api/Endpoints/register_Product.php', {
        method: 'POST',
        headers: {
            "Content-Type": 'application/json'
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.message === 'Product Successfully Registered') {
            document.getElementById("errorBox").style.display = "block";

        }else if(data.message ==='Product Registration Failed'){
            //Display that user entered wrong credentials
            document.getElementById("errorBox").style.display = "block";
        } else if(data.message === "User Not Logged In"){
            //Display that user needs to be logged in
            document.getElementById("errorBox").style.display = "block";
        } else{
            // Show error message
            console.log(data);
            document.getElementById('error').innerText = data.message;
            document.getElementById('error').style.display = 'block';
        }
    })
    .catch(error => {
        console.error('Product Registration Failed', error);
    });
});