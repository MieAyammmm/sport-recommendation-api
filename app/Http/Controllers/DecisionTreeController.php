<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DecisionTreeController extends Controller
{
  
    public function index()
    {
        return response()->json([
            'tree' => $this->buildTree()
        ]);
    }

    private function buildTree(): array
    {
        return [
            "question" => "Apakah Anda memiliki penyakit pada sistem pernapasan, seperti asma atau bronkitis?",
            "yes" => [
                "question" => "Apakah Anda akan berolahraga di dalam ruangan, misalnya di ruang ber-AC atau di dalam rumah?",
                "yes" => ["recommendation" => "RENANG. Olahraga ini sangat aman untuk penderita asma karena udara di sekitar kolam renang cenderung lembab dan hangat, sehingga tidak memicu penyempitan saluran pernapasan."],
                "no"  => ["recommendation" => "JALAN KAKI. Lakukan di pagi hari setelah embun mengering. Gunakan masker jika cuaca dingin, dan hindari jalan kaki saat polusi udara tinggi."]
            ],
            "no" => [
                "question" => "Apakah Anda memiliki penyakit yang berhubungan dengan jantung atau tekanan darah, seperti hipertensi, penyakit jantung koroner, atau riwayat stroke?",
                "yes" => [
                    "question" => "Apakah Anda lebih tertarik melakukan olahraga kardio ringan yang melatih detak jantung, seperti jalan cepat atau bersepeda santai?",
                    "yes" => ["recommendation" => "JALAN CEPAT. Lakukan selama 20-30 menit setiap hari. Pantau tekanan darah sebelum dan sesudah berolahraga. Jangan memaksakan diri jika merasa pusing atau sesak."],
                    "no"  => ["recommendation" => "YOGA RINGAN. Pilih gerakan yoga yang tidak membalikkan kepala ke bawah, seperti pose gunung (Tadasana) atau pose pohon (Vrksasana). Hindari headstand atau shoulderstand."]
                ],
                "no" => [
                    "question" => "Apakah Anda memiliki penyakit metabolik seperti diabetes (gula darah tinggi) atau pra-diabetes?",
                    "yes" => [
                        "question" => "Apakah Anda menginginkan olahraga yang aman untuk kaki Anda, mengingat penderita diabetes rentan terhadap luka pada telapak kaki?",
                        "yes" => ["recommendation" => "JALAN KAKI. Aktivitas ini sangat baik untuk menurunkan gula darah. Gunakan sepatu yang nyaman dan periksa telapak kaki Anda setelah berolahraga untuk memastikan tidak ada luka atau lecet."],
                        "no"  => ["recommendation" => "BERSEPEDA STATIS (stationary bike). Olahraga ini aman untuk sirkulasi darah dan tidak membebani persendian kaki. Lakukan selama 15-20 menit setiap hari."]
                    ],
                    "no" => [
                        "question" => "Apakah Anda memiliki masalah pada tulang atau persendian, seperti osteoporosis (pengeroposan tulang), asam urat, atau radang sendi (arthritis)?",
                        "yes" => [
                            "question" => "Apakah Anda menginginkan olahraga dengan benturan rendah (low impact) yang tidak membebani tulang dan sendi secara berlebihan?",
                            "yes" => ["recommendation" => "RENANG. Olahraga ini sangat direkomendasikan karena air menahan beban tubuh sehingga tidak membebani tulang dan sendi. Hindari gaya dada jika lutut Anda bermasalah."],
                            "no"  => ["recommendation" => "JALAN KAKI DI ATAS TANAH RUMPUT. Hindari berjalan di aspal atau beton yang keras. Gunakan sepatu dengan bantalan tebal. Jangan berlari atau melompat."]
                        ],
                        "no" => [
                            "question" => "Apakah Anda memiliki masalah pencernaan seperti maag (gastritis) atau GERD (asam lambung naik)?",
                            "yes" => [
                                "question" => "Apakah Anda lebih nyaman berolahraga dengan posisi tubuh tegak tanpa tekanan pada area perut?",
                                "yes" => ["recommendation" => "JALAN KAKI SETELAH MAKAN. Tunggu minimal 1 jam setelah makan baru boleh jalan kaki. Lakukan dengan kecepatan santai selama 15-20 menit. Hindari jalan kaki langsung setelah makan besar."],
                                "no"  => ["recommendation" => "RENANG GAYA BEBAS. Olahraga ini aman untuk penderita maag karena posisi tubuh telentang/tengkurap tidak menekan perut. Hindari gaya dada yang menekan area perut."]
                            ],
                            "no" => [
                                "question" => "Apakah Anda sering mengalami nyeri pada punggung bagian bawah (lower back pain) atau pernah didiagnosis dengan saraf kejepit (HNP)?",
                                "yes" => [
                                    "question" => "Apakah Anda ingin berolahraga di dalam air, seperti renang atau aqua aerobics?",
                                    "yes" => ["recommendation" => "RENANG GAYA DADA (BREASTSTROKE). Hati-hati dengan gaya punggung. Konsultasikan dengan fisioterapis sebelum memulai. Hindari gerakan memutar pinggang."],
                                    "no"  => ["recommendation" => "PEREGANGAN RINGAN (STRETCHING). Fokus pada peregangan punggung dan pinggang. Lakukan gerakan kucing-sapi (cat-cow stretch) secara perlahan. Jangan memaksakan diri."]
                                ],
                                "no" => ["recommendation" => "OLAHRAGA BEBAS PILIHAN ANDA! Karena Anda tidak memiliki penyakit tertentu, Anda dapat memilih olahraga apa pun yang Anda sukai. Rekomendasi: jogging, bersepeda, renang, atau senam aerobik. Lakukan secara rutin 3-5 kali seminggu."]
                            ]
                        ]
                    ]
                ]
            ]
        ];
    }
}