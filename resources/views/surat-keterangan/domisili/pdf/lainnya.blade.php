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
        <p class="text-center" style="font-size: 18px;"><b><u>SURAT KETERANGAN DOMISILI</u></b></p>
        <p class="text-center" style="font-size: 17px; margin-bottom: 35px;">Nomor : 470/06/Pem-DG</p>

        
    </center>
    <p style="font-size: 17px; text-indent:60px; text-align: justify; line-height:1.5; margin-bottom: 30px;">Yang  bertanda tangan dibawah ini Kepala Desa Girimukti Kecamatan Penajam Kabupaten Penajam Paser Utara menerangkan bahwa :</p>
    
    <center>
        <table style="font-size: 17px; text-align: justify; ">
            <tr>
                <td width="200px" style="vertical-align:top; padding-bottom: 8px;">Nama Usaha/Tempat</td>
                <td style="vertical-align:top; padding-bottom: 8px;">:</td>
                <td style="vertical-align:top; padding-bottom: 8px;"><b> {{ strtoupper($domisili->nama_usaha) }}</b></td>
            </tr>
            <tr>
                <td width="200px" style="vertical-align:top; padding-bottom: 8px;">Nama Ketua/Pemohon</td>
                <td style="vertical-align:top; padding-bottom: 8px;">:</td>
                <td style="vertical-align:top; padding-bottom: 8px;"> {{ strtoupper($domisili->nama) }}</td>
            </tr>
            <tr>
                <td width="200px" style="vertical-align:top; padding-bottom: 8px;">Alamat Domisili</td>
                <td style="vertical-align:top; padding-bottom: 8px;">:</td>
                <td style="vertical-align:top; padding-bottom: 8px;"> {{ $domisili->alamat_domisili }}</td>
            </tr>
        </table>
    </center>
    <p style="font-size: 17px; text-indent:60px; text-align: justify; line-height:1.5; margin-bottom: 30px;">Membenarkan bahwa <b>“{{ $domisili->nama_usaha }}”</b> yang tersebut di atas benar berdomisili di {{ $domisili->alamat_domisili }}. </p>

    <p style="font-size: 17px; text-indent:60px; text-align: justify; line-height:1.5; margin-bottom: 30px;">Demikian  Surat Keterangan  ini  dibuat dengan sebenarnya  untuk dapat  dipergunakan sebagaimana mestinya.</p>
    
    <table width="100%" style="margin-right: 0px;">
        <tr>
            <td width="50%"></td>
            <td width="50%" style="margin-right: 0px;">
                <p class="text-center" style="font-size: 17px; margin-bottom: 1px; ">Girimukti, 04 Januari 2022</p>
                <p class="text-center" style="font-size: 17px; margin-top: 1px; ">Kepala Desa Girimukti,</p>
                <br><br><br><br><br>
                <p class="text-center" style="font-size: 17px; "><b>HENDRO JATMIKO SORMIN, S.Si</b></p>
            </td>
        </tr>
    </table>
</body>
</html>