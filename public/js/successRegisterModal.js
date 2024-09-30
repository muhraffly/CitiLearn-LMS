document.addEventListener('DOMContentLoaded', function() {
    if (document.getElementById('success-message').value) {
        var modal = new bootstrap.Modal(document.getElementById('successRegisterModal'));
        modal.show();
    }
});