@extends('layout.layout')
@section('header_about')
    <header class="intro-header" style="background-image: url('img/about-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <img class="img-responsive" src="img/logoukdw.png">
                        <h1>PUSAT PENGEMBANGAN PRIBADI</h1>
                        <hr class="small">
                        <span class="subheading">Universitas Kristen Duta Wacana</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@stop
@section('css')
<!--css here-->
<link href="{{ asset('cssabout.css') }}" rel="stylesheet" type="text/css">
@stop

@section('content')
    <!-- Main Content -->
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <h1>Lokasi Kami</h1>
                <p>Universitas Kristen Duta Wacana</p>
                <h1>Kontak</h1>
                <li>Phone	: 0274-553929</li>
                <li>Fax		: 0274-513235</li>
                <li>HP		: 0274-3154236</li>
                <li>Email	: pppukdw@yahoo.com</li>
                <h1>Info</h1>
                <li>Waktu layanan hari Senin - Jumat pukul 08.00 - 15.00</li>
                <li>Informasi dan permintaan layanan dapat dilakukan melalui telepon, email, fax, atau DATANG langsung ke kantor PPP UKDW</li>
                <li>Libur tahunan tanggal 23 Desember sampai 3 Januari</li>
                <h1>Jadwal Konselor</h1>
                <table class="tablebordered">
                	<tr>
                		<td>Konselor</td>
                		<td>Jadwal Konselor</td>
                	</tr>
                	<tr>
                		<td>Nevi Kurnia Arianti, M.si, P.si.*</td>
                		<td>Selasa, pk 10.00-12.00</td>
                	</tr>
                	<tr>
                		<td></td>
                		<td>Kamis, pk 10.00-12.00</td>
                	</tr>
                	<tr>
                		<td>Imelda, M.Psi.*</td>
                		<td>Kamis, pk 10.00-12.00</td>
                	</tr>
                	<tr>
                		<td></td>
                		<td>Jumat, pk 10.00-12.00</td>
                	</tr>
                </table>
            </div>
        </div>
@stop
