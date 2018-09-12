function deleteSlide() {
    event.preventDefault(); // prevent form submit
    var form = $('.delete-form');
    swal({
        title: 'êtes-vous sur de vouloir effectuer cette action ?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        confirmButtonText: 'Oui!',
        cancelButtonText: 'Annuler',
        buttonsStyling: false
    }).then(function() {
        form.submit();
        swal({
            title: 'Action effectuée!',
            type: 'success',
            confirmButtonClass: "btn btn-success",
            buttonsStyling: false
        })
    })
}

$('#checkall').change(function () {
    if(this.checked){
        $('.checkboxToSelect').prop('checked', true);
    }
    else{
        $('.checkboxToSelect').prop('checked', false);
    }
});