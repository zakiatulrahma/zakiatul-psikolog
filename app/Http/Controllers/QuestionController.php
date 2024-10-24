<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    protected $topics = [
        'stress' => [
            'title' => 'stress',
            'image' => 'storage/images/cek-dini/04.jpg',
            'questions' => [
                'Apakah Anda sering merasa cemas, khawatir, atau tegang tentang situasi sehari-hari?',
                'Apakah Anda mengalami gangguan tidur, seperti kesulitan tidur atau sering terbangun di malam hari?',
                'Apakah Anda merasa mudah marah atau cepat tersinggung oleh hal-hal kecil?',
                'Apakah Anda merasa lelah secara fisik dan emosional meskipun tidak melakukan aktivitas berat?',
                'Apakah Anda mengalami kesulitan untuk berkonsentrasi atau membuat keputusan?',
                'Apakah Anda sering mengalami sakit kepala, nyeri otot, atau gangguan pencernaan tanpa sebab medis yang jelas?',
                'Apakah Anda merasa kehilangan minat atau tidak bisa menikmati kegiatan yang biasanya Anda sukai?',
                'Apakah Anda mengalami perubahan signifikan dalam nafsu makan, seperti makan berlebihan atau kehilangan selera makan?',
                'Apakah Anda merasa kesulitan untuk bersosialisasi atau merasa terisolasi dari orang lain?',
                'Apakah Anda sering merasa bahwa Anda tidak memiliki cukup waktu untuk menyelesaikan tugas-tugas Anda?'
            ],
            'solutions' => [
                ['id' => 1, 'title' => 'Teknik Relaksasi', 'description' => 'Teknik relaksasi seperti meditasi, yoga, dan latihan pernapasan dalam adalah cara yang sangat efektif untuk mengelola stres. Meditasi membantu menenangkan pikiran dengan membawa perhatian pada momen saat ini, mengurangi kekhawatiran yang sering kali menjadi penyebab utama stres. Yoga tidak hanya melibatkan gerakan fisik yang memperkuat dan meregangkan otot, tetapi juga menggabungkan teknik pernapasan yang menenangkan sistem saraf. Latihan pernapasan dalam, di sisi lain, membantu menurunkan detak jantung dan mengurangi ketegangan di tubuh, menciptakan efek relaksasi yang hampir instan. Melakukan teknik-teknik ini secara rutin dapat membantu mengurangi stres dan meningkatkan kesejahteraan secara keseluruhan.',
                 'image' => '../../storage/images/cek-dini/15.jpg'],
                ['id' => 2, 'title' => 'Manajemen Waktu', 'description' => 'Mengelola waktu dengan baik adalah kunci untuk mencegah stres yang disebabkan oleh pekerjaan atau tanggung jawab yang berlebihan. Dengan membuat jadwal yang realistis dan menetapkan prioritas, Anda dapat menghindari perasaan kewalahan. Menyisihkan waktu untuk istirahat di antara tugas-tugas berat juga penting untuk menjaga energi dan konsentrasi. Menghindari penundaan dan berfokus pada satu tugas pada satu waktu dapat meningkatkan efisiensi, sehingga pekerjaan selesai tepat waktu tanpa merasa terburu-buru. Dengan manajemen waktu yang baik, Anda dapat menyelesaikan pekerjaan dengan lebih tenang dan teratur, mengurangi tekanan yang bisa memicu stres.',
                 'image' => '../../storage/images/cek-dini/16.jpg'],
                ['id' => 3, 'title' => 'Aktivitas Fisik', 'description' => 'Berolahraga secara teratur adalah salah satu cara paling efektif untuk mengurangi stres. Ketika Anda berolahraga, tubuh melepaskan endorfin, hormon yang dikenal sebagai "hormon kebahagiaan", yang membantu meningkatkan mood dan membuat Anda merasa lebih rileks. Selain itu, aktivitas fisik juga membantu mengalihkan pikiran dari masalah sehari-hari, memberikan kesempatan bagi otak untuk beristirahat dan memulihkan diri. Tidak perlu melakukan olahraga berat; bahkan aktivitas sederhana seperti berjalan kaki atau bersepeda bisa memberikan manfaat yang signifikan. Dengan menjaga rutinitas olahraga yang teratur, Anda dapat mengelola stres dengan lebih baik dan meningkatkan kesehatan fisik sekaligus mental.',
                 'image' => '../../storage/images/cek-dini/02.jpg'],
                ['id' => 4, 'title' => 'Konseling', 'description' => 'Berbicara dengan seorang terapis atau konselor profesional dapat memberikan dukungan yang sangat dibutuhkan dalam mengatasi stres. Terapis dapat membantu Anda mengidentifikasi penyebab stres dan mengajarkan strategi untuk mengelola pikiran dan emosi yang sulit. Mereka juga dapat memberikan perspektif baru yang mungkin tidak Anda lihat sendiri, membantu Anda mengatasi situasi dengan cara yang lebih sehat. Selain itu, konseling menyediakan ruang yang aman untuk mengekspresikan perasaan tanpa takut dihakimi, yang dapat sangat melegakan. Dengan dukungan seorang profesional, Anda dapat menemukan cara-cara yang lebih efektif untuk mengatasi stres dan meningkatkan kualitas hidup Anda.',
                 'image' => '../../storage/images/cek-dini/13.jpg'],
            ]
        ],
        'depresi' => [
            'title' => 'depresi',
            'image' => 'storage/images/cek-dini/11.jpg',
            'questions' => [
                'Apakah Anda merasa sedih, kosong, atau putus asa hampir setiap hari?',
                'Apakah Anda kehilangan minat atau kesenangan dalam aktivitas yang biasanya Anda nikmati?',
                'Apakah Anda mengalami perubahan signifikan dalam nafsu makan atau berat badan, baik penurunan atau peningkatan yang tidak terduga?',
                'Apakah Anda merasa lelah atau kehilangan energi hampir setiap hari, bahkan dengan istirahat yang cukup?',
                'Apakah Anda mengalami kesulitan tidur, seperti insomnia atau tidur berlebihan?',
                'Apakah Anda merasa tidak berharga atau merasa bersalah yang berlebihan hampir setiap hari?',
                'Apakah Anda mengalami kesulitan berkonsentrasi, membuat keputusan, atau berpikir jernih?',
                'Apakah Anda memiliki pikiran tentang kematian atau bunuh diri, atau merasa seperti hidup tidak bernilai?',
                'Apakah Anda merasa terasing atau terputus dari orang lain, atau mengalami penurunan dalam hubungan sosial?',
                'Apakah Anda merasa cemas atau mudah marah tanpa alasan yang jelas?'
            ],
            'solutions' => [
                ['id' => 1, 'title' => 'Terapi Psikologis', 'description' => 'Terapi psikologis seperti Terapi Kognitif-Perilaku (CBT) dan terapi interpersonal adalah metode yang terbukti efektif untuk mengatasi depresi. CBT, misalnya, membantu Anda mengenali dan mengubah pola pikir negatif yang berkontribusi pada perasaan depresi. Dengan memahami bagaimana pikiran Anda memengaruhi emosi dan perilaku, Anda dapat belajar menggantinya dengan cara berpikir yang lebih positif dan realistis. Terapi interpersonal, di sisi lain, fokus pada bagaimana hubungan dan interaksi sosial memengaruhi suasana hati Anda, serta membantu memperbaiki dan memperkuat hubungan tersebut. Dengan dukungan terapi ini, Anda dapat membangun keterampilan untuk mengatasi depresi dan meningkatkan kesejahteraan emosional Anda.', 
                'image' => '../../storage/images/cek-dini/10.jpg'],
                ['id' => 2, 'title' => 'Dukungan Sosial', 'description' => 'Memiliki dukungan dari teman, keluarga, atau kelompok pendukung sangat penting dalam mengatasi depresi. Berbicara dengan seseorang yang Anda percayai bisa membantu meringankan beban emosional dan memberikan rasa bahwa Anda tidak sendirian dalam perjuangan ini. Dukungan sosial dapat datang dalam berbagai bentuk, seperti mendengarkan, memberikan nasihat, atau sekadar menjadi teman yang hadir. Interaksi sosial yang positif dapat meningkatkan rasa harga diri dan memberikan dorongan emosional yang sangat dibutuhkan. Dengan dukungan dari orang-orang terdekat, Anda dapat merasa lebih diterima dan termotivasi untuk terus berjuang melawan depresi.', 
                'image' => '../../storage/images/cek-dini/13.jpg'],
                ['id' => 3, 'title' => 'Aktivitas Fisik', 'description' => 'Olahraga secara teratur tidak hanya bermanfaat bagi kesehatan fisik, tetapi juga memiliki dampak positif yang signifikan pada kesehatan mental, terutama dalam mengatasi depresi. Aktivitas fisik dapat meningkatkan produksi endorfin, yang dikenal sebagai "hormon kebahagiaan", yang dapat membantu mengurangi perasaan depresi. Selain itu, olahraga juga membantu mengalihkan perhatian dari pikiran negatif dan memberikan rasa pencapaian yang bisa meningkatkan mood. Tidak perlu melakukan olahraga yang intens; bahkan aktivitas ringan seperti berjalan kaki, berenang, atau yoga dapat memberikan manfaat besar. Dengan memasukkan aktivitas fisik ke dalam rutinitas harian Anda, Anda dapat merasa lebih berenergi, positif, dan mampu mengatasi depresi dengan lebih baik.', 
                'image' => '../../storage/images/cek-dini/02.jpg'],
                ['id' => 4, 'title' => 'Obat Antidepresan', 'description' => 'Untuk beberapa orang, obat antidepresan dapat menjadi bagian penting dari pengobatan depresi. Obat ini bekerja dengan menyeimbangkan zat kimia di otak yang memengaruhi suasana hati, seperti serotonin dan norepinefrin. Penting untuk memahami bahwa obat antidepresan bukanlah solusi instan, dan biasanya memerlukan waktu beberapa minggu untuk mulai menunjukkan efeknya. Dokter akan memantau respons Anda terhadap obat dan menyesuaikan dosis jika diperlukan. Meskipun obat antidepresan bisa sangat membantu dalam mengelola gejala, seringkali lebih efektif bila dikombinasikan dengan terapi psikologis. Dengan pendekatan yang tepat, obat antidepresan dapat membantu mengurangi gejala depresi dan memulihkan fungsi normal dalam kehidupan sehari-hari.', 
                'image' => '../../storage/images/cek-dini/17.jpg'],
            ]
        ],
        'trauma' => [
            'title' => 'trauma',
            'image' => 'storage/images/cek-dini/06.jpg',
            'questions' => [
                'Apakah Anda sering mengalami kilas balik atau ingatan yang mengganggu tentang kejadian traumatis?',
                'Apakah Anda merasa terjaga atau waspada secara berlebihan, seperti terjaga di malam hari atau mudah terkejut?',
                'Apakah Anda merasa tidak bisa menghindari atau menjauh dari situasi atau tempat yang mengingatkan Anda pada trauma?',
                'Apakah Anda mengalami perasaan kebekuan emosional atau sulit merasakan emosi seperti biasanya?',
                'Apakah Anda sering merasa terasing atau terputus dari orang lain, bahkan dari orang-orang terdekat?',
                'Apakah Anda memiliki mimpi buruk atau gangguan tidur yang terkait dengan pengalaman traumatis?',
                'Apakah Anda mengalami perasaan marah atau kemarahan yang tidak dapat dijelaskan atau tidak sesuai dengan situasi saat ini?',
                'Apakah Anda merasa tidak berdaya atau tidak mampu menghadapi situasi atau masalah sehari-hari?',
                'Apakah Anda cenderung menghindari percakapan, aktivitas, atau tempat yang mengingatkan Anda pada trauma?',
                'Apakah Anda mengalami gangguan dalam fungsi sehari-hari, seperti kesulitan bekerja, belajar, atau berhubungan dengan orang lain, karena gejala yang terkait dengan trauma?'
            ],
            'solutions' => [
                ['id' => 1, 'title' => 'Terapi Trauma', 'description' => 'Terapi yang difokuskan pada trauma, seperti Terapi Pemrosesan Kognitif (CPT) dan Eye Movement Desensitization and Reprocessing (EMDR), dirancang khusus untuk membantu individu mengatasi efek jangka panjang dari pengalaman traumatis. CPT membantu individu mengubah cara mereka memandang dan menafsirkan trauma, sementara EMDR melibatkan gerakan mata yang berirama untuk membantu memproses dan mengurangi intensitas kenangan traumatis. Kedua metode ini telah terbukti efektif dalam mengurangi gejala trauma seperti flashback, mimpi buruk, dan kecemasan. Dengan bantuan terapis yang terlatih, terapi ini dapat membantu Anda memproses trauma dengan cara yang lebih sehat dan memungkinkan Anda untuk melanjutkan hidup tanpa dibayangi oleh pengalaman masa lalu.', 
                'image' => '../../storage/images/cek-dini/10.jpg'],
                ['id' => 2, 'title' => 'Dukungan Sosial', 'description' => 'Berbicara tentang pengalaman traumatis dengan seseorang yang Anda percayai bisa menjadi langkah penting dalam proses penyembuhan. Dukungan dari teman, keluarga, atau kelompok pendukung dapat memberikan rasa aman dan penerimaan, yang sangat penting dalam menghadapi trauma. Dengan berbagi cerita dan perasaan, Anda bisa mendapatkan perspektif baru dan merasa lebih didukung. Dukungan sosial juga bisa membantu mengurangi rasa isolasi yang sering kali menyertai trauma, membuat Anda merasa lebih terhubung dengan dunia sekitar. Ketika Anda dikelilingi oleh orang-orang yang peduli, Anda memiliki fondasi emosional yang kuat untuk pulih dari trauma.', 
                'image' => '../../storage/images/cek-dini/12.jpg'],
                ['id' => 3, 'title' => 'Latihan Mindfulness', 'description' => 'Mindfulness adalah praktik yang mengajarkan Anda untuk tetap hadir dan sadar dalam momen saat ini, tanpa menghakimi. Bagi mereka yang mengalami trauma, mindfulness bisa menjadi alat yang sangat efektif untuk mengelola reaksi emosional yang intens dan mengurangi pengaruh kenangan traumatis. Dengan berlatih mindfulness, Anda belajar untuk mengamati pikiran dan perasaan Anda tanpa terjebak dalamnya, yang dapat membantu mengurangi kecemasan dan stres yang berhubungan dengan trauma. Latihan ini juga membantu meningkatkan kesadaran diri dan penerimaan, yang merupakan langkah penting dalam proses penyembuhan dari trauma. Dengan berlatih mindfulness secara teratur, Anda dapat mengembangkan kemampuan untuk menghadapi trauma dengan cara yang lebih tenang dan terkendali.',
                 'image' => '../../storage/images/cek-dini/03.jpg'],
                ['id' => 4, 'title' => 'Pengobatan', 'description' => 'Membantu individu tetap terhubung dengan momen saat ini dan mengurangi reaksi traumatis.', 'image' => '../../storage/images/cek-dini/17.jpg'],
            ]
        ],
        'gangguan mood' => [
            'title' => 'gangguan mood',
            'image' => 'storage/images/cek-dini/14.jpg',
            'questions' => [
                'Apakah Anda mengalami perubahan suasana hati yang ekstrem, seperti merasa sangat bahagia atau sangat sedih secara tiba-tiba?',
                'Apakah Anda sering merasa tertekan atau tidak bersemangat untuk melakukan aktivitas sehari-hari yang biasanya Anda nikmati?',
                'Apakah Anda mengalami perasaan cemas atau kegelisahan yang berlebihan tanpa alasan yang jelas?',
                'Apakah Anda merasa mudah marah atau frustrasi yang tidak sesuai dengan situasi saat ini?',
                'Apakah Anda mengalami perubahan signifikan dalam pola tidur, seperti insomnia atau tidur berlebihan, yang mempengaruhi kualitas hidup Anda?',
                'Apakah Anda mengalami kesulitan berkonsentrasi atau merasa otak Anda lambat dalam berpikir?',
                'Apakah Anda merasa tidak memiliki energi atau merasa lelah hampir setiap hari, meskipun tidak melakukan aktivitas berat?',
                'Apakah Anda mengalami perubahan nafsu makan yang signifikan, seperti makan berlebihan atau kehilangan selera makan?',
                'Apakah Anda sering merasa tidak berharga atau memiliki perasaan bersalah yang berlebihan?',
                'Apakah Anda memiliki pikiran tentang kematian atau bunuh diri, atau merasa seperti hidup tidak bernilai?'
            ],
            'solutions' => [
                ['id' => 1, 'title' => 'Terapi Psikologis', 'description' => ' Terapi psikologis seperti Terapi Kognitif-Perilaku (CBT) dan terapi interpersonal adalah pendekatan yang efektif untuk mengelola gangguan mood seperti gangguan bipolar atau depresi berat. CBT membantu Anda mengenali dan mengubah pola pikir negatif yang dapat memicu perubahan mood yang ekstrem. Dengan memahami bagaimana pikiran mempengaruhi emosi, Anda dapat belajar untuk mengendalikan reaksi emosional dan mencegah perubahan mood yang tiba-tiba. Terapi interpersonal fokus pada bagaimana hubungan sosial dan interaksi mempengaruhi suasana hati Anda, serta membantu memperbaiki dan memperkuat hubungan tersebut. Dengan dukungan terapis, Anda dapat belajar strategi untuk menjaga stabilitas mood dan meningkatkan kualitas hidup Anda secara keseluruhan.',
                 'image' => '../../storage/images/cek-dini/10.jpg'],
                ['id' => 2, 'title' => 'Rutin Harian yang Terstruktur', 'description' => 'Menjaga rutinitas harian yang teratur adalah strategi penting untuk mengelola gangguan mood. Kebiasaan sehari-hari seperti tidur yang cukup, makan pada waktu yang teratur, dan berolahraga secara rutin dapat membantu menstabilkan mood dan mencegah perubahan mood yang tiba-tiba. Tidur yang cukup sangat penting karena kurang tidur dapat memicu perubahan mood yang negatif, terutama pada mereka yang rentan terhadap gangguan mood. Selain itu, aktivitas fisik dan diet yang seimbang dapat membantu menjaga keseimbangan hormon dan zat kimia di otak, yang berperan penting dalam mengatur suasana hati. Dengan menjaga rutinitas harian yang stabil, Anda dapat menciptakan lingkungan yang mendukung kestabilan emosional dan kesehatan mental yang baik.',
                 'image' => '../../storage/images/cek-dini/05.jpg'],
                ['id' => 3, 'title' => 'Dukungan Sosial', 'description' => 'Memiliki jaringan dukungan sosial yang kuat dapat membuat perbedaan besar dalam mengelola gangguan mood. Teman, keluarga, atau kelompok pendukung dapat memberikan dukungan emosional yang sangat dibutuhkan, serta membantu Anda tetap termotivasi dan fokus pada pengobatan Anda. Berbicara dengan orang-orang yang mengerti dan menerima Anda dapat mengurangi perasaan isolasi dan memberikan dorongan untuk terus berjuang melawan gangguan mood. Dukungan sosial juga bisa menjadi sumber dorongan positif, membantu Anda melihat hal-hal dari perspektif yang lebih seimbang dan positif. Dengan dukungan dari orang-orang terdekat, Anda dapat merasa lebih mampu mengelola gangguan mood dan menjaga keseimbangan emosional dalam kehidupan sehari-hari.',
                 'image' => '../../storage/images/cek-dini/12.jpg'],
                ['id' => 4, 'title' => 'Obat-obatan', 'description' => 'Untuk beberapa orang dengan gangguan mood, obat-obatan stabil mood seperti lithium atau antikonvulsan mungkin diperlukan untuk membantu mengontrol perubahan mood yang ekstrem. Obat ini bekerja dengan menyeimbangkan zat kimia di otak yang terkait dengan regulasi suasana hati, membantu mencegah episode mania atau depresi yang parah. Penting untuk mengambil obat sesuai dengan petunjuk dokter dan melaporkan setiap efek samping yang mungkin terjadi. Obat stabil mood sering kali menjadi bagian dari rencana pengobatan jangka panjang yang dikombinasikan dengan terapi psikologis untuk hasil yang optimal. Dengan pengelolaan yang tepat, obat stabil mood dapat membantu individu dengan gangguan mood menjalani kehidupan yang lebih stabil dan produktif.', 
                'image' => '../../storage/images/cek-dini/17.jpg'],
            ]
        ],
        'adiksi ( kecanduan )' => [
            'title' => 'adiksi ( kecanduan )',
            'image' => 'storage/images/cek-dini/01.jpg',
            'questions' => [
                'Apakah Anda merasa tidak bisa mengontrol keinginan atau dorongan untuk menggunakan zat atau melakukan perilaku tertentu, meskipun Anda ingin berhenti?',
                'Apakah Anda terus menggunakan zat atau melakukan perilaku tersebut meskipun sudah mengalami konsekuensi negatif dalam kehidupan Anda?',
                'Apakah Anda menghabiskan banyak waktu untuk mendapatkan, menggunakan, atau pulih dari efek zat atau perilaku tersebut?',
                'Apakah Anda mengalami penurunan minat atau keinginan untuk melakukan aktivitas lain yang sebelumnya Anda nikmati?',
                'Apakah Anda merasa gelisah, cemas, atau tidak nyaman saat tidak menggunakan zat atau tidak melakukan perilaku adiktif?',
                'Apakah Anda sering mengabaikan tanggung jawab pekerjaan, sekolah, atau rumah tangga karena penggunaan zat atau perilaku adiktif?',
                'Apakah Anda mengalami perubahan signifikan dalam pola tidur atau nafsu makan karena penggunaan zat atau perilaku adiktif?',
                'Apakah Anda merasa harus meningkatkan jumlah zat yang digunakan atau intensitas perilaku untuk mencapai efek yang sama?',
                'Apakah Anda mengalami konflik atau masalah dalam hubungan pribadi karena penggunaan zat atau perilaku adiktif?',
                'Apakah Anda pernah berusaha untuk berhenti atau mengurangi penggunaan zat atau perilaku tetapi tidak berhasil?'
            ],
            'solutions' => [
                ['id' => 1, 'title' => 'Terapi Adiksi', 'description' => 'Terapi adiksi, seperti Terapi Perilaku Kognitif (CBT) dan terapi motivasi, dirancang untuk membantu individu mengatasi ketergantungan pada zat atau perilaku tertentu. CBT membantu Anda mengenali pemicu adiksi dan mengembangkan strategi untuk menghadapinya tanpa kembali ke kebiasaan lama. Terapi motivasi fokus pada membangun dorongan internal untuk berubah dan tetap berkomitmen pada pemulihan. Kedua pendekatan ini sering kali digunakan bersama-sama untuk menciptakan rencana pemulihan yang komprehensif. Dengan bimbingan seorang terapis, Anda dapat belajar bagaimana mengatasi tantangan yang terkait dengan adiksi dan membangun kehidupan yang lebih sehat dan bebas dari ketergantungan.',
                 'image' => '../../storage/images/cek-dini/08.jpg'],
                ['id' => 2, 'title' => 'Detoksifikasi Medis', 'description' => 'Dalam beberapa kasus, terutama ketika menghadapi ketergantungan pada zat yang sangat adiktif seperti alkohol atau obat-obatan, detoksifikasi medis mungkin diperlukan. Proses ini melibatkan pengawasan medis yang ketat untuk membantu tubuh membersihkan diri dari zat adiktif secara aman. Detoksifikasi medis dapat mencegah gejala penarikan yang berbahaya dan memastikan bahwa tubuh Anda siap untuk tahap pemulihan berikutnya. Dokter atau tim medis akan memantau kondisi Anda secara terus-menerus selama proses ini dan memberikan obat atau perawatan yang diperlukan untuk mengurangi ketidaknyamanan. Setelah detoksifikasi, Anda dapat melanjutkan dengan terapi dan dukungan yang diperlukan untuk mencapai pemulihan jangka panjang.', 
                'image' => '../../storage/images/cek-dini/10.jpg'],
                ['id' => 3, 'title' => 'Pengobatan', 'description' => 'Untuk beberapa bentuk adiksi, seperti ketergantungan pada opiat atau alkohol, pengobatan medis mungkin diperlukan untuk membantu mengurangi keinginan dan mencegah kambuh. Obat-obatan seperti metadon, buprenorfin, atau naltrekson digunakan untuk mengelola gejala penarikan dan mengurangi hasrat terhadap zat tersebut. Obat ini bekerja dengan cara menghalangi efek zat adiktif atau menggantinya dengan zat yang kurang berbahaya, yang membantu mengurangi ketergantungan secara bertahap. Dokter akan bekerja sama dengan Anda untuk menemukan pengobatan yang paling cocok untuk situasi Anda dan memantau kemajuan Anda selama proses pemulihan. Dengan dukungan pengobatan yang tepat, Anda dapat lebih mudah mengatasi adiksi dan mencapai kehidupan yang lebih sehat dan bebas dari ketergantungan.', 
                'image' => '../../storage/images/cek-dini/19.jpg'],
                ['id' => 4, 'title' => 'Dukungan Kelompok', 'description' => 'Untuk beberapa bentuk adiksi, seperti ketergantungan pada opiat atau alkohol, pengobatan medis mungkin diperlukan untuk membantu mengurangi keinginan dan mencegah kambuh. Obat-obatan seperti metadon, buprenorfin, atau naltrekson digunakan untuk mengelola gejala penarikan dan mengurangi hasrat terhadap zat tersebut. Obat ini bekerja dengan cara menghalangi efek zat adiktif atau menggantinya dengan zat yang kurang berbahaya, yang membantu mengurangi ketergantungan secara bertahap. Dokter akan bekerja sama dengan Anda untuk menemukan pengobatan yang paling cocok untuk situasi Anda dan memantau kemajuan Anda selama proses pemulihan. Dengan dukungan pengobatan yang tepat, Anda dapat lebih mudah mengatasi adiksi dan mencapai kehidupan yang lebih sehat dan bebas dari ketergantungan.', 
                'image' => '../../storage/images/cek-dini/12.jpg'],
                
            ]
        ],
        'gangguan kecemasan' => [
            'title' => 'gangguan kecemasan',
            'image' => 'storage/images/cek-dini/18.jpg',
            'questions' => [
                'Apakah Anda sering merasa cemas atau khawatir secara berlebihan tentang berbagai hal dalam hidup Anda, bahkan ketika tidak ada ancaman nyata?',
                'Apakah Anda mengalami serangan panik, yang ditandai dengan gejala fisik seperti detak jantung cepat, sesak napas, atau rasa pusing?',
                'Apakah Anda merasa sulit untuk mengendalikan kekhawatiran atau ketegangan yang sering Anda rasakan?',
                'Apakah Anda menghindari situasi atau tempat tertentu karena rasa cemas atau ketakutan yang intens?',
                'Apakah Anda merasa cemas secara berlebihan tentang hal-hal sehari-hari, seperti pekerjaan, kesehatan, atau hubungan, yang mengganggu aktivitas sehari-hari Anda?',
                'Apakah Anda mengalami kesulitan tidur atau sering terbangun di malam hari karena kecemasan atau kekhawatiran?',
                'Apakah Anda sering merasa tegang atau mudah terjaga, seperti merasa cemas atau gelisah secara terus-menerus?',
                'Apakah Anda mengalami gejala fisik seperti ketegangan otot, sakit kepala, atau gangguan pencernaan yang terkait dengan kecemasan?',
                'Apakah Anda merasa cemas tentang masa depan atau mengalami ketidakmampuan untuk fokus karena perasaan cemas yang berlebihan?',
                'Apakah Anda merasa sulit untuk melakukan tugas-tugas sehari-hari atau menjalani rutinitas normal karena kecemasan yang Anda rasakan?'
            ],
            'solutions' => [
                ['id' => 1, 'title' => 'Terapi Kognitif-Perilaku (CBT)', 'description' => ' Terapi psikologis seperti Terapi Kognitif-Perilaku (CBT) adalah salah satu pendekatan paling efektif untuk mengatasi gangguan kecemasan. CBT membantu Anda mengidentifikasi dan mengubah pola pikir negatif atau irasional yang memicu kecemasan. Dengan bantuan seorang terapis, Anda dapat belajar teknik untuk mengelola pikiran dan perasaan yang menyebabkan kecemasan, serta mengembangkan keterampilan coping yang lebih sehat. Terapi ini juga sering kali mencakup latihan pernapasan dan relaksasi, yang dapat membantu mengurangi gejala fisik kecemasan seperti detak jantung yang cepat atau sesak napas. Dengan dukungan terapi psikologis, Anda dapat mengurangi kecemasan dan meningkatkan kualitas hidup Anda.', 
                'image' => '../../storage/images/cek-dini/10.jpg'],
                ['id' => 2, 'title' => 'Teknik Relaksasi', 'description' => 'Latihan relaksasi seperti meditasi, yoga, dan latihan pernapasan adalah teknik yang efektif untuk mengurangi kecemasan. Meditasi membantu menenangkan pikiran dengan mengarahkan perhatian pada saat ini, yang dapat mengurangi pemikiran yang berlebihan yang sering kali menyebabkan kecemasan. Yoga menggabungkan gerakan fisik dengan pernapasan yang dalam dan teratur, membantu menenangkan sistem saraf dan mengurangi ketegangan. Latihan pernapasan dalam juga efektif dalam menurunkan detak jantung dan menciptakan perasaan tenang. Dengan berlatih teknik relaksasi ini secara rutin, Anda dapat mengelola gejala kecemasan dengan lebih baik dan meningkatkan kesejahteraan secara keseluruhan.', 
                'image' => '../../storage/images/cek-dini/15.jpg'],
                ['id' => 3, 'title' => 'Dukungan Sosial', 'description' => 'Dukungan dari teman, keluarga, atau kelompok pendukung dapat memberikan rasa aman dan membantu Anda merasa lebih terkendali saat menghadapi gangguan kecemasan. Berbicara dengan seseorang yang Anda percayai dapat membantu meringankan beban emosional dan memberikan perspektif baru. Kelompok pendukung menawarkan ruang untuk berbagi pengalaman dan belajar dari orang lain yang menghadapi tantangan serupa. Dukungan sosial juga dapat membantu mengurangi rasa isolasi yang sering kali menyertai gangguan kecemasan. Dengan dukungan dari orang-orang terdekat, Anda dapat merasa lebih kuat dan mampu mengatasi kecemasan dalam kehidupan sehari-hari.', 
                'image' => '../../storage/images/cek-dini/03.jpg'],
                ['id' => 4, 'title' => 'Obat-obatan', 'description' => ' Untuk beberapa orang dengan gangguan kecemasan yang parah, obat anti-kecemasan mungkin diperlukan untuk membantu mengendalikan gejala. Obat-obatan seperti benzodiazepin atau antidepresan dapat membantu mengurangi gejala kecemasan dalam jangka pendek atau panjang, tergantung pada kebutuhan Anda. Benzodiazepin biasanya digunakan untuk meredakan kecemasan dalam situasi akut, sementara antidepresan digunakan untuk pengelolaan jangka panjang. Dokter akan bekerja sama dengan Anda untuk menemukan dosis dan jenis obat yang paling sesuai dengan kondisi Anda. Meskipun obat dapat membantu mengurangi gejala kecemasan, penting untuk menggunakannya sebagai bagian dari rencana pengobatan yang komprehensif yang mencakup terapi psikologis.', 
                'image' => '../../storage/images/cek-dini/17.jpg'],
            ]
        ],
        // Topik lainnya...
    ];

    public function showTopics()
    {
        $topics = $this->topics;
        return view('user/question/topic', compact('topics'));
    }

    public function showQuestions($topic)
    {
        $topicData = $this->topics[$topic];
        session(['topic' => $topic, 'yes_count' => 0]);
        $totalQuestions = count($topicData['questions']);
        return view('user/question/question', [
            'topic' => $topicData, 
            'questionIndex' => 0, 
            'totalQuestions' => $totalQuestions
        ]);
    }

    public function submitAnswer(Request $request, $topic)
    {
        $topicData = $this->topics[$topic];
        $questionIndex = $request->input('questionIndex');
        $answer = $request->input('answer');

        if ($answer === 'yes') {
            session(['yes_count' => session('yes_count') + 1]);
        }

        $totalQuestions = count($topicData['questions']);

        if ($questionIndex + 1 < $totalQuestions) {
            return view('user/question/question', [
                'topic' => $topicData, 
                'questionIndex' => $questionIndex + 1, 
                'totalQuestions' => $totalQuestions
            ]);
        }

        return redirect()->route('result', ['topic' => $topic]);
    }


    public function showResult($topic)
    {
        $topicData = $this->topics[$topic];
        $yesCount = session('yes_count');
        $severity = '';

        // Tentukan keterangan berdasarkan jumlah jawaban 'yes'
        if ($yesCount >= 7) {
            $severity = 'Gejala Berat';
        } elseif ($yesCount >= 5) {
            $severity = 'Gejala Cukup Berat';
        } elseif ($yesCount >= 2) {
            $severity = 'Gejala Ringan';
        } else {
            $severity = 'Tidak Ada Gejala yang Signifikan';
        }

        return view('user/question/result', [
            'topic' => $topicData, 
            'yesCount' => $yesCount,
            'severity' => $severity,
            'hasSymptoms' => $yesCount >= 2 // Sesuai kriteria, minimal 2 jawaban 'yes' untuk menandakan gejala
        ]);
    }

    public function showSolution($topic, $solutionId)
    {
        $topicData = $this->topics[$topic];
        $solution = collect($topicData['solutions'])->firstWhere('id', $solutionId);

        return view('user/question/solution', ['solution' => $solution]);
    }
}