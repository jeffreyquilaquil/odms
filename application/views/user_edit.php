<?php
extract($row);
?>
<div class="card users">
  <div class="card-header">
    User Modification
  </div>
  <div class="card-body">
    <?= form_open_multipart('staff/user_save'); ?>
    <input type="hidden" name="user_edit" value="yes">
    <table class="table">
      <tr>
        <td class="td">
          <label for="lname">Lastname*</label>

          <input type="text" name="lname" value="<?= $lastname ?>" class="form-control" required>
        </td>
        <td class="td">
          <label for="fname">Firstname*</label>
          <input type="text" name="fname" value="<?= $firstname ?>" class="form-control" required>
        </td>
        <td class="td" style="width:80px">
          <label for="MI">M.I*</label>
          <input type="text" name="mi" value="<?= $middlename ?>" class="form-control" required maxlength="1">
        </td>
        <td class="td">
          <label for="uname">Username</label>
          <input type="text" name="uname" value="<?= $username ?>" class="form-control" disabled>
        </td>
      </tr>
      <tr>
        <td>
          <label for="office" class="label">Office</label>
          <select class="form-control" name="office">
            <?php
              foreach($office_arr AS $value){
                $selected = ($office == $value['offID'] ? 'selected' : '');
                echo '<option value="'.$value['offID'].'" '.$selected.'>'.$value['title'].'</option>';
              }
            ?>
          </select>
        </td>
        <td colspan="2">
          <label for="designation" class="label">Designation</label>
          <select class="form-control" name="designation">
            <?php
              foreach($designation_arr AS $value){
                $selected = ($designation == $value['desigID'] ? 'selected' : '');
                echo '<option value="'.$value['desigID'].'" '.$selected.'>'.$value['title'].'</option>';
              }
            ?>
          </select>
        </td>
        <td>
          <label for="Signature" class="label">Signature</label>
          <input type="file" class="form-control" name="signature" value="">
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <label for="">User Access</label>
          <div class="card">
            <table>
              <?php
                echo "<tr>";
                $counter = 0;
                foreach($access_arr AS $key => $value){
                  $checked = ( in_array($value, $access) ? 'checked' : '');
                  echo '<td>
                    <input type="checkbox" class="chkbox" value="'.$value.'" name="permission[]" '.$checked.'>'.ucfirst($value).'
                  </td>';

                  $counter++;
                  if($counter == 2){
                    echo "</tr><tr>";
                    $counter = 0;
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
          <button type="submit" class="btn btn-save pull-right" name="button"></button>
        </td>
      </tr>
    </table>
  </div>
</div>
