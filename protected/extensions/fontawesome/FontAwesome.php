<?php 

/**
 * FontAwesome class file.
 * @author Seth Marquin Busque <sethbusque@gmail.com>
 * @copyright Copyright &copy; Seth Marquin Busque 2014
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @version 0.0.1
*/
class FontAwesome extends CApplicationComponent
{
	public $minified = false;

	protected $_assetsUrl;

	/**
	 * Initializes the component.
	 */
	public function init(){
		// Register the font-awesome path alias.
		if (Yii::getPathOfAlias('fontawesome') === false)
			Yii::setPathOfAlias('fontawesome', realpath(dirname(__FILE__)));

		// Prevents the extension from registering scripts and publishing assets when ran from the command line.
		if (Yii::app() instanceof CConsoleApplication)
			return;

		$this->registerCss();

        parent::init();
	}

	/**
	 * Registers the FontAwesome CSS.
	 */
	public function registerCss()
	{
		$path = '/css/font-awesome.css';
		if($this->minified == true){
			$path = '/css/font-awesome.min.css';
		}
		Yii::app()->clientScript->registerCssFile($this->getAssetsUrl().$path);
	}

	/**
	* Returns the URL to the published assets folder.
	* @return string the URL
	*/
	protected function getAssetsUrl()
	{
		if (isset($this->_assetsUrl))
			return $this->_assetsUrl;
		else
		{
			$assetsPath = Yii::getPathOfAlias('fontawesome.assets');
			$assetsUrl = Yii::app()->assetManager->publish($assetsPath, false, -1, YII_DEBUG);
			return $this->_assetsUrl = $assetsUrl;
		}
	}
}