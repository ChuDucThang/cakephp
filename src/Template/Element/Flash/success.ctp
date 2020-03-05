<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>

 <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <i class="fa fa-times"></i>
    </button>
    <span><?= $message ?></span>
</div>
