import styled from "styled-components";

export const Container = styled.div`
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
`;