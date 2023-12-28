addEventListener("DOMContentLoaded", (e) => {
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
					content = '[rough-notation type="circle"]'+(selected || '')+'[/rough-notation] ';
					ed.execCommand('mceInsertContent', false, content)
				}
			},{
				text: 'Underline',
				onclick: function() {
					selected = ed.selection.getContent()
					content = '[rough-notation type="underline"]'+(selected || '')+'[/rough-notation] ';
					ed.execCommand('mceInsertContent', false, content)
				}
			},{
				text: 'Highlight',
				onclick: function() {
					selected = ed.selection.getContent()
					content = '[rough-notation type="highlight"]'+(selected || '')+'[/rough-notation] ';
					ed.execCommand('mceInsertContent', false, content)
				}
			}]
		})
	})
})
