<html>
<head>
    <link href="<?php echo base_url();?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/assets/css/contacts.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo base_url();?>/assets/js/jquery.js"></script>
    <script>
    $(document).ready(function(){
        $.post("<?=base_url('controller/contactsResult')?>",{},function(data){
            $('.tbl').html(data);
        });
    });

    function showSuggestion(inputString)
    {
        $.post("<?=base_url('controller/suggest')?>",{data: inputString},function(data){
            $('table').remove();
            $('.tbl').html(data);
        });
    }
    </script>
</head>
<body>
    <div class="container">
        <div class="search">
            <div class="input-group">
                <input type="text" class="form-control" onkeyup="showSuggestion(this.value)" placeholder="Search barangay">
                 <span class="input-group-addon glyphicon glyphicon-search"></span>
            </div>
        </div>
        <div class="tbl">
        </div>
    </div>
</div>
</body>
</html>

