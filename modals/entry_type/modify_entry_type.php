<?php
require_once '../../config/config.php';
require_once '../../config/parameters.php';
require_once '../../models/entry_type.php';

$entry_type = new Entry_type();

$id = isset($_GET['dataid'])? $_GET['dataid']:NULL;

if($id == NULL) {
echo ("<script>location.href = '".base_url."entry_types-tables';</script>"); 
}

$entry_type->setId($id);
$type = $entry_type->getOne();
?>

<form action="<?=base_url?>entry_types-modify" method="POST">
<div class="d-flex justify-content-center">Modify existing Entry Type.</div> 
    <div class="container-fluid">                                  
        <form > <!-- class="user"-->
            <div class="form-group row ml-4 mr-4 pb-4">
                    <label for="entryTypeName">Entry Type Name:</label>
                    <input type="text" class="form-control form-control-user" name="entryTypeName" value="<?=$type->entryname?>">
            </div>

            <?php $log = $type->entryname; ?>
            <input type="hidden" value="<?=$log?>" name="log" />
            <input type="hidden" value="<?=$id?>" name="id" />
            <input type="submit" value="Modify" class="btn btn-primary" />       
    </div>
</form>

