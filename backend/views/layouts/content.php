<?php
use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;

?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <?php if (isset($this->blocks['content-header'])) { ?>
                    <h4><?= $this->blocks['content-header'] ?></h4>
                    <?php } else { ?>
                        <h4>
                            <?php
                            if ($this->title !== null) {
                                echo \yii\helpers\Html::encode($this->title);
                            } else {
                                echo \yii\helpers\Inflector::camel2words(
                                    \yii\helpers\Inflector::id2camel($this->context->module->id)
                                );
                                echo ($this->context->module->id !== \Yii::$app->id) ? '<small>Module</small>' : '';
                            } ?>
                        </h4>
                    <?php } ?>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                           <?=
                            Breadcrumbs::widget(
                            [
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                            ]
                            ) ?>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-md-12 content-div">
                        <div class="white-box"> 
                        <?= $content ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> <?=date('Y')?> &copy; <?=Yii::$app->name?>. Powered By <a href="https://leanium.io/" target="_blank">Leanium Technologies</a></footer>
        </div>
