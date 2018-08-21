<?php
    if(!isset($this->user->index))  $this->user->index = '';
?>
<form action="<?= $this->config->base_url() ?>staff/saveProfile">
    <div class="card">
        <div class="card-header">
            My Profile
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <td>
                        <label for="firstname" class="form-check-label">Firstname</label><br>
                        <input type="text" class="form-control" value="<?= $this->user->firstname?>" required="required">
                    </td>
                    <td>
                        <label for="lastname" class="form-check-label">Lastname</label><br>
                        <input type="text" class="form-control" value="<?= $this->user->lastname ?>" required="required">
                    </td>
                    <td>
                        <label for="middlename" class="form-check-label">Middlename</label><br>
                        <input type="text" class="form-control" value="<?= $this->user->middlename ?>" requried="required">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="index" class="form-check-label">Name Index</label><br>
                        <input type="text" class="form-control" value="<?= $this->user->index ?>">
                    </td>
                    <td>
                        <label for="designation" class="form-check-label">Designation</label><br>
                        <input type="text" class="form-control" value="<?= $this->user->designation ?>" disabled="disabled">
                    </td>
                    <td>
                        <label for="office" class="form-check-label">Office</label><br>
                        <input type="text" class="form-control" value="<?= $this->user->office ?>" disabled="disabled">
                    </td>
                </tr>
            </table>
            <div class="pull-right">
                <a href="<?= $this->config->base_url() ?>staff/changepass">
                    <input type="button" class="btn btn-info" value="Change Pass">
                </a>
                <input type="submit" class="btn btn-info" value="Save">
            </div>
        </div>
    </div>
</form>

<style type="text/css">
    a:hover{
        text-decoration:none;
    }
</style>
