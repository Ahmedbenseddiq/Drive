
//FAQ
const accordionButtons = document.querySelectorAll('[data-te-collapse-init]');    
    accordionButtons.forEach(button => {
    button.addEventListener('click', () => {
        const targetId = button.getAttribute('data-te-target');
        const targetContent = document.querySelector(targetId);
        targetContent.classList.toggle('hidden');
    });
    });

//SWITCH ROLE

function updateRole() {
    const clientLabel = document.querySelector('label[for="client"]');
    const operatorLabel = document.querySelector('label[for="operator"]');
    
    if (document.getElementById('client').checked) {
        clientLabel.style.backgroundColor = 'white';
        clientLabel.style.color = 'black';
        operatorLabel.style.backgroundColor = 'transparent';
        operatorLabel.style.color = 'gray';
    } else {
        clientLabel.style.backgroundColor = 'transparent';
        clientLabel.style.color = 'gray';
        operatorLabel.style.backgroundColor = 'white';
        operatorLabel.style.color = 'black';
    }
}


//NAVBAR
