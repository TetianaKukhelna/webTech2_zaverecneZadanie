<!doctype html>
<html lang="en">
<?php require_once('./templates/_header.php') ?>
<body>

<?php $isAdmin = true;
require_once('./templates/_table.template.php') ?>

<?php
$activeTab = 'admin';

require_once('./templates/_navigation.php')
?>

<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
                type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
            Can be some data
        </button>
    </li>

    <p>pipik 3 </p>

</ul>
</body>
</html>