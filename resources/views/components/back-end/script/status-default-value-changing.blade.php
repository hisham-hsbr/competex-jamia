<script>
    // status value changing
    document.getElementById("default").addEventListener("change", function () {
        var statusCheckbox = document.getElementById("status");
        if (this.checked) {
            statusCheckbox.checked = true;
        }
    });
</script>
