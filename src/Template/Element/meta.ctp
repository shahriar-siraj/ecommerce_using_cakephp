<?php
use \Cake\Core\Configure;

$this->assign('title', (isset($title)) ? h($title) : 'Welcome on WHG');
$this->start('meta');
/**
 * Basic tags.
 */
	echo $this->Html->meta(['name' => 'author', 'content' => (isset($author)) ? h($author) : Configure::read('Author.pseudo')]);
	echo $this->Html->meta(['name' => 'copyright', 'content' => (isset($copyright)) ? h($copyright) : Configure::read('Author.full_name')]);
	echo $this->Html->meta('description', (isset($description)) ? $this->Text->truncate(
		h($description),
		250,
		[
			'ellipsis' => '...',
			'exact' => false
		]
	) : Configure::read('Site.description'));
$this->end();
