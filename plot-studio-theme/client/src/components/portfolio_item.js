import React, { Component } from 'react';

class PortfolioItem extends Component {
  state = {
    play: false
  }

  handleClick = (e) => {
    e.preventDefault();
  }

  playVideo = () => {
    if(this.video) {
      this.setState({play: true});
      this.video.play();
    }

  }

  stopVideo = () =>  {
    if(this.video) {
      this.setState({play: false});
      this.video.pause();
    }
  }


  render() {
    const { item } = this.props;

    return (
      <div
        onMouseEnter={this.playVideo}
        onMouseLeave={this.stopVideo}
        className={`${item.post_categories.map(cat => cat.cat_name).join(' ')} portfolio-item grid-item col-lg-4`}
        key={item.ID}>
      <div className="portfolio-item__container" style={{position: 'relative'}}>
        <h1>{item.post_title}</h1>
        <div className="portfolio-item__media">
          <img
            data-src={item.post_thumbnail}
            data-srcset={`${item.post_thumbnail} 600w, ${item.post_image} 1200w`}
            className="lazyload blur-up"
            style={this.state.play ? {opacity: 0, width: '100%'} : {opacity: 1, width: '100%', transition: 'all 500ms'}}
          />
          {item.post_video_thumb ?
            <video
              ref={video => this.video = video}
              style={this.state.play ? {width: '100%', opacity: 1, transition: 'all 500ms'} : {width: '100%', opacity: 0}}
              loop="true"
            >
              <source src={item.post_video_thumb} type="video/mp4" />
            </video>
          : ''}
        </div>
        <p>{item.post_excerpt}</p>
      </div>
    </div>
    )
  }

}

export default PortfolioItem;
