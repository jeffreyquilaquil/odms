<input type="hidden" id="setting-type" value="<?= $type ?>">
<?php if($id == 0 && $create == 0){ ?>
    <div class="card settings">
        <div class="card-header">
            <ul class="nav nav-tabs">
                <li class="<?= ($type == 0 ? 'active' : '') ?> nav-link">
                    <a href="<?= $this->config->base_url() ?>staff/settings/0">Offices</a>
                </li>
                <li class="<?= ($type == 1 ? 'active' : '') ?> nav-link">
                    <a href="<?= $this->config->base_url() ?>staff/settings/1">Designations</a>
                </li>
            </ul>

            <ul class="nav nav-tabs create-tab">
              <li class="nav-link active">
                <a href="<?= $this->config->base_url() ?>staff/settings/0/0/1">Create</a>
              </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <?php
                    $this->textM->renderTable(['ID','title','action'],'',$results,['edit']);
                ?>
            </div>
        </div>
    </div>
<?php }else{ ?>
  <div class="card settings">
    <div class="card-header">
      <?= $field?> Field
    </div>
    <div class="card-body">
      <form class="form" action="<?= $this->config->base_url().'staff/settings/'.$type ?>" method="post">
        <input type="hidden" name="type" value="<?= $type ?>">
        <input type="hidden" name="create" value="<?= $create ?>">
        <input type="hidden" name="id" value="<?= ($create==0 ? $results['ID'] : '')?>">
        <input type="text"  name="field" value="<?= ($create==0 ? $results['title'] : '')?>" class="form-control" required>
          <br>
        <input type="submit" name="" value="Submit" class="btn btn-info pull-right">
      </form>
    </div>
  </div>
<?php } ?>
<script type="text/javascript">
  $(document).ready(function(){
    var base_url = $('#base_url').val();
    // Edit function
    $(document).on('click','.edit',function(){
      window.location.href = base_url+'staff/settings/'+$('#setting-type').val()+'/'+$(this).data('row');
    });
  });
</script>
