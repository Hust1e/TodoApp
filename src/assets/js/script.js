document.addEventListener('DOMContentLoaded', function () {
    fetch('api/test.php')
        .then(response => response.json())
        .then(data => {
            const accontInfo = document.querySelector('.account-info');
            const accountName = document.createElement('div');
            accountName.className = 'account-name';
            accountName.innerText = data.name;
            accontInfo.appendChild(accountName);
            console.log(data);
        })
        .catch(error => console.error(error));
});

