<div class="wide form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
    'type'=>'horizontal'
)); ?>
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="form-group">
            <?php echo $form->label($model,'id',array('class'=>"control-label col-xs-3 col-sm-3 col-md-3 col-lg-3")); ?>
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <?php echo $form->textField($model,'id',array('class'=>"form-control")); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->label($model,'username',array('class'=>"control-label col-xs-3 col-sm-3 col-md-3 col-lg-3")); ?>
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20,'class'=>"form-control")); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->label($model,'email',array('class'=>"control-label col-xs-3 col-sm-3 col-md-3 col-lg-3")); ?>
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128,'class'=>"form-control")); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->label($model,'activkey',array('class'=>"control-label col-xs-3 col-sm-3 col-md-3 col-lg-3")); ?>
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <?php echo $form->textField($model,'activkey',array('size'=>60,'maxlength'=>128,'class'=>"form-control")); ?>
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="form-group">
            <?php echo $form->label($model,'create_at',array('class'=>"control-label col-xs-3 col-sm-3 col-md-3 col-lg-3")); ?>
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <?php echo $form->textField($model,'create_at',array('class'=>"form-control")); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->label($model,'lastvisit_at',array('class'=>"control-label col-xs-3 col-sm-3 col-md-3 col-lg-3")); ?>
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <?php echo $form->textField($model,'lastvisit_at',array('class'=>"form-control")); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->label($model,'superuser',array('class'=>"control-label col-xs-3 col-sm-3 col-md-3 col-lg-3")); ?>
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <?php echo $form->dropDownList($model,'superuser',$model->itemAlias('AdminStatus'),array('class'=>"form-control")); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->label($model,'status',array('class'=>"control-label col-xs-3 col-sm-3 col-md-3 col-lg-3")); ?>
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <?php echo $form->dropDownList($model,'status',$model->itemAlias('UserStatus'),array('class'=>"form-control")); ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="form-group">
            <div class="col-xs-offset-3 col-sm-offset-3 col-md-offset-3 col-lg-offset-3 col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <?php $this->widget('bootstrap.widgets.TbButton', array(
                    'buttonType'=>'submit',
                    'label'=>UserModule::t('Search'),
                    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'icon'=>'search'
                )); ?>
            </div>
        </div>        
    </div>
</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->