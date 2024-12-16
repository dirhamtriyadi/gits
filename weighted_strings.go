package main

import (
	"fmt"
)

func calculateWeights(s string, queries []int) []string {
	// hitung bobot untuk semua substring dari karakter yang diulang
	weights := make(map[int]struct{})
	result := []string{}

	i := 0
	for i < len(s) {
		char := s[i]
		charWeight := int(char - 'a' + 1)
		count := 0

		// menghitung kemunculan karakter yang sama secara berurutan
		for i < len(s) && s[i] == char {
			count++
			weights[charWeight*count] = struct{}{}
			i++
		}
	}

	// periksa apakah setiap kueri ada dalam kumpulan bobot
	for _, query := range queries {
		if _, exists := weights[query]; exists {
			result = append(result, "Yes")
		} else {
			result = append(result, "No")
		}
	}

	return result
}

func main() {
	string := "abbcccd"
	queries := []int{1, 3, 9, 8}
	output := calculateWeights(string, queries)
	fmt.Println(output) // Output: ["Yes", "Yes", "Yes", "No"]
}
