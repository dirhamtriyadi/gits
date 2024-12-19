<?php

// highestPalindrome adalah function rekursif untuk menemukan palindrom tertinggi yang mungkin dengan mengubah paling banyak k digit.
function highestPalindrome(&$s, $k, $left, $right) {
    // Jika pointer telah saling berpotongan, maka telah selesai memproses string.
    if ($left > $right) {
        return implode('', $s);
    }

    // Jika karakter pada posisi saat ini tidak sama.
    if ($s[$left] !== $s[$right]) {
        // Jika tidak ada penggantian yang diizinkan, kembalikan "-1".
        if ($k <= 0) {
            return "-1";
        }

        // Mengganti karakter yang lebih kecil dengan yang lebih besar.
        if ($s[$left] > $s[$right]) {
            $s[$right] = $s[$left];
        } else {
            $s[$left] = $s[$right];
        }

        // Mengurangi k karena telah mengganti karakter.
        return highestPalindrome($s, $k - 1, $left + 1, $right - 1);
    }

    // Jika karakter sudah sama, rekursif ke dalam tanpa mengurangi k.
    return highestPalindrome($s, $k, $left + 1, $right - 1);
}

// Memastikan palindrom tertinggi dengan memaksimalkan digit jika memungkinkan.
function maximizePalindrome(&$s, $k, $left, $right) {
    // Jika pointer telah saling berpotongan, maka telah selesai memproses string.
    if ($left > $right) {
        return implode('', $s);
    }

    // Jika karakter pada posisi saat ini bukan 9 dan penggantian diizinkan.
    if ($s[$left] !== '9' || $s[$right] !== '9') {
        // Jika karakter tidak sama dan perlu mengganti keduanya menjadi 9.
        if ($s[$left] !== $s[$right]) {
            if ($k < 2) {
                return "-1";
            }
            $k -= 2;
            $s[$left] = $s[$right] = '9';
        } elseif ($k > 0) {
            // Jika keduanya sama tetapi kurang dari 9, ganti keduanya untuk memaksimalkan nilai.
            $s[$left] = $s[$right] = '9';
            $k--;
        }
    }

    // Rekursif ke dalam untuk memaksimalkan digit lebih lanjut.
    return maximizePalindrome($s, $k, $left + 1, $right - 1);
}

// Fungsi utama untuk menyelesaikan masalah palindrom tertinggi dengan mengubah paling banyak k digit.
function solvePalindrome($s, $k) {
    // Konversi string ke array untuk manipulasi.
    $chars = str_split($s);

    // Panggil fungsi highestPalindrome untuk menemukan palindrom tertinggi.
    $result = highestPalindrome($chars, $k, 0, count($chars) - 1);

    // Jika hasil dari highestPalindrome adalah "-1", maka kembalikan "-1".
    if ($result === "-1") {
        return "-1";
    }

    // Panggil fungsi maximizePalindrome untuk memastikan palindrom tertinggi.
    $chars = str_split($result);
    return maximizePalindrome($chars, $k, 0, count($chars) - 1);
}

// Contoh penggunaan fungsi solvePalindrome dalam beberapa array string.
$examples = [
    ["s" => "3943", "k" => 1],
    ["s" => "932239", "k" => 2],
    ["s" => "12321", "k" => 1]
];

// Menggunakan fungsi solvePalindrome untuk setiap string dalam array examples.
foreach ($examples as $example) {
    // Menampilkan input dan output dari fungsi solvePalindrome.
    echo "Input: {$example['s']}, k: {$example['k']}\n";
    echo "Output: " . solvePalindrome($example['s'], $example['k']) . "\n\n";
}
