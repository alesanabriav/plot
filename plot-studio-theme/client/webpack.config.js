const Path = require('path');
const webpack = require('webpack');

module.exports = {
	entry: {
		vendor: [
			'react',
			'react-dom',
			'react-multiple-render',
			'masonry-layout'
    ],
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
	},
		plugins: [
      new webpack.optimize.CommonsChunkPlugin({
        name: 'vendor',
        filename: 'vendor.js', 
        minChunks: Infinity,
				minSize: Infinity
      })
    ]
};

