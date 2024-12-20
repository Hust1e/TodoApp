document.addEventListener('DOMContentLoaded', function () {
    fetch('api/test.php')
        .then(response => response.json())
        .then(data => {
            console.log(data);
        })
        .catch(error => console.error(error));
});