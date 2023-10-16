<?php
  use yii\helpers\Html;
  use yii\widgets\ActiveForm;
  $this->registerCss(" 
  	.qiscus_div {
    padding-bottom: 35px;
    padding-top: 15px;
	}
	.plan_text_qiscus{
	    text-align: center;
	    color: rgb(1, 65, 98);
	    font-weight: 700 !important;
	    /*font-size: 36px !important;*/
	}
	.text_class{
		padding:4% 0%;
	}
	.dapatkan_qiscus{
		text-align:center;
	    font-size: 18px;
	}
	.hanya_quiscus{
		text-align:center;
		font-size: 16px;
	}
	.prising_qiscus {
    border: 1px solid rgba(102, 102, 102, 0.3);
    border-radius: 6px;
	}
	.plan_qiscus{
		padding: 0% 20%;
	}
	.qiscus_start_h2{
		text-align: center!important;
	    font-weight: 800!important;

	}
	 p.qiscus_start_h2 span{
		font-size: 30px!important;
	}
	.qiscus_pengguna{
		font-size:18px!important;
		 font-weight: 400 !important;
		 text-align: center!important;
	}
	.qiscus_prising_list{
		margin-left: 11%;
		font-size:16px!important;
		font-weight: 400 !important;
	}
	.qiscus_pr_button, .qiscus_pr_button1{
	    font-weight: 600;
	    font-size: 18px;
	    border: 0px solid rgba(35, 157, 219, 0);
	    background-color: rgba(1, 65, 108, 1);
	    border-radius: 4px;
	    padding: 19px 44px 19px 44px;
	    color:#fff;
	}
	.qiscus_pr_button_div{
		text-align:center;
		padding:10px 0px;
	}
	.qiscus_pr_button.btn:hover, .qiscus_pr_button1.btn:hover{
		color:#fff!important;
		background-color: #145080;
	}
	.qiscus_p_dipercaya{
	    font-size: 35px;
	    font-weight: 900;
	    text-align: center;
	    margin: 0 0 0px;
	}
	.priceing_image_en{
	    width: auto;
	}
	.qiscus_image_div{
		padding:10px 0px;
	}
	#accordion .panel{
		    border-bottom: 0px solid #ddd!important;
	}
	#accordion h4.panel-title {
    font-weight: 600;
    color: #333;
    font-size: 22px;
	}
	.qiscus_hal-hal_p{
		font-size: 16px !important;
		line-height: 1.9em !important;
		font-weight: 400 !important;
	}
	.qiscus_spacing{
		padding:9% 0%;
	}
	.qusens_icon{
		font-size:35px;
		color:rgba(116, 193, 98, 1);
	}
	 .qusens_icon .glyphicon:hover{
		color: rgba(5, 202, 182, 1);
	}
	.qiscus_id_link_button{
		color: rgba(1, 65, 108, 1);
	    border: 2px solid rgba(1, 65, 108, 1);
	    background-color: rgba(255, 255, 255, 1);
	    border-radius: 4px;
	    padding: 14px 42px 14px 42px;
	    flex-flow: row nowrap;
	        font-weight: 700;
    	font-size: 15px;
	}
	.qiscus_id_link_button.btn:hover{
		background-color: rgba(232, 232, 232, 1);
		border:none;
	}
	.qiscus_hari_button{
	    font-weight: 600;
	    font-size: 18px;
	    border: 0px solid rgba(35, 157, 219, 0);
	    background-color: rgba(1, 65, 108, 1);
	    border-radius: 4px;
	    padding: 14px 42px 14px 42px;
	    color:#fff;
	}
	.qiscus_hari_button.btn:hover{
		color:#fff!important;
		background-color: #145080;
	}
	.qiscus-asalta-div {
	    background-color: #FFF;
	    padding: 40px 110px;
	}
	.qiscus_pr_button1{
	    padding: 0px 0;
    	width: 217px;
	}
	.qiscus-asalta-div img.partner_asalta-image{

		border-radius: 10px;
	}
	.qiscus-asalta-div .inventory-heading-left{
		color: #1C1C1C;
		font-weight: bold;
	}
	.qiscus_asalta-image{
		margin-left: auto;
	    margin-right: auto;
	    width: 100px;
	}
	.qiscus-asalta-div .products-omni-ptag{

		line-height: 25px;
	}
	.qiscus-image{
		margin-left: auto;
		margin-right: auto;
		width: 30%;
	}

	.qiscus-asalta-div-Mengapa {
	    background-color: #FFF;
	    padding: 40px 110px 0px 110px;
	}

	.packagediv{
		padding: 40px 110px;
	}

