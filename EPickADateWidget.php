<?
class EPickADateWidget extends CInputWidget
{

    /**
    * @var string Pickatime theme name.
    * Defaults to 'classic'.
    * To change theme to Default Theme set value to 'default'
    */
    public $theme = 'classic';

    /**
    * @var string type of picker.
    * Defaults to 'datepicker'.
    * If you needed to pick a time, set value to 'timepicker'.
    */
    public $pickerType = 'datepicker';

    /**
    * @var string.
    * To change the language, set the variable string to filename without the filename extension. 
    * Filenames of locale files you can find in dir \assets\translations\. 
    * In most cases, you'll need to set a variable, as you always do this , for example, 'ru_RU', 'en_US', etc.
    * More info: @link http://amsul.ca/pickadate.js/date.htm#translations.
    */ 
    public $language = '';
    
    /**
    * @var boolean.
    * For right-to-left (RTL) languages you’ll need to switch the arrows and text direction. 
    * Set variable true to link the rtl.css file.
    * Defaults to false.
    */ 
    public $rtl = false;	

    /**
	 * @var array the initial JavaScript options that should be passed to the Pickatime.js plugin.
	 * For more info about Picktime.js plugin's options follow the link http://amsul.ca/pickadate.js/date.htm#options. 
  	 * Or http://amsul.ca/pickadate.js/time.htm#options for time pick fields.
 	 */
	public $options=array();

     

	public function init()
	{
       parent::init();

       $assetsDir = dirname(__FILE__) . '\assets';
       $themeDir = $assetsDir.'\themes';
       $appCS = Yii::app()->getClientScript();
       $appCS->registerScriptFile(Yii::app()->assetManager->publish($assetsDir.'\legacy.js'));
       $appCS->registerScriptFile(Yii::app()->assetManager->publish($assetsDir.'\picker.js'));
       switch ($this->pickerType) {
       	case 'datepicker':
       		$appCS->registerScriptFile(Yii::app()->assetManager->publish($assetsDir.'\picker.date.js'));
       		break;
       	case 'timepicker':
       		$appCS->registerScriptFile(Yii::app()->assetManager->publish($assetsDir.'\picker.time.js'));
       		break;	
       	
       	default:
       		$appCS->registerScriptFile(Yii::app()->assetManager->publish($assetsDir.'\picker.date.js'));
       		break;
       }
       switch ($this->theme) {
       	case 'classic':
       		$appCS->registerCssFile(Yii::app()->assetManager->publish( $themeDir.'\classic.css'));
       		$appCS->registerCssFile(Yii::app()->assetManager->publish( $themeDir.'\classic.time.css'));
       		$appCS->registerCssFile(Yii::app()->assetManager->publish( $themeDir.'\classic.date.css'));
       		break;
       	case 'default':
       		$appCS->registerCssFile(Yii::app()->assetManager->publish( $themeDir.'\default.css'));
       		$appCS->registerCssFile(Yii::app()->assetManager->publish( $themeDir.'\default.time.css'));
       		$appCS->registerCssFile(Yii::app()->assetManager->publish( $themeDir.'\default.date.css'));
       		break;	
       	
       	default:
       		$appCS->registerCssFile(Yii::app()->assetManager->publish( $themeDir.'\default.css'));
       		$appCS->registerCssFile(Yii::app()->assetManager->publish( $themeDir.'\default.time.css'));
       		$appCS->registerCssFile(Yii::app()->assetManager->publish( $themeDir.'\default.date.css'));
       		break;
       }
       if($this->rtl)
        $appCS->registerCssFile(Yii::app()->assetManager->publish( $themeDir.'\rtl.css'));

       if(!empty($this->language))
        $appCS->registerScriptFile(Yii::app()->assetManager->publish($assetsDir.'\translations\\'.$this->language.'.js'));
       
       
	}


    public function run()
    {   
    	$id = uniqid('pickatime_');
    	if(isset($this->htmlOptions['id']))
			$id=$this->htmlOptions['id'];
		else
			$this->htmlOptions['id']=$id;
		if(isset($this->htmlOptions['name']))
			$name=$this->htmlOptions['name'];


    	if($this->hasModel())
				echo CHtml::activeTextField($this->model,$this->attribute,$this->htmlOptions);
			else
				echo CHtml::textField($name,$this->value,$this->htmlOptions);
        $options=CJavaScript::encode($this->options); 
        switch ($this->pickerType) {
        	case 'datepicker':
        		$script="jQuery('#{$id}').pickadate($options)";
        		break;
        	case 'timepicker':
        		$script="jQuery('#{$id}').pickatime($options)";
        		break;	
        	
        	default:
        		$script="jQuery('#{$id}').pickadate($options)";
        		break;
        }
    	
    	Yii::app()->getClientScript()->registerScript($id,$script);
    }




}
?>