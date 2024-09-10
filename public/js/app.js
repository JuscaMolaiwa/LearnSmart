document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');

    if (loginForm) {
        loginForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            // Implement AJAX login logic
            console.log(`Email: ${email}, Password: ${password}`);
        });
    }

    if (document.getElementById('contentArea')) {
        // Fetch user content dynamically
        fetch('/api/get_content.php?user_id=1&classification_type=visual')
            .then(response => response.json())
            .then(data => {
                const contentArea = document.getElementById('contentArea');
                contentArea.innerHTML = ''; // Clear previous content

                data.forEach(content => {
                    const contentDiv = document.createElement('div');
                    contentDiv.className = 'content-item';
                    contentDiv.innerHTML = `<h3>${content.title}</h3><p>${content.description}</p>`;
                    contentArea.appendChild(contentDiv);
                });
            })
            .catch(error => console.error('Error fetching content:', error));
    }
});
