<?php
$values = $hook->getValues();

// Request form name
$formName = $modx->getOption('formName', $formit->config, 'form-'.$modx->resource->get('id'));

// Request form data
$name = $values['name'];
$phone = $values['phone'];

$roistatData = array(
    'roistat' => isset($_COOKIE['roistat_visit']) ? $_COOKIE['roistat_visit'] : null,
    'key'     => 'key', // API key Roistat
    'title'   => $name . ' (' . $formName . ')',
    'name'    => $name,
    'email'   => '',
    'phone'   => $phone,
    'is_need_callback' => '1',
);
  
file_get_contents("https://cloud.roistat.com/api/proxy/1.0/leads/add?" . http_build_query($roistatData));

return true;
