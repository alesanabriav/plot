import slick from 'slick-carousel';
import React, { Component } from 'react';
import jQuery from 'jquery';

class Slider extends Component {
	componentDidMount() {
		jQuery(this.slider).slick({
			autoplay: true,

		});
	}

	render() {
		const { slides } = this.props;

		return (
			<section>
				<div ref={ref => this.slider = ref}>
					{slides.map((slide, i) => {
						return <div key={i} >
						<a href={slide.link} className="slide-content" style={{backgroundImage: `url(${slide.image})`}}>
							<div className="slide-titles">
								<h2>{slide.title}</h2>
								<h3>{slide.subtitle}</h3>
							</div>
						</a>
						</div>
					})}
				</div>
				<div className="dots" ref={ref => this.dots = ref}></div>

			<style jsx>{`
				section {

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
					justify-content: center;
					position: relative;
					align-items: center;
					background-position: center;
					background-size: cover;
					height: 80vh;
				}

				.slide-titles {
					width: 80%;
					top: 50%;
					left: 0;
					right: 0;
					margin: 0 auto;
					text-align: center;

				}

				.slide-title h2 {
					font-size: 20px;
					font-weight: bold;
				}

				.slide-titles h3 {
					font-size: 20px;
				}

				@media (min-width: 1024px) {
					.slide-titles {
						width: 50%;
					}

					.slide-titles h2 {
						font-size: 30px;
						font-weight: bold;
					}

					.slide-titles h3 {
						font-size: 25px;
					}
				}
			`}</style>
			</section>
		);
	}
}

export default Slider;
