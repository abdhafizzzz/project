<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>JABATAN PERTANIAN SABAH, MALAYSIA (LAMPIRAN C)</title>
    <style>
        body {
            line-height: 115%;
            font-family: Tahoma, sans-serif;
            font-size: 11pt;
        }

        p {
            margin: 0;
        }

        .ListParagraph {
            margin-left: 36pt;
            margin-bottom: 10pt;
            line-height: 115%;
            font-size: 11pt;
        }

        table {
            border: 0.75pt solid #000000;
            border-collapse: collapse;
        }

        table td {
            border: 0.75pt solid #000000;
            padding: 5.03pt;
            vertical-align: middle;
        }

        em {
            font-style: italic;
        }

        strong {
            font-weight: bold;
        }

        u {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <p style="text-align: center; margin-bottom: 10pt;"><u><strong><span style="font-size: 16px;">LAMPIRAN C</span></strong></u><strong><span style="font-size: 16px;">&nbsp;&ndash; (DISEMAK 2010)</span></strong></p>
    <p style="text-align: center; margin-bottom: 10pt;"><br></p>
    <p style="text-align: center; margin-bottom: 10pt;"><span style="font-size: 13px;"><strong><span style="font-family: Tahoma,Geneva, sans-serif;">Borang Pengesahan Akaun Bank Untuk Pembayaran</span></strong></span></p>
    <p style="text-align: center; margin-bottom: 10pt;"><span style="font-size: 13px; font-family: Tahoma, Geneva, sans-serif;"><strong>*Elaun / Baucer Bayaran Am</strong></span></p>
    <p style="text-align: center; margin-bottom: 10pt;"><span style="font-size: 13px;"><strong><span style="font-family: Tahoma,Geneva, sans-serif;">Melalui Alliance Online Banking</span></strong></span></p>
    <p style="text-align: center; margin-bottom: 10pt;"><br></p>
    <p style="margin-bottom: 10pt;">Nama Penerima/Syarikat (Sila guna HURUF BESAR): {{ strtoupper($lampiran->nama) }}</p>
    <p style="margin-bottom: 10pt; word-wrap: break-word;">Alamat Penerima/Syarikat (sila gunakan alamat Peti Surat): {{ strtoupper($lampiran->alamat) }}</p>
    <p style="margin-bottom: 10pt;">E-mel: {{ $email }}</p>
    <p style="margin-bottom: 10pt;">No. Tel. (Pejabat): {{$lampiran->telrumah ?? ''}}</p>
    <p style="margin-bottom: 10pt;">No. Tel. (Bimbit):{{$lampiran->telhp ?? ''}}</p>
    <p style="margin-bottom: 10pt;">
        No. Kad Pengenalan: <br><br>
        @foreach (str_split($lampiran->nokp) as $digit)
            <span style="border: 1px solid black; padding: 5px; float: left;">{{ $digit }}</span>
        @endforeach
    </p><br>
    <p style="margin-bottom: 10pt;">
        <p>Nombor Akaun Bank: (sila pastikan nombor akaun masih aktif dan dicatat dengan betul)</p> <br>
        @if ($lampiran->noakaun)
            @foreach (str_split($lampiran->noakaun) as $digit)
                <span style="border: 1px solid black; padding: 5px; float: left;">{{ $digit }}</span>
            @endforeach
            <div style="clear: both;"></div>
        @else
            belum di-isi/tiada
        @endif
    </p><br>

    <p style="text-align: center; margin-bottom: 10pt;"><em>(diisi tanpa sengkang dan jarak)</em></p><br>
    <p style="margin-bottom: 10pt;">Nama Bank: {{ strtoupper($namabank) ?? '' }}</p>
    <p style="margin-bottom: 10pt;">Cawangan Bank: {{ strtoupper($namacwgn) ?? '' }}</p>
    <p style="margin-bottom: 10pt;">Saya sahkan bahawa maklumat dan butir-butir mengenai akaun Bank seperti di atas adalah benar dan milik sah saya/Syarikat kami:</p>
    <p style="margin-bottom: 10pt;">( _____________________________________ )</p>
    <p style="margin-left: 36pt; text-indent: 36pt; margin-bottom: 10pt;">Tandatangan</p>
    <p style="margin-bottom: 10pt;">Nama:</p>
    <p style="margin-bottom: 10pt;">Jawatan: Cop Rasmi Syarikat/Perniagaan:</p>
    <p style="margin-bottom: 10pt;">Tarikh:</p>
    <p style="text-align: center; border-bottom: 1.5pt solid #000000; padding-bottom: 1pt;"><strong>(Lengkapkan semua ruangan yang kosong)</strong></p>
    <p style="margin-bottom: 10pt;"><span style="font-size: 13px;">(setakat ini pelanggan yang dibayar melalui akaun Pertanian/Agro masih menggunakan cek sehingga dimaklumkan)</span></p>
    <p style="margin-bottom: 10pt;"><span style="font-size: 13px;">*Sila potong dimana berkenaan</span></p>
    <p style="margin-left: 18pt; text-indent: -18pt; margin-bottom: 10pt;"><span style="font-size: 13px;">**Sekiranya terdapat perubahan maklumat pada alamat dan butir-butir Akaun Bank, sila isikan Lampiran C yang baru.</span></p>
</body>

</html>
