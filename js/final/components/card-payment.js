/* ============================
New card payment 
============================= */
document.addEventListener("DOMContentLoaded", function () {
    const name = document.getElementById('name');
    const cardnumber = document.getElementById('cardnumber');
    const expirationdate = document.getElementById('expirationdate');
    const securitycode = document.getElementById('securitycode');

    // Format card number with spaces
    cardnumber.addEventListener('input', function (e) {
        let value = e.target.value.replace(/\D/g, ''); // Remove non-numeric characters
        value = value.slice(0, 16); // Limit to 16 digits
        value = value.replace(/(\d{4})(?=\d)/g, '$1 '); // Add spaces every 4 digits
        e.target.value = value;
        document.getElementById('svgnumber').textContent = value || '0123 4567 8910 1112'; // Update SVG
    });

    // Format expiration date
    expirationdate.addEventListener('input', function () {
        let formattedDate = expirationdate.value.replace(/\D/g, ''); // Remove non-numeric characters
        if (formattedDate.length >= 3) {
            formattedDate = formattedDate.slice(0, 2) + '/' + formattedDate.slice(2, 4); // Format as MM/YY
        }
        expirationdate.value = formattedDate;
        document.getElementById('svgexpire').textContent = formattedDate || 'MM/YY'; // Update SVG
    });

    // Limit security code to 4 digits 
    securitycode.addEventListener('input', function (e) {
        let value = e.target.value.replace(/\D/g, ''); // Remove non-numeric characters
        value = value.slice(0, 4); // Limit to 4 digits
        e.target.value = value; // Update the input field and NOT the SVG
    });

    // Function to update SVG text content
    const updateSVGText = function (inputElement, svgElementId, defaultValue) {
        inputElement.addEventListener('input', function () {
            document.getElementById(svgElementId).textContent = inputElement.value || defaultValue;
        });
    };

    // Update SVG text for cardholder name, card number, and expiration date
    updateSVGText(name, 'svgname', 'JOHN DOE');
    updateSVGText(cardnumber, 'svgnumber', '0123 4567 8910 1112');
    updateSVGText(expirationdate, 'svgexpire', 'MM/YY');
});
