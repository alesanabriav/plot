import React, { Component } from 'react';
import Item from './portfolio_item';
import emitter from 'tiny-emitter/instance';

class Portafolio extends Component {

	componentDidMount() {
		const elem = document.querySelector('.grid');
		this.iso = new Isotope( elem, {
			isJQueryFiltering: false,
			itemSelector: '.grid-item',
			layoutMode: 'fitRows'
		});

		this.iso.layout();
		let hashFilter = window.location.hash.replace('#', '');

		if(hashFilter.length > 0) {
			this.filterItems(hashFilter);
		}

		emitter.on('filter-porfolio', filter => {
			this.filterItems(filter);
		});
	}

	filterItems = (filter) => {
		console.log(filter);
		if(filter == 'all') {
			filter = '*';
		} else {
			filter = `.${filter}`;
		}
		this.iso.arrange({ filter });
	}

	rebuild = () => {
		this.iso.arrange();
	}

	render() {
		return (
			<div>
				<div className="grid">
					{this.props.items.map(item => <Item item={item} onImageLoad={this.rebuild} /> )}
				</div>
			</div>
		)
	}
}

export default Portafolio;
