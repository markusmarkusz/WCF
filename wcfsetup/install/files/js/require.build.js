({
	mainConfigFile: 'require.config.js',
	name: "WoltLabSuite/_Meta",
	out: "WCF.Core.min.js",
	useStrict: true,
	preserveLicenseComments: false,
	optimize: 'uglify2',
	uglify2: {},
	paths: {
		"requireLib": "require",
		
		"jquery": "empty:"
	},
	deps: [
		"require.config",
		"wcf.globalHelper"
	],
	include: [
		"requireLib",
		"require.linearExecution"
	],
	excludeShallow: [
		'WoltLabSuite/_Meta'
	],
	rawText: {
		'WoltLabSuite/_Meta': 'define([], function() {});'
	},
	onBuildRead: function(moduleName, path, contents) {
		if (!process.versions.node) {
			throw new Error('You need to run node.js');
		}
		
		if (moduleName === 'WoltLabSuite/_Meta') {
			if (global.allModules == undefined) {
				var fs   = module.require('fs'),
				    path = module.require('path');
				global.allModules = [];
				
				var queue = ['WoltLabSuite'];
				var folder;
				while (folder = queue.shift()) {
					var files = fs.readdirSync(folder);
					for (var i = 0; i < files.length; i++) {
						var filename = path.join(folder, files[i]);
						if (filename === 'WoltLabSuite/Core/Acp') continue;
						
						if (path.extname(filename) == '.js') {
							global.allModules.push(filename);
						}
						else if (fs.statSync(filename).isDirectory()) {
							queue.push(filename);
						}
					}
				}
			}
			
			return 'define([' + global.allModules.map(function (item) { return "'" + item.replace(/\\/g, '\\\\').replace(/'/g, "\\'").replace(/\.js$/, '') + "'"; }).join(', ') + '], function() { });';
		}
		
		return contents;
	}
});
