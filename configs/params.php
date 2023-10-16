<?php

return [
    'HRM_BASE_URL' => 'https://hrm.asalta.local/',
    'CRM_BASE_URL' => 'https://crm.asalta.local/',
    'POS_BASE_URL' => 'http://localhost/asalta/asaltapossass/',
    'salesEmail' => 'support@asalta.com',
   'adminEmail' => 'no.reply@asaltatechnologies.com',
   'GOOGLE_RECAPTCHA_SITEKEY' => '6Lcz83YUAAAAAGfQG98rHG5FPT56J5xyzMkdJsTY',
   'GOOGLE_RECAPTCHA_SECRET' => '6Lcz83YUAAAAAO8-efJDBwIX78HGGto2444t99Ar',
   'icon-framework' => \kartik\icons\Icon::FAS,
   'enquirytype_array' => ['Support_Enquiry' => 'Support Enquiry','Sales_Enquiry' => 'Sales Enquiry','Press_Media' => 'Press Media'],
   'asaltahrmdiscount' => '0',
   'asaltacrmdiscount' => '0',
   'asaltainventorydiscount' => '0',
   'asaltaretaildiscount' => '0',
   'asaltaposdiscount' => '0',
   'asaltahecommercediscount' => '0',
    'discountApplicableCountries' => ["Singapore", "India"],
    'stripe_publishable_key' => 'pk_test_PqHTPCamHitplQS2PROI21c9',
    'stripe_secret_key' => 'sk_test_9owkOIglQUSr4FiQty8ShWXX',
    'stripe_endpoint_secret' => 'whsec_t1TGW3V1djaObW74ghtutSwRCGQjVfZs',
    'EnableStripeDiscounts' => true,
    'EnableProductPricingDiscounts' => false,
    'countries' => [
        '' => [
            'name' => 'Global',
            'currency_code' => 'USD',
            'currency_name' => 'US Dollars',
            'currency_symbol' => '$',
        ], 'en' => [
            'name' => 'Global',
            'currency_code' => 'USD',
            'currency_name' => 'US Dollars',
            'currency_symbol' => '$',
        ], 'sg' => [
            'name' => 'Singapore',
            'currency_code' => 'SGD',
            'currency_name' => 'Singapore Dollars',
            'currency_symbol' => '$',
        ], 'in' => [
            'name' => 'India',
            'currency_code' => 'INR',
            'currency_name' => 'Indian Rupees',
            'currency_symbol' => '₹',
        ], 'my' => [
            'name' => 'Malaysia',
            'currency_code' => 'MYR',
            'currency_name' => 'Malaysian Ringgit',
            'currency_symbol' => 'RM',
        ], 'ph' => [
            'name' => 'Philippines',
            'currency_code' => 'PHP',
            'currency_name' => 'Philippine Peso',
            'currency_symbol' => '₱',
        ], 'id' => [
            'name' => 'Indonesia',
            'currency_code' => 'IDR',
            'currency_name' => 'Indonesian Rupiah',
            'currency_symbol' => 'Rp',
        ], 'th' => [
            'name' => 'Thailand',
            'currency_code' => 'THB',
            'currency_name' => 'Thai Baht',
            'currency_symbol' => '฿',
        ], 'vn' => [
            'name' => 'Vietnam',
            'currency_code' => 'VND',
            'currency_name' => 'Vietnamese Dong',
            'currency_symbol' => '₫',
        ], 'kh' => [
            /*'name' => 'Cambodia',
            'currency_code' => 'KHR',
            'currency_name' => 'Cambodian Riel',
            'currency_symbol' => '៛',*/
            'name' => 'Global',
            'currency_code' => 'USD',
            'currency_name' => 'US Dollars',
            'currency_symbol' => '$',
        ]
    ],
];



