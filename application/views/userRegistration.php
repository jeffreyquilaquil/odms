 <div class="card users">
    <div class="card-header">
        User Registration
    </div>
    <div class="card-body">
        <?= form_open_multipart('staff/user_save'); ?>
            <table class="table">
                <tr>
                    <td class="td">
                        <label for="lname">Lastname*</label>
                        <input type="text" name="lname" id="" class="form-control input" value="<?= (isset($lastname) ? $lastname : '') ?>" required>
                    </td>
                    <td class="td">
                        <label for="fname">Firstname*</label>
                        <input type="text" name="fname" id="" class="form-control input" value="<?= (isset($firstname) ? $firstname : '') ?>" required>
                    </td>
                    <td class="td" style="width:80px;">
                      <label for="MI">M.I.</label>
                      <input type="text" name="mi" class="form-control" maxlength="1" value="<?= (isset($middlename) ? $middlename : '') ?>" required>
                    </td>
                    <td class="td">
                      <label for="uname">Username*</label>
                      <i><span id="warn-error" style="color:red;"><?= (isset($error['username']) ? $error['username'] : '') ?></span></i>
                      <input type="text" name="uname" id="txt_uname" class="form-control input" value="<?= (isset($username) ? $username : '') ?>"  required>
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
                      <i><span style="color:red;"><?= (isset($error['signature']) ? $error['signature'] : '' ) ?></span></i>
                      <input type="file" class="form-control" id="signature" name="signature" value="" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                    <label for="">User Access</label>
                    <i><span style="color:red"><?= (isset($error['check_access']) ? $error['check_access'] : '') ?></span></i>
                    <div class="card">
                        <table>
                        <?php
                            echo "<tr>";
                            $counter = 0;
                            foreach($permission AS $key => $value){
                                $checked = (isset($check_access) && in_array($value, $check_access) ? 'checked' : '');
                                echo '<td>
                                    <input type="checkbox" class="chkbox" value="'.$value.'" name="permission[]" '.$checked.'>'.ucfirst($value).'
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
                        <button type="submit" class="btn btn-save pull-right" onclick="submitForm()">Save</button>
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
