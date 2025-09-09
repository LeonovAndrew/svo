<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$menuItems = [];
foreach ($arResult as $item) {
    $menuItems[] = [
        'TEXT' => $item['TEXT'],
        'LINK' => $item['LINK'],
        'SELECTED' => $item['SELECTED'],
        'IS_PARENT' => $item['IS_PARENT'],
        'DEPTH_LEVEL' => $item['DEPTH_LEVEL'],
        'PARAMS' => $item['PARAMS'],
    ];
}
?>


<ul class="header__drop-down-list">
    <?php foreach ($menuItems as $item): ?>
        <li>
            <a href="<?php echo $item['LINK']; ?>" class="header__drop-down-link">
                <?php echo $item['TEXT']; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>