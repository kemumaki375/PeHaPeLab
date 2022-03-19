<?php

$info = [
  "name" => "str_rot13",
  "description" => "Perform the rot13 transform on a string",
  "return" => "Returns the ROT13 version of the given string.",
  "signature" => "str_rot13(string \$string): string"
];

$model = [
  "string" => get_param("string", "this is a secret message"),
];

$output = safe_call(function () use ($model) {
  return str_rot13($model["string"]);
});

?>

<div>
  <div class="card">
    <div class="card-header">
      <?= html_info($info) ?>
    </div>
    <di class="card-body">
      <form class="pt-2">
        <?= html_form_common() ?>
        <div class="mb-3">
          <?=html_input_arg($model, "string",
            "The input string.")?>
        </div>
        <div class="mb-3 d-flex justify-content-end">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="mt-3">
          <?=html_call_result($output, $info["return"]) ?>
        </div>
      </form>
    </di>
  </div>
</div>
