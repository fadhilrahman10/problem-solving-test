<?php

function getCharacterWeight(string $char): int {
    return ord($char) - ord('a') + 1;
}

function calculateWeights(string $string): array {
    $weights = [];
    $length = strlen($string);

    $i = 0;
    while ($i < $length) {
        $currentChar = $string[$i];
        $weight = getCharacterWeight($currentChar);
        $currentWeight = 0;

        while ($i < $length && $string[$i] == $currentChar) {
            $currentWeight += $weight;
            $weights[$currentWeight] = true;
            $i++;
        }
    }

    return $weights;
}

function weightedStrings(string $string, array $queries): array {
    $weights = calculateWeights($string);
    $results = [];

    foreach ($queries as $query) {
        if (isset($weights[$query])) {
            $results[] = "Yes";
        } else {
            $results[] = "No";
        }
    }

    return $results;
}

$string = "abbcccd";
$queries = [1, 3, 9, 8];
print_r(weightedStrings($string, $queries));
