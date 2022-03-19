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
    <di class="card-body">
      <form>
        <?= html_form_common() ?>
        <div class="mb-3 mt-2">
          <label class="form-label font-monospace fw-bolder">$string</label>
          <input type="text" name="string" class="form-control form-control-sm"
                 value="<?= $model['string'] ?>">
          <p class="form-text">
            The string to be repeated.
          </p>
        </div>
        <div class="mb-3">
          <label class="form-label font-monospace fw-bolder">$times</label>
          <input type="text" name="times" class="form-control form-control-sm" value="<?= $model['times'] ?>">
          <p class="form-text">
            Number of time the string should be repeated. <code>Times</code> has to be greater than or equal
            to 0. If the
            <code>times</code> is set to 0, the function will return an empty string.
          </p>
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
