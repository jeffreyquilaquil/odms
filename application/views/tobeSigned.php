<div class="card">
  <div class="card-header">
    <ul class="nav nav-tabs">
      <a href="<?= $this->config->base_url() ?>documents/sign/0">
        <li class="nav-link <?= ($type == 0 ? 'active' : '') ?>">
          To Be Signed
        </li>
      </a>
      <a href="<?= $this->config->base_url() ?>documents/sign/1">
        <li class="nav-link <?= ($type == 1 ? 'active' : '') ?>">
          Already Signed
        </li>
      </a>
    </ul>
  </div>
  <div class="card-body">
    <div class="tab-content">
      <?php
        $this->textM->renderTable(['ID','filename','action'],'',$row,['view']);
      ?>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.eye',function(){
      window.location = $('#base_url').val()+'document/applySignature/'+$(this).data('row');
    });
  });
</script>
