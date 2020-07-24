<?php
$files=[
    "classes/HashTagHooks",
    "classes/HashTagTheme",
    "classes/HashTagContact",
    "classes/class-bootstrap-navwalker",
    "admin/customizer",
    "admin/HashTagAdmin",
    "admin/meta/BaseMeta",
    "admin/meta/WhatWeDoMeta",
    "admin/meta/WhatWeOfferMeta",
    "admin/meta/WhyChooseUsMeta",
    "helpers/core",
    "helpers/logs",
    "helpers/cfs",
    "helpers/menu"
];
foreach($files as $file){
    $file_name=get_stylesheet_directory()."/inc/".$file.".php";
    if(!file_exists($file_name)) return;
    include($file_name);
}