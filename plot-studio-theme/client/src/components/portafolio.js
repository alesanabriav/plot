import React, { Component } from 'react';

class Portafolio extends Component {
	handleClick = (e) => {
		e.preventDefault();
	}

	render() {
		return (
			<div>
				<a href="#" onClick={this.handleClick}>{this.props.name}</a>
			</div>
		)
	}
}

export default Portafolio;