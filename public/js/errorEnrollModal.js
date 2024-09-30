document.addEventListener('DOMContentLoaded', function() {
    if (document.getElementById('error-message').value) {
        var modal = new bootstrap.Modal(document.getElementById('errorEnrollModal'));
        modal.show();
    }
});