<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Cars;
use yii\helpers\Html;
use app\models\Photos;
use yii\helpers\Url;
use app\models\Responses;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {

        $responses = Responses::find()->all();
        $autos = Cars::find()->all();
        $cars = [];
      foreach ($autos as $auto) {
        if (!in_array($auto->name, $cars)){
          $cars[] = $auto->name;
        }
      }
        return $this->render('index', [
            'responses' => $responses,
            'cars' => $cars,
            ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionGetCars($cat)
    {
        // $cat = $_POST['cat'];
        $autos = Cars::find()->where(['category' => $cat])->all();
        // var_dump($autos);
        $count=0;
        $code_prev = 1;
        $code_next = 1;

        $resp = Html::tag(
                'div', 
                Html::tag('span','', ['class' => ['glyphicon', 'glyphicon-remove'], 'aria-hidden' => 'true']),
                ['id' => 'close']
            );
        foreach ($autos as $auto) {
            $resp .= Html::tag(
                    'div',
                    Html::img(Url::to('@web/src/upload/') . $auto->photos[0]->url, ['class' => 'img-responsive', 'style' => 'width:90%; margin: 0 auto']) . '<p>' . $auto->name . '</p></div>',
                    ['class' => 'col-sm-6', 'id' => 'prefix-' . $auto->id]
                );
        }
        // var_dump($resp);
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return [
            'result' => $resp,
            'code_prev' => $code_prev,
            'code_next' => $code_next,
            ];
    }

    public function actionGetCarPhotos($carId)
    {
        $carId = substr($carId, 7);
        $auto = Cars::findOne($carId);
      $carName = $auto->name;
        $photos = $auto->photos;
      $html = '';
      for ($i=0; $i<count($photos); $i++) {
        if ($i == 0){
        
          $dots = '<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>';
        } else {
          $dots .= '<li data-target="#carousel-example-generic" data-slide-to="'. $i .'" class=""></li>';
        }
        }
        $desc = '<p>'. $auto->description.'</p>';
        foreach ($photos as $photo) {
            if ($html == ''){
                $html .= '<div class="item active"><img class="img-responsive" src="' . Url::to('@web/src/upload/') . $photo->url . '"></div>';
            } else {
                $html .= '<div class="item"><img class="img-responsive" src="' . Url::to('@web/src/upload/') . $photo->url . '"></div>';
            }
        }
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return [
            'result' => $html,
            'p' => $desc,
            'dots' => $dots,
            'carName' => $carName,
            ];
    }
  
  public function actionAdmin()
  {
    If (!Yii::$app->user->isGuest){
      return $this->render('admin');
  } else {
    return $this->redirect('/site/login');
  }
}
  
  public function actionOrderCar()
  {
    
    $text= $_POST['text'];
    Yii::$app->mailer->compose()
     ->setFrom('vipcars@1gb.ru')
     ->setTo('nikcrysis@mail.ru')
     ->setSubject('vipcars.ru New Order')
     ->setTextBody($text)
    ->send();
  }

}

