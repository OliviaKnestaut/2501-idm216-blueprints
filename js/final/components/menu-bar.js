let activeLight = null;
let activeContainer = null;

document.addEventListener("DOMContentLoaded", function () {
    // Get the current category from the URL
    const urlParams = new URLSearchParams(window.location.search);
    const selectedCategory = urlParams.get('category') || 'Entree'; // Default to 'Entree'

    // Find the lantern-container that corresponds to the selected category
    const selectedLantern = document.querySelector(`.lantern-category.${selectedCategory.toLowerCase()} .lantern-container`);
    
    if (selectedLantern) {
        toggleLight(selectedLantern);
    }
});

function toggleLight(container) {
    // Prevent multiple activations on the same lantern
    if (activeContainer === container) return;

    // Reset text color of previously active lantern
    if (activeContainer) {
        let prevText = activeContainer.querySelector('.lantern-text');
        if (prevText) {
            prevText.style.color = 'white';
        }
    }

    // Remove the previous light, if any
    if (activeLight) {
        activeLight.remove();
        activeLight = null;
    }

    // Create and show the light on selected lantern
    let light = document.createElement("img");
    light.src = "../images/menu-bar/light.svg";
    light.classList.add("light");
    container.appendChild(light);

    requestAnimationFrame(() => light.classList.add("show"));

    // Change text color of selected lantern
    let text = container.querySelector('.lantern-text');
    if (text) {
        text.style.color = '#7A2618';
    }

    // Update active lantern states
    activeLight = light;
    activeContainer = container;

    // Get the category name (e.g., 'Entree', 'Sides', etc.)
    let category = text ? text.innerText : 'Entree';

    // Check if the category in the URL is already set to the selected category
    const urlParams = new URLSearchParams(window.location.search);
    const currentCategory = urlParams.get('category');

    if (currentCategory !== category) {
        // Update the URL with the new category
        urlParams.set('category', category);
        window.history.pushState({}, '', `${window.location.pathname}?${urlParams}`);
        
        // Trigger page reload after URL update if it's a new category
        window.location.reload();
    }
}
