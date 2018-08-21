<div class="card">
    <div class="card-header">
        Change Password
        <span id="error" style="font-weight:bold;color:red;display:none">Passwords must match.</span>
    </div>
    <div class="card-body">
        <form id="frm_change-pass" action="<?= $this->config->base_url() ?>staff/saveNewPass" method="POST">
            <label for="newPass1">New Password</label>
            <input type="password" class="form-control" id="newPass1" name="newPass1">
            <label for="newPass2">Re-type Password</label>
            <input type="password" class="form-control" id="newPass2" name="newPass2">
            <br>
            <input type="button" class="btn btn-info pull-right" value="Submit">
        </form>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        // $('#frm_change-pass').validate({
        //     rules:{
        //         newPass1:{
        //             required:true,
        //             minlength:8,
        //             validPassword:true,
        //         },
        //         newPass2:{
        //             required:true,
        //             equalTo:"#newPass1"
        //         }
        //     }
        // });

        var passPair = false;
        $('#newPass2').on('keyup', function(){
            var pass1 = $('#newPass1').val();
            var pass2 = $('#newPass2').val();

            if(pass1 == pass2){
                passPair = true;
            }else{
                passPair = false;
            }
        })

        $('#frm_change-pass .btn').click(function(){
            if(passPair == true){
                $('#frm_change-pass').submit();
            }else{
                $('#newPass1, #newPass2').css({
                    'border-color':'#bd2130',
                    'box-shadow':'0 0 0 0.2rem rgba(220, 53, 69, 0.5)'
                });
                $('#error').css('display','inline');
            }
        });
    });
</script>