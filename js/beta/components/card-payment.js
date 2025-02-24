/* ============================
New card payment 
============================= */
document.addEventListener("DOMContentLoaded", function () {
    const generatecard = document.getElementById('generatecard');
    const cardBrand = document.getElementById('card-brand'); 
    const name = document.getElementById('name');
    const cardnumber = document.getElementById('cardnumber');
    const expirationdate = document.getElementById('expirationdate');
    const securitycode = document.getElementById('securitycode');
    
    cardnumber.addEventListener('input', function (e) {
        let value = e.target.value.replace(/\D/g, ''); 
        value = value.slice(0, 16); // Limit to 16 digits
        value = value.replace(/(\d{4})(?=\d)/g, '$1 '); // Add spaces after every 4 digits
        e.target.value = value; 
        document.getElementById('svgnumber').textContent = value || '0123 4567 8910 1112';
    });
    
    // Format card number with spaces 
    const formatCardNumber = function (cardNumber) {
        return cardNumber.replace(/(\d{4})(?=\d)/g, '$1 '); 
    };

    // Format expiration date
    const formatExpirationDate = function () {
        let formattedDate = expirationdate.value.replace(/\D/g, ''); 
        if (formattedDate.length >= 3) {
            formattedDate = formattedDate.slice(0, 2) + '/' + formattedDate.slice(2, 4); 
        }
        expirationdate.value = formattedDate;
        document.getElementById('svgexpire').textContent = formattedDate || 'MM/YY'; 
    };

    // Update SVG text content 
    const updateSVGText = function (inputElement, svgElementId, defaultValue) {
        inputElement.addEventListener('input', function () {
            document.getElementById(svgElementId).textContent = inputElement.value || defaultValue;
        });
    };

    // Format expiration date input
    expirationdate.addEventListener('input', formatExpirationDate);

    // Update SVG text for the inputs
    updateSVGText(name, 'svgname', 'JOHN DOE');
    updateSVGText(cardnumber, 'svgnumber', '0123 4567 8910 1112');
    updateSVGText(securitycode, 'svgsecurity', '985');
});