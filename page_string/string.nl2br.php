<?php

$info = [
  "name" => "nl2br",
  "description" => "Inserts HTML line breaks before all newlines in a string",
  "signature" => 'nl2br(string $string, bool $use_xhtml = true): string'
];

$model = [
  "string" => get_param("string", "foo isn't\n bar"),
  "use_xhtml" => get_param("use_xhtml", "true"),
];

$output = safe_call(function () use ($model) {
  return nl2br($model["string"], $model["use_xhtml"] == "true");
});

?>

<div>
  <div class="card">
    <div class="card-header">
      <?= html_info($info) ?>
    </div>
    <di class="card-body">
      <form class="mb-2">
        <?= html_form_common() ?>
        <div class="mb-3 row">
          <?=html_input_textarea($model, "string",
            "The input string.")?>
        </div>
          <div class="mb-3 row">
            <?=html_input_checkbox($model, "use_xhtml",
              "Whether to use XHTML compatible line breaks or not.")?>
          </div>
        <div class="mb-3 d-flex justify-content-end">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="mt-3">
          <?=html_call_result($output, help: 'Returns the altered string -  string with <br /> or <br> inserted before all newlines (\r\n, \n\r, \n and \r)') ?>
        </div>
      </form>
    </di>
  </div>
</div>
