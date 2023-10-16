<?php
namespace components\helper;

class PricingHelper {

    public static function getYearlyPricingText($PackageModel, $country, $currencySymbol)
    {
        $price = $PackageModel->priced_monthly;
        $tempValue = explode(".", floatval($price));
        $pricingText = '';
        if(\Yii::$app->params["EnableProductPricingDiscounts"] && in_array($country, \Yii::$app->params["discountApplicableCountries"])){
            $discountedPrice = $PackageModel->getDiscountedPrice();
            $discountedPriceArr = explode (".",($discountedPrice));
            $pricingText .= '<span style="font-size:24px !important">' . $currencySymbol . '</span>';
            $pricingText .= '<span style="price-yearly">' . \Yii::$app->formatter->asDecimal($discountedPriceArr[0], 0) . '</span>';
            $pricingText .= '<span>';
            $pricingText .= '<sup style="top: -0.8em;font-size: 45%">';
            $pricingText .= isset($discountedPriceArr[1]) ? '.' . $discountedPriceArr[1] : '.00';
            $pricingText .= '</sup>';
            $pricingText .= '</span>';

            $pricingText .= '<span class="strikethrough">';
            $pricingText .= '<span style="font-size:18px !important;color:#a9a9a9;">' . $currencySymbol . '</span>';
            $pricingText .= '<span style="font-size: 34px;color:#a9a9a9;">' . \Yii::$app->formatter->asDecimal($tempValue[0], 0) . '</span>';
            /*if(!empty($tempValue[1]) && $tempValue[1] > 0){
                $pricingText .= '<span>';
                $pricingText .= '<sup style="top: -0.8em;font-size: 40%;color:#a9a9a9;">';
                $pricingText .= isset($tempValue[1]) ? '.' . $tempValue[1] : '.00';
                $pricingText .= '</sup>';
                $pricingText .= '</span>';
            }*/
            $pricingText .= '</span>';
        } else {
            $pricingText .= '<span style="font-size:24px !important">'. $currencySymbol . '</span>';
            $pricingText .= '<span class="price-yearly">' . \Yii::$app->formatter->asDecimal($tempValue[0], 0) . '</span>';

            if(!empty($tempValue[1]) && $tempValue[1] > 0){
                $pricingText .= '<span>';
                $pricingText .= '<sup style="top: -0.8em;font-size: 45%;">';
                $pricingText .= isset($tempValue[1]) ? '.' . $tempValue[1] : '.00';
                $pricingText .= '</sup>';
                $pricingText .= '</span>';
            }
        }

        return $pricingText;

    }

    public static function getMonthlyPricingText($PackageModel, $country, $currencySymbol)
    {
        $price = $PackageModel->priced_monthly;
        $tempValue = explode(".", floatval($price));
        $pricingText = '';
        $pricingText .= '<span style="font-size:24px !important">'. $currencySymbol . '</span>';
        $pricingText .= '<span class="price-monthly">' . \Yii::$app->formatter->asDecimal($tempValue[0], 0) . '</span>';

        if(!empty($tempValue[1]) && $tempValue[1] > 0){
            $pricingText .= '<span>';
            $pricingText .= '<sup style="top: -0.8em;font-size: 45%;">';
            $pricingText .= isset($tempValue[1]) ? '.' . $tempValue[1] : '.00';
            $pricingText .= '</sup>';
            $pricingText .= '</span>';
        }

        return $pricingText;

    }

}