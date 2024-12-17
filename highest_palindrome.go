package main

import (
	"fmt"
)

// highestPalindrome adalah function rekursif untuk menemukan palindrom tertinggi yang mungkin dengan mengubah paling banyak k digit.
func highestPalindrome(s []rune, k int, left int, right int) string {
	// Jika pointer telah saling berpotongan, maka telah selesai memproses string.
	if left > right {
		return string(s)
	}

	// Jika karakter pada posisi saat ini tidak sama.
	if s[left] != s[right] {
		// Jika tidak ada penggantian yang diizinkan, kembalikan "-1".
		if k <= 0 {
			return "-1"
		}

		// Mengganti karakter yang lebih kecil dengan yang lebih besar.
		if s[left] > s[right] {
			s[right] = s[left]
		} else {
			s[left] = s[right]
		}

		// Mengurangi k karena telah mengganti karakter.
		return highestPalindrome(s, k-1, left+1, right-1)
	}

	// Jika karakter sudah sama, rekursif ke dalam tanpa mengurangi k.
	return highestPalindrome(s, k, left+1, right-1)
}

// maximizePalindrome memastikan palindrom tertinggi dengan memaksimalkan digit jika memungkinkan.
func maximizePalindrome(s []rune, k int, left int, right int) string {
	// Jika pointer telah saling berpotongan, maka telah selesai memproses string.
	if left > right {
		return string(s)
	}

	// Jika karakter pada posisi saat ini bukan 9 dan penggantian diizinkan.
	if s[left] != '9' || s[right] != '9' {
		// Jika karakter tidak sama dan perlu mengganti keduanya menjadi 9.
		if s[left] != s[right] {
			if k < 2 {
				return "-1"
			}
			k -= 2
			s[left], s[right] = '9', '9'
		} else if k > 0 {
			// Jika keduanya sama tetapi kurang dari 9, ganti keduanya untuk memaksimalkan nilai.
			s[left], s[right] = '9', '9'
			k--
		}
	}

	// Rekursif ke dalam untuk memaksimalkan digit lebih lanjut
	return maximizePalindrome(s, k, left+1, right-1)
}

// solvePalindrome adalah function utama untuk menyelesaikan masalah palindrom tertinggi dengan mengubah paling banyak k digit.
func solvePalindrome(s string, k int) string {
	// Konversi string ke rune untuk manipulasi.
	runes := []rune(s)
	// Panggil function highestPalindrome untuk menemukan palindrom tertinggi.
	result := highestPalindrome(runes, k, 0, len(runes)-1)
	// Jika hasil dari highestPalindrome adalah "-1", maka kembalikan "-1".
	if result == "-1" {
		return "-1"
	}

	// Panggil function maximizePalindrome untuk memastikan palindrom tertinggi.
	return maximizePalindrome([]rune(result), k, 0, len(runes)-1)
}

func main() {
	// Contoh penggunaan function solvePalindrome dalam beberapa array string.
	examples := []struct {
		s string
		k int
	}{
		{"3943", 1},
		{"932239", 2},
		{"12321", 1},
	}

	// Menggunakan function solvePalindrome untuk setiap string dalam array examples.
	for _, example := range examples {
		// Menampilkan input dan output dari function solvePalindrome
		fmt.Printf("Input: %s, k: %d\nOutput: %s\n", example.s, example.k, solvePalindrome(example.s, example.k))
	}
}
