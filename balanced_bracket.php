<?php

// Fungsi untuk memeriksa apakah rangkaian tanda kurung seimbang.
function isBalanced($s) {
    $stack = [];
    $bracketPairs = [
        ')' => '(',
        ']' => '[',
        '}' => '{'
    ];

    for ($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i];

        if ($char === '(' || $char === '[' || $char === '{') {
            // Masukkan tanda kurung buka ke dalam stack
            array_push($stack, $char);
        } elseif ($char === ')' || $char === ']' || $char === '}') {
            // Cek apakah stack kosong atau elemen teratas tidak cocok
            if (empty($stack) || array_pop($stack) !== $bracketPairs[$char]) {
                return "NO";
            }
        }
    }

    // Jika stack kosong, semua tanda kurung seimbang
    return empty($stack) ? "YES" : "NO";
}

// Contoh penggunaan fungsi isBalanced dalam beberapa array string.
$examples = [
    "{[()]}",
    "{[(])}",
    "{(([])[[]])[]}"
];

// Menggunakan fungsi isBalanced untuk setiap string dalam array examples.
foreach ($examples as $example) {
    // Menampilkan input dan output dari fungsi isBalanced
    echo "Input: $example\nOutput: " . isBalanced($example) . "\n\n";
}
