package main

import (
	"fmt"
)

// isBalanced memeriksa apakah sebuah rangkaian tanda kurung seimbang.
func isBalanced(s string) string {
	stack := []rune{}
	bracketPairs := map[rune]rune{
		')': '(',
		']': '[',
		'}': '{',
	}

	for _, char := range s {
		if char == '(' || char == '[' || char == '{' {
			// Memasukkan tanda kurung buka ke dalam stack
			stack = append(stack, char)
		} else if char == ')' || char == ']' || char == '}' {
			// Cek apakah stack kosong atau elemen teratas tidak cocok
			if len(stack) == 0 || stack[len(stack)-1] != bracketPairs[char] {
				return "NO"
			}
			// Keluarkan elemen teratas dari stack
			stack = stack[:len(stack)-1]
		}
	}

	// Jika stack kosong, semua tanda kurung seimbang
	if len(stack) == 0 {
		return "YES"
	}
	return "NO"
}

func main() {
	// Contoh penggunaan fungsi isBalanced dalam beberapa array string.
	examples := []string{
		"{ [ ( ) ] }",
		"{ [ ( ] ) }",
		"{ ( ( [ ] ) [ ] ) [ ] }",
	}

	// Menggunakan function isBalanced untuk setiap string dalam array examples.
	for _, example := range examples {
		// Menampilkan input dan output dari fungsi isBalanced
		fmt.Printf("Input: %s\nOutput: %s\n", example, isBalanced(example))
	}
}
