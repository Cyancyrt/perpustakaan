<script type="text/javascript">
    $("#image").click(function(e) {
        $("#imageUpload").click();
    });

    function fasterPreview(uploader) {
        if (uploader.files && uploader.files[0]) {
            $('#image').attr('src',
                window.URL.createObjectURL(uploader.files[0]));
        }
    }
    $(document).ready(function() {
        $('#example').DataTable();
    });

    $("#imageUpload").change(function() {
        fasterPreview(this);
    });
</script>
