$(document).ready(function() {
    $('#btn-logout').on('click', function() {
        $('#logout-form').submit();
    });

    let stop = true;
    $('.btn-delete').on('click', function(e) {
        if (stop) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then((result) => {
                if (result.value) {
                    stop = false;
                    this.click();
                }
            })
        } else {
            stop = true;
        }
    });
    $('.change-password').on('click', function(e) {
        var index = $('#change-password').val();
        $('#change-password').val(-index);
    });
});
