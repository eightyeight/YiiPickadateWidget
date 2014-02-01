Yii Pickadate.js Widget
========================

`YiiPickadateWidget` little widget that encapsulates some interesting JS Librires from [Amsul] (https://github.com/amsul).


Usage
-----
Call widget as usual.

```php
$this->widget('ext.pickadate.EPickADateWidget', 
			             array('pickerType' => 'datepicker', // set timepicker to change type.
                               'model' => $model,
                               'attribute'=> 'atribute',			             	
                               'language' => 'ru_RU',  //this is name of local file that's находится in directory /assets/lang
                               'htmlOptions' => array( 'class'=> 'date-input'), //some htmloptions
                               'options' => array( 'showMonthsShort' => 'true'), //options that's should pass to JS 
						      ));
						      ```



