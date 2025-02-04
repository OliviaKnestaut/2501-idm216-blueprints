let activeLight = null;
let activeContainer = null;

function toggleLight(container) {
    if (activeContainer === container) return;

    // Reset  text color of previously active lantern
    if (activeContainer) {
        let prevText = activeContainer.querySelector('.lantern-text');
        if (prevText) {
            prevText.style.color = 'white'; 
        }
    }

    // Create and show the light on selected lantern
    if (activeLight) {
        activeLight.remove();
        activeLight = null;
    }

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

    activeLight = light;
    activeContainer = container;
}
