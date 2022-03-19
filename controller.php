<?php

$fn = $_GET["fn"] ?? "_index_";

$routes = array(
  "crc32" => "page_string/string.crc32.php",
  "str_repeat" => "page_string/string.str_repeat.php",
  "levenshtein" => "page_string/string.levenshtein.php",
  "addcslashes" => "page_string/string.addcslashes.php",
  "str_rot13" => "page_string/string.str_rot13.php",
);

ksort($routes);

function get_page() : string {
  global $routes, $fn;
  if ($fn == "_index_") return reset($routes);
  if (array_key_exists($fn, $routes)) {
    return $routes[$fn];
  } else {
    return "404.php";
  }
}

function safe_call(callable $func): string
{
  try {
    return $func();
  } catch (TypeError $e) {
    return $e->getMessage();
  } catch (Exception $e) {
    return $e->getMessage();
  }
}

function get_param(string $param, string $default) {
  if (isset($_GET['ts'])) {
    return $_GET[$param] ?? null;
  } else {
    return $default;
  }
}

function html_title() : string
{
  global $fn;
  return (isset($fn) ? $fn . " - " : "") . "PeHaPe Lab";
}

function html_form_common() : string {
  return html_fn().html_ts();
}

function html_fn() : string{
  global $fn;
  return '<input type="hidden" name="fn" value=' . $fn . '>';
}

function html_ts() : string{
  return '<input type="hidden" name="ts" value=' . time() . '>';
}

function html_info($info) : string {
  ob_start(); ?>
  <div class="d-flex justify-content-between">
    <h5 class="card-title d-inline"><?=$info["name"]?></h5>
    <a class="card-link" href="<?='https://www.php.net/manual/en/function.'.$info["name"]?>" target="_blank">
      doc
    </a>

  </div>
  <span class="text-muted d-block"><?=$info["description"]?></span>
    <code><?=$info["signature"]?> </code>

  <?php
  return ob_get_clean();
}

function html_call_result($output, $help = '') : string {
  ob_start(); ?>
  <label class="form-label fw-bold">Output</label>
  <textarea readonly class="form-control font-monospace bg-light text-primary"><?= $output ?></textarea>
  <p class="form-text">
    <?=$help?>
  </p>
  <?php
  return ob_get_clean();
}

function html_input_arg($model, $param_name, $help) : string {
ob_start(); ?>
  <label class="form-label font-monospace fw-bolder">$<?=$param_name?></label>
  <input type="text" name="<?=$param_name?>" class="form-control form-control-sm"
         value="<?= $model[$param_name] ?? '' ?>">

  <p class="form-text"><?=$help?>

<?php
  return ob_get_clean();
}