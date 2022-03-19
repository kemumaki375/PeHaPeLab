<?php

$fn = $_GET["fn"] ?? "_index_";

$fn_list = ["crc32", "str_repeat", "levenshtein", "str_rot13", "chop", "rtrim",
  "lcfirst", "nl2br"];
sort($fn_list);

function get_page() : string {
  global $fn_list, $fn;
  if ($fn == "_index_") return reset($fn_list[0]);
  if (in_array($fn, $fn_list)) {
    return "page_string/string.".$fn.".php";
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
    <a class="card-link" href="<?='https://www.php.net/manual/en/function.'.str_replace( "_","-", $info["name"]).".php"?>" target="_blank">
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
    <?=htmlentities($help)?>
  </p>
  <?php
  return ob_get_clean();
}

function html_input_text($model, $param_name, $help) : string {
  ob_start(); ?>
  <label class="col-4 col-form-label font-monospace">$<?=$param_name?></label>
  <div class="col-8" id="res_output">
  <input type="text" name="<?=$param_name?>" class="form-control form-control-sm"
         value="<?= $model[$param_name] ?? '' ?>">

    <p class="form-text"><?=htmlentities($help)?></p>
  </div>
  <?php
  return ob_get_clean();
}

function html_input_textarea($model, $param_name,  $help = '', $row_count = 4) : string {
  ob_start(); ?>
  <label class="col-4 col-form-label font-monospace">$<?=$param_name?></label>
  <div class="col-8" id="res_output">
    <textarea name="<?=$param_name?>" class="form-control" rows="<?=$row_count?>"><?= $model[$param_name] ?? '' ?></textarea>
    <p class="form-text"><?=$help?></p>
  </div>
  <?php
  return ob_get_clean();
}

function html_input_checkbox($model, $param_name, $help = '') : string {
  ob_start(); ?>
  <label class="col-4 col-form-label font-monospace">$<?=$param_name?></label>
  <div class="col-8" id="res_output">
    <input type="checkbox" name="<?=$param_name?>" class="form-check-input mt-2" <?=$model[$param_name] == "true" ? "checked": ""?> value="true">
    <p class="form-text"><?=$help?></p>
  </div>
  <?php
  return ob_get_clean();
}