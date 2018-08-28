<?php
    $th = ['ID', 'username','lastname','firstname','middlename','indexname','office','designation','action'];
?>

<div class="card users">
    <div class="card-header" style="height:53px">
        <ul class="nav nav-tabs">
            <li class="nav-link <?= ($type == 1 ? 'active' : '') ?>">
                <a href="<?= $this->config->base_url() ?>staff/users/1">Active</a>
            </li>
            <li class="nav-link <?= ($type == 0 ? 'active' : '') ?>">
                <a href="<?= $this->config->base_url() ?>staff/users/0">Inactive</a>
            </li>
        </ul>
        <ul class="nav nav-tabs create-tab" style="top:7px;">
            <li class="nav-link active">
                <a href="<?= $this->config->base_url().'staff/userRegister/'?>">Create</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content">
            <?php
                $this->textM->renderTable(['ID','name','action'],'',$results,['edit']);
            ?>
        </div>
    </div>
</div>
<br>

<style>
    .card-header{
        padding-top:6px;
        padding-bottom:0px;
    }
    .card-header li{
        padding:10px 6px 10px 6px;
        cursor:pointer;
    }
    .card-header li.active{
        border:0.5px solid #79797945;
        border-bottom:none;
        border-top-right-radius:5px;
        border-top-left-radius:5px;
    }
</style>

<script type="text/javascript">
    $(document).on('click','.nav li', function(){
        $('.nav li').removeClass('active');
        $('.card-body > div').css('display','none');

        $(this).addClass('active');
        var id = $(this).attr('id');
        $('.card-body > .div-'+id).css('display','block');
    })

    $(document).on('click','.edit', function(){
        window.location = $('#base_url').val()+'staff/user_edit/'+$(this).data('row');
    })
</script>
