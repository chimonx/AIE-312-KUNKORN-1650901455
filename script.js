// Wait for the DOM to load
document.addEventListener('DOMContentLoaded', function() {
    // Get the form element
    const form = document.getElementById('loginForm');

    // Add an event listener for the form submission
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Get the input values
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;

        // Prepare data to send
        const formData = new FormData();
        formData.append('Username', username);
        formData.append('Password', password);

        // Send data to PHP script
        fetch('process.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            // Handle the response from the PHP script
            console.log('Server Response:', data);

            // Display the response on the page (optional)
            const message = document.createElement('p');
            message.textContent = data;
            document.body.appendChild(message);
        })
        .catch(error => console.error('Error:', error));
    });
});
