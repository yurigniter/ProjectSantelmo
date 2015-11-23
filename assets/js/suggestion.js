
$.post("<?=base_url('controller/suggest')?>",{data: 'str='+inputString},function(data){
            $('table').remove();
            $('#container').html(data);
        });