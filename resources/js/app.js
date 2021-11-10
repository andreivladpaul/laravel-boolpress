require('./bootstrap');

const deleteForm = document.querySelectorAll('.delete-post');

deleteForm.forEach(item => {
    item.addEventListener('submit', function(e) {
        const resp = confirm('Are you sure you want to delete it?');

        if(!resp) {
            e.preventDefault();
        }
    });


});



    const alertDiv = document.querySelectorAll('.alert');

    if(alertDiv){

        setTimeout(() => {
            alertDiv[0].remove();
        },2000)
    };


