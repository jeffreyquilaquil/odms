<div class="card users">
    <div class="card-header">
        User Registration
    </div>
    <div class="card-body">
        <form id="form" action="<?= $this->config->base_url() ?>staff/userSave" method="POST" name="userRegister">
            <table class="table">
                <tr>
                    <td class="td">
                        <label for="lname">Lastname*</label>
                        <b class="require-error invisible"><i><span style="color:red">Field is required.</span></i></b>
                        <input type="text" name="lname" id="" class="form-control input" >
                    </td>
                    <td class="td">
                        <label for="fname">Firstname*</label>
                        <b class="require-error invisible"><i><span style="color:red">Field is required.</span></i></b>
                        <input type="text" name="fname" id="" class="form-control input" >
                    </td>
                    <td class="td" style="width:80px;">
                      <label for="MI">M.I.</label>
                      <input type="text" name="mi" value="" class="form-control" maxlength="1">
                    </td>
                    <td class="td">
                      <label for="uname">Username*</label>
                      <b><i><span id="warn-error" style="color:red;display:none;">This Username already exist.</span></i></b>
                      <input type="text" name="uname" id="txt_uname" class="form-control input" onkeyup="checkUname()" >
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="office" class="label">Office</label>
                        <select name="office" id="" class="form-control">
                        <?php
                            foreach ($options['office'] as $key => $value) {
                            $selected = (isset($result) && $value['offID'] == $result['office'] ? 'selected' : '');
                                echo '<option value="'.$value['offID'].'" selected="'.$selected.'">'.$value['title'].'</option>';
                            }
                        ?>
                        </select>
                    </td>
                    <td colspan="2">
                        <label for="designation" class="label">Designation</label>
                        <select name="designation" id="" class="form-control">
                        <?php
                            foreach($options['designation'] AS $key => $value){
                                $selected = (isset($result) && $value['desigID'] == $result['designation'] ?'selected' : '');
                                echo '<option value="'.$value['desigID'].'" selected="'.$selected.'">'.$value['title'].'</option>';
                            }
                        ?>
                        </select>
                    </td>
                    <td>
                      <label for="Signature" class="label">Signature</label>
                      <input type="file" class="form-control" id="signature" name="" value="">
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                    <label for="">User Access</label>
                        <input type="hidden" id="accessArr" name="accessArr" value="">
                        <div class="card">
                            <table>
                            <?php
                                echo "<tr>";
                                $counter = 0;
                                foreach($permission AS $key => $value){
                                    echo '<td>
                                        <input type="checkbox" class="chkbox" value="'.$value.'" name="permission" >  '.ucfirst($value).'
                                    </td>';

                                    $counter++;
                                    if($counter == 2){
                                        echo "</tr></tr>";
                                        $counter=0;
                                    }
                                }
                                echo "</tr>";
                            ?>
                            </table>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <button type="button" class="btn btn-save pull-right" onclick="submitForm()">Save</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<style media="screen">
  .invisible{
    display:none !important;
  }
</style>

<script type="text/javascript">
    var uname_arr = <?php echo json_encode($usernames); ?>;
    var validate = document.getElementById('txt_uname');
    var validate_warning = document.getElementById('warn-error');
    // validate_submit = [Required, checkbox, signature, unique]
    var validate_submit = [false, false, false, true];
    var accessArr = [];
    function checkUname(){
        if(uname_arr.includes(validate.value)){
            validate.classList.add('txt-validate-error');
            $('#warn-error').css('display','inline')
            validate_submit[0] = false;
        }else{
            validate.classList.remove('txt-validate-error');
            $('#warn-error').css('display','none');
            validate_submit[0] = true;
        }
    }

    function verifyCheckBox(){
      $('.chkbox:checked').each(function(){
        accessArr.push( $(this).val());
        validate_submit[1] = true;
      });
    }

    function submitForm(){
      checkUname();
      verifyCheckBox();
      var elements = $('.td');
      elements.each(function(){
        var value = $(this).children('.input').val();
        if(value.length == 0){
          validate_submit[2] = false;
          $(this).children('.require-error').removeClass('invisible');
          $(this).children('input').addClass('txt-validate-error');
        }else{
          validate_submit[2] = true;
          $(this).children('.require-error').addClass('invisible');
          $(this).children('input').removeClass('txt-validate-error');
        }

        if(validate_submit[0] == true && validate_submit[1] == true && validate_submit[2] == true){
          $('#accessArr').val( accessArr.join(','));
          // $('#form').submit();
        }
        console.log(validate_submit);
      });
    }
</script>
