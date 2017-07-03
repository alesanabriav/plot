import React, { Component } from 'react';


class Portafolio extends Component {

	componentDidMount() {
		const elem = document.querySelector('.grid');
		this.iso = new Isotope( elem, {
			isJQueryFiltering: false,
			itemSelector: '.grid-item',
			layoutMode: 'fitRows'
		});
		this.iso.layout()
	}

	filterItems = (category) => {
		this.iso.arrange({ filter: `${category}` });
	}

	handleClick = (e) => {
		e.preventDefault();
	}

	playVideo() {
		console.log('playvideo');
	}

	stopVideo() {
		console.log('stop video');
	}

	render() {
		return (
			<div>
				<button onClick={this.filterItems.bind(null, '*')}>all</button>
				<button onClick={this.filterItems.bind(null, '.animation')}>animation</button>
				<button onClick={this.filterItems.bind(null, '.production')}>production</button>

				<div className="grid">

				{this.props.items.map(item =>
						<div
							onMouseEnter={this.playVideo}
							onMouseLeave={this.stopVideo}
							className={`${item.post_categories.map(cat => cat.cat_name).join(' ')} portfolio-item grid-item col-lg-4`} key={item.ID}>
						<h1>{item.post_title}</h1>
						<img
							data-src={item.post_thumbnail}
							data-srcset={`${item.post_thumbnail} 600w, ${item.post_image} 1200w`}
							className="lazyload blur-up" style={{width: '100%'}}
						/>
						<video>
							<source src=${item.post_video_thumbnail} type="video/mp4" />
						</video>
						<p>{item.post_excerpt}</p>
					</div>
				)}
			</div>
			</div>
		)
	}
}

export default Portafolio;
