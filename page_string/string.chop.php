<?php

$info = [
  "name" => "chop",
  "description" => "Alias of rtrim()",
  "signature" => "this function is an alias of: rtrim()."
];

$model = [
  "string" => get_param("string", "\t\tThese are a few words :) ...  "),
  "characters" => get_param("characters", " \t."),
];

$output = safe_call(function () use ($model) {
  return chop($model["string"], $model["characters"]);
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
          <?=html_input_text($model, "string",
            "The input string.")?>
        </div>
        <div class="mb-3 row">
          <?=html_input_text($model, "characters",
            "You can also specify the characters you want to strip, by means of the characters parameter. Simply list all characters that you want to be stripped. With .. you can specify a range of characters.")?>
        </div>
        <div class="mb-3 d-flex justify-content-end">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="mt-3">
          <?=html_call_result($output) ?>
        </div>
      </form>
    </di>
  </div>
</div>
