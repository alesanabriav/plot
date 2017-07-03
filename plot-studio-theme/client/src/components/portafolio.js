import React, { Component } from 'react';
import Item from './portfolio_item';

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


	render() {
		return (
			<div>
				<button onClick={this.filterItems.bind(null, '*')}>all</button>
				<button onClick={this.filterItems.bind(null, '.animation')}>animation</button>
				<button onClick={this.filterItems.bind(null, '.production')}>production</button>

				<div className="grid">
					{this.props.items.map(item => <Item item={item} /> )}
				</div>
			</div>
		)
	}
}

export default Portafolio;
