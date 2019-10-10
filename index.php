<?php

require_once __DIR__ . '/functions/index.php';

Kirby::plugin('medienbaecker/logger', [
    'hooks' => [
		'site.update:after' => function ($site, $oldSite) {
			logToFile($this->user(), "updated the site");
		},
		'page.create:after' => function ($page) {
			logToFile($this->user(), "created the page " . $page->uri());
		},
		'page.update:after' => function ($newPage, $oldPage) {
			logToFile($this->user(), "updated the page " . $newPage->uri());
		},
		'page.delete:after' => function ($status, $page) {
			logToFile($this->user(), "deleted the page " . $page->uri());
		},
		'page.changeNum:after' => function ($newPage, $oldPage) {
			logToFile($this->user(), "sorted the page " . $newPage->uri());
		},
		'page.changeStatus:after' => function ($newPage, $oldPage) {
			logToFile($this->user(), "changed the status of the page " . $newPage->uri() ." to " . $newPage->status());
		},
		'page.changeTitle:after' => function ($newPage, $oldPage) {
			logToFile($this->user(), "changed the title of the page " . $newPage->uri());
		},
		'file.create:after' => function ($file) {
			logToFile($this->user(), "uploaded the file " . $file->filename() . " to the page " . $file->parent()->uri());
		},
		'file.replace:after' => function ($newFile, $oldFile) {
			logToFile($this->user(), "replaced the file " . $oldFile->filename() . " on the page " . $newFile->parent()->uri());
		},
		'file.update:after' => function ($newFile, $oldFile) {
			logToFile($this->user(), "updated the file " . $newFile->filename() . " on the page " . $newFile->parent()->uri());
		},
		'file.delete:after' => function ($status, $file) {
			logToFile($this->user(), "deleted the file " . $file->filename() . " on the page " . $file->parent()->uri());
		},
		'file.changeSort:after' => function ($newFile, $oldFile) {
			logToFile($this->user(), "sorted the file " . $newFile->filename() . " on the page " . $newFile->parent()->uri());
		},
		'file.changeName:after' => function ($newFile, $oldFile) {
			logToFile($this->user(), "changed the name of the file " . $newFile->filename() . " on the page " . $newFile->parent()->uri());
		},
    ]
]);