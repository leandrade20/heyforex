/*global 
    require:true
		module:true
*/
const path = require('path')
const webpack = require('webpack')
const CleanWebpackPlugin = require('clean-webpack-plugin')
module.exports = {
	entry: ['./js/src/app.js', ],
	output: {
		filename: 'bundle.js',
		path: path.resolve(__dirname, '../js/dist')
	},
	module: {
		rules: [
			{
				enforce: 'pre',
				test: /\.js$/,
				exclude: /(node_modules|bower_components)/,
				loader: 'eslint-loader',
			},
			{
				test: /\.js$/,
				exclude: /(node_modules|bower_components)/,
				use: {
					loader: 'babel-loader',
					options: {
						presets: ['env'],
						plugins: ['transform-object-rest-spread']
					}
				}
			}
		]
	},
	plugins: [
		new CleanWebpackPlugin(['dist']),
		new webpack.ProvidePlugin({
			$: 'jquery',
			jQuery: 'jquery'
		}),
	]
}