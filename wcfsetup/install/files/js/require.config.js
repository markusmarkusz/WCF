requirejs.config({
	paths: {
		enquire: '3rdParty/enquire',
		favico: '3rdParty/favico'
	},
	map: {
		'*': {
			'Ajax': 'WoltLab/WCF/Ajax',
			'AjaxRequest': 'WoltLab/WCF/Ajax/Request',
			'CallbackList': 'WoltLab/WCF/CallbackList',
			'Core': 'WoltLab/WCF/Core',
			'Dictionary': 'WoltLab/WCF/Dictionary',
			'DOM/ChangeListener': 'WoltLab/WCF/DOM/Change/Listener',
			'DOM/Traverse': 'WoltLab/WCF/DOM/Traverse',
			'DOM/Util': 'WoltLab/WCF/DOM/Util',
			'Environment': 'WoltLab/WCF/Environment',
			'EventHandler': 'WoltLab/WCF/Event/Handler',
			'Language': 'WoltLab/WCF/Language',
			'ObjectMap': 'WoltLab/WCF/ObjectMap',
			'UI/Alignment': 'WoltLab/WCF/UI/Alignment',
			'UI/Dialog': 'WoltLab/WCF/UI/Dialog',
			'UI/SimpleDropdown': 'WoltLab/WCF/UI/Dropdown/Simple',
			'UI/TabMenu': 'WoltLab/WCF/UI/TabMenu'
		}
	}
});
