<?php

$info = [
  "name" => "levenshtein",
  "description" => "calculate Levenshtein distance between two strings",
  "signature" => "levenshtein(string \$string1,
      string \$string2,
      int \$insertion_cost = 1,
      int \$replacement_cost = 1,
      int \$deletion_cost = 1
 ): int
"
];


$model = [
  "string1" => get_param("string1", "banana"),
  "string2" => get_param("string2", "a bananas"),
  "insertion_cost" => get_param("insertion_cost", 1),
  "replacement_cost" => get_param("replacement_cost", 1),
  "deletion_cost" => get_param("deletion_cost", 1),

];

$output = safe_call(function () use ($model) {
  return levenshtein(
      $model["string1"],
      $model["string2"],
      $model["insertion_cost"],
      $model["replacement_cost"],
      $model["deletion_cost"],
  );
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
          <?=html_input_arg($model, "string1",
            "One of the strings being evaluated for Levenshtein distance.")?>
        </div>

        <div class="mb-3 row">
          <?=html_input_arg($model, "string2",
            "One of the strings being evaluated for Levenshtein distance.")?>
        </div>

        <div class="mb-3 row">
          <?=html_input_arg($model, "insertion_cost",
            "Defines the cost of insertion.")?>
        </div>

        <div class="mb-3 row">
          <?=html_input_arg($model, "replacement_cost",
            "Defines the cost of replacement.")?>
        </div>

        <div class="mb-3 row">
          <?=html_input_arg($model, "deletion_cost",
            "Defines the cost of replacement.")?>
        </div>

        <div class="mb-3 d-flex justify-content-end">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div>
          <?=html_call_result($output,
            "This function returns the Levenshtein-Distance between the two argument strings or -1, if one of the argument strings is longer than the limit of 255 characters.") ?>
        </div>
      </form>
    </di>
  </div>
</div>
