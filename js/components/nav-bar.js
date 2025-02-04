document.addEventListener("DOMContentLoaded", function() {
    const navItems = document.querySelectorAll('.nav-item');

    navItems.forEach(item => {
        item.addEventListener('click', function(event) {
            // Prevent the default anchor behavior
            event.preventDefault();

            // Remove 'active' class from all nav items
            navItems.forEach(item => item.classList.remove('active'));

            // Add 'active' class to the clicked item
            this.classList.add('active');
        });
    });
});
