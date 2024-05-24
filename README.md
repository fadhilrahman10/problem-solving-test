
README ini memberikan penjelasan yang lebih jelas dan rinci mengenai kompleksitas waktu dan ruang dari solusi yang telah diberikan, sesuai dengan yang diminta dalam soal.

Kompleksitas Waktu: O(n)

Penjelasan: Algoritma ini memeriksa setiap karakter dalam string satu per satu.
Dalam loop foreach, kita iterasi melalui setiap karakter dalam string.
Karena setiap karakter hanya diproses satu kali, waktu yang dibutuhkan untuk ini adalah O(n), di mana n adalah jumlah karakter dalam string.
Operasi push ($stack[] = $char;) dan pop (array_pop($stack)) pada stack memakan waktu konstan O(1).
Secara keseluruhan, waktu yang diperlukan untuk menjalankan algoritma ini adalah O(n).

Kompleksitas Ruang: O(n)

Penjelasan: Algoritma ini menggunakan stack untuk menyimpan bracket pembuka.
Dalam kasus terburuk, jika semua karakter dalam string adalah bracket pembuka (misalnya {{{{), semua bracket akan disimpan dalam stack.
Jika ada n karakter dalam input, stack bisa menampung hingga n karakter.
Oleh karena itu, ruang yang digunakan oleh stack adalah O(n).