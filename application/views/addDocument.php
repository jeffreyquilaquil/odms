<div class="card">
    <div class="card-header">
        <i class="fa fa-file" aria-hidden="true"></i>
        New Document
    </div>
    <div class="card-body">
        <table class="table">
            <tr>
                <td colspan="3">
                    <label for="file">Select PDF File</label>
                    <input type="file" name="file" class="form-control" placeholder="file">
                </td>
            </tr>
            <tr>
              <td>Order of Signatures:</td>
              <td>
                <input type="radio" name="order" value="1" checked>Sequential
              </td>
              <td>
                <input type="radio" name="order" value="2">Not Sequential
              </td>
            </tr>
            <tr>
              <td colspan="3">
                <div class="" id="signature_holder">
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="3" style="border-top:none">
                <label for="signatories">Select Signatories</label>
                <?= $this->textM->autoComplete($users); ?>
              </td>
            </tr>
        </table>
    </div>
</div>

<script type="text/javascript">
    // $(document).ready(function(){
    //
    //     $("input:file").change(function(){
    //         var file = $(this).val();
    //         var fileType = file.substr( file.lastIndexOf('.')).toLowerCase();
    //         if(fileType != '.pdf'){
    //             $.notify('Please only attach PDF Files', 'warn');
    //             $(this).val('');
    //         }
    //     })
    // });


</script>
