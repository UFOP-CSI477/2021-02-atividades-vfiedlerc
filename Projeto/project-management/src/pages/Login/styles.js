import styled from "styled-components";

export const Container = styled.div`
  background:#EEE;

  display: flex;
  justify-content: center;
  align-items: center;

  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;

  .login {
    background: #FFF;
    border-radius: 6px;
    box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
    padding: 3rem;
    width: 550px;

    display: flex;
    flex-direction: column;

    h2 {
      font-size: 3.4rem;
      font-weight: 700;
      margin-bottom: 1.25em;
    }

    input {
      font-size: 2.2rem;
      padding: 0.75em 1em;
      margin-bottom: 1em;

    }

    button {
      padding: 1em;
      font-size: 2.2rem;
    }

    button + button {
      margin-top: 0.5em;
    }

    .register_button {
      text-decoration: none;
      display: inline-block;
      margin: 0 auto;
      margin-top: 3rem;
      font-size: 2rem;
      color: #333;
    }
  }
`;