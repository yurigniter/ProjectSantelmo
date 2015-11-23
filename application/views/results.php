<html>
    <?php if(empty($contacts)){
        echo '<div class="alert alert-danger" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"> No Results!</span>
        </div>';
    }
    else { 
        $prevBrgy = 'none'; ?>
        <table class="table table-striped table-bordered">  
            <tr><td>
            <strong>Barangay Name</strong>
            </td><td>
            <strong>Contact Number</strong>
            <?php foreach($contacts as $key => $row){
                if ($prevBrgy != $row["brgy_name"]) {
                    $prevBrgy = $row["brgy_name"]; ?>
                    </td></tr><tr><td><?php echo $row["brgy_name"]; ?></td>
                    <td><?php echo $row["contact"]; ?>
                <?php
                } else{ ?>
                    <?php echo "<br>".$row["contact"]; ?>
                <?php } } ?>  
        </table>
    <?php } ?>
</html>