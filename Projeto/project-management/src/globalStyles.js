import { createGlobalStyle } from 'styled-components';
import reset from 'styled-reset';

const GlobalStyles = createGlobalStyle`
  /* Eric Meyer's reset css */
  ${reset}

  /* set box-sizing to border-box */
  html {
    box-sizing: border-box;
  }

  *, *::before, *::after {
    box-sizing: inherit;
  }

  /* set default font-size to 62.5% */
  html {
    font-size: 62.5%;
  }

  body {
    font-size: 1.6rem;
  }

  /* other styles */
  body {
    background: #F7F7F7;
    font-family: 'Cabin', sans-serif;
  }

  *, *::before, *::after {
    font-family: 'Cabin', sans-serif;
    text-rendering: optimizeLegibility;
    text-shadow: rgba(0,0,0,.01) 0 0 1px;
  }

  .fw-700 {
    font-weight: 700;
  }

  .btn {
    border: none;
    border-radius: 8px;
    display: inline-block;
    font-weight: 500;
    font-size: 1.6rem;
    padding: 0.75em 1.5em;
    letter-spacing: 1px;
    outline: none;
    transition: box-shadow 80ms linear;
  }

  .btn:hover {
    cursor: pointer;
  }

  .btn:active {
    opacity: .8;
  }

  .btn--green {
    outline: #05817933;
    background: #058179;
    box-shadow: rgb(0 0 0 / 20%) 0px 6px 24px 0px, rgb(5 129 121 / 34%) 0px 0px 0px 2px;
    color: #FFF;
  }

  .btn--green:hover {
    box-shadow: rgb(0 0 0 / 20%) 0px 6px 24px 0px, rgb(5 129 121 / 34%) 0px 0px 0px 4px;
  }

  .btn--red {
    outline: #05817933;
    background: red;
    box-shadow: rgb(0 0 0 / 20%) 0px 6px 24px 0px, rgb(5 129 121 / 34%) 0px 0px 0px 2px;
    color: #FFF;
  }

  .btn--red:hover {
    box-shadow: rgb(0 0 0 / 20%) 0px 6px 24px 0px, rgb(5 129 121 / 34%) 0px 0px 0px 4px;
  }

  .btn--blue {
    outline: #05817933;
    background: #2c2cab;
    box-shadow: rgb(0 0 0 / 20%) 0px 6px 24px 0px, rgb(5 129 121 / 34%) 0px 0px 0px 2px;
    color: #FFF;
  }

  .btn--red:hover {
    box-shadow: rgb(0 0 0 / 20%) 0px 6px 24px 0px, rgb(5 129 121 / 34%) 0px 0px 0px 4px;
  }

  .Modal_overlay {
    display: flex;
    justify-content: center;
    align-items: center;

    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;

    background: rgba(0, 0, 0, .5);
  }

  .Modal_content {
    background: #FFF;
    border-radius: 6px;
    padding: 3rem;
    width: 750px;
  }
`;

export default GlobalStyles;