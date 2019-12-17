<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'items' => [
                    ['label' => Yii::t('app', 'Apples'), 'icon' => 'file-code-o', 'url' => ['/apple']],
                    ['label' => Yii::t('app', 'Color'), 'icon' => 'dashboard', 'url' => ['/color']],
                    ['label' => Yii::t('app', 'Status'), 'icon' => 'dashboard', 'url' => ['/status']],
                    [
                        'label' => 'Login',
                        'url' => ['site/logout'],
                        'visible' => Yii::$app->user->isGuest,
                        'options' => ['method' => '_post'],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
