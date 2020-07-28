/*global 
    require:true
		module:true
*/
const webpack = require('webpack')
const merge = require('webpack-merge')
const common = require('./webpack.common.js')
module.exports = merge(common, {
	plugins: [
		new webpack.optimize.UglifyJsPlugin({
			mangle: true,
			minimize: true,
			drop_console: true,
			comments: false,
			'screw-ie8': true,
			drop_debugger: true,
			compress: {
				drop_console: true,
				warnings: true,
				properties: true,
				sequences: true,
				dead_code: true,
				conditionals: true,
				comparisons: true,
				evaluate: true,
				booleans: true,
				unused: true,
				loops: true,
				hoist_funs: true,
				cascade: true,
				if_return: true,
				join_vars: true,
				drop_debugger: true,
				negate_iife: true,
				unsafe: true,
				hoist_vars: true,
			},
		}),
	]
})
