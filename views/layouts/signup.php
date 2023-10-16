<?php
use app\assets\ResourcesAsset;

ResourcesAsset::register($this);

/* @var $this luya\web\View */
/* @var $content string */
$this->beginPage();
?>

<html lang="<?=Yii::$app->composition->language;?>">
<head>
    
	<link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/favicon.png" type="image/x-icon" />
	<meta charset="UTF-8" />
	<meta name="robots" content="index, follow" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?=$this->title;?></title>
    <meta name="description" content="Sign up for a free 14 day trial | SimplyyFi is an End-to-End Business Automation Suite." />
	<style>
		form label {
			display: inline-block;
			width: 100px;
		}

		form div {
			/*margin-bottom: 10px;*/
		}
        .rc-anchor-normal {
            width: 288px !important;
        }

		.error {
			color: red;
			margin-left: 5px;
		}

		label.error {
			display: inline;
			font-size: 12px;
			font-weight: 100;
		}
        #email_status{
            color: #a94442;
        }
        .form-signup .form-control {
            width: 100%;
        }
        .form-signup .btn-login {
            width: 100%
        }
        .form-horizontal .form-group {
            margin-left: 0px !important;
            width: 100%;
            margin-bottom: 5px !important;

        }
        .field-clients-country_code .select2-container--krajee{
            margin-top: -7px !important;
        }

        .select2-container--krajee .select2-selection--single{
            height: 45px !important;
            padding: 12px 24px 6px 12px !important;
        }
        .select2-container--krajee .select2-selection--single .select2-selection__arrow{
            height: 42px !important;
            padding: 12px 24px 6px 12px !important;
            border-left: none !important;
        }
        .form-signup .btn-login{
            padding: 10px !important;
            text-transform: capitalize !important;
        }

	</style>
  <script type="application/ld+json">
            {
               "@context": "http://schema.org",
               "@type": "LocalBusiness",
               "name": "SimplyyFi",
               "address": {
                   "@type": "PostalAddress",
                   "streetAddress": "55 Lavender Street",
                   "addressLocality": "Singapore",
                   "addressRegion": "Singapore",
                   "postalCode": "338713"
               },
               "image": "https://www.funnel.simplyyfi.com/images/SimplyyFi-logo.png",
               "email": "sales@simplyyfi.com",
               "telePhone": " +65 8284 8659 ",
               "url": "https://www.funnel.simplyyfi.com/",
               "openingHours": "Mo,Tu,We,Th,Fr,Sa 09:00-07:00",
               "openingHoursSpecification": [ {
                   "@type": "OpeningHoursSpecification",
                   "dayOfWeek": [
                       "Monday",
                       "Tuesday",
                       "Wednesday",
                       "Thursday",
                       "Friday",
                       "Saturday"
                   ],
                   "opens": "09:00",
                   "closes": "07:00"
               } ]
            }
        </script>
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window,document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '277817640182246');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1"
             src="https://www.facebook.com/tr?id=277817640182246&ev=PageView
        &noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->
	<?php $this->head()?>
</head>
<body class="signupform_login-body">
<?= isset(\yii::$app->params["GOOGLE_TAG_MANAGER_CODE"])?\yii::$app->params["GOOGLE_TAG_MANAGER_CODE"]:""?>
<?php $this->beginBody() ?>
<div class="container">
	<?= $content ?>

</div>
<?php $this->endBody(); ?>
<?= isset(\Yii::$app->params["GOOGLE_ANALYTICS_CODE"])?\Yii::$app->params["GOOGLE_ANALYTICS_CODE"]:"" ?>



</body>
</html>
<?php $this->endPage()?>
