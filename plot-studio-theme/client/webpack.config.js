const Path = require('path');

module.exports = {
	entry: {
		bundle: './src/index.js',
		app: './src/app.js'
	},
	output: {
		path: Path.join(__dirname, '/dist/'),
    filename: '[name].js'
	},
	module: {
		rules: [
			{
				test: /\.js$/,
				exclude: /node_modules/,
				use: {
					loader: 'babel-loader?cacheDirectory=true'
				}
			}
		]
	}
};

