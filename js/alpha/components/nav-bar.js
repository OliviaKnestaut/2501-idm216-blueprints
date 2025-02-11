document.addEventListener("DOMContentLoaded", function() {
    const navItems = document.querySelectorAll('.nav-item');

    // Function to set the active item based on the current page
    function setActiveNavItem() {
        const currentPage = window.location.pathname.split('/').pop();

        navItems.forEach((item, index) => {
            const href = item.getAttribute('href');

            if (href === currentPage) {
                item.classList.add('active');
            } else {
                item.classList.remove('active');
            }
        });
    }

    setActiveNavItem();


    navItems.forEach(item => {
        item.addEventListener('click', function(event) {
            // Prevent the default anchor behavior
            event.preventDefault();

            // Remove 'active' class from all nav items
            navItems.forEach(item => item.classList.remove('active'));

            // Add 'active' class to the clicked item
            this.classList.add('active');

            const href = this.getAttribute('href');
            if (href) {
                setTimeout(() => {
                    window.location.href = href;
                }, 300); // Delay redirection to allow transition (300ms)
            }
        });
    });
});
