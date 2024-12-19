<?php

function calculateWeights($s, $queries) {
    // Hitung bobot untuk semua substring dari karakter yang diulang
    $weights = [];
    $result = [];

    $i = 0;
    $length = strlen($s);

    while ($i < $length) {
        $char = $s[$i];
        $charWeight = ord($char) - ord('a') + 1;
        $count = 0;

        // Menghitung kemunculan karakter yang sama secara berurutan
        while ($i < $length && $s[$i] === $char) {
            $count++;
            $weights[$charWeight * $count] = true;
            $i++;
        }
    }

    // Periksa apakah setiap kueri ada dalam kumpulan bobot
    foreach ($queries as $query) {
        if (isset($weights[$query])) {
            $result[] = "Yes";
        } else {
            $result[] = "No";
        }
    }

    return $result;
}

// Penggunaan
$string = "abbcccd";
$queries = [1, 3, 9, 8];
$output = calculateWeights($string, $queries);
print_r($output); // Output: ["Yes", "Yes", "Yes", "No"]

?>
