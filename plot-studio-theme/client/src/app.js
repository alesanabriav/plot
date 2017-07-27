import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import multipleRender from "react-multiple-render";
import Portafolio from './components/portafolio';
import Directors from './components/directors';
import emitter from 'tiny-emitter/instance';

multipleRender(Portafolio, '.ps-portafolio');
multipleRender(Directors, '.ps-directors');

[...document.querySelectorAll('li[class^="filter-"]')].forEach(function(el) {
  el.addEventListener('click', function(e) {
    e.preventDefault();
    const $index = this.getAttribute('class').indexOf('filter-');
    const filter = this.getAttribute('class').split(' ')[$index];
    const filterName = filter.split('-')[1];
    window.location.hash = filterName;

    if(window.location.pathname !== '/') {
      window.location = `/#${filterName}`;
    }
    emitter.emit( 'filter-porfolio', filterName );
  });
});
