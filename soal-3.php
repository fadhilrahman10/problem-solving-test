<?php

const NINE = '9';

function countMismatches(string $str1, string $str2, int $i = 0, int $count = 0): int
{
    if (strlen($str1) == strlen($str2)) {
        if (strlen($str1) > $i) {
            $count += $str1[$i] != $str2[$i] ? 1 : 0;

            return countMismatches($str1, $str2, $i + 1, $count);
        }
    }

    return $count;
}

function parsePalindrome(string $s): array
{
    $hasMiddle = strlen($s) % 2 != 0;

    $centerIndex = intval(strlen($s) / 2);

    $leftPart = substr($s, 0, $centerIndex);

    $middle = $hasMiddle ? $s[$centerIndex] : '';

    $rightPart = $hasMiddle ? substr($s, $centerIndex + 1) : substr($s, $centerIndex);

    return array($leftPart, $middle, strrev($rightPart));
}

function getHighestPalindrome(string $left, string $right, string $middle, int $k, int $mismatches, string $final = '', int $i = 0): string
{
    if (strlen($left) > $i) {
        $leftChar = $left[$i];
        $rightChar = $right[$i];

        $isMismatch = ($leftChar != $rightChar);

        $numOfNon9Chars = (($leftChar != NINE) ? 1 : 0) + (($rightChar != NINE) ? 1 : 0);

        if (!$isMismatch) {
            $nextChar = $leftChar;

            if ($numOfNon9Chars > 0 && $k - 2 >= $mismatches) {
                $k -= 2;
                $nextChar = NINE;
            }
        } else {
            if ($numOfNon9Chars == 1) {
                $k -= 1;
                $mismatches -= 1;
                $nextChar = NINE;
            } else {
                if ($k - 2 >= $mismatches - 1) {
                    $k -= 2;
                    $mismatches -= 1;
                    $nextChar = NINE;
                } else {
                    $largerNum = max(intval($leftChar), intval($rightChar));
                    $k -= 1;
                    $mismatches -= 1;
                    $nextChar = strval($largerNum);
                }
            }
        }

        $final .= $nextChar;

        return getHighestPalindrome($left, $right, $middle, $k, $mismatches, $final, $i + 1 );
    }

    if ($k && $middle != '') {
        $middle = NINE;
    }

    return $final . $middle . strrev($final);
}

function highestValuePalindrome(string $s, int $n, int $k): string
{
    list($leftPart, $middlePart, $rightRevPart) = parsePalindrome($s);

    $mismatches = countMismatches($leftPart, $rightRevPart);

    if ($k >= $n) {
        return str_repeat(NINE, $n);
    }

    if ($k - $mismatches < 0) {
        return '-1';
    }

    return getHighestPalindrome($leftPart, $rightRevPart, $middlePart, $k, $mismatches);
}

$s = "932239";
$n = strlen($s);
$k = 2;
echo highestValuePalindrome($s, $n, $k); // Output: 91319

$s = "3943";
$n = strlen($s);
$k = 2;
echo "\n" .  highestValuePalindrome($s, $n, $k); // Output: 91319
