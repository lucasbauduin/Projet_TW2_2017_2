<?php

function inputFilterInt($name, $requis = true) {
  $v = filter_input(INPUT_GET, $name, FILTER_SANITIZE_NUMBER_INT);
  if($requis && $v == NULL) {
    return NULL;
  } else {
    return intval($v);
  }
}

function inputFilterString($name, $requis = true) {
  $v = filter_input(INPUT_GET, $name, FILTER_SANITIZE_STRING);
  if($requis && $v == NULL) {
    return NULL;
  } else {
    return $v;
  }
}
