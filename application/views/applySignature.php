<div class="card">
  <div class="card-header">
    Applying Signature
  </div>
  <div class="card-body">

    <iframe src="<?= $this->config->base_url()?>uploads/profiles/<?= $signatoryInfo['username'].'/'.$signatoryInfo['title'] ?>.pdf" width="100%" height="450px"></iframe>
  </div>
</div>
<img src="<?= $this->config->base_url().'uploads/signatures/'.$this->user->username ?>.png" alt="" id="signature">
<script type="text/javascript">

  $(document).mousemove(function(e){
    $('#signature').css({
      left: e.clientX,
      top:  e.clientY
    });

    console.log(e.clientX, e.clientY);
  })
</script>

<style media="screen">
  #signature{
    width: 30px;
    height: 30px;
    position: absolute;
  }

  iframe:hover #signature{

  }
</style>