.qiscus_baner{
	background-image: url(images/quisbaner.png);
    background-position: center center;
	background-attachment: scroll;
	background-repeat: no-repeat;
    background-size: cover;
    width: 100%;
    min-height:750px;
}
.qiscus_baner_htag{
	text-align: right;
    font-weight: 900;
    color: #fff;
    font-size: 48px;
    margin-top: -12px;
}
.qiscus_baner_h1tag{
	text-align: right;
    font-weight: 900;
    color: #fff;
    font-size: 48px;
}
.qiscus-p-right {
    color: #fff;
    text-align: right;
    font-weight: 900;
    font-size: 16px;
    padding-right: 1%;
}
.qiscus-p-right_1 {
    color: #fff;
    text-align: right;
    font-weight: 900;
    font-size: 16px;
}
.qiscus_hari_button_banner{
    font-weight: 600;
    font-size: 14px;
	border: 2px solid rgba(255, 255, 255, 1);
		background-color: rgba(255, 255, 255, 1);
    border-radius: 4px;
    padding: 14px 42px 14px 42px;
    color: rgba(28, 28, 28, 1);
}
.qiscus_hari_button_banner.btn:hover{
		border: 0px solid rgba(35, 157, 219, 0);
    background-color: rgba(1, 65, 108, 1);
    color:#fff;
}
.qiscus_id_link_button_banner{
	color: #fff;
    border: 2px solid rgba(255, 255, 255, 1);
	background-color: rgba(255, 255, 255, 0);
	box-shadow: 0px 4px 16px 0px rgba(0, 0, 0, 0.25);
	border-radius: 6px;
    padding: 14px 42px 14px 42px;
    flex-flow: row nowrap;
    font-weight: 700;
	font-size: 14px;
}
.qiscus_id_link_button_banner.btn:hover{
	background-color: rgba(255, 255, 255, 0.11);
	color:#fff;
}
.qiscus_banner_right_div{
	padding-right: 9%;
}
.contact_btn{
	margin: 5px 0px;
	width: 70%;
    float: left;
}
@media (max-width: 767px){
	.contact_btn{
		margin: 5px 0px;
	    width: auto;
    	float: initial;
	}
	.qiscus_baner_htag, .qiscus_baner_h1tag {
	    font-size: 36px;
	}

	.packagediv, .qiscus-asalta-div{
		padding: 20px 20px;
	}
	.partner_asalta-image{
		margin: 20px 0px;
		float: left;
	}
	.qiscus_pr_button_div {
	    text-align: center;
	}
	.qiscus_hari_button{
		margin: 5px 0px;
	}

}
@media only screen 
  and (min-device-width: 1024px) 
  and (max-device-width: 1366px) 
  and (-webkit-min-device-pixel-ratio: 2){
  	.packagediv, .qiscus-asalta-div {
	    padding: 40px 40px;
	}

  }


  	");
