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

<form action="<?=base_url?>entry_types-delete" method="POST">
    <div class="container-fluid">   Are you sure you want to delete the existing Entry Type?                            
        <div class="form-group row ml-4 mr-4 pb-1">
            <input type="hidden" value="<?=$id?>" name="id" />                     
        </div>

        <?php $log = $type->entryname; ?>
        <input type="hidden" value="<?=$log?>" name="log" />
        <input type="submit" value="Delete" class="btn btn-primary" />
    </div>
</form>