import React, { Component } from 'react';

class Directors extends Component {

  render() {
    const { items } = this.props;

    return (
      <div className="directors">
        {items.map((director) =>
          <div className="col-lg-4 col-md-6 col-xs-12">
            <a href={director.guid} className="director-item">
              <img src={director.post_image} style={{width: '100%'}} />
              <h2 className="director-item__title">{director.post_title}</h2>
            </a>
          </div>
        )}
      </div>
    )
  }
}

export default Directors;
