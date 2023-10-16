<?php

namespace app\blocks;

use luya\cms\base\PhpBlock;
use luya\cms\frontend\blockgroups\ProjectGroup;
use luya\helpers\Url;
use Yii;
use yii\helpers\Html;

/**
 * Formblock Block.
 *
 * File has been created with `block/create` command.
 */
class FormblockBlock extends PhpBlock
{
    /**
     * @var bool Choose whether a block can be cached trough the caching component. Be carefull with caching container blocks.
     */
    public $cacheEnabled = true;

    /**
     * @var int The cache lifetime for this block in seconds (3600 = 1 hour), only affects when cacheEnabled is true
     */
    public $cacheExpiration = 3600;

    /**
     * @inheritDoc
     */
    public $defaultNameLabel = 'Name';

    public $defaultNamePlaceholder = 'First and Last Name';

    public $defaultNameError = 'Please enter a name';

    public $defaultEmailLabel = 'Email';

    public $defaultEmailPlaceholder = 'beispiel@beispiel.ch';

    public $defaultEmailError = 'This field cannot be blank.';

    public $defaultMessageLabel = 'Message';

    public $defaultMessageError = 'Message ';

    public $defaultSendLabel = 'Send';

    public $defaultSendError = 'There was a problem with your submission. Errors are marked below.';

    public $defaultSendSuccess = 'Your message has been submitted. Thank you!';

    public $defaultMailSubject = 'Start A 14 Day Free Trial Form submitted on Asalta - An End-to-End Business Automation Software';

    public function blockGroup()
    {
        return ProjectGroup::class;
    }

    /**
     * @inheritDoc
     */
    public function name()
    {
        return 'Formblock Block';
    }

    /**
     * @inheritDoc
     */
    public function icon()
    {
        return 'extension'; // see the list of icons on: https://design.google.com/icons/
    }

    /**
     * @inheritDoc
     */
    public function config()
    {
        return [
            'vars' => [
                ['var' => 'emailAddress', 'label' => 'Email will be sent to the following address', 'type' => 'zaa-text'],
                ['var' => 'headline', 'label' => 'Heading', 'type' => 'zaa-text', 'placeholder' => 'Contact'],
                ['var' => 'nameLabel', 'label' => 'Text for field "Name"', 'type' => 'zaa-text', 'placeholder' => $this->defaultNameLabel],
                ['var' => 'emailLabel', 'label' => 'Text for field "Email"', 'type' => 'zaa-text', 'placeholder' => $this->defaultEmailLabel],
                ['var' => 'messageLabel', 'label' => 'Text for field "Message"', 'type' => 'zaa-text', 'placeholder' => $this->defaultMessageLabel],
                ['var' => 'sendLabel', 'label' => 'Text on the submit button', 'type' => 'zaa-text', 'placeholder' => $this->defaultSendLabel],
            ],

            'cfgs' => [
                ['var' => 'subjectText', 'label' => 'Subject in the email', 'type' => 'zaa-text', 'placeholder' => $this->defaultMailSubject],
                ['var' => 'namePlaceholder', 'label' => 'Placeholder in the field "Name"', 'type' => 'zaa-text', 'placeholder' => $this->defaultNamePlaceholder],
                ['var' => 'emailPlaceholder', 'label' => 'Placeholder in the field "Email"', 'type' => 'zaa-text', 'placeholder' => $this->defaultEmailPlaceholder],
                ['var' => 'nameError', 'label' => 'Error message for field "Name"', 'type' => 'zaa-text', 'placeholder' => $this->defaultNameError],
                ['var' => 'emailError', 'label' => 'Error message for field "Email"', 'type' => 'zaa-text', 'placeholder' => $this->defaultEmailError],
                ['var' => 'messageError', 'label' => 'Error message for field "Message"', 'type' => 'zaa-text', 'placeholder' => $this->defaultMessageError],
                ['var' => 'sendSuccess', 'label' => 'Confirmation text after submitting the form', 'type' => 'zaa-text', 'placeholder' => $this->defaultSendSuccess],
                ['var' => 'sendError', 'label' => 'Error text after failed attempt to send the form', 'type' => 'zaa-text', 'placeholder' => $this->defaultSendError],
            ],
        ];
    }

