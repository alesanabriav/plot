import slick from 'slick-carousel';
import React, { Component } from 'react';
import jQuery from 'jquery';

class Slider extends Component {
	componentDidMount() {
		jQuery(this.slider).slick({
			arrows: false,
			dots: true,
			appendDots: jQuery(this.dots)
		});
	}

	render() {
		const { slides } = this.props;

		return (
			<section>
				<div ref={ref => this.slider = ref}>
					{slides.map((slide, i) => {
						return <div key={i} >
						<a href={slide.link} className="slide-content">
							<h2>{slide.title}</h2>
							<img src={slide.image} alt=""/>
						</a>
						</div>
					})}
				</div>
				<div className="dots" ref={ref => this.dots = ref}></div>

			<style jsx>{`
				section {
					position: relative;
					height: 100vh;
				}

				.dots {
					position: absolute;
					left: 0;
					right: 0;
					margin: 0 auto;
					bottom: 40px;
				}

				.slick-dots button {
					background: red;
				}

				img {
					width: 100%;
				}

				.slide-content {
					display: flex;
					flex-direction: column;
				}

				.slide-content h2 {
					font-size: 20px;
					width: 100%;
					position: absolute;
					top: 50%;
					bottom: 0;
					padding-left: 1%;
				}

				@media (min-width: 1024px) {
					.slide-content h2 {
						width: 50%;
						font-size: 40px;
					}
				}
			`}</style>
			</section>
		);
	}
}

export default Slider;
