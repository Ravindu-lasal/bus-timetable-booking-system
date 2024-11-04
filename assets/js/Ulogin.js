
if (window.location.search.includes('error'))
    // Display the error message if needed
    window.onload = function() {
        alert('Error: Something went wrong! please try again..');
    };

// Remove the error parameter from the URL
let url = new URL(window.location);
url.searchParams.delete('error');
window.history.replaceState({}, document.title, url);

if (window.location.search.includes('created'))
    // Display the error message if needed
    window.onload = function() {
        alert('Acoount is created! Check your email and login now.');
    };

// Remove the error parameter from the URL
let url1 = new URL(window.location);
url1.searchParams.delete('created');
window.history.replaceState({}, document.title, url1);




// -------------------------other exam

// Function to check for a query parameter and display an alert
// function showAlert(param, message) {


//     if (window.location.search.includes(param)) {
//         alert(message);
//         let url = new URL(window.location);
//         url.searchParams.delete(param);
//         window.history.replaceState({}, document.title, url);
//     }
// }
// window.onload = function() {
//     // Check for 'error' and 'created' parameters
//     showAlert('error', 'Error: Something went wrong! Please try again.');
//     showAlert('created', 'Account is created! Please login now.');
// };