?>
<div class="container">
	<div class="qiscus_div">
		<div>
			<h2 class="plan_text_qiscus">Pricing Plans</h2>
		</div>
		<div class="text_class">
			<p class="dapatkan_qiscus"><strong style="color: rgb(197, 45, 45);">Dapatkan diskon berlangganan hingga 20%! </strong></p>
			<p class="hanya_quiscus">Hanya dengan 1.5 juta dapatkan akun WhatsApp Business terverifikasi + Qiscus Multichannel Chat.</p>
		</div>
		<div class="row plan_qiscus" id="pricing">
			<div class="prising_qiscus">
				<br>
				<br>
				<h2 class="qiscus_start_h2">
					<span style="color: rgb(116, 193, 98);">Starter</span>
				</h2>
				<p class="qiscus_start_h2"><span>Rp. 1.500.000 / bulan</span></p>
				<div><p class="qiscus_pengguna"><span>3000 Pengguna Aktif Per Bulan</span></p></div>
				<br>
				<div class="qiscus_prising_list" style="padding: 10px 0px">
					
					<p><span style="color: rgba(116, 193, 98, 1);    padding: 0px 15px;"><i class="glyphicon glyphicon-ok"></i></span>Integrasi WhatsApp, Facebook Messanger, LINE dan Live Chat</p>
				</div>
				<div class="qiscus_prising_list" style="padding-bottom:10px">
					<p><span style="color: rgba(116, 193, 98, 1);    padding: 0px 15px;"><i class="glyphicon glyphicon-ok"></i></span>5 Agen Customer Service</p>
				</div>
				<div class="qiscus_prising_list" style="padding-bottom:10px">
					<p><span style="color: rgba(116, 193, 98, 1);    padding: 0px 15px;"><i class="glyphicon glyphicon-ok"></i></span>WhatsApp Business dengan akun terverifikasi</p>
				</div>
				<div class="qiscus_prising_list" style="padding-bottom:10px">
					<p><span style="color: rgba(116, 193, 98, 1);    padding: 0px 15px;"><i class="glyphicon glyphicon-ok"></i></span>Kuota pesan broadcast WhatsApp 1000 per bulan</p>
				</div>
				<div class="qiscus_prising_list" style="padding-bottom:10px">
					<p><span style="color: rgba(116, 193, 98, 1);    padding: 0px 15px;"><i class="glyphicon glyphicon-ok"></i></span>Template message</p>
				</div>
				<div class="qiscus_prising_list" style="padding-bottom:10px">
					<p><span style="color: rgba(116, 193, 98, 1);    padding: 0px 15px;"><i class="glyphicon glyphicon-ok"></i></span>Gratis 30 hari percobaan</p>
				</div>
				<br>
				<div class="qiscus_pr_button_div">
					<a class="qiscus_pr_button btn" href="https://www.qiscus.com/contact">Coba Sekarang</a>
				</div>
				<div class="" style="text-align: center;">
					<p style="color: rgb(51, 51, 51);padding: 15px 0px;font-size: 15px;">NB: Paket dengan fitur dan kuota pengguna bulanan yang lebih besar tersedia, silahkan klik <span><a href="https://www.qiscus.com/contact" style="color: rgb(1, 65, 98);"><strong>disini</strong></a></span></p>
					<br>
				</div>
			</div>
		</div>
		<br>
		<br>
		<br>
		<br>
		<br>
		<div class="row">
			<p class="qiscus_p_dipercaya"><strong style="color: rgb(1, 65, 98);">Dipercaya oleh Entrepreneurs </strong></p>
			<p class="qiscus_p_dipercaya"><strong style="color: rgb(1, 65, 98);">dan Brands Ternama di Indonesia </strong></p>
		</div>
		<br>
		<br>
	</div>
	<div class="col-xs-12 col-md-12 col-sm-12 qiscus_image_div">
		<div class="col-xs-4 col-md-2 col-sm-2"><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/quisam.png" class="priceing_image_en" alt=""></div>
		<div class="col-xs-4 col-md-2 col-sm-2"><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/qber.png" class="priceing_image_en" alt=""></div>
		<div class="col-xs-4 col-md-2 col-sm-2"><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/qislove.png" class="priceing_image_en" alt=""></div>
		<div class="col-xs-4 col-md-2 col-sm-2"><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/qusplvd.png" class="priceing_image_en" alt=""></div>
		<div class="col-xs-4 col-md-2 col-sm-2"><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/quserge.png" class="priceing_image_en" alt=""></div>
		<div class="col-xs-4 col-md-2 col-sm-2"><img src="<?php echo Yii::$app->request->baseUrl; ?>/images/qusens.png" class="priceing_image_en" alt=""></div>

		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
	</div>
	<div class="faq">
		<div><p class="qiscus_p_dipercaya"><strong style="color: rgb(1, 65, 98);">Hal-hal yang sering ditanyakan</strong></p></div>
		<div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            Apakah semua fitur sudah masuk dalam harga?
                        </h4>
                    </div>
                </a>
                <div id="collapseOne" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p class="qiscus_hal-hal_p"><span style="color: rgb(51, 51, 51);">Ya, semua fitur sudah termasuk dalam harga yang anda bayar. Kami ingin solusi menyeluruh untuk usaha anda.</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            Apakah WhatsApp memerlukan ponsel?
                        </h4>
                    </div>
                </a>
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="panel-body">
                    	<p class="qiscus_hal-hal_p"><span style="color: rgb(51, 51, 51);">Tidak. WhatsApp Business Official Account merupakan WhatsApp Business API,  sehingga anda tidak perlu lagi menyalakan handphone.</span>
                        </p>
                        
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            Siapa saja pengguna dalam dashboard Qiscus Multichannel Chat?
                        </h4>
                    </div>
                </a>
                <div id="collapseThree" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <p class="qiscus_hal-hal_p"><span style="color: rgb(51, 51, 51);">Agent Customer Service, Supervisor, dan Administrator.</samp></p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                           Apa perbedaan level pengguna dalam dashboard Qiscus Multichannel Chat?
                        </h4>
                    </div>
                </a>
                <div id="collapseFour" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p class="qiscus_hal-hal_p"><span style="color: rgb(51, 51, 51);">Agent hanya bisa melihat chat yang ditugaskan kepada mereka, Supervisor bisa melihat semua chat yang ditugaskan kepada Agent namun tidak memiliki akses administratif, Administrator bisa melakukan akses ke semua fitur yang dimiliki.</span></p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            Bagaimana cara meminta bantuan jika ada kendala?
                        </h4>
                        <span class="#accordion [data-toggle='collapse'][aria-expanded='true']:after"><i class=""></i></span>
                    </div>
                </a>
                <div id="collapseFive" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p class="qiscus_hal-hal_p"><span style="color: rgb(51, 51, 51);">Anda bisa mengirimkan tiket pertanyaan melalui halaman support di support.qiscus.com atau langsung klik </span><a href="https://support.qiscus.com/hc/en-us/requests/new" target="_blank" style="color: rgb(1, 65, 98);"><strong>disini</strong></a></p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                           Apa itu Pengguna Aktif Per Bulan?
                        </h4>
                    </div>
                </a>
                <div id="collapseSix" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p class="qiscus_hal-hal_p"><span style="color: rgb(51, 51, 51);">Pengguna Aktif per Bulan adalah jumlah konsumen yang menghubungi akun messenger bisnis Anda setiap bulannya (BUKAN jumlah chat). </span></p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            Apakah chat-chat yang sudah ada sebelumnya diberbagai macam aplikasi bisa dilihat?
                        </h4>
                    </div>
                </a>
                <div id="collapseSeven" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p class="qiscus_hal-hal_p">Tidak bisa, chat yang bisa dilihat di dashboard hanya chat yang masuk setelah aplikasi messenger diintegrasikan ke Qiscus Multichannel Chat. </a></p>
                    </div>
                </div>
            </div>
       	</div>
       	<br>
       	<p style="text-align: center;"><a href="https://www.qiscus.com/contact" style="color: rgb(1, 65, 98);font-size: 18px;
    font-weight: 900;">Tanya lebih lanjut &#x2192;</a></p>
	</div>
	<div class="qiscus_spacing"></div>
	<div class="row" style="text-align: center;">
		<samp class="qusens_icon"><i class=""></i><i class="glyphicon glyphicon-home"></i></samp>
		<br>
		<br>
	</div>
	<div class="row">
		<p class="qiscus_p_dipercaya"><strong style="color: rgb(1, 65, 98);">Tingkatkan penjualan Anda dengan berlangganan</strong></p>
		<p class="qiscus_p_dipercaya"><strong style="color: rgb(1, 65, 98);">paket #DiRumahAja sekarang!</strong></p>
	</div>
	<div class="row" style="padding: 3% 0px;">
		<div class="qiscus_pr_button_div">
			<a class="qiscus_hari_button btn" href="https://www.qiscus.com/contact">Coba Gratis 30 Hari</a>
			<samp style="padding: 0 20px;"><a class="qiscus_id_link_button btn" href="#pricing">Lihat Paket</a></samp>
		</div>
	</div>
</div>

