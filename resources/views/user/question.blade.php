<!-- resources/views/questions.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="storage/images/assets/icon1.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support System | Cek Dini</title>
</head>
<body>
    <h1>Cek Dini</h1>
    <div id="question-container">
        <p id="question-text">Apakah kamu stress?</p>
        <button onclick="handleAnswer('ya')">Ya</button>
        <button onclick="handleAnswer('tidak')">Tidak</button>
    </div>

    <script>
        const questions = {
            'Apakah kamu stress?': {
                'ya': 'Apakah kamu merasa cemas setiap hari?',
                'tidak': 'Apakah kamu merasa bahagia setiap hari?'
            },
            'Apakah kamu merasa cemas setiap hari?': {
                'ya': 'Apakah kamu merasa sulit tidur?',
                'tidak': 'Apakah kamu merasa lelah setiap hari?'
            },
            'Apakah kamu merasa bahagia setiap hari?': {
                'ya': 'Apakah kamu merasa puas dengan hidupmu?',
                'tidak': 'Apakah kamu merasa ada yang kurang dalam hidupmu?'
            },
            'Apakah kamu merasa sulit tidur?': {
                'ya': 'Silakan konsultasi dengan dokter.',
                'tidak': 'Cobalah teknik relaksasi sebelum tidur.'
            },
            'Apakah kamu merasa lelah setiap hari?': {
                'ya': 'Pastikan kamu cukup istirahat dan makan dengan baik.',
                'tidak': 'Bagus, lanjutkan gaya hidup sehatmu.'
            },
            'Apakah kamu merasa puas dengan hidupmu?': {
                'ya': 'Pesan Terima Kasih: Terima kasih atas partisipasimu!',
                'tidak': 'Pesan: Apakah kamu ingin mengisi kuisioner atau kembali ke pertanyaan pertama?'
            },
            'Apakah kamu merasa ada yang kurang dalam hidupmu?': {
                'ya': 'Cobalah untuk mencari kegiatan yang membuatmu bahagia.',
                'tidak': 'Bagus, terus pertahankan keseimbangan hidupmu.'
            },
            'Pesan: Apakah kamu ingin mengisi kuisioner atau kembali ke pertanyaan pertama?': {
                'ya': 'Terima kasih atas partisipasimu!',
                'tidak': 'Mulai ulang dari pertanyaan pertama.'
            }
        };

        function handleAnswer(answer) {
            const questionText = document.getElementById('question-text').innerText;
            const nextQuestion = questions[questionText][answer];
            
            if (nextQuestion.startsWith('Pesan Terima Kasih') || nextQuestion.startsWith('Silakan konsultasi') || nextQuestion.startsWith('Cobalah teknik') || nextQuestion.startsWith('Pastikan kamu') || nextQuestion.startsWith('Bagus') || nextQuestion.startsWith('Cobalah untuk') || nextQuestion.startsWith('Mulai ulang')) {
                document.getElementById('question-container').innerHTML = `<p>${nextQuestion}</p><button onclick="restartQuestions()">Mulai Ulang</button>`;
            } else if (nextQuestion.startsWith('Pesan:')) {
                document.getElementById('question-container').innerHTML = `<p>${nextQuestion}</p><button onclick="handleAnswer('ya')">Ya</button><button onclick="restartQuestions()">Kembali ke Pertanyaan Pertama</button>`;
            } else {
                document.getElementById('question-text').innerText = nextQuestion;
                const buttons = `<button onclick="handleAnswer('ya')">Ya</button><button onclick="handleAnswer('tidak')">Tidak</button>`;
                document.getElementById('question-container').innerHTML = `<p id="question-text">${nextQuestion}</p>${buttons}`;
            }
        }

        function restartQuestions() {
            document.getElementById('question-container').innerHTML = `<p id="question-text">Apakah kamu stress?</p><button onclick="handleAnswer('ya')">Ya</button><button onclick="handleAnswer('tidak')">Tidak</button>`;
        }
    </script>
</body>
</html>
