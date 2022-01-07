// const firstnameMessage = document.getElementById('firstName');

// firstnameMessage.setCustomValidity('Majuscule, minuscule, tiret et accent');

const inputTextarea = document.getElementById('story');
const inputTextarea2 = document.getElementById('hack');
const regx = /^[a-zÀ-ÿA-Z0-9?$@#() '"!,+\-=_:.&€£*%\s]+$/;

inputTextarea.addEventListener('keyup', (e) => {
    console.log(e);
    if (e.key != "") {
        if(e.key.search(regx) === -1) {
            alert ('Ce caractère est interdit');
        }
    }    
})

inputTextarea2.addEventListener('keyup', (e) => {
    if (e.target.value != "") {
        if(e.target.value.search(regx) === -1) {
            alert ('Ce caractère est interdit');
        }
    }    
})