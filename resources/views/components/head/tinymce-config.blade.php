<div>
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#myeditorinstance',
            plugins: 'code table lists image pagebreak save link preview autosave searchreplace',
            toolbar: 'restoredraft searchreplace | undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
            height: 500,
            statusbar: false,
            autosave_interval: '10s',
            autosave_restore_when_empty: true,
            mobile: {
                menubar: true,
                plugins: 'autosave lists autolink',
                toolbar: 'undo bold italic styles'
            }
        });
    </script>
</div>
