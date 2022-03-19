<?php

$info = [
  "name" => "lcfirst",
  "description" => "Make a string's first character lowercase",
  "signature" => 'lcfirst(string $string): string'
];

$model = [
  "string" => get_param("string", "HelloWorld"),
];

$output = safe_call(function () use ($model) {
  return lcfirst($model["string"]);
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
        <div class="mb-3 d-flex justify-content-end">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="mt-3">
          <?=html_call_result($output, help: "Returns the resulting string.") ?>
        </div>
      </form>
    </di>
  </div>
</div>
