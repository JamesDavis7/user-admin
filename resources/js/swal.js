// sweet alerts
import Swal from 'sweetalert2';

window.Swal = Swal;

window.addEventListener('created', function (e) {
    Swal.fire({
        title: 'Success',
        text: 'User successfully created!',
        icon: 'success',
        timer: 2000,
        timerProgressBar: true,
        allowOutsideClick: false,
        confirmButtonColor: '#1e3a8a',
    }).then(function () {
        window.location = "/users";
    });
});

window.addEventListener('updated', function (e) {
    Swal.fire({
        title: 'Success',
        text: 'User successfully updated!',
        icon: 'success',
        timer: 2000,
        timerProgressBar: true,
        allowOutsideClick: false,
        confirmButtonColor: '#1e3a8a',
    }).then(function () {
        window.location = "/users";
    });
});

window.addEventListener('deleted', function (e) {
    Swal.fire({
        title: 'Success',
        text: 'User successfully deleted!',
        icon: 'success',
        timer: 2000,
        timerProgressBar: true,
        allowOutsideClick: false,
        confirmButtonColor: '#1e3a8a',
    });
});

window.addEventListener('confirm', function (e) {
    Swal.fire({
        title: 'Are you sure?',
        text: `You won't be able to revert this!`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel',
        cancelButtonColor: '#dc2626',
        allowOutsideClick: false,
        confirmButtonColor: '#1e3a8a',
    }).then((result) => {
        if (result.isConfirmed) {
            window.livewire.emit('delete', e.detail.id)
        } else if (result.isDismissed) {
            Swal.close();
        }
    });
});
