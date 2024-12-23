<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        /* CSS Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            width: 100%;
            height: 100%;
            font-family: 'Poppins', sans-serif;
            line-height: 1.5;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 210mm;
            height: 297mm;
            overflow: hidden;
            position: relative;
        }

        img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .nosertif {
            position: absolute;
            top: 155px;
            left: 0;
            right: 0;
            color: #FFFFFF;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            z-index: 1;
        }

        .nama {
            position: absolute;
            top: 240px;
            left: 0;
            right: 0;
            color: #193C7D;
            text-align: center;
            font-size: 36px;
            font-weight: bold;
            line-height: 0.8;
            z-index: 2;
        }

        .instansi {
            position: absolute;
            top: 260px;
            left: 0;
            right: 0;
            color: #193C7D;
            text-align: center;
            font-size: 26px;
            font-weight: bold;
            z-index: 2;
        }

        .keterangan {
            position: absolute;
            top: 320px;
            left: 50%;
            transform: translateX(-50%);
            color: #193C7D;
            width: 600px;
            text-align: center;
            font-size: 18px;
            line-height: 0.8;
            z-index: 2;
        }

        .highlight {
            color: #066BC4;
            font-weight: bold;
        }

        .materi {
            color: #FFFFFF;
            width: 200px;
            position: absolute;
            text-align: left;
            top: 600px;
            z-index: 50;
            font-size: 16px;
            left: 130px;
            line-height: 0.8;
        }

        .jp1, .jp2 {
            color: #49496B;
            position: absolute;
            text-align: center;
            z-index: 51;
            font-size: 12px;
            font-weight: bold;
            line-height: 0.8;
        }

        .jp1 {
            top: 603px;
            right: 293px;
        }

        .jp2 {
            top: 603px;
            right: 143px;
        }

        .jp-total {
            color: #49496B;
            position: absolute;
            text-align: center;
            top: 625px;
            z-index: 53;
            font-size: 12px;
            font-weight: bold;
            right: 163px;
            line-height: 0.8;
        }

        .signature {
            background-color: rgba(255, 0, 0, 0);
            width: 120px;
            height: 120px;
            z-index: 200;
            position: absolute;
            top: 780px;
            right: 450px;
        }

        .pembicara {
            color: #49496B;
            position: absolute;
            text-align: center;
            top: 890px;
            z-index: 55;
            font-size: 16px;
            left: 210px;
            font-weight: bold;
            line-height: 0.8;
        }

        .jabatan {
            color: #49496B;
            position: absolute;
            text-align: center;
            top: 910px;
            z-index: 56;
            font-size: 14px;
            left: 180px;
            font-weight: bold;
            line-height: 0.6;
            width: 250px;
            word-wrap: break-word;
            overflow-wrap: break-word;
            white-space: normal;
        }

        .tanggaldibuat {
            color: #49496B;
            position: absolute;
            text-align: left;
            top: 758px;
            z-index: 57;
            font-size: 14px;
            right: 138px;
            font-weight: bold;
            line-height: 0.8;
        }

        .qrcode {
            background-color: red;
            width: 80px;
            height: 80px;
            z-index: 120;
            position: absolute;
            top: 980px;
            right: 210px;
        }

        @media print {
            @page {
                size: A4;
                margin: 0;
            }

            body {
                width: 210mm;
                height: 297mm;
            }

            img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
        }
    </style>
</head>
<body>
    <p class="nosertif">{{ $nosertif }}</p>
    <p class="nama">{{ $nama }}</p>
    <p class="instansi">{{ $instansi }}</p>
    <p class="keterangan">
        Sebagai <span class="highlight">Peserta</span> pada Kegiatan
        <span class="highlight">{{ $editedjudul }}</span> 
        yang diselenggarakan oleh Belajar Era Digital Pada Tanggal
        <span class="highlight">{{ $tanggal }}</span>
    </p>

    <p class="materi">{{$materi }}</p>
    <p class="jp1">2 JP</p>
    <p class="jp2">2 JP</p>
    <p class="jp-total">{{$jp}}</p>
    <img src="{{$imagettd}}" class="signature">
    <p class="pembicara">{{$pembicara}}</p>
    <p class="jabatan">{{$jabatan}}</p>
    <p class="tanggaldibuat"> {{ $tanggaldibuat }}</p>
    <img src="{{$qrcodeDataUri}}" class="qrcode">
    
    <img src="{{ $templateImage }}" alt="">
</body>
</html>
