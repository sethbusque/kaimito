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
            <?php echo $form->label($model,'varname',array('class'=>"control-label col-xs-3 col-sm-3 col-md-3 col-lg-3")); ?>
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <?php echo $form->textField($model,'varname',array('size'=>50,'maxlength'=>50,'class'=>"form-control")); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->label($model,'title',array('class'=>"control-label col-xs-3 col-sm-3 col-md-3 col-lg-3")); ?>
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255,'class'=>"form-control")); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->label($model,'field_type',array('class'=>"control-label col-xs-3 col-sm-3 col-md-3 col-lg-3")); ?>
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <?php echo $form->dropDownList($model,'field_type',ProfileField::itemAlias('field_type'),array('class'=>"form-control")); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->label($model,'field_size',array('class'=>"control-label col-xs-3 col-sm-3 col-md-3 col-lg-3")); ?>
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <?php echo $form->textField($model,'field_size',array('class'=>"form-control")); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->label($model,'field_size_min',array('class'=>"control-label col-xs-3 col-sm-3 col-md-3 col-lg-3")); ?>
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <?php echo $form->textField($model,'field_size_min',array('class'=>"form-control")); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->label($model,'required',array('class'=>"control-label col-xs-3 col-sm-3 col-md-3 col-lg-3")); ?>
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <?php echo $form->dropDownList($model,'required',ProfileField::itemAlias('required'),array('class'=>"form-control")); ?>
            </div>
        </div> 

        <div class="form-group">
            <?php echo $form->label($model,'match',array('class'=>"control-label col-xs-3 col-sm-3 col-md-3 col-lg-3")); ?>
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <?php echo $form->textField($model,'match',array('size'=>60,'maxlength'=>255,'class'=>"form-control")); ?>
            </div>
        </div>  
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="form-group">
            <?php echo $form->label($model,'range',array('class'=>"control-label col-xs-3 col-sm-3 col-md-3 col-lg-3")); ?>
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <?php echo $form->textField($model,'range',array('size'=>60,'maxlength'=>255,'class'=>"form-control")); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->label($model,'error_message',array('class'=>"control-label col-xs-3 col-sm-3 col-md-3 col-lg-3")); ?>
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <?php echo $form->textField($model,'error_message',array('size'=>60,'maxlength'=>255,'class'=>"form-control")); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->label($model,'other_validator',array('class'=>"control-label col-xs-3 col-sm-3 col-md-3 col-lg-3")); ?>
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <?php echo $form->textField($model,'other_validator',array('size'=>60,'maxlength'=>5000,'class'=>"form-control")); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->label($model,'default',array('class'=>"control-label col-xs-3 col-sm-3 col-md-3 col-lg-3")); ?>
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <?php echo $form->textField($model,'default',array('size'=>60,'maxlength'=>255,'class'=>"form-control")); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->label($model,'widget',array('class'=>"control-label col-xs-3 col-sm-3 col-md-3 col-lg-3")); ?>
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <?php echo $form->textField($model,'widget',array('size'=>60,'maxlength'=>255,'class'=>"form-control")); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->label($model,'widgetparams',array('class'=>"control-label col-xs-3 col-sm-3 col-md-3 col-lg-3")); ?>
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <?php echo $form->textField($model,'widgetparams',array('size'=>60,'maxlength'=>5000,'class'=>"form-control")); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->label($model,'position',array('class'=>"control-label col-xs-3 col-sm-3 col-md-3 col-lg-3")); ?>
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <?php echo $form->textField($model,'position',array('class'=>"form-control")); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->label($model,'visible',array('class'=>"control-label col-xs-3 col-sm-3 col-md-3 col-lg-3")); ?>
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <?php echo $form->dropDownList($model,'visible',ProfileField::itemAlias('visible'),array('class'=>"form-control")); ?>
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