<?php
/**
 * Created for IG Monitoring.
 * User: jakim <pawel@jakimowski.info>
 * Date: 26.01.2018
 */

use yii\authclient\widgets\AuthChoice;
use yii\helpers\Html;

?>

    <p class="login-box-msg">Sign in to start your session</p>

<?php $authAuthChoice = AuthChoice::begin([
    'popupMode' => false,
    'autoRender' => false,
]) ?>
<?php foreach ($authAuthChoice->getClients() as $client): ?>
    <div class="form-group text-center">
        <?php if ($client->getId() == 'google'): ?>
            <?= Html::a(Html::img('/img/btn_google_signin.png'), ['/admin/auth/auth', 'authclient' => $client->getName(),]) ?>
        <?php else: ?>
            <?= Html::a("<span class='fa fa-$client->name'></span> Sign in with " . $client->getTitle(), ['/admin/auth/auth', 'authclient' => $client->getName(),], ['class' => "btn btn-block btn-social btn-$client->name "]) ?>
        <?php endif; ?>
    </div>
<?php endforeach; ?>
<?php AuthChoice::end() ?>