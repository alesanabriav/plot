import React, { Component } from 'react';

class Portafolio extends Component {

	componentDidMount() {
		const elem = document.querySelector('.grid');
		var iso = new Isotope( elem, {
			// options
			itemSelector: '.grid-item',
			layoutMode: 'fitRows'
		});

	}

	handleClick = (e) => {
		e.preventDefault();
	}
	

	render() {
		return (
			<div className="grid">
				{this.props.items.map(item => 
					<div className="portfolio-item grid-item col-lg-4" key={item.ID}>
						<h1>{item.post_title}</h1>
						<img src={item.post_thumbnail} style={{width: '100%'}}/>
						<p>{item.post_excerpt}</p>
					</div>	
				)}
			</div>
		)
	}
}

export default Portafolio;