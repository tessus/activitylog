<?php
script('activitylog', 'script');
script('activitylog', 'moment');
script('activitylog', 'daterangepicker');
script('activitylog', 'awesomplete');

style('activitylog', 'awesomplete');
style('activitylog', 'style');
style('activitylog', 'bootstrap');
style('activitylog', 'daterangepicker');
style('activitylog', 'bulma');
?>

<div id="app">
	<div id="app-navigation">
		<?php print_unescaped($this->inc('navigation/index')); ?>
		<?php //print_unescaped($this->inc('settings/index')); ?>
	</div>

	<div id="app-content">
		<div id="app-content-wrapper">
			<?php print_unescaped($this->inc('content/index')); ?>
		</div>
	</div>
</div>
