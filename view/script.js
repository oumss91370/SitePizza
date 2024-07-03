/*document.querySelectorAll('.nav-button').forEach(button => {
    button.addEventListener('click', () => {
        button.style.backgroundColor = '#00ff00';
    });
});



document.addEventListener('DOMContentLoaded', () => {
    const dropdownBtn = document.querySelector('.dropbtn');
    const dropdownContent = document.querySelector('#dropdown-content');

    dropdownBtn.addEventListener('click', () => {
        if (dropdownContent.style.display === 'block') {
            dropdownContent.style.display = 'none';
        } else {
            dropdownContent.style.display = 'block';
        }
    });

    // Hide the dropdown list when clicking outside of it
    document.addEventListener('click', (event) => {
        if (!event.target.matches('.dropbtn')) {
            if (dropdownContent.style.display === 'block') {
                dropdownContent.style.display = 'none';
            }
        }
    });
});*/