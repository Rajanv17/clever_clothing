<script>
    $(document).ready(function() {
        $(document).on('click', '#toggle', function(event) {
            event.preventDefault();
            if ($('#password').attr('type') == 'text') {
                $('#password').prop("type", "password");
                $("#toggle").removeClass("fa-eye");
                $("#toggle").addClass("fa-eye-slash");

            } else{
                $('#password').prop("type", "text");
                $("#toggle").removeClass("fa-eye-slash");
                $("#toggle").addClass("fa-eye");

            }
        });
        /*Form Event Starts*/
        $('form.loginFrm').submit(function(e){
            e.preventDefault();
            var form_data = new FormData(this);
            $('#loading').show();
            $.ajax({
                url : "include/process.php",
                method : "POST",
                data : form_data,
                contentType : false,
                processData : false,
                dataType : "json",
                success : function(response) {
                    $('#loading').hide();
                    if (response.code == 100)
                    {
                        var newData = {"icon" : "error", "msg" : response.msg, "title" : "Error!"};
                        alertMessage(newData);
                    }
                    else if (response.code == 200)
                    {
                        window.location.href = response.ridirect_page;
                    }
                }
            });
        });
    });
</script>