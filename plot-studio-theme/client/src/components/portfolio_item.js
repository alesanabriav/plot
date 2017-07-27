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

  openItem = () => {
    window.location = this.props.item.guid;
  }


  render() {
    const { item } = this.props;

    return (
      <div
        onMouseEnter={this.playVideo}
        onMouseLeave={this.stopVideo}
        onClick={this.openItem}
        className={`${item.post_categories.map(cat => cat.cat_name).join(' ')} portfolio-item grid-item col-lg-4 col-md-6 col-xs-12`}
        key={item.ID}>
      <div className="portfolio-item__container" style={{position: 'relative'}}>

        <div className="portfolio-item__media">
          <img
            data-src={item.post_thumbnail}
            data-srcset={`${item.post_thumbnail} 600w, ${item.post_image} 1200w`}
            className="lazyload blur-up"
            style={this.state.play ? {opacity: 0, width: '100%', transition: 'opacity .5s'} : {opacity: 1, width: '100%', transition: 'opacity .5s'}}
          />
          {item.post_video_thumb ?
            <video
              ref={video => this.video = video}
              muted
              loop="true"
            >
              <source src={item.post_video_thumb} type="video/mp4" />
            </video>
          : ''}
        </div>
          <div className="portfolio-item__texts">
            <h2>{item.client_name}</h2>
            <h1>{item.post_title}</h1>
          </div>
      </div>
    </div>
    )
  }

}

export default PortfolioItem;
