let flash = document.querySelector('#msg-flash');


setTimeout(() => {

    flash.remove()

},3000);



const deleteButtons = document.querySelectorAll('.delete');

deleteButtons.forEach(button => {
    button.addEventListener('click', function(event) {
        if (!confirm("Voulez-vous supprimer ce post ?")) {
            event.preventDefault();
        }
    })
})
