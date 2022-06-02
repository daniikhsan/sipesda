<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            margin: 18px;
            margin-top:0;
        }
        .text-center{
            margin: 0;
            display: block;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }
        table{
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
    <center>
        <table border="0" width="100%">
            <tr>
                <td>
                    <center>
                        <img src="{{ public_path('template/img/logo-ppu.png') }}" width="105px" alt="" srcset="">
                    </center>
                </td>
                <td width="80%">
                    <center>
                        <p class="text-center" style="font-size: 20px;">PEMERINTAH KABUPATEN PENAJAM PASER UTARA <br> KECAMATAN PENAJAM</p>
                        <p class="text-center" style="font-size: 24px;"><b>DESA GIRIMUKTI</b></p> 
                        <p class="text-center" style="font-size: 15px; margin-top:5px; margin-bottom:0px;">Jl. Propinsi Km. 15 Girimukti 76141 e-mail : desagirimukti_kab.ppu@yahoo.com</p> 
                    </center>
                </td>
            </tr>
        </table>
        <hr style="border: 2px solid black; margin-top:0; margin-bottom: 20px;">
        <p class="text-center" style="font-size: 18px;"><b><u>BUKTI REGISTRASI</u></b></p>
        <br><br>
        
    </center>
    
    <center>
        <table style="font-size: 17px; text-align: justify; ">
            <tr>
                <td width="200px" style="vertical-align:top; padding-bottom: 8px;">No. Surat</td>
                <td style="vertical-align:top; padding-bottom: 8px;">:</td>
                <td style="vertical-align:top; padding-bottom: 8px;"><b> 470/{{ str_pad($domisili->no_surat, 3, 0, STR_PAD_LEFT) }}/Pem-DG</b></td>
            </tr>
            <tr>
                <td width="200px" style="vertical-align:top; padding-bottom: 8px;">NIK</td>
                <td style="vertical-align:top; padding-bottom: 8px;">:</td>
                <td style="vertical-align:top; padding-bottom: 8px;"> {{ strtoupper($domisili->nik) }}</td>
            </tr>
            <tr>
                <td width="200px" style="vertical-align:top; padding-bottom: 8px;">Nama</td>
                <td style="vertical-align:top; padding-bottom: 8px;">:</td>
                <td style="vertical-align:top; padding-bottom: 8px;"> {{ $domisili->nama }}</td>
            </tr>
            <tr>
                <td width="200px" style="vertical-align:top; padding-bottom: 8px;">Tempat Tanggal Lahir</td>
                <td style="vertical-align:top; padding-bottom: 8px;">:</td>
                <td style="vertical-align:top; padding-bottom: 8px;"> {{ $domisili->tempat_tanggal_lahir }}</td>
            </tr>
            <tr>
                <td width="200px" style="vertical-align:top; padding-bottom: 8px;">Jenis Kelamin</td>
                <td style="vertical-align:top; padding-bottom: 8px;">:</td>
                <td style="vertical-align:top; padding-bottom: 8px;"> {{ $domisili->jenis_kelamin }}</td>
            </tr>
            <tr>
                <td width="200px" style="vertical-align:top; padding-bottom: 8px;">Agama</td>
                <td style="vertical-align:top; padding-bottom: 8px;">:</td>
                <td style="vertical-align:top; padding-bottom: 8px;"> {{ $domisili->agama }}</td>
            </tr>
            <tr>
                <td width="200px" style="vertical-align:top; padding-bottom: 8px;">Status Perkawinan</td>
                <td style="vertical-align:top; padding-bottom: 8px;">:</td>
                <td style="vertical-align:top; padding-bottom: 8px;"> {{ $domisili->status_perkawinan }}</td>
            </tr>
            <tr>
                <td width="200px" style="vertical-align:top; padding-bottom: 8px;">Alamat Asal</td>
                <td style="vertical-align:top; padding-bottom: 8px;">:</td>
                <td style="vertical-align:top; padding-bottom: 8px;"> {{ $domisili->alamat_asal }}</td>
            </tr>
            <tr>
                <td width="200px" style="vertical-align:top; padding-bottom: 8px;">Nama Usaha</td>
                <td style="vertical-align:top; padding-bottom: 8px;">:</td>
                <td style="vertical-align:top; padding-bottom: 8px;"> {{ $domisili->nama_usaha }}</td>
            </tr>
            <tr>
                <td width="200px" style="vertical-align:top; padding-bottom: 8px;">Bidang Usaha</td>
                <td style="vertical-align:top; padding-bottom: 8px;">:</td>
                <td style="vertical-align:top; padding-bottom: 8px;"> {{ $domisili->bidang_usaha }}</td>
            </tr>
            <tr>
                <td width="200px" style="vertical-align:top; padding-bottom: 8px;">Mulai Usaha</td>
                <td style="vertical-align:top; padding-bottom: 8px;">:</td>
                <td style="vertical-align:top; padding-bottom: 8px;"> Tahun {{ \Carbon\Carbon::parse($domisili->mulai_usaha)->format('Y') }}</td>
            </tr>
            <tr>
                <td width="200px" style="vertical-align:top; padding-bottom: 8px;">Alamat Domisili</td>
                <td style="vertical-align:top; padding-bottom: 8px;">:</td>
                <td style="vertical-align:top; padding-bottom: 8px;"> {{ $domisili->alamat_domisili }}</td>
            </tr>
        </table>
    </center>
</body>
</html>