    /**
     * {@inheritDoc}
     *
     */
    public function extraVars()
    {
        return [
            'nameLabel'        => $this->getVarValue('nameLabel', $this->defaultNameLabel),
            'namePlaceholder'  => $this->getCfgValue('namePlaceholder', $this->defaultNamePlaceholder),
            'nameError'        => $this->getCfgValue('nameError', $this->defaultNameError),
            'emailLabel'       => $this->getVarValue('emailLabel', $this->defaultEmailLabel),
            'emailPlaceholder' => $this->getCfgValue('emailPlaceholder', $this->defaultEmailPlaceholder),
            'emailError'       => $this->getCfgValue('emailError', $this->defaultEmailError),
            'messageLabel'     => $this->getVarValue('messageLabel', $this->defaultMessageLabel),
            'messageError'     => $this->getCfgValue('messageError', $this->defaultMessageError),
            'sendLabel'        => $this->getVarValue('sendLabel', $this->defaultSendLabel),
            'sendError'        => $this->getCfgValue('sendError', $this->defaultSendError),
            'sendSuccess'      => $this->getCfgValue('sendSuccess', $this->defaultSendSuccess),
            'subjectText'      => $this->getCfgValue('subjectText', $this->defaultMailSubject),
            'message'          => Yii::$app->request->post('message'),
            'name'             => Yii::$app->request->post('name'),
            'email'            => Yii::$app->request->post('email'),
            'mailerResponse'   => $this->getPostResponse(),
            'csrf'             => Yii::$app->request->csrfToken,
            'nameErrorFlag'    => Yii::$app->request->isPost ? (Yii::$app->request->post('name') ? 1 : 0) : 1,
            'emailErrorFlag'   => Yii::$app->request->isPost ? (Yii::$app->request->post('email') ? 1 : 0) : 1,
            'messageErrorFlag' => Yii::$app->request->isPost ? (Yii::$app->request->post('message') ? 1 : 0) : 1,
        ];
    }

    public function sendMail($message, $email, $name)
    {
        $email = Html::encode($email);
        $name  = Html::encode($name);

        $html = '<html><body>';
        $html.='<div style="background-color:#f4f4f5; width:100%;margin: 0 auto;padding:4% 0px">';
        $html.='<div style="background-color:#fff;width:50%;margin:0 auto"> <img src="https://beta.asalta.com/images/asalta-logo.png"alt="Logo" style="margin:10px auto;padding:0 30%;padding-bottom:4%;padding-top:40px;"/>'; 
        $html.='<p style="font-size:14px;padding:0 30%;color: black;">Dear Support team,</p>';
        $html.='<p style="font-size:14px;padding:15px 30%;color: black;">Details are given below,</p>';
        $html.='<table cellspacing="0" cellpadding="0"align="center">';
        $html.='<tbody>';
        $html.='<tr>';
        $html.='<td style="font-weight: bold;line-height: 2.3;text-align:left;padding: 0 7%">
            Name </td>';
        $html.='<td style="width:50%">'. $name .'</td>';
        $html.='</tr>'; 
        $html.='<tr >';
        $html.='<td style="font-weight: bold;line-height: 2.3;text-align:left;padding: 0 7%">
            Email </td>';  
        $html.='<td style="width:50%">'. $email .'</td>';   
        $html.='</tr>';
        $html.='<tr>';
        $html.='<td style="font-weight: bold;line-height: 2.3;text-align:left;padding: 0 19px"> Company Name </td>';
        $html.='<td style="width:50%">'. nl2br(Html::encode($message)) .'</td>'; 
        $html.='</tr>';
        $html.='<tr>';
        $html.='<td style="font-weight: bold;line-height: 2.3;text-align:left;padding: 0 7%">
            URL </td>';
        $html.='<td style="width:50%"> '. Url::base(true) .'</td>';
        $html.='</tr>';
        $html.= '</tbody>';
        $html.= '</table>';
        $html.='</div>';
        $html.='<table style="background-color:rgb(222, 221, 224);width:50%;margin:0 auto;margin-top:-45px">';
        $html.='<p style="color:#000;padding:0 23%;padding-bottom:30px;">Copyright'. date("Y") .'Asalta Technologies. All rights reserved.</p>';
        $html.='</table>';
        $html.='</div>';
        $html.='</div>';
        $html .= "</body></html>";

        $mail           = Yii::$app->mail;
        $mail->fromName = $name;
        $mail->from     = $email;
        $mail->compose($this->getVarValue('subjectText', $this->defaultMailSubject), $html);
        $mail->address($this->getVarValue('emailAddress'));

        if (!$mail->send()) {
            return 'Error: ' . $mail->error;
        } else {
            return 'success';
        }
    }

    public function getPostResponse()
    {
        $request = Yii::$app->request;

        if (Yii::$app->request->isPost) {
            if ($request->post('message') && $request->post('email') && $request->post('name')) {
                return $this->sendMail($request->post('message'), $request->post('email'), $request->post('name'));
            }
        }
    }

    public function admin()
    {
        return '<p><i>Form Block</i></p>{% if vars.emailAddress is not empty %}' .
            '{% if vars.headline is not empty %}<h3>{{ vars.headline }}</h3>{% endif %}' .
            '<div class="input input--text">' .
            '<label for="name" class="input__label">{{ extras.nameLabel }}</label>' .
            '<div class="input__field-wrapper"><input id="name" class="input__field" disabled="disabled" /></div>' .
            '</div>' .
            '<div class="input input--text">' .
            '<label for="name" class="input__label">{{ extras.emailLabel }}</label>' .
            '<div class="input__field-wrapper"><input id="name" class="input__field" disabled="disabled" /></div>' .
            '</div>' .
            '<div class="input input--text">' .
            '<label for="name" class="input__label">{{ extras.messageLabel }}</label>' .
            '<div class="input__field-wrapper"><textarea class="input__field" disabled="disabled" /></div>' .
            '</div>' .
            '<button class="btn" disabled>{{ extras.sendLabel }}</button>' .
            '{% else %}<span class="block__empty-text">There is no email address yet</span>' .
            '{% endif %}';
    }

}
