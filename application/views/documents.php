<div class="card">
    <div class="card-header">
      <ul class="nav nav-tabs">
        <a href="<?= $this->config->base_url() ?>document/MyDocuments/1">
          <li class="nav-link <?= ($type == 1 ? 'active' : '') ?>">
            Active
          </li>
        </a>
        <a href="<?= $this->config->base_url() ?>document/MyDocuments/0">
          <li class="nav-link <?= ($type == 0 ? 'active' : '') ?>">
            Inactive
          </li>
        </a>
      </ul>
      <ul class="nav nav-tabs create-tab" style="top:12px;">
        <a href="<?= $this->config->base_url() ?>document/documentCreate">
          <li class="nav-link active">
            Create
          </li>
        </a>
      </ul>
    </div>
    <div class="card-body">
      <div class="tab-content">
        <?php
          $status = ($type == 1 ? 'disable' : 'enable');
          $this->textM->renderTable(['ID','filename','action'],'',$row,['edit',$status]);
        ?>
      </div>
    </div>
</div>

<script type="text/javascript">

  $(document).ready(function(){
    $('.header-action').css('width','200px');
  })
</script>
