<?php

$info = [
  "name" => "str_repeat",
  "description" => "repeat a string",
  "signature" => "str_repeat(string \$string, int \$times): string"
];

$model = [
  "string" => get_param("string", "hello"),
  "times" => get_param("times", 3),
];

$output = safe_call(function () use ($model) {
  return str_repeat($model["string"], $model["times"]);
});

?>

<div>
  <div class="card">
    <div class="card-header">
      <?= html_info($info) ?>

    </div>
    <div class="card-body">
      <form class="pt-1">
        <?= html_form_common() ?>
        <div class="mb-3 row">
          <?=html_input_text($model, "string",
            "The string to be repeated.")?>
        </div>
        <div class="mb-3 row">
          <?=html_input_text($model, "times",
            "Number of time the string should be repeated. <code>Times</code> has to be greater than or equal
            to 0. If the <code>times</code> is set to 0, the function will return an empty string.")?>
        </div>
        <div class="mb-3 d-flex justify-content-end">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="mt-3">
          <?=html_call_result($output) ?>
        </div>
      </form>
    </div>
  </div>
</div>
