(function() {
	tinymce.PluginManager.add("rough-notation", function(editor, url) {
		editor.addButton( "rough-notation-circle", {
			text: "RoughNotation: Circle",
			icon: "wp_code",
			onclick: function() {
				selection = editor.selection.getNode()
				const wrapped = document.createElement(selection.nodeName)
				wrapped.innerHTML = '[rough-notation type="circle"]' + selection.innerHTML + '[/rough-notation]'
				node.parentNode.replaceChild(wrapped, selection)
			}
		})
	})
})()
