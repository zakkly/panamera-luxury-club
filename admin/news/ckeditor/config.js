/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.toolbar = 'CustomToolbar';
	config.toolbar_CustomToolbar = [
	['Source','-','Preview','-','Templates']
	,['Cut','Copy','Paste','-','SpellChecker']
	,['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat']
	,'/'
	,['Bold','Italic','Underline','Strike','-','Subscript','Superscript']
	,['NumberedList','BulletedList','-','Blockquote']
	,['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock']
	,['Link','Unlink','Anchor']
	,['Image','HorizontalRule','Smiley','SpecialChar']
	,'/'
	,['Styles','Format','Font','FontSize']
	,['TextColor','BGColor']
	,['ShowBlocks']
	];
};
