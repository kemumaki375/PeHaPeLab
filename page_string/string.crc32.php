<?php

$info = [
  "name" => "crc32",
  "description" => "calculates the crc32 polynomial of a string",
  "signature" => "crc32(string \$string): int"
];

$model = [
  "string" => get_param("string", "hello"),
];

$output = safe_call(function () use ($model) {
  return crc32($model["string"]);
});

?>

<div>
  <div class="card">
    <div class="card-header">
      <?= html_info($info) ?>
    </div>
    <di class="card-body">
      <form>
        <?= html_form_common() ?>
        <div class="mb-3 mt-2">
          <?=html_input_arg($model, "string",
            "The data.")?>
        </div>
        <div class="mb-3 d-flex justify-content-end">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="mt-3">
          <?=html_call_result($output, help: "Returns the crc32 checksum of string as an integer.") ?>
        </div>
      </form>
    </di>
  </div>
</div>
