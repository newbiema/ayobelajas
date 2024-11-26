<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo "Skor Anda";
        } else {
            echo "Soal Pengetahuan Umum";
        }
        ?>
    </title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-300 flex items-center justify-center min-h-screen p-5">
    <div class="bg-white p-8 rounded-3xl shadow-xl max-w-3xl w-full">
        <h1 class="text-center text-4xl font-bold text-green-700 mb-8">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                echo "Skor Anda"; 
            } else {
                echo "Soal Pengetahuan Umum"; 
            }
            ?>
        </h1>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Daftar soal dan jawaban benar
            $soal = [
                ["Apa warna bendera Indonesia?", "Merah dan Putih", "Merah dan Kuning", "Hijau dan Putih", "Merah dan Biru"],
                ["Siapa presiden pertama Indonesia?", "Soekarno", "Soeharto", "Habibie", "Megawati"],
                ["Berapa jumlah hari dalam satu minggu?", "7", "5", "6", "8"],
                ["Binatang apa yang dikenal sebagai 'Raja Hutan'?", "Singa", "Gajah", "Harimau", "Buaya"],
                ["Pulau terbesar di Indonesia adalah?", "Kalimantan", "Sumatera", "Jawa", "Papua"],
            ];

            $skor = 0;
            $totalSoal = count($soal);
            $riwayatJawaban = [];

            echo '<div class="mb-6 bg-green-100 p-4 rounded-lg">';
            echo '<p><strong>Skor Anda:</strong></p>';

            foreach ($soal as $index => $item) {
                $pertanyaan = $item[0];
                $jawaban = $item[1];
                $options = array_slice($item, 1);

                // Mengacak urutan pilihan jawaban
                shuffle($options);

                $userAnswer = isset($_POST['question' . ($index + 1)]) ? trim($_POST['question' . ($index + 1)]) : 'Tidak dijawab';
                $riwayatJawaban[] = $userAnswer;

                if ($userAnswer === trim($jawaban)) {
                    $skor++;
                    echo '<p>Soal ' . ($index + 1) . ': <span class="text-green-600 font-bold">Benar</span> (Jawaban benar: ' . htmlspecialchars($jawaban) . ')</p>';
                } else {
                    echo '<p>Soal ' . ($index + 1) . ': <span class="text-red-600 font-bold">Salah</span> (Jawaban benar: ' . htmlspecialchars($jawaban) . ')</p>';
                }
            }

            echo '<p><strong>Skor Total: ' . $skor . ' / ' . $totalSoal . '</strong></p>';
            echo '</div>';

            // Riwayat Jawaban
            echo '<div class="bg-white p-4 rounded-lg shadow-md">';
            echo '<h2 class="text-xl font-semibold text-gray-800">Riwayat Jawaban Anda:</h2>';
            foreach ($riwayatJawaban as $index => $jawaban) {
                echo '<p>Soal ' . ($index + 1) . ': ' . htmlspecialchars($jawaban) . '</p>';
            }
            echo '</div>';
        } else {
            // Menampilkan soal dan formulir jawaban
            $soal = [
                ["Apa warna bendera Indonesia?", "Merah dan Putih", "Merah dan Kuning", "Hijau dan Putih", "Merah dan Biru"],
                ["Siapa presiden pertama Indonesia?", "Soekarno", "Soeharto", "Habibie", "Megawati"],
                ["Berapa jumlah hari dalam satu minggu?", "7", "5", "6", "8"],
                ["Binatang apa yang dikenal sebagai 'Raja Hutan'?", "Singa", "Gajah", "Harimau", "Buaya"],
                ["Pulau terbesar di Indonesia adalah?", "Kalimantan", "Sumatera", "Jawa", "Papua"],
            ];

            echo '<form action="" method="post">';

            foreach ($soal as $index => $item) {
                $pertanyaan = $item[0];
                $jawaban = $item[1];
                $options = array_slice($item, 1);

                // Mengacak urutan pilihan jawaban
                shuffle($options);

                echo '<div class="mb-6 p-6 bg-white rounded-lg shadow-md hover:bg-gray-50 transition duration-300 ease-in-out">';
                echo '<h3 class="text-2xl font-semibold text-gray-800 mb-4">' . htmlspecialchars($pertanyaan) . '</h3>';
                echo '<div class="space-y-3">';
                foreach ($options as $option) {
                    echo '<div class="flex items-center space-x-3">';
                    echo '<input type="radio" name="question' . ($index + 1) . '" value="' . htmlspecialchars($option) . '" class="h-5 w-5 text-green-600 border-gray-300 focus:ring-green-500 transition duration-200 ease-in-out hover:ring-2 hover:ring-green-400">';
                    echo '<label class="text-lg text-gray-700 hover:text-green-600 transition duration-200 ease-in-out">' . htmlspecialchars($option) . '</label>';
                    echo '</div>';
                }
                echo '</div>';
                echo '</div>';
            }

            echo '<button type="submit" class="w-full py-3 mt-6 text-white bg-green-600 hover:bg-green-700 font-bold rounded-lg shadow-md transition duration-200 ease-in-out">Kirim Jawaban</button>';
            echo '</form>';
        }
        ?>

        <!-- Tombol Back ke Homepage -->
        <div class="mt-6 text-center">
            <a href="homepage.php" class="text-green-600 hover:text-green-800 font-bold text-lg underline transition duration-200 ease-in-out">
                ← Kembali ke Homepage
            </a>
        </div>
    </div>
</body>
</html>
