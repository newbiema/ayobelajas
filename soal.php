<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php 
        echo ($_SERVER['REQUEST_METHOD'] == 'POST') ? "Skor Anda" : "Belajar Abjad Dasar"; 
        ?>
    </title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-yellow-200 to-blue-200 flex items-center justify-center min-h-screen p-5">
    <div class="bg-white p-8 rounded-3xl shadow-xl max-w-3xl w-full border-4 border-yellow-500">
        <h1 class="text-center text-4xl font-bold text-blue-700 mb-8">
            <?php
            echo ($_SERVER['REQUEST_METHOD'] == 'POST') ? "Skor Anda" : "Belajar Abjad Dasar"; 
            ?>
        </h1>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Daftar soal dan jawaban benar
            $soal = [
                ["Huruf pertama dalam alfabet adalah?", "A", "B", "C", "D"],
                ["Huruf terakhir dalam alfabet adalah?", "Z", "X", "Y", "W"],
                ["Huruf setelah C adalah?", "D", "E", "B", "F"],
                ["Huruf sebelum M adalah?", "L", "K", "N", "O"],
                ["Huruf yang terletak di antara P dan R adalah?", "Q", "S", "T", "U"],
            ];

            $skor = 0;
            $totalSoal = count($soal);

            echo '<div class="mb-6 bg-yellow-100 p-4 rounded-lg">';
            echo '<p class="text-lg"><strong>Hasil:</strong></p>';

            foreach ($soal as $index => $item) {
                $pertanyaan = $item[0];
                $jawaban = $item[1];
                $userAnswer = $_POST['question' . ($index + 1)] ?? 'Tidak dijawab';

                if ($userAnswer === $jawaban) {
                    $skor++;
                    echo '<p class="text-green-600">Soal ' . ($index + 1) . ': Benar ✔️ (Jawaban: ' . htmlspecialchars($jawaban) . ')</p>';
                } else {
                    echo '<p class="text-red-600">Soal ' . ($index + 1) . ': Salah ❌ (Jawaban: ' . htmlspecialchars($jawaban) . ')</p>';
                }
            }

            echo '<p class="text-lg font-bold mt-4">Skor Anda: ' . $skor . ' dari ' . $totalSoal . '</p>';
            echo '</div>';
        } else {
            // Menampilkan soal dan formulir jawaban
            $soal = [
                ["Huruf pertama dalam alfabet adalah?", "A", "B", "C", "D"],
                ["Huruf terakhir dalam alfabet adalah?", "Z", "X", "Y", "W"],
                ["Huruf setelah C adalah?", "D", "E", "B", "F"],
                ["Huruf sebelum M adalah?", "L", "K", "N", "O"],
                ["Huruf yang terletak di antara P dan R adalah?", "Q", "S", "T", "U"],
            ];

            echo '<form action="" method="post">';

            foreach ($soal as $index => $item) {
                $pertanyaan = $item[0];
                $options = array_slice($item, 1);

                shuffle($options);

                echo '<div class="mb-6 p-6 bg-white rounded-lg shadow-md hover:bg-yellow-50 transition duration-300">';
                echo '<h3 class="text-xl font-bold text-gray-800 mb-4">' . htmlspecialchars($pertanyaan) . '</h3>';
                echo '<div class="grid grid-cols-2 gap-4">';
                foreach ($options as $option) {
                    echo '<label class="flex items-center space-x-3">';
                    echo '<input type="radio" name="question' . ($index + 1) . '" value="' . htmlspecialchars($option) . '" class="h-5 w-5 text-blue-600">';
                    echo '<span class="text-lg text-gray-700">' . htmlspecialchars($option) . '</span>';
                    echo '</label>';
                }
                echo '</div>';
                echo '</div>';
            }

            echo '<button type="submit" class="w-full py-3 mt-6 bg-yellow-500 text-white font-bold rounded-lg hover:bg-yellow-600 transition">Kirim Jawaban</button>';
            echo '</form>';
        }
        ?>

        <div class="mt-6 text-center">
            <a href="index.php" class="text-blue-600 hover:underline font-bold">← Kembali ke Halaman Utama</a>
        </div>
    </div>
</body>
</html>
