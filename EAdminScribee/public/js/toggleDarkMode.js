// resources/js/toggleDarkMode.js

document.addEventListener('DOMContentLoaded', function() {
    const toggleButton = document.getElementById('darkLightToggle');
    toggleButton.addEventListener('click', function() {
        const body = document.body;
        body.classList.toggle('dark-mode');
        const navbar = document.querySelector('.navbar');
        navbar.classList.toggle('dark-mode');
        const searchInput = document.querySelector('.search_bar input');
        searchInput.classList.toggle('dark-mode');
        const profileLink = document.querySelector('.profile_link');
        profileLink.classList.toggle('dark-mode');
        const dropdownMenu = document.querySelector('.dropdown-menu');
        dropdownMenu.classList.toggle('dark-mode');

        // Update icon
        const icon = toggleButton.querySelector('i');
        if (body.classList.contains('dark-mode')) {
            icon.classList.remove('fa-moon');
            icon.classList.add('fa-sun');
        } else {
            icon.classList.remove('fa-sun');
            icon.classList.add('fa-moon');
        }

        // Save preference in session
        fetch('/toggle-dark-mode', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                darkMode: body.classList.contains('dark-mode')
            })
        });
    });
});
