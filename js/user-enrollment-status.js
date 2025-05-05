document.addEventListener('DOMContentLoaded', function() {
    const status = document.getElementById('status-text');

    if (!status) {
        console.log('Status element not found');
    }
    const statusText = status.textContent.trim().toUpperCase();
    console.log(statusText);

    if (statusText === "DENIED") {
        status.style.color = 'red';
    }
    else if (statusText === "ENROLLED") {
        status.style.color = 'green';
    }
    else {
        console.log('Status is neither DENIED nor ENROLLED');
    }

});