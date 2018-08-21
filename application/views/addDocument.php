<div class="card">
    <div class="card-header">
        <i class="fa fa-file" aria-hidden="true"></i>
        New Document
    </div>
    <div class="card-body">
        <table class="table">
            <tr>
                <td>
                    <label for="file">Select PDF File</label>
                    <input type="file" name="file" class="form-control" placeholder="file">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="users">Select Signatories</label>
                    <?= $this->textM->autocomplete($id, $names); ?>
                </td>
            </tr>
        </table>
    </div>
</div>

<script type="text/javascript" src="<?= $this->config->base_url() ?>js/notify.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
      
        $("input:file").change(function(){
            var file = $(this).val();
            var fileType = file.substr( file.lastIndexOf('.')).toLowerCase();
            if(fileType != '.pdf'){
                $.notify('Please only attach PDF Files', 'warn');
                $(this).val('');
            }
        })

        var user_list = '<?= $names; ?>';
        console.log(user_list);
        $( function() {
    var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
    $( "#signatories" ).autocomplete({
      source: availableTags
    });
  } );
    });


</script>
