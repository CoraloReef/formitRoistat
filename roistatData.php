<?php
$values = $hook->getValues();

// Получаем название формы
$formName = $modx->getOption('formName', $formit->config, 'form-'.$modx->resource->get('id'));

// Данные с формы
$name = $values['name'];
$phone = $values['phone'];

$roistatData = array(
    'roistat' => isset($_COOKIE['roistat_visit']) ? $_COOKIE['roistat_visit'] : null,
    'key'     => 'key', // Ключ API Roistat
    'title'   => $name . ' (' . $formName . ')',
    'name'    => $name,
    'email'   => '',
    'phone'   => $phone,
    'is_need_callback' => '1',
);
  
file_get_contents("https://cloud.roistat.com/api/proxy/1.0/leads/add?" . http_build_query($roistatData));

return true;