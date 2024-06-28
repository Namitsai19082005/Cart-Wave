// JavaScript for showing login container when login link is clicked
document.addEventListener("DOMContentLoaded", function() {
    const loginLink = document.getElementById('login-link');
    const loginContainer = document.getElementById('login-container');

    loginLink.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default link behavior
        loginContainer.style.display = 'block'; // Show the login container
    });
});