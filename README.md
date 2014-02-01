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
                               'language' => 'ru_RU',  //this is the name of a locale file that placed in / assets / languages
                               'htmlOptions' => array( 'class'=> 'date-input'), //some htmloptions
                               'options' => array( 'showMonthsShort' => 'true'), //options that's should pass to JS 
						      ));

```



