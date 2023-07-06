@extends('layouts.mainlayout')

@section('title', 'Profile')


@section('content')
    @if (auth()->check() &&
            auth()->user()->hasRole('1'))

        <head>
            <style>
                .admin-quote {
                    font-size: 18px;
                    line-height: 1.5;
                    text-align: center;
                    margin: 50px auto;
                    max-width: 600px;
                }
            </style>
        </head>

        <body>
            <div class="admin-quote">
                <p>"Seorang admin yang jujur adalah fondasi kepercayaan. Dengan mengemban tugas dengan integritas, kita
                    membentuk landasan yang kuat bagi kemajuan dan keberhasilan organisasi."</p>
                <p>"Sebagai admin, tanggung jawab adalah komitmen yang tak terpisahkan. Setiap keputusan dan tindakan kita
                    mempengaruhi keseimbangan dan kualitas layanan yang kami berikan."</p>
                <p>"Kejujuran adalah kualitas inti seorang admin yang mengilhami kepercayaan dari rekan kerja dan pengguna.
                    Jadilah cerminan nilai-nilai yang kuat dan berkomitmen untuk menjaga standar tinggi."</p>
                <p>"Seorang admin bertanggung jawab tidak hanya melaksanakan tugas, tetapi juga membawa dampak positif dalam
                    menghadapi tantangan. Jadilah agen perubahan yang membawa inovasi dan pembaruan yang dibutuhkan."</p>
                <p>"Bertanggung jawab berarti tidak hanya menyelesaikan pekerjaan, tetapi juga menjaga transparansi,
                    akuntabilitas, dan melibatkan semua pihak yang terlibat. Hanya dengan kerjasama yang solid kita dapat
                    mencapai tujuan bersama."</p>
                <p>"Sebagai admin, kejujuran dan tanggung jawab adalah kompas yang membimbing setiap keputusan dan tindakan.
                    Dalam dunia yang kompleks ini, kita menjadi pilar kestabilan dan keandalan."</p>
                <p>"Menjadi admin yang jujur dan bertanggung jawab bukan hanya tentang status atau otoritas, tetapi lebih
                    dari itu, tentang memberikan contoh yang baik dan menginspirasi orang lain untuk mengikuti jejak
                    positif."</p>
            </div>
        </body>
    @else
        <x-rent-log-table :rentlog='$rent_logs' />
    @endif

@endsection
