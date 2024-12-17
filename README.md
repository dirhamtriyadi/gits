# Balanced Bracket

## Function: `isBalanced`

Function `isBalanced` menerima sebuah string `s` sebagai input dan mengembalikan "YES" jika kurung dalam string tersebut seimbang, jika tidak maka mengembalikan "NO".


### Cara kerjanya:

1. **Inisialisasi**:
   - Sebuah stack (`stack`) digunakan untuk melacak kurung buka.
   - Sebuah map (`bracketPairs`) digunakan untuk mendefinisikan pasangan kurung buka dan tutup.

2. **Melakukan perulangan dengan string**:
   - Untuk setiap karakter dalam string:
     - Jika karakter tersebut adalah kurung buka (`(`, `[`, `{`), maka karakter tersebut didorong ke dalam stack.
     - Jika karakter tersebut adalah kurung tutup (`)`, `]`, `}`):
       - Fungsi memeriksa apakah stack kosong atau jika elemen teratas dari stack tidak sesuai dengan kurung buka yang bersesuaian. Jika salah satu kondisi benar, fungsi mengembalikan "NO".
       - Jika tidak, elemen teratas dihapus dari stack.

3. **Pemeriksaan akhir**:
   - Setelah iterasi melalui string selesai, jika stack kosong, itu berarti semua kurung telah dipasangkan dengan benar, dan fungsi mengembalikan "YES".
   - Jika stack tidak kosong, itu berarti ada kurung buka yang tidak memiliki pasangan, dan fungsi mengembalikan "NO".

### Contoh:

Function `main` menunjukkan penggunaan function `isBalanced` dengan beberapa contoh:

```go
func main() {
    examples := []string{
        "{ [ ( ) ] }",
        "{ [ ( ] ) }",
        "{ ( ( [ ] ) [ ] ) [ ] }",
    }

    for _, example := range examples {
        fmt.Printf("Input: %s\nOutput: %s\n", example, isBalanced(example))
    }
}