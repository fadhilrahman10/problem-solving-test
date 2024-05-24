<?php

function isBalanced(string $s): string {
    $stack = []; // Digunakan untuk menyimpan bracket pembuka
    $bracketMap = [
        ')' => '(',
        '}' => '{',
        ']' => '['
    ]; // Peta untuk mencocokkan bracket penutup dengan pembukanya

    $characters = str_split($s); // Memecah string menjadi array karakter
    foreach ($characters as $char) {
        if (in_array($char, array_values($bracketMap))) {
            // Jika karakter adalah bracket pembuka, tambahkan ke stack
            $stack[] = $char;
        } elseif (in_array($char, array_keys($bracketMap))) {
            // Jika karakter adalah bracket penutup, periksa keseimbangan
            if (empty($stack) || array_pop($stack) !== $bracketMap[$char]) {
                return "NO";
            }
        }
    }

    // Jika stack kosong setelah iterasi, berarti semua bracket seimbang
    return empty($stack) ? "YES" : "NO";
}

echo isBalanced("{ [ ( ) ] }");  // Output: YES
echo "\n";
echo isBalanced("{ [ ( ] ) }");  // Output: NO
echo "\n";
echo isBalanced("{ ( ( [ ] ) [ ] ) [ ] }");  // Output: YES