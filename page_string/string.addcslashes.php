<?php

$info = [
  "name" => "addcslashes",
  "description" => "Quote string with slashes in a C style",
  "signature" => "addcslashes(string \$string, string \$characters): string"
];

$model = [
  "string" => get_param("string", "This text does NOT contain \\n a new-line!"),
  "characters" => get_param("characters", "\\\\"),
];

$output = safe_call(function () use ($model) {
  return addcslashes($model["string"], $model["characters"]);
});

?>

<div>
  <div class="card">
    <div class="card-header">
      <?= html_info($info) ?>
    </div>
    <di class="card-body">
      <form class="pt-1">
        <?= html_form_common() ?>
        <div class="mb-3 row">
          <?=html_input_arg($model, "string",
            "The data.")?>
        </div>
        <div class="mb-3 row">
          <?=html_input_arg($model, "characters",
            "A list of characters to be escaped.")?>
        </div>
        <div class="mb-3 d-flex justify-content-end">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="mt-3">
          <?=html_call_result($output, help: "Returns the escaped string.") ?>
        </div>
      </form>
    </di>
  </div>
</div>
