document.addEventListener('DOMContentLoaded', function () {
    var enrollModal = document.getElementById('enrollModal');
    var confirmButton = document.getElementById('confirmEnrollButton');

    enrollModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var courseCode = button.getAttribute('data-course-code'); 
        var form = button.closest('.btn-enroll-form');

        confirmButton.onclick = function () {
            if (form) {
                form.submit();
            }
        };
    });
});
