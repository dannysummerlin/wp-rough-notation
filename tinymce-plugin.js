addEventListener("DOMContentLoaded", (e) => {
	if(window.tinymce) {
		window.document.styleSheets[0].insertRule("i.mce-i-roughnotation { font: 400 20px/1 dashicons;padding: 0;vertical-align:top;margin-left: -2px;padding-right: 2px;}",  window.document.styleSheets[0].cssRules.length);
		window.tinymce.PluginManager.add("rough-notation", function(ed) {
			ed.addButton("rough-notation", {
				name: 'rough-notation',
				title: 'Rough Notation',
				type: 'menubutton',
				icon: 'roughnotation dashicons-marker',
				menu: [{
					text: 'Circle',
					onclick: function() {
						selected = ed.selection.getContent()
						content = '[roughnotation type="circle" color="var(--)"]'+(selected || '')+'[/roughnotation] ';
						ed.execCommand('mceInsertContent', false, content)
					}
				},{
					text: 'Underline',
					onclick: function() {
						selected = ed.selection.getContent()
						content = '[roughnotation type="underline" color="var(--)"]'+(selected || '')+'[/roughnotation] ';
						ed.execCommand('mceInsertContent', false, content)
					}
				},{
					text: 'Highlight',
					onclick: function() {
						selected = ed.selection.getContent()
						content = '[roughnotation type="highlight" color="var(--)"]'+(selected || '')+'[/roughnotation] ';
						ed.execCommand('mceInsertContent', false, content)
					}
				}]
			})
		})
	}
})
