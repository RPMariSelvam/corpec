<?php

namespace app\blocks;

use luya\cms\base\PhpBlock;
use luya\cms\frontend\blockgroups\ProjectGroup;
use luya\cms\helpers\BlockHelper;
use luya\helpers\Url;
use Yii;
use yii\helpers\Html;

/**
 * Support Form Block.
 *
 * File has been created with `block/create` command. 
 */
class SupportFormBlock extends PhpBlock
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

    public $defaultEmailError = 'Enter Your Email Id';

    public $defaultMessageLabel = 'Message';

    public $defaultMessageError = 'Please enter a message';

    public $defaultContectnumber = 'Contactnumber';

    public $defaultContectnumberError = '';

    public $defaultOrganisationname = 'Organisationname';

    public $defaultOrganisationnameError = 'Enter Your Organisation Name';

    public $defaultProjecttitle = 'Projecttitle';

    public $defaultProjecttitleError = 'Enter Your Project Title';

    public $defaultPriority = 'Priority';

    public $defaultPriorityError = '';

    public $defaultSendLabel = 'Send';

    public $defaultSendError = 'There was a problem with your submission. Errors are marked below.';

    public $defaultSendSuccess = 'Thank you! We have received your request. Our friendly support team will get back to you within 48 working hours. Thank you for your kind patience.';

    public $defaultMailSubject = 'Contact Inquiry';

    public function blockGroup()
    {
        return ProjectGroup::class;
    }

    /**
     * @inheritDoc
     */
    public function name()
    {
        return 'Support Form Block';
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
            'Organisationname'     => yii::$app->request->post('organisationname'),
            'contactnumber'    => yii::$app->request->post('contactnumber'),
            'Projecttitle'     => yii::$app->request->post('projecttitle'),
            'Priority'         => yii::$app->request->post('priority'),
            'recaptcha'              => Yii::$app->request->post('recaptcha'),
            'mailerResponse'   => $this->getPostResponse(),
            'csrf'             => Yii::$app->request->csrfToken,
            'nameErrorFlag'    => Yii::$app->request->isPost ? (Yii::$app->request->post('name') ? 1 : 0) : 1,
            'emailErrorFlag'   => Yii::$app->request->isPost ? (Yii::$app->request->post('email') ? 1 : 0) : 1,
            'messageErrorFlag' => Yii::$app->request->isPost ? (Yii::$app->request->post('message') ? 1 : 0) : 1,
            'contactnumberErrorFlag'    => Yii::$app->request->isPost ? (Yii::$app->request->post('contactnumber') ? 1 : 0) : 1,
            'projecttitleErrorFlag'     => Yii::$app->request->isPost ? (Yii::$app->request->post('projecttitle') ? 1 : 0) : 1,
            'organisationnameErrorFlag'     => Yii::$app->request->isPost ? (Yii::$app->request->post('organisationname') ? 1 : 0) : 1,
            'priorityErrorFlag'         => Yii::$app->request->isPost ? (Yii::$app->request->post('priority') ? 1 : 0) : 1,
            'recaptchaErrorFlag'    => Yii::$app->request->isPost ? (Yii::$app->request->post('recaptcha') ? 1 : 0) : 1,
        ];
    }
    public function sendMail($message, $email, $name, $contactnumber, $projecttitle, $organisationname, $priority ,$recaptcha)
    {
        $subject = $this->defaultMailSubject;
        $geo_reader = new \GeoIp2\Database\Reader(Yii::$app->basePath . '/resources/geoip2/GeoLite2-Country.mmdb');
        $geo_reader_city = new \GeoIp2\Database\Reader(Yii::$app->basePath . '/resources/geoip2/GeoLite2-City.mmdb');

        $user_ip = Yii::$app->request->getUserIP();
        if ($user_ip == "127.0.0.1" || $user_ip == "::1") {
            $user_ip = "171.49.190.43";//Local IP
        }
        $geo_result = $geo_reader->country($user_ip);
        $geo_result_city = $geo_reader_city->city($user_ip);
        $current_city = $geo_result_city->city->name;
        $current_state = $geo_result_city->mostSpecificSubdivision->name;
        $ipaddress=Yii::$app->getRequest()->getUserIP();
        $description = \Yii::$app->view->renderFile('@app/resources/email_template/support_email_template.php', ['email' => $email, 'name' => $name, 'ipaddress' => $ipaddress, 'message' => $message, 'phone' => $contactnumber, 'organisationname' => $organisationname, 'projecttitle' => $projecttitle, 'priority' => $priority, 'current_city' => $current_city, 'current_state' => $current_state  ]);
        // var_dump( $description);
        // exit();
        $mail = \Yii::$app->mail;
        $mail->compose($subject, $description);
        $mail->address($this->getVarValue('emailAddress'));
        $mail->mailer->From = \Yii::$app->params["adminEmail"];
        $mail->mailer->addReplyTo($email);
        $mail->mailer->FromName = 'Support - Asalta Website';

  // var_dump($mail);
  // exit();
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
           // var_dump(Yii::$app->request->isPost);
            // exit();
            if ($request->post('message') && $request->post('email') && $request->post('name') && $request->post('contactnumber') && $request->post('projecttitle') && $request->post('organisationname') && $request->post('priority') && $request->post('recaptcha')){
                $msg = $this->sendMail($request->post('message'),$request->post('email'),$request->post('name'), $request->post('contactnumber'), $request->post('projecttitle'), $request->post('organisationname'), $request->post('priority'), $request->post('recaptcha'));
                if($msg == 'success') {
                    unset($_POST);
                }
                return $msg;
            }
        }
    }

    public function admin()
    {
        return
            '<p><i>Form Block</i></p>{% if vars.emailAddress is not empty %}' .
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